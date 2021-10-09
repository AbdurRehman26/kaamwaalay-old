<template>
	<div class="advice-topics">
		<div class="advice-tabs">
			<div role="tablist">
				<b-card no-body class="mb-3">
					<b-card-header header-tag="header" class="p-1" role="tab">
						<b-btn block href="#" v-b-toggle.accordion1 variant="grey"><p>How to sign up and use professional service marketplace?</p> <span class="switch-icon-caret"> <i class="icon-triangle-up"></i></span></b-btn>
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
						<b-btn block href="#" v-b-toggle.accordion2 variant="grey"><p>How to message service providers using professional service marketplace?</p> <span class="switch-icon-caret"> <i class="icon-triangle-up"></i></span></b-btn>
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
						<b-btn block href="#" v-b-toggle.accordion3 variant="grey"><p>How to download Professional service marketplace mobile app?</p> <span class="switch-icon-caret"> <i class="icon-triangle-up"></i></span></b-btn>
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
						<b-btn block href="#" v-b-toggle.accordion4 variant="grey"><p>How to post a new job?</p> <span class="switch-icon-caret"> <i class="icon-triangle-up"></i></span></b-btn>
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
						<b-btn block href="#" v-b-toggle.accordion5 variant="grey"><p>How to add photos to my job request?</p> <span class="switch-icon-caret"> <i class="icon-triangle-up"></i></span></b-btn>
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
						<b-btn block href="#" v-b-toggle.accordion6 variant="grey"><p>How to change my job details later on?</p> <span class="switch-icon-caret"> <i class="icon-triangle-up"></i></span></b-btn>
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
						<b-btn block href="#" v-b-toggle.accordion7 variant="grey"><p>How and where to view bids on my job?</p> <span class="switch-icon-caret"> <i class="icon-triangle-up"></i></span></b-btn>
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
						<b-btn block href="#" v-b-toggle.accordion8 variant="grey"><p>How to award a job to service provider?</p> <span class="switch-icon-caret"> <i class="icon-triangle-up"></i></span></b-btn>
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
						<b-btn block href="#" v-b-toggle.accordion9 variant="grey"><p>How to remove my job if I don’t need that work anymore?</p> <span class="switch-icon-caret"> <i class="icon-triangle-up"></i></span></b-btn>
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
						<b-btn block href="#" v-b-toggle.accordion10 variant="grey"><p>How to post urgent job requests?</p> <span class="switch-icon-caret"> <i class="icon-triangle-up"></i></span></b-btn>
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