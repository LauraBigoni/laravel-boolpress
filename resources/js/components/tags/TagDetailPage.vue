<template>
	<section id="tags-list">
		<div class="container">
			<div class="row justify-content-center">
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
							<tr>
								<th scope="row">{{ tag.id }}</th>
								<td>{{ tag.label }}
								</td>
								<td>
									<span
										class="badge badge-pill"
										:style="`background-color: ${tag.color}`"
									>
										{{ tag.color }}
									</span>
								</td>
							</tr>
						</tbody>
					</table>
					<Loader v-if="isLoading" />
				</div>
			</div>
			<div class="flex-center">
				<button v-if="tag" class="btn btn-info" @click="$router.back()">
					Indietro
				</button>
			</div>
		</div>
	</section>
</template>

<script>
import Loader from "../Loader.vue";

export default {
	name: "TagDetailPage",
	data() {
		return {
			tag: null,
			isLoading: false,
		};
	},
	components: { Loader },
	methods: {
		getTag() {
			this.isLoading = true;
			axios
				.get("http://localhost:8000/api/tags/" + this.$route.params.label)
				.then((res) => {
					this.tag = res.data;
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
		this.getTag();
	},
};
</script>

<style lang="scss" scoped>
</style>