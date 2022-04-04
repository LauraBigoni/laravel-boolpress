<template>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="content">
					<div class="title m-b-md">
						<Header />
					</div>
					<div class="links">
						<!-- <a href="#">Blog</a>
                    <a href="#">Contacts</a> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import Header from "./Header.vue";

export default {
	name: "App",
	components: { Header },
	data() {
		return {
			title: "BOOLPRESS",
			description: "- Sito in costruzione -",
		};
	},
};
</script>
