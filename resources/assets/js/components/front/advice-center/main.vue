<template>
	<div class="advice-center">
		<div class="content-area">
	        <div class="main-banner elementary-banner explore-banner">
	            <div class="main-img">
	                <img  :src="bannerimage">
	            </div>
	            <div class="content">
	                <div class="verticle-align">
	                    <div class="inner">
	                        <div class="container element-index">
	                            <div class="advice-text text-center">
	                                <h1 class="heading-large">Advice Centre</h1>   
	                                <p>Wondering about Professional Service Marketplace? In this section we explain more of who we are, how we work, and how PSM helps you.</p>
	                            </div>
	                        </div>
	                        <div class="element-column-image">
	                           	<img :src="contentimage">
	                        </div>
					        <span class="splash-design md d-1 top-left"></span>
					        <span class="splash-design d-4 bottom-right lg"></span>
					        <span class="splash-design d-6 bottom-left sm"></span>
	                    </div>
	                </div>
	            </div>
	        </div>
    	</div>

    	<div class="advice-topics">
    		<p><strong>Browse topics for:</strong></p>
    		<div class="advice-tabs">

    			<b-tabs>
					<b-tab title="CUSTOMERS" @click="advice_center = 'customer'" :class="{ active: advice_center === 'customer' }">
					</b-tab>

					<b-tab title="SERVICE PROVIDER" @click="advice_center = 'service-provider'" :class="{ active: advice_center === 'service-provider' }">
					</b-tab>
				</b-tabs>
				
    		</div>
    	</div>

    	<customer v-show="advice_center == 'customer'"></customer>
    	<service-provider v-show="advice_center == 'service-provider'"></service-provider>

    	<div class="content-area">
	        <div class="main-banner elementary-banner explore-banner">
	            <div class="main-img">
	                <img  :src="bannerimage">
	            </div>
	            <div class="content">
	                <div class="verticle-align">
	                    <div class="inner">
	                        <div class="container element-index">
	                            <div class="need-help-text text-center">
	                                <h1 class="heading-large">Need more help?</h1>   
	                                <p>Have an idea or suggestion to improve Professional Service Marketplace? Let us know. </p>
	                                <a href="javascript:;" class="btn btn-primary" @click="SupportReviewPopup">Contact Us</a>	
	                            </div>
	                        </div>
	                        <div class="element-column-image">
	                           	<img :src="contentimage">
	                        </div>
					        <span class="splash-design md d-1 top-left"></span>
					        <span class="splash-design d-4 bottom-right lg"></span>
					        <span class="splash-design d-6 bottom-left sm"></span>
	                    </div>
	                </div>
	            </div>
	        </div>
    	</div>
    	<customer-support-popup @HideModalValue="HideModal" :showModalProp="SupportReview"></customer-support-popup>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				advice_center: 'customer',
				bannerimage: '/images/front/explore/banner-bg/banner.jpg',
				SupportReview: false,
				
				text1:"After posting your job, you'll receive bids from professionals ready to help. You can initiate chat with professionals to discuss further. We’ll let you know with text or email notifications whenever a service provider sends you a new message.",
				text2:" When you receive an email notification about a new message or bid from a service provider, click the Reply button in the body of the email (instead of replying in your email inbox)",
				message: "",

			}
		},
		mounted (){
			this.message = this.text1 + '\n' + this.text2;
		},
		methods: {
			SupportReviewPopup() {
				this.SupportReview = true;
			},
	        HideModal(){
		        this.SupportReview = false;
		    },
		}
	}
</script>