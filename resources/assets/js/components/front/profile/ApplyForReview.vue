<template>	
	<div class="section padding-sm profile-form wrapper-sm">
		<div class="profile-head">
			<h1>Complete your profile &amp; apply for Review</h1>
				<p>To build safety on PSM, we review and approve service provider profiles. All information provided below will be kept secure.</p>
		</div>

		<div class="profile-form-section">

			<div class="form-signup">
				<form>
					<div class="personal-provider-detail">
						<div class="row">
							<div class="browse-btn">
								<div class="form-group">
									<label class="file-upload-label">Browse Logo or Photo</label>
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

				<div class="business-detail">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Are you an individual or a business?</label>
									<select class="form-control">
										<option disabled="">Select Business</option>
										<option selected="">Business</option>
									</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">DUNS Number</label>
									<input type="text" class="form-control" placeholder="DUNS number for verification (optional)">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Business Name</label>
									<input type="password" class="form-control" placeholder="Enter business name">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Working since</label>
									<input type="password" class="form-control" placeholder="e.g. June 2010">
							</div>
						</div>
					</div>

					<div class="row">
						
						<div class="col-md-12">
							<div class="form-group">
								<label for="">About</label>
									<textarea class="form-control" rows="2" placeholder="Start typing about your business / profile info"></textarea>
							</div>
						</div>
					</div>
				</div>

				<div class="service-offered">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Service</label>
									<input type="text" class="form-control" placeholder="Start typing service name">
							</div>
						</div>
						<div class="col-md-6">
							<a href="javascript:;" class="add-photos mt-40">+ Add more services</a>
						</div>
					</div>
				</div>
				
					<div class="create-account-btn">
						<button class="btn btn-primary">Update Profile
							<loader></loader>
						</button>
					</div>
					
					<div class="form-detail">
						<p>Make sure all the information you entered is accuate before submitting.</p>
					</div>
				</form>
			</div>
		
		</div>

	</div>
</template>