<template>
	<div>
		<h1>POSTS</h1>
		<Loader v-if="isLoading" />
		<div
			class="
				alert alert-danger
				d-flex
				justify-content-between
				align-items-center
			"
			role="alert"
			v-if="error"
		>
			<span>{{ errorMessage }}</span>
			<span @click="error = !error" class="h2 mb-0" role="button">&times;</span>
		</div>
		<ul v-if="posts.length" class="list-unstyled">
			<li v-for="post in posts" :key="post.id">
				{{ post.title }}
			</li>
		</ul>
		<p v-else>Non ci sono post</p>
	</div>
</template>

<script>
import Loader from "../Loader.vue";

export default {
	name: "PostsList",
	data() {
		return {
			posts: [],
			isLoading: false,
			error: false,
			errorMessage: "Si è verificato un errore",
		};
	},
	components: { Loader },
	methods: {
		getPosts() {
			this.isLoading = true;
			axios
				.get("http://localhost:8000/api/posts")
				.then((res) => {
					this.posts = res.data;
				})
				.catch((err) => {
					this.error = true;
				})
				.then(() => {
					this.isLoading = false;
				});
		},
	},
	mounted() {
		this.getPosts();
	},
};
</script>

<style lang="scss" scoped>
</style>