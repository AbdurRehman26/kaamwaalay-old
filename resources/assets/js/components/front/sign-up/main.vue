<template>
	<div class="sign-up-info">

		<h1>Sign Up</h1>

		<!-- Nav tabs -->
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">I want to hire a service provider</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">I want to grow my business</a>
			</li>

		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
			<div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
			<div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
			<div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">...</div>
			<div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">...</div>
		</div>

		<div class="sign-up-form">
			<div class="fb-btn">
				<div class="row">
					<div class="col-md-12">
						<a href="javascript:;" class="btn btn-primary">
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
					
				
					<a href="javascript" class="btn btn-primary">Create Account</a>
					
					<div class="form-detail">
						<p>By clicking Create Account or Sign Up with Facebook you agree to the <a href="javascript:;">Terms of Use</a> and <a href="javascript">Privacy Policy</a>.</p>
					</div>
				</form>
			</div>
		</div>
	</div>
</template>