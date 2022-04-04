<template>
	<div class="flex-center position-ref full-height">
		<img src="images/boolpressbg.png" alt="boolpress bg" />
	</div>
</template>

<script>
export default {
	name: "Header",
	props: ["title", "description"],
	data() {
		return {
			imgUrl: "https://i.postimg.cc/DyVv3SdY/boolpressbg.png",
		};
	},
};
</script>
