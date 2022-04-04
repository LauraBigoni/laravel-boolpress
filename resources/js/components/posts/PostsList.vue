<template>
	<div>
		<h1>PROVA</h1>
		<ul v-if="posts.length">
			<li v-for="post in posts" :key="post.id">
				{{ post.title }}
			</li>
		</ul>
		<p v-else>Non ci sono post</p>
	</div>
</template>

<script>
export default {
	name: "PostsList",
	data() {
		return {
			posts: [],
		};
	},
	methods: {
		getPosts() {
			axios
				.get("http://localhost:8000/api/posts")
				.then((res) => {
					console.log(res.data);
				})
				.catch((err) => {
					console.error(err);
				})
				.then(() => {
					console.log("chiamata riuscita");
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