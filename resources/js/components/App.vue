<template>
	<div class="container-fluid px-0">
		<Navbar />
		<main class="col-12 my-4 content">
			<router-view></router-view>
		</main>
	</div>
</template>

<script>
import Navbar from "./Navbar.vue";

export default {
	name: "App",
	components: { Navbar },
	data() {
		return {};
	},
};
</script>

<style lang="scss" scoped>
</style>
