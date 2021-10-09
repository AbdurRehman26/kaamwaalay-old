<template>
	<div class="content-area">
		<!-- banner section start-->
		<div class="main-banner elementary-banner explore-banner">
			<div class="main-img"><img  :src="bannerimage"></div>
			<div class="content">
				<div class="verticle-align">
					<div class="inner">
						<div class="container">
							<div class="banner-slogan content-inner">
								<h1>Your next job is just around the corner</h1>
								<p>There’s plenty of local work but finding it is easier said than done. On Professional Service Marketplace, you set a custom working area so every lead you receive is exactly where you want to work.</p>
								<a @click="onSignup" href="javascript:void(0);" class="btn btn-primary">Sign up today</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- banner section end -->

		<!-- Local Work section start-->
		<div class="section services section-local-work two-column">
			<div class="container">
				<div class="section-title">
					<h2>Win more local work</h2>
					<p>If you join as a member, here are a selection of the ways we help to give your business a boost:</p>
				</div>
				<div class="services-list">
					<ul>
						<li>
							<div class="list-image">
								<div class="list-icon"><img src="/images/front/svg/user.svg"></div>
							</div>
							<div class="list-description">
								<h4>Business Profile</h4>
								<p>Show comprehensive company details including consumer recommendations.</p>
							</div>
						</li>
						<li>
							<div class="list-image">
								<div class="list-icon"><img src="/images/front/svg/discount.svg"></div>
							</div>
							<div class="list-description">
								<h4>No Commissions</h4>
								<p>We won't charge any fee or payment from service providers for successful leads.</p>
							</div>
						</li>
						<li>
							<div class="list-image">
								<div class="list-icon"><img src="/images/front/svg/smartphone.svg"></div>
							</div>
							<div class="list-description">
								<h4>Pick the jobs you want</h4>
								<p>We’ll send you new leads and jobs right on your mobile phones via push notifications or email.</p>
							</div>
						</li>
						<li>
							<div class="list-image">
								<div class="list-icon"><img src="/images/front/svg/chat.svg"></div>
							</div>
							<div class="list-description">
								<h4>Chat with customers</h4>
								<p>Once customer respond to your bid, you can discuss details with customers via one-on-one chat.</p>
							</div>
						</li>
						<li>
							<div class="list-image">
								<div class="list-icon"><img src="/images/front/svg/card.svg"></div>
							</div>
							<div class="list-description">
								<h4>No credit/debit card required</h4>
								<p>You don’t have to enter your credit/debit card. You can charge customer in any of your existing payment method.</p>
							</div>
						</li>
						<li>
							<div class="list-image">
								<div class="list-icon"><img src="/images/front/svg/like.svg"></div>
							</div>
							<div class="list-description">
								<h4>No fake service providers</h4>
								<p>You don’t have to compete with any fake service provider. We approve service providers on platform after review.</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- Local Work section start-->

		<!-- How it Work section start-->
		<div class="section section-grey how-it-work elementary-banner">
			<div class="container element-index">
				<div class="section-title">
					<h2>How it works</h2>
				</div>
					<div class="how-it-work-list">
						<b-row>
							<b-col sm="4" class="text-center small-ico">
								<div class="list-image">
									<div class="list-icon"><img src="/images/front/svg/find.svg"></div>
								</div>
								<div class="list-description">
									<h4>Pick Leads</h4>
									<p>Pick those which are of interest to you. Signal your interest through the site.</p>
								</div>
							</b-col>
							<b-col sm="4" class="text-center small-ico">
								<div class="list-image">
									<div class="list-icon"><img src="/images/front/svg/list.svg"></div>
								</div>
								<div class="list-description">
									<h4>Get Shortlisted</h4>
									<p>Customers review your profiles online & shortlist you to bid on the job.</p>
								</div>
							</b-col>
							<b-col sm="4" class="text-center small-ico">
								<div class="list-image">
									<div class="list-icon"><img src="/images/front/svg/communicate.svg"></div>
								</div>
								<div class="list-description">
									<h4>Chat & Arrange Quotes</h4>
									<p>Chat with customer to discuss the job or arrange a visit as your normally would.</p>
								</div>
							</b-col>
						</b-row>
					</div>
				</div>
			<div class="elements">
				<img class="top-right" src="/images/front/banner-bg/bg-1.png">				
				<img class="bottom-left" src="/images/front/banner-bg/bg-3.png">
				<img class="bottom-right" src="/images/front/banner-bg/bg-2.png">
			</div>				

		</div>
		<!-- How it Work section end-->

		<!-- Ready To Meet section start-->
		<div class="ready-to-meet white-bg section-padd">
			<div class="container">
				<div class="two-column">
					<div class="content-sec">
						<h2>Ready to meet your next favorite customer? Whether you’re a new business or just new to PSM, we’re excited to help you grow.</h2>
						<p>Ready to meet your next favorite customer? Whether you’re a new business or just new to PSM, we’re excited to help you grow.</p>
						<div class="avability-app">
							<a href="https://itunes.apple.com/us/genre/ios/id36?mt=8" class="apple-store-btn"><img src="/images/front/common-images/app-store.jpg"></a>
							<a href="https://play.google.com/store?hl=en" class="google-store-btn"><img src="/images/front/common-images/google-play.jpg"></a>
						</div>
					</div>
					<div class="image-sec">
						<img src="/images/front/join-as-pro/customer.jpg">
					</div>
				</div>
			</div>
		</div>
		<!-- Ready To Meet section end-->

		<!-- Sucess Stories section start-->
		<div class="next-project section-padd grey-bg" v-show="isSuccessStory">
			<div class="container">
					<div class="section-title">
						<h2>Success Stories</h2>
						<p>Professional service marketplace has helped thousands of service providers around US.</p>
					</div>
<<<<<<< HEAD
					<testmonial-sec @onExist="onSuccessStoryExist" :byRole="2"></testmonial-sec>
=======
					<testmonial-sec @onExist="onSuccessStoryExist" :roleId="2"></testmonial-sec>
>>>>>>> e2804d2c245bfe636f4bb019c38f9936a8b7ae6c
			</div>	
		</div>
		<!-- Sucess Stories section end-->	

		<!-- Next Project section start-->
			<getstarted @onSignup="onSignup"></getstarted>
		<!-- Next Project section end-->

	</div>
</template>

<script>
export default {
  data () {
    return {
    		bannerimage: '/images/front/join-as-pro/banner.jpg',
    		isSuccessStory: false,
    	}
  	},
    methods: {
    	onSuccessStoryExist(val) {
    		this.isSuccessStory = val;
    	},
    	onSignup() {
			this.$router.push({ name: 'sign-up', params: { isPro: 'provider' }});
    	}
    }
}
</script>
