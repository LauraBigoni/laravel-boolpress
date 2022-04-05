<template>
	<section id="categories-detail">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Nome</th>
								<th scope="col">Colore</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">{{ category.id }}</th>
								<td>{{ category.label }}</td>
								<td>
									<span :class="`badge badge-pill badge-${category.color}`">
										{{ category.color }}
									</span>
								</td>
							</tr>
						</tbody>
					</table>
					<Loader v-if="isLoading" />
				</div>
				<div class="flex-center">
					<button v-if="category" class="btn btn-info" @click="$router.back()">
						Indietro
					</button>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
import Loader from "../Loader.vue";

export default {
	name: "CategoryDetailPage",
	data() {
		return {
			category: null,
			isLoading: false,
		};
	},
	components: { Loader },
	methods: {
		getCategory() {
			this.isLoading = true;
			axios
				.get("http://localhost:8000/api/categories/" + this.$route.params.label)
				.then((res) => {
					this.category = res.data;
				})
				.catch((err) => {
					this.error = true;
				})
				.then(() => {
					this.isLoading = false;
				});
		},
	},
	mounted() {
		this.getCategory();
	},
};
</script>

<style lang="scss" scoped>
</style>