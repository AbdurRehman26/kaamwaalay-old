<template>
	<div class="content-area">
		<!-- banner section start-->
		<div class="main-banner" v-bind:style="{'background-image': 'url(' + bannerimage + ')',}">
			<div class="container">
				<div class="banner-slogan">
					<h2>Your next job is just around the corner</h2>
					<p>There’s plenty of local work but finding it is easier said than done. On Professional Service Marketplace, you set a custom working area so every lead you receive is exactly where you want to work.</p>
					<a href="javascript:void(0);" class="btn btn-primary">Sign up today</a>
				</div>
			</div>
		</div>
		<!-- banner section end -->

		<!-- Local Work section start-->

		<div class="services two-column">
			<div class="container">
				<div class="services-head-section">
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
								<h3>Business Profile</h3>
								<p>Show comprehensive company details including consumer recommendations.</p>
							</div>
						</li>
						<li>
							<div class="list-image">
								<div class="list-icon"><img src="/images/front/svg/discount.svg"></div>
							</div>
							<div class="list-description">
								<h3>No Commissions</h3>
								<p>We won't charge any fee or payment from service providers for successful leads.</p>
							</div>
						</li>
						<li>
							<div class="list-image">
								<div class="list-icon"><img src="/images/front/svg/smartphone.svg"></div>
							</div>
							<div class="list-description">
								<h3>Pick the jobs you want</h3>
								<p>We’ll send you new leads and jobs right on your mobile phones via push notifications or email.</p>
							</div>
						</li>
						<li>
							<div class="list-image">
								<div class="list-icon"><img src="/images/front/svg/chat.svg"></div>
							</div>
							<div class="list-description">
								<h3>Chat with customers</h3>
								<p>Once customer respond to your bid, you can discuss details with customers via one-on-one chat.</p>
							</div>
						</li>
						<li>
							<div class="list-image">
								<div class="list-icon"><img src="/images/front/svg/card.svg"></div>
							</div>
							<div class="list-description">
								<h3>No credit/debit card required</h3>
								<p>You don’t have to enter your credit/debit card. You can charge customer in any of your existing payment method.</p>
							</div>
						</li>	
						<li>
							<div class="list-image">
								<div class="list-icon"><img src="/images/front/svg/like.svg"></div>
							</div>
							<div class="list-description">
								<h3>No fake service providers</h3>
								<p>You don’t have to compete with any fake service provider. We approve service providers on platform after review.</p>
							</div>
						</li>																														
					</ul>
				</div>
			</div>
		</div>

		<!-- Local Work section start-->


	</div>
</template>

<script>
export default {
  data () {
    return {
    	bannerimage: '/images/front/join-as-pro/banner.jpg',
    	}
  	},
    methods: {

    }
}
</script>