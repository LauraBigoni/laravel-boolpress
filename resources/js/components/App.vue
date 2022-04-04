<template>
	<div class="container-fluid px-0">
		<Navbar />
		<div class="container">
			<div class="row">
				<div class="col-12 my-4">
					<div class="content">
						<PostsList />
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import Navbar from "./Navbar.vue";
import PostsList from "./posts/PostsList.vue";

export default {
	name: "App",
	components: { Navbar, PostsList },
	data() {
		return {
			title: "BOOLPRESS",
			description: "- Sito in costruzione -",
		};
	},
};
</script>

<style lang="scss" scoped>
</style>
