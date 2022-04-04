<template>
	<nav class="navbar navbar-light bg-light px-0 d-flex flex-column text-center">
		<div class="col-12">
			<img src="images/boolpresslogo.png" alt="boolpress logo" />
		</div>
		<div
			class="col-12 d-flex flex-row justify-content-center align-items-center"
		>
			<a class="nav-link active" href="#">HOME</a>
			<a class="nav-link" href="#">POSTS</a>
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
a:hover {
	color: #4ba0e6;
	border-bottom: 1px solid currentColor;
}
</style>
