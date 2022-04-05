<template>
	<section
		id="post-detail"
		class="full-height-minus-navbar flex-center text-muted"
	>
		<h1>POST DETAIL PAGE</h1>
		<PostCard v-if="!post" />
		<Loader />
	</section>
</template>

<script>
import PostCard from "../posts/PostCard.vue";
import Loader from "../Loader.vue";

export default {
	name: "PostDetailPage",
	components: { PostCard, Loader },
	data() {
		return { post: null, isLoading: false };
	},
	getPost() {
		this.isLoading = true;
		axios
			.get("http://localhost:8000/api/posts/" + this.$route.params.slug)
			.then((res) => {
				this.post = res.data;
			})
			.catch((err) => {
				this.error = true;
			})
			.then(() => {
				this.isLoading = false;
			});
	},
	mounted() {
		this.getPost();
	},
};
</script>

<style lang="scss" scoped>
</style>