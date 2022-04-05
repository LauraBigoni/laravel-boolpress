<template>
	<div class="container-fluid px-0">
		<Navbar />
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 my-4">
					<div class="content">
						<router-view></router-view>
					</div>
				</div>
			</div>
		</div>
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
