<template>
	<div class="footer-section">
		<div class="section-padd">
			<div class="container">
				<div class="top-footer">
					<div class="row">
						<div class="col-md-3">
							<div class="footer-logo">
								<a href="/">
									<img src="images/logo.png">
								</a>
							</div>

							<div class="footer-location">
								<div class="form-group">
									<select class="form-control">
										<option>Select Option</option>
										<option>New York, NY</option>
										<option>California, CA</option>
									</select>
								</div>
							</div>

							<div class="social-icons">
								<ul>
									<li><a href="javascript:;"><i class="icon-facebook"></i></a></li>
									<li><a href="javascript:;"><i class="icon-twitter"></i></a></li>
									<li><a href="javascript:;"><i class="icon-instagram"></i></a></li>
									<li><a href="javascript:;"><i class="icon-google-plus"></i></a></li>
									<li><a href="javascript:;"><i class="icon-pinterest"></i></a></li>
								</ul>
							</div>


						</div>
						<div class="col-md-3">
							<div class="footer-links">
								<ul>
									<li><strong>Customers</strong></li>
									<li><a href="/job-post">Post a job</a></li>
									<li><a href="/sign-up">Sign up as a customer</a></li>
									<li><a href="/explore">Explore Services</a></li>
									<li><a href="/advice-center">Advice center</a></li>
									<li><a href="javascript:;" @click="CustomerSupportPopup()">Customer support</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3">
							<div class="footer-links">
								<ul>
									<li><strong>Service Providers</strong></li>
									<li><router-link to="/sign-up">Sign up as a service provider</router-link></li>
									<li><a href="javascript:;">Completed Jobs</a></li>
									<li><router-link to="/advice-center">Advice center</router-link></li>
									<li><a href="javascript:;" @click="CustomerSupportPopup()">Service provider support</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3">
							<div class="footer-links">
								<ul>
									<li><strong>Company</strong></li>
									<li><a href="javascript:;">About us</a></li>
									<li><a href="javascript:;">Blog</a></li>
									<li><a href="javascript:;"></a></li>
									<li><strong>Download</strong></li>

									<li  class="app-images">
										<ul>
											<li>
												<a href="javascript:;">
												<img src="images/front/common-images/app-store.jpg">
												</a>
											</li>
											<li>
												<a href="javascript:;">
													<img src="images/front/common-images/google-play.jpg">
												</a>
											</li>
										</ul>
									</li>
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
								<li><a href="/terms-condition">Terms &amp; Conditions</a></li>
								<li><a href="/privacy-policy">Privacy Policy</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<customer-support-popup @HideModalValue="HideModal" :showModalProp="customersupport"></customer-support-popup>

	</div>
</template>

<script type="text/javascript">
    export default {
        methods: {
            CustomerSupportPopup() {
                this.customersupport = true;
            },
            HideModal(){
                this.customersupport = false;
            },

        },
        
        data(){
            return{
                customersupport: false,
            }
        }
    }
</script>