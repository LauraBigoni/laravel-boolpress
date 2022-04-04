<template>
	<div>
		<h1 class="text-center mb-5">POSTS</h1>
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
		<Loader v-if="isLoading" />
		<div v-else>
			<div v-if="posts.length" class="d-flex flex-wrap justify-content-center">
				<PostCard v-for="post in posts" :key="post.id" :post="post" />
			</div>
			<p v-else>Non ci sono post</p>
			<Pagination :pagination="pagination" />
		</div>
	</div>
</template>

<script>
import Loader from "../Loader.vue";
import PostCard from "./PostCard.vue";
import Pagination from "../Pagination.vue";

export default {
	name: "PostsList",
	data() {
		return {
			posts: [],
			isLoading: false,
			error: false,
			errorMessage: "Si è verificato un errore",
			pagination: {},
		};
	},
	components: { Loader, PostCard, Pagination },
	methods: {
		getPosts() {
			this.isLoading = true;
			axios
				.get("http://localhost:8000/api/posts")
				.then((res) => {
					const { data, current_page, last_page } = res.data;
					this.posts = data;
					this.pagination = {
						currentPage: current_page,
						lastPage: last_page,
					};
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