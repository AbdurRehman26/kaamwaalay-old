<template>
	<div class="section padding-sm profile-form wrapper-sm">
		<div class="profile-head">
			<h1>Complete your profile</h1>
				<p>To build safety on PSM, it's critical that all customers complete this step. All information provided below will be kept secure.</p>
		</div>

		<div class="profile-form-section">

			<div class="form-signup">
				<form>
					<div class="personal-detail">
						<div class="row">
							<div class="browse-btn">
								<div class="form-group">
									<label class="file-upload-label">Browse Photo</label>
									<input class="form-control file-upload-input" type="file">
								</div>
							</div>
						</div>

					<!-- Alert Tag -->
						<alert></alert>
					<!-- Alert Tag -->

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">First Name</label>
									<input type="text" class="form-control" value="Arsalan" placeholder="Enter your first name">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Last Name</label>
									<input type="text" class="form-control" value="Akhtar" placeholder="Enter your last name">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Email Address</label>
									<input type="text" class="form-control" value="arsalan@cygnismedia.com" placeholder="Enter your first email address">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Contact Number</label>
									<input type="password" class="form-control" placeholder="Enter your mobile or landline number">
							</div>
						</div>
					</div>
				</div>
				<div class="home-detail">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Address</label>
									<input type="text" class="form-control" placeholder="Enter your street address">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Apartment, suite, unit</label>
									<input type="text" class="form-control" placeholder="Enter your last name">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">City</label>
									<input type="password" class="form-control" placeholder="Enter your city name">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">State</label>
									<select class="form-control">
										<option selected="" disabled="">Select State</option>
										<option>New York</option>
										<option>California</option>
									</select>
							</div>
						</div>
					</div>

					<div class="row">

						<div class="col-md-6">
							<div class="form-group">
								<label for="">Zip Code</label>
									<input type="password" class="form-control" placeholder="Enter your zip code">
							</div>
						</div>
					</div>
				</div>

					<div class="create-account-btn">
						<button class="btn btn-primary">Update Profile
							<loader></loader>
						</button>
					</div>

					<div class="form-detail">
						<p>Please make sure all the information you entered is accuate before submitting.</p>
					</div>
				</form>
			</div>

		</div>

	</div>
</template>
