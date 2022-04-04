<template>
	<nav class="d-flex justify-content-center mt-4">
		<ul class="pagination">
			<li
				class="page-item page-link"
				role="button"
				v-if="pagination.currentPage > 1"
			>
				Prev
			</li>
			<li
				class="page-item page-link"
				role="button"
				v-if="pagination.lastPage > pagination.currentPage"
			>
				Next
			</li>
		</ul>
	</nav>
</template>

<script>
export default {
	name: "Pagination",
	props: ["pagination"],
};
</script>

<style>
</style>