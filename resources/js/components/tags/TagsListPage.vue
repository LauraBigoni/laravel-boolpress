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
							<tr v-for="tag in tags" :key="tag.id">
								<th scope="row">{{ tag.id }}</th>
								<td>
									<router-link
										:to="{
											name: 'tag-detail',
											params: { label: tag.label },
										}"
										>{{ tag.label }}</router-link
									>
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
				<button v-if="tags" class="btn btn-info" @click="$router.back()">
					Indietro
				</button>
			</div>
		</div>
	</section>
</template>

<script>
import Loader from "../Loader.vue";

export default {
	name: "TagsList",
	data() {
		return {
			tags: [],
			isLoading: false,
		};
	},
	components: { Loader },
	methods: {
		getTags() {
			this.isLoading = true;
			axios
				.get("http://localhost:8000/api/tags")
				.then((res) => {
					this.tags = res.data;
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
		this.getTags();
	},
};
</script>

<style lang="scss" scoped>
</style>