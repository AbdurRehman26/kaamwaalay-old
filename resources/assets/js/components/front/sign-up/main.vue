<template>
	<div class="section padding-sm sign-up-info wrapper-sm">
		<h1>Sign Up</h1>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-sm-6">
				<div class="custom-radio boxed m-b-30">
						<input  v-model="type" value="customer" type="radio" name="accountType" id="type_hire_provider">
						<label for="type_hire_provider">
							<div class="verticle-align">
								<div class="inner">
									I want to hire a service provider
									<span>Get introduced to the right professional for your jobs</span>
									<i class="icon-checkmark2"></i>
								</div>
							</div>
						</label>
					</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-sm-6">
				<div class="custom-radio boxed">
						<input  v-model="type" value="provider" type="radio" name="accountType" id="type_service_provider" >
						<label for="type_service_provider">
							<div class="verticle-align">
								<div class="inner">
									I want to grow my business
									<span>Respond to customer requests and get hired</span>
									<i class="icon-checkmark2"></i>
								</div>
							</div>
						</label>
					</div>
			</div>
		</div>
		<!-- Tab panes -->
		<div class="tab-content">
			<div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
				<div class="sign-up-form service-provider-form">
					<div class="fb-btn">
						<div class="row">
							<div class="col-md-12">
								<a href="javascript:;" class="btn btn-facebook">
									<span class="icon-facebook-official"></span>Sign up with Facebook</a>
							</div>
						</div>
					</div>
			<div class="form-signup">
				<div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">First Name</label>
									<input type="text" class="form-control" placeholder="Enter your first name">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Last Name</label>
									<input type="text" class="form-control" placeholder="Enter your last name">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Email Address</label>
									<input type="text" class="form-control" placeholder="Enter your first email address">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Password</label>
									<input type="password" class="form-control" placeholder="Enter your account password">
							</div>
						</div>
					</div>

					<div class="create-account-btn">
						<button  class="btn btn-primary account-type-btn" @click='switchType(type)' > Create Account
							<loader></loader>
						</button>
					</div>

					<div class="form-detail">
						<p>By clicking Create Account or Sign Up with Facebook you agree to the <a href="javascript:;">Terms of Use</a> and <a href="javascript">Privacy Policy</a>.</p>
					</div>
				</div>
			</div>

		</div>
		<div class="already-signup">
				<p>Already a member? <a href="javascript:;">Log in</a></p>
			</div>
			</div>

		</div>


	</div>
</template>

<script>
export default {
  data () {
  	remind: null;
    return {
    	tabval: 'firstsec',
    	type:'customer',
    	mainNav:'true',
    	}
  	},
	methods: {
		 switchType: function(type) {
		    var result = [];
		    if ((this.type) === 'customer') {
		     		this.$router.push('profile');

		    }
		    if ((this.type) === 'provider') {
		     		this.$router.push('apply-for-review');
		    }
		    return result;
		},
	}
  }
</script>
