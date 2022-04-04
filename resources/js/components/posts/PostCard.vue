<template>
	<div class="col-5 px-0 card text-center mb-4">
		<div class="card-header">
			<h3 class="card-title mb-0 fw-bold">{{ post.title }}</h3>
		</div>
		<div class="card-body">
			<p class="card-text">
				{{ post.content }}
			</p>
			<a href="#" class="btn btn-primary"
				><i class="fa-regular fa-square-plus"></i> Visualizza il post</a
			>
		</div>
		<div class="card-footer text-muted">{{ formatDateTime }}</div>
	</div>
</template>

<script>
export default {
	name: "PostCard",
	props: ["post"],
	data() {
		return {};
	},
	computed: {
		formatDateTime() {
			const postDate = new Date(this.post.updated_at);
			const date =
				postDate.getDate() +
				"-" +
				(postDate.getMonth() + 1) +
				"-" +
				postDate.getFullYear();
			const time =
				postDate.getHours() +
				":" +
				postDate.getMinutes() +
				":" +
				postDate.getSeconds();
			const dateTime = date + " " + time;

			return dateTime;
		},
	},
};
</script>

<style lang="scss" scoped>
div.card {
	margin: 0 20px;
}
</style>