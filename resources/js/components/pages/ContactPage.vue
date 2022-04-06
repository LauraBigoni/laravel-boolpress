<template>
	<section id="contacts" class="col-9 mx-auto">
		<div class="container py-5 my-4">
			<Loader v-if="isLoading" />
			<div
				class="alert d-flex justify-content-between align-items-center"
				:class="`alert-${type}`"
				role="alert"
				v-if="alert"
			>
				<span>{{ alertMessage }}</span>
				<span @click="alert = !alert" class="h2 mb-0" role="button"
					>&times;</span
				>
			</div>
			<h2 class="h1-responsive font-weight-bold text-center my-4">
				Contact us
			</h2>
			<p class="text-center w-responsive mx-auto mb-5">
				Hai qualche domanda? Non esitare a contattarci direttamente. Il nostro
				team ti risponderà in poche ore per aiutarti.
			</p>
			<div class="row">
				<div class="col-md-9 mb-md-0 mb-5">
					<form id="contact-form">
						<div class="row">
							<div class="col-md-6">
								<div class="md-form mb-0">
									<input
										type="text"
										id="name"
										v-model="form.name"
										class="form-control border-info"
									/>
									<label for="name" class="">Il tuo nome</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="md-form mb-0">
									<input
										type="text"
										id="email"
										v-model="form.email"
										class="form-control border-info"
									/>
									<label for="email" class="">La tua email</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="md-form mb-0">
									<input
										type="text"
										id="subject"
										v-model="form.subject"
										class="form-control border-info"
									/>
									<label for="subject" class="">Oggetto</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="md-form">
									<textarea
										type="text"
										id="message"
										v-model="form.message"
										rows="4"
										class="form-control border-info md-textarea"
									></textarea>
									<label for="message">Il tuo messaggio</label>
								</div>
							</div>
						</div>
					</form>

					<div class="text-center text-md-left">
						<button class="btn btn-primary" @click="sendForm">Invia</button>
					</div>
					<div class="status"></div>
				</div>
				<div class="col-md-3 text-center">
					<ul class="list-unstyled mb-0">
						<li>
							<i class="fas fa-map-marker-alt fa-2x" role="button"></i>
							<p>Anghiari, AR 52031, ITALY</p>
						</li>
						<li>
							<i class="fas fa-phone mt-4 fa-2x" role="button"></i>
							<p>0545 782345</p>
						</li>
						<li>
							<i class="fas fa-envelope mt-4 fa-2x" role="button"></i>
							<p>contact@boolpress.com</p>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
import Loader from "../Loader.vue";
export default {
	name: "ContactPage",
	data() {
		return {
			form: {
				name: "",
				email: "",
				subject: "",
				message: "",
			},
			type: "success",
			alert: false,
			isLoading: false,
			alertMessage: "",
		};
	},
	components: { Loader },
	methods: {
		sendForm() {
			// * Controllo di raccogliere i dati correttamente
			// console.log(this.form);

			// * Creo una variabile per recuperare i params
			// Posso usare anche lo spread
			const params = {
				...this.form,
			};

			// Metto a true is loading
			this.isLoading = true;

			// * Chiamo axios in POST per mandare i dati e gli passo params
			// Primo parametro chiamata api
			// Secondo parametro il form inserito in una costante ma
			// potrei passare direttamente this.form perchè i campi COINCIDONO
			axios
				.post("http://localhost:8000/api/messages", params)
				.then((res) => {
					this.form.name = "";
					this.form.email = "";
					this.form.subject = "";
					this.form.message = "";
					this.alertMessage = "Messaggio inviato con successo.";
				})
				.catch((err) => {
					// console.error(err);

					this.type = "danger";
					this.alertMessage = "Messaggio non inviato. Controlla i campi.";
				})
				.then(() => {
					this.alert = true;
					this.isLoading = false;
				});
		},
	},
};
</script>

<style lang="scss" scoped>
#contacts {
	background-color: #fff;
	border-radius: 20px;
}
</style>