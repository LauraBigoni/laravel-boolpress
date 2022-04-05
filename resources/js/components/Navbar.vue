<template>
	<nav class="navbar navbar-light bg-light px-0 d-flex flex-column text-center">
		<div class="col-12">
			<img src="images/boolpresslogo.png" alt="boolpress logo" />
		</div>
		<div
			class="
				col-12
				d-flex
				flex-row
				justify-content-start
				align-items-center
				mt-2
			"
		>
			<div class="router">
				<router-link to="/">HOME</router-link>
				<router-link class="mx-4" :to="{ name: 'contacts' }"
					>CONTACTS</router-link
				>
			</div>
			<div class="login ml-auto">
				<a href="/admin">LOGIN</a>
			</div>
		</div>
	</nav>
</template>

<script>
export default {
	name: "Navbar",
};
</script>

<style lang="scss" scoped>
img {
	width: 250px;
	height: auto;
}
a {
	text-decoration: none;
	color: #6cb2eb;
	border-bottom: 1px solid transparent;
}
a.active {
	color: #0e68b1;
	border-bottom: 1px solid currentColor;
}
</style>
