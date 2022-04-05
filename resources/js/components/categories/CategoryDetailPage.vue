<template>
	<section id="categories-detail">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12">
					<table class="table" v-if="category">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Nome</th>
								<th scope="col">Colore</th>
								<th scope="col">Modificato il</th>
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
								<td>{{ formatDateTime }}</td>
							</tr>
						</tbody>
					</table>
					<Loader v-else />
				</div>
			</div>
			<div class="flex-center">
				<button v-if="category" class="btn btn-info" @click="$router.back()">
					Indietro
				</button>
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
	computed: {
		formatDateTime() {
			const postDate = new Date(this.category.updated_at);
			const date =
				postDate.getDate() +
				"/" +
				(postDate.getMonth() + 1) +
				"/" +
				postDate.getFullYear();
			const time =
				postDate.getHours() +
				":" +
				postDate.getMinutes() +
				":" +
				postDate.getSeconds();
			const dateTime = date + " " + time;

			return dateTime;
		},
	},
	mounted() {
		this.getCategory();
	},
};
</script>

<style lang="scss" scoped>
</style>