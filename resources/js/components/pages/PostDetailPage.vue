<template>
	<section id="post-detail" class="flex-center flex-column pt-5">
		<Loader v-if="isLoading && !post" />
		<PostCard v-else :post="post" :hide-link="true" />
		<button v-if="post" class="btn btn-info" @click="$router.back()">
			Indietro
		</button>
	</section>
</template>

<script>
import PostCard from "../posts/PostCard.vue";
import Loader from "../Loader.vue";

export default {
	name: "PostDetailPage",
	components: { PostCard, Loader },
	data() {
		return {
			post: null,
			isLoading: false,
		};
	},
	methods: {
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
	},
	mounted() {
		this.getPost();
	},
};
</script>

<style lang="scss" scoped>
</style>