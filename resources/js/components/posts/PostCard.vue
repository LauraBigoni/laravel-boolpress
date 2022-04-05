<template>
	<div
		class="col-5 px-0 card border-primary text-center mb-4"
		v-if="post.is_published"
	>
		<div class="card-header">
			<span class="">{{ post.author.name }} - {{ formatDateTime }}</span>
		</div>
		<div
			class="
				card-body
				d-flex
				flex-column
				justify-content-between
				align-items-center
			"
		>
			<h3 class="card-title fw-bold">{{ post.title }}</h3>
			<p class="card-text">
				{{ post.content }}
			</p>
			<router-link
				:to="{ path: 'posts/', params: { slug: post.slug } }"
				class="btn border-primary w-50 text-primary"
				><i class="fa-regular fa-square-plus"></i> Visualizza il
				post</router-link
			>
		</div>
		<div
			class="card-footer mt-2 d-flex justify-content-between align-items-center"
		>
			<span :class="`badge badge-pill badge-${post.category.color}`">
				{{ post.category.label }}
			</span>
			<div>
				<span
					v-for="tag in post.tags"
					:key="tag.id"
					:style="`background-color: ${tag.color}`"
					class="badge badge-pill text-white mx-2"
				>
					{{ tag.label }}
				</span>
			</div>
		</div>
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
				"/" +
				(postDate.getMonth() + 1) +
				"/" +
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