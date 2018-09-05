<template>	
	<div class="section padding-sm profile-form wrapper-sm">
		<div class="profile-head">
			<h1>Complete your profile &amp; apply for Review</h1>
				<p>To build safety on PSM, we review and approve service provider profiles. All information provided below will be kept secure.</p>
		</div>

		<div class="profile-form-section apply-review-sec">

			<div class="form-signup">
				<form>
					<div class="personal-provider-detail">
						<div class="profile-image-placeholder">
							<img :src="profileimage">
						</div>						
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
									<input type="text" class="form-control" placeholder="Enter your email address">
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
										<option disabled="" selected="">Select Business</option>
										<option>Business</option>
										<option>Individual</option>
									</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">DUNS Number <span v-b-tooltip.hover title="This is required for business verification" class="duns-help-icon"><i class="icon-help"></i></span></label>
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
							<a href="javascript:;" class="add-photos mt-35">+ Add more services</a>
						</div>
					</div>
				</div>

				<div class="business-proof">
					<div class="row">
						<div class="col-md-12">
							<p>We can confirm your association to the business or organization with any of these documents:
							<ul>
								<li>Certificate of Formation (for a partnership)</li>
								<li>Articles of Incorporation (for a corporation)</li>
								<li>Local Business License (issued by your city, county, state, etc.)</li>
								<li>More documents to be decided.</li>
							</ul>
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group custom-file">
								<label>Browse</label>
								<input class="form-control custom-file-input" type="file">
								<span class="custom-file-label">Click here to choose a photo file</span>
							</div>
						</div>
						<div class="col-md-6">
							<a href="javascript:;" class="add-photos filter-btn-top-space">+ Add more photos</a>
						</div>
					</div>
				</div>

				<div class="provider-address">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Address</label>
								<input type="text" class="form-control" placeholder="Enter your address">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Apartment, suite, unit</label>
								<input type="text" class="form-control" placeholder="Enter apartment details">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>City</label>
								<input type="text" class="form-control" placeholder="Enter your city">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>State</label>
								<select class="form-control">
									<option disabled="" selected="">Enter your State</option>
									<option>CA</option>
									<option>NW</option>
									<option>TX</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Zip Code</label>
								<input type="text" class="form-control" placeholder="Enter your zip code">
							</div>
						</div>
					</div>
				</div>

				<div class="account-fee">
					<div class="row">
						<div class="col-md-12">
							<div class="verification-alert">
								<p>Enter your credit card details to pay service provider account creation fee of <span>$50</span>.</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Credit Card Type</label>
									<select class="form-control">
										<option selected="" disabled="">Select credit card type</option>
										<option>VISA</option>
									</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Card Holder Name</label>
									<input type="" class="form-control" placeholder="Enter card holder name" name="">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Credit Card Number</label>
									<input type="text" class="form-control" placeholder="Enter your credit card number">
							</div>
						</div>
						<div class="col-md-6">
							<label for="">Expiry Date</label>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group custom-datepicker">
										<select class="form-control">
											<option selected="" disabled="">Select Month</option>
											<option>January</option>
											<option>Feburay</option>
											<option>March</option>
											<option>April</option>
											<option>May</option>
											<option>June</option>
											<option>July</option>
											<option>August</option>
											<option>September</option>
											<option>October</option>
											<option>November</option>
											<option>December</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group custom-datepicker">
										<select class="form-control">
											<option selected="" disabled="">Select Year</option>
											<option>2010</option>
											<option>2011</option>
											<option>2012</option>
											<option>2013</option>
											<option>2014</option>
											<option>2015</option>
											<option>2016</option>
											<option>2017</option>
											<option>2018</option>
											<option>2019</option>
											<option>2020</option>
											<option>2021</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Security Code (CVV)</label>
								<input class="form-control" placeholder="Enter your cvv number" type="" name="">
							</div>
						</div>
					</div>
				</div>
				
					<div class="submit-approval-btn" @click="profileredirct()">
						<button class="btn btn-primary">Submit for Apporoval
							<loader></loader>
						</button>
					</div>
					
					<div class="form-detail">
						<p>Please make sure all the information you entered is accurate before submitting.</p>
					</div>
				</form>
			</div>
		
		</div>

	</div>
</template>
<script>
import DatePicker from 'vue2-datepicker'
 
export default {
  components: { DatePicker },
  data() {
    return {
	   	value: '',
	   	value_month:'',
	   	value_year:'',
	    time1: '',
	    time2: '',
	    time3: '',
	    profileimage: '',
      shortcuts: [
        {
          text: 'Today',
          onClick: () => {
            this.time3 = [ new Date(), new Date() ]
          }
        }
      ],
      timePickerOptions:{
        start: '00:00',
        step: '00:30',
        end: '23:30'
      }
    }
  },
  methods: {
        profileredirct(){
            this.$router.push({name: 'not-approved'});
        }   	
  }
}
</script>