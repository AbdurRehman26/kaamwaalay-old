<template>
	<div class="sign-up-info">

		<h1>Sign Up</h1>

		<!-- Nav tabs -->
		<ul class="nav nav-tabs" id="myTab" role="tablist">

			<li class="nav-item" :class="{ active: tabval === 'firstsec' }">
				<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"  @click="tabval = 'firstsec'">I want to hire a service provider
					<p>Get introduced to the right professional for your jobs</p>
					<i v-if="tabval == 'firstsec'" class="icon-checkmark2"></i>
				</a>
			</li>

			<li class="nav-item" :class="{ active: tabval === 'secondsec' }">
				<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"  @click="tabval = 'secondsec'">I want to grow my business
					<p>Respond to customer requests and get hired</p>
					<i v-if="tabval == 'secondsec'" class="icon-checkmark2"></i>
				</a>
			</li>

		</ul>

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
				<form>
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
						<button class="btn btn-primary">Create Account
							<loader></loader>
						</button>
					</div>
					
					<div class="form-detail">
						<p>By clicking Create Account or Sign Up with Facebook you agree to the <a href="javascript:;">Terms of Use</a> and <a href="javascript">Privacy Policy</a>.</p>
					</div>
				</form>
			</div>

		</div>
		<div class="already-signup">
				<p>Already a member? <a href="javascript:;">Log in</a></p>
			</div>
			</div>



	<div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
		<div class="sign-up-form business-form">
			<div class="fb-btn">
				<div class="row">
					<div class="col-md-12">
						<a href="javascript:;" class="btn btn-facebook">
							<span class="icon-facebook-official"></span>Sign up with Facebook</a>
					</div>
				</div>
			</div>
			<div class="form-signup">
				<form>
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
						<button class="btn btn-primary">Create Account
							<loader></loader>
						</button>
					</div>
					
					<div class="form-detail">
						<p>By clicking Create Account or Sign Up with Facebook you agree to the <a href="javascript:;">Terms of Use</a> and <a href="javascript">Privacy Policy</a>.</p>
					</div>
				</form>
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
    return {
    	tabval: 'firstsec',
    	}
  	},
}
</script>