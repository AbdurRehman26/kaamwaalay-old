<template>
	<div class="advice-topics">
		<div class="advice-tabs">
			<div role="tablist">
				<b-card no-body class="mb-3">
					<b-card-header header-tag="header" class="p-1" role="tab">
						<b-btn block href="#" v-b-toggle.accordion1 variant="grey">How to sign up and use professional service marketplace? <span class="switch-icon-caret"> <i class="icon-triangle-up"></i></span></b-btn>
					</b-card-header>
					<b-collapse id="accordion1" visible accordion="my-accordion" role="tabpanel">
						<b-card-body>
							<p class="card-text">
								{{ message }}
							</p>
						</b-card-body>
					</b-collapse>
				</b-card>
				<b-card no-body class="mb-3">
					<b-card-header header-tag="header" class="p-1" role="tab">
						<b-btn block href="#" v-b-toggle.accordion2 variant="grey">How to message service providers using professional service marketplace? <span class="switch-icon-caret"> <i class="icon-triangle-up"></i></span></b-btn>
					</b-card-header>
					<b-collapse id="accordion2" accordion="my-accordion" role="tabpanel">
						<b-card-body>
							<p class="card-text">
								{{ message }}
							</p>
						</b-card-body>
					</b-collapse>
				</b-card>
				<b-card no-body class="mb-3">
					<b-card-header header-tag="header" class="p-1" role="tab">
						<b-btn block href="#" v-b-toggle.accordion3 variant="grey">How to download Professional service marketplace mobile app? <span class="switch-icon-caret"> <i class="icon-triangle-up"></i></span></b-btn>
					</b-card-header>
					<b-collapse id="accordion3" accordion="my-accordion" role="tabpanel">
						<b-card-body>
							<p class="card-text">
								{{ message }}
							</p>
						</b-card-body>
					</b-collapse>
				</b-card>
				<b-card no-body class="mb-3">
					<b-card-header header-tag="header" class="p-1" role="tab">
						<b-btn block href="#" v-b-toggle.accordion4 variant="grey">How to post a new job? <span class="switch-icon-caret"> <i class="icon-triangle-up"></i></span></b-btn>
					</b-card-header>
					<b-collapse id="accordion4" accordion="my-accordion" role="tabpanel">
						<b-card-body>
							<p class="card-text">
								{{ message }}
							</p>
						</b-card-body>
					</b-collapse>
				</b-card>
				
				<b-card no-body class="mb-3">
					<b-card-header header-tag="header" class="p-1" role="tab">
						<b-btn block href="#" v-b-toggle.accordion5 variant="grey">How to add photos to my job request? <span class="switch-icon-caret"> <i class="icon-triangle-up"></i></span></b-btn>
					</b-card-header>
					<b-collapse id="accordion5" accordion="my-accordion" role="tabpanel">
						<b-card-body>
							<p class="card-text">
								{{ message }}
							</p>
						</b-card-body>
					</b-collapse>
				</b-card>

				<b-card no-body class="mb-3">
					<b-card-header header-tag="header" class="p-1" role="tab">
						<b-btn block href="#" v-b-toggle.accordion6 variant="grey">How to change my job details later on? <span class="switch-icon-caret"> <i class="icon-triangle-up"></i></span></b-btn>
					</b-card-header>
					<b-collapse id="accordion6" accordion="my-accordion" role="tabpanel">
						<b-card-body>
							<p class="card-text">
								{{ message }}
							</p>
						</b-card-body>
					</b-collapse>
				</b-card>

				<b-card no-body class="mb-3">
					<b-card-header header-tag="header" class="p-1" role="tab">
						<b-btn block href="#" v-b-toggle.accordion7 variant="grey">How and where to view bids on my job? <span class="switch-icon-caret"> <i class="icon-triangle-up"></i></span></b-btn>
					</b-card-header>
					<b-collapse id="accordion7" accordion="my-accordion" role="tabpanel">
						<b-card-body>
							<p class="card-text">
								{{ message }}
							</p>
						</b-card-body>
					</b-collapse>
				</b-card>

				<b-card no-body class="mb-3">
					<b-card-header header-tag="header" class="p-1" role="tab">
						<b-btn block href="#" v-b-toggle.accordion8 variant="grey">How to award a job to service provider? <span class="switch-icon-caret"> <i class="icon-triangle-up"></i></span></b-btn>
					</b-card-header>
					<b-collapse id="accordion8" accordion="my-accordion" role="tabpanel">
						<b-card-body>
							<p class="card-text">
								{{ message }}
							</p>
						</b-card-body>
					</b-collapse>
				</b-card>

				<b-card no-body class="mb-3">
					<b-card-header header-tag="header" class="p-1" role="tab">
						<b-btn block href="#" v-b-toggle.accordion9 variant="grey">How to remove my job if I don’t need that work anymore? <span class="switch-icon-caret"> <i class="icon-triangle-up"></i></span></b-btn>
					</b-card-header>
					<b-collapse id="accordion9" accordion="my-accordion" role="tabpanel">
						<b-card-body>
							<p class="card-text">
								{{ message }}
							</p>
						</b-card-body>
					</b-collapse>
				</b-card>

				<b-card no-body class="mb-3">
					<b-card-header header-tag="header" class="p-1" role="tab">
						<b-btn block href="#" v-b-toggle.accordion10 variant="grey">How to post urgent job requests? <span class="switch-icon-caret"> <i class="icon-triangle-up"></i></span></b-btn>
					</b-card-header>
					<b-collapse id="accordion10" accordion="my-accordion" role="tabpanel">
						<b-card-body>
							<p class="card-text">
								{{ message }}
							</p>
						</b-card-body>
					</b-collapse>
				</b-card>

			</div>
		</div>
	</div>

</template>
<script>
export default {
	data() {
		return {
			advice_center: 'customer',
			bannerimage: '/images/front/explore/banner-bg/banner.jpg',
			
			text1:"After posting your job, you'll receive bids from professionals ready to help. You can initiate chat with professionals to discuss further. We’ll let you know with text or email notifications whenever a service provider sends you a new message.",
			text2:" When you receive an email notification about a new message or bid from a service provider, click the Reply button in the body of the email (instead of replying in your email inbox)",
			message: "",

		}
	},
	mounted (){
		this.message = this.text1 + '\n' + this.text2;
	}
}
</script>