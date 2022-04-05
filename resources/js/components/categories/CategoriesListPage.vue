<template>
	<section id="categories-list">
		<div class="container">
			<div class="row justify-content-center" >
				<div class="col-8">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Nome</th>
								<th scope="col">Colore</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="category in categories" :key="category.id">
								<th scope="row">{{ category.id }}</th>
								<td>{{ category.label }}</td>
								<td>
									<router-link
										:to="{
											name: 'category-detail',
											params: { label: category.label },
										}"
									>
										<span :class="`badge badge-pill badge-${category.color}`">
											{{ category.color }}
										</span></router-link
									>
								</td>
							</tr>
						</tbody>
					</table>
					<Loader v-if="isLoading" />
				</div>
			</div>
			<div class="flex-center">
				<button v-if="categories" class="btn btn-info" @click="$router.back()">
					Indietro
				</button>
			</div>
		</div>
	</section>
</template>

<script>
import Loader from "../Loader.vue";

export default {
	name: "CategoriesList",
	data() {
		return {
			categories: [],
			isLoading: false,
		};
	},
	components: { Loader },
	methods: {
		getCategories() {
			this.isLoading = true;
			axios
				.get("http://localhost:8000/api/categories")
				.then((res) => {
					this.categories = res.data;
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
		this.getCategories();
	},
};
</script>

<style lang="scss" scoped>
</style>