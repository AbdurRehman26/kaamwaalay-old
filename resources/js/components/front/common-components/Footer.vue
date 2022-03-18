<template>
	<div class="footer-section">
		<div class="section-padd">
			<div class="container">
				<div class="top-footer">
					<div class="row">

            <div class="col-md-4" v-if='userDetails.role_id!=2 || userDetails == ""'>
              <div class="footer-links">
                <ul>
                  <li><strong>Customers</strong></li>
                  <li><a href="/job-post">Post a job</a></li>
                  <li  v-if='userDetails == ""'><router-link :to="{name: 'sign-up' , params : { isPro : 'customer' }}">Sign up as a customers</router-link></li>
                  <li><a href="/explore">Explore Services</a></li>
                  <li><a href="javascript:void(0);" @click="onAdviceCenterClick('customer')" v-if='userDetails.role_id==3'>Advice center</a></li>
                  <li v-if='userDetails.role_id==3'><a href="javascript:void(0);" @click="showSupportPopup">Customer support</a></li>
                </ul>
              </div>
            </div>

            <div class="col-md-4">
							<div class="footer-logo">
								<a href="/">
									<img src="images/logo.png">
								</a>
							</div>
						</div>


            <div class="col-md-4" v-if='userDetails.role_id!=3 || userDetails == ""'>
							<div class="footer-links">
								<ul>
									<li><strong>House Helps</strong></li>
									<li v-if='userDetails == ""'><router-link :to="{name: 'sign-up' , params : { isPro : 'provider' }}">Sign up as a House Help</router-link></li>
									<li v-if='userDetails.role_id==2'><a href="javascript:;">Completed Jobs</a></li>
									<li><a href="javascript:void(0);" @click="onAdviceCenterClick('provider')" v-if='userDetails.role_id==2'>Advice center</a></li>
									<li v-if='userDetails.role_id==2'><a href="javascript:void(0);" @click="showSupportPopup">Service provider support</a></li>
								</ul>
							</div>
						</div>

					</div>
				</div>
				<div class="footer-copyrights">
					<div class="section-padding-sm clearfix">
						<div class="float-left">
							<p>Copyright &copy; 2018 Professional Service Marketplace, Inc. </p>
						</div>
						<div class="float-right terms-links">
							<ul>
								<li><router-link to="/terms-condition">Terms &amp; Conditions</router-link></li>
								<li><router-link to="/privacy-policy">Privacy Policy</router-link></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<customer-support-popup @HideModalValue="HideModal" :showModalProp="supportPopup"></customer-support-popup>

	</div>
</template>

<script type="text/javascript">
    export default {
    	computed : {
            userDetails(){
                return JSON.parse(this.$store.getters.getAuthUser);
            },

        },
    	mounted() {
    	},
        methods: {
            showSupportPopup() {
                this.supportPopup = true;
            },
            HideModal(){
                this.supportPopup = false;
            },
	    	onAdviceCenterClick(type) {
	    		if(type == 'customer') {
					this.$router.push({ name: 'Advice_Center', params: { type: 'customer' }});
	    		}else {
					this.$router.push({ name: 'Advice_Center', params: { type: 'service-provider' }});
	    		}
	    	}

        },

        data(){
            return{
                supportPopup: false,
            }
        }
    }
</script>
