<template>
	<section id="contacts" class="col-8 mx-auto">
		<div class="container py-5 my-4">
			<h2 class="h1-responsive font-weight-bold text-center my-4">
				Contact us
			</h2>
			<p class="text-center w-responsive mx-auto mb-5">
				Hai qualche domanda? Non esitare a contattarci direttamente. Il nostro
				team ti risponderà in poche ore per aiutarti.
			</p>
			<div class="row">
				<div class="col-md-9 mb-md-0 mb-5">
					<form id="contact-form" name="contact-form" action="" method="POST">
						<div class="row">
							<div class="col-md-6">
								<div class="md-form mb-0">
									<input
										type="text"
										id="name"
										name="name"
										class="form-control bg-transparent border-info"
									/>
									<label for="name" class="">Il tuo nome</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="md-form mb-0">
									<input
										type="text"
										id="email"
										name="email"
										class="form-control bg-transparent border-info"
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
										name="subject"
										class="form-control bg-transparent border-info"
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
										name="message"
										rows="4"
										class="form-control bg-transparent border-info md-textarea"
									></textarea>
									<label for="message">Il tuo messaggio</label>
								</div>
							</div>
						</div>
					</form>

					<div class="text-center text-md-left">
						<a class="btn btn-primary">Invia</a>
					</div>
					<div class="status"></div>
				</div>
				<div class="col-md-3 text-center">
					<ul class="list-unstyled mb-0">
						<li>
							<i class="fas fa-map-marker-alt fa-2x"></i>
							<p>Anghiari, AR 52031, ITALY</p>
						</li>

						<li>
							<i class="fas fa-phone mt-4 fa-2x"></i>
							<p>0545 782345</p>
						</li>

						<li>
							<i class="fas fa-envelope mt-4 fa-2x"></i>
							<p>contact@boolpress.com</p>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
export default {
	name: "ContactPage",
};
</script>

<style lang="scss" scoped>
#contacts {
	background-color: #fff;
	border-radius: 20px;
}
</style>