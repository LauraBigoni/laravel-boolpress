<template>
	<div class="container-fluid">
		<PostsList />
	</div>
</template>

<script>
import PostsList from "../posts/PostsList.vue";

export default {
	name: "Homepage",
	components: { PostsList },
};
</script>

<style lang="scss" scoped>
</style>