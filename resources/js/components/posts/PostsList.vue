<template>
	<div>
		<h1>POSTS</h1>
		<Loader />
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
		};
	},
	components: { Loader },
	methods: {
		getPosts() {
			axios
				.get("http://localhost:8000/api/posts")
				.then((res) => {
					this.posts = res.data;
				})
				.catch((err) => {
					console.error(err);
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