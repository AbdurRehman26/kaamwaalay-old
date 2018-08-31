<template>
	<div class="wrapper-sm">
		<div class="profile-head">
			<h1>Post a Job</h1>
			<p>Please fill out the form below to create a new job.</p>
		</div>
		<div class="post-job-form">
			<form>

				<alert></alert>

				<div class="job-details">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Select Service</label>
								<!-- <input type="text" class="form-control" placeholder="Select Service Type"> -->
								<select class="form-control">
									<option disabled="">Select Service Type</option>
									<option selected="">Carpenter - General Carpentry</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Job Title</label>
								<input type="text" class="form-control" placeholder="Enter job title">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<textarea class="form-control" rows="4" placeholder="Start typing job details"></textarea>
							</div>
						</div>
					</div>
				</div>

				<div class="attach-job-files">
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

				<div class="attach-video-files">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group custom-file">
								<label>Youtube video ID</label>
								<input class="form-control" placeholder="e.g. BCFuE1tlqwU">
							</div>
						</div>
						<div class="col-md-6 video-url">
							<p>Video id available at the end of youtube video url. https://www.youtube.com/watch?v={VIDEO-ID}</p>
						</div>
					</div>
				</div>

				<div class="service-need">
					<div class="row ">
						<div class="col-md-12">
							<label>Do you need this service urgently?</label>
						</div>
						<div class="boxed">
							<div class="col-md-6">
								<input type="radio" id="normal" name="need" value="Normal job" checked="">
	  							<label for="normal">No, Normal job</label>
							</div>
							<div class="col-md-6">
								  <input type="radio" id="urgent" name="need" value="Urgent job">
	  							  <label for="urgent">Yes, Urgent job</label>
							</div>
						</div>
						<div class="col-md-12">
							<p>In case of urgent job, we will send push notifications to all the service providers around you. You need to pay <strong>$2</strong> fee for urgent job.</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Preference</label>
								<select class="form-control">
									<option selected="" disabled="">Choose Date</option>
									<option>In a few days</option>
									<option>Within this week</option>
									<option>Next week</option>
									<option>2 weeks</option>
									<option>1 month</option>
									<option>Custom</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group custom-datepicker">
								<label>Select Date</label>
									<date-picker v-model="value" format="DD-MM-YYYY" lang="en"></date-picker>
							</div>
						</div>
					</div>
				</div>

				<div class="service-location">
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
								<input type="text" class="form-control" placeholder="Enter apartment, suite, unit (optional)">
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
								<input type="text" class="form-control" placeholder="Enter your state">
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

				<div class="verify-account">
					<div class="row">
						<div class="col-md-12">
							<div class="verification-alert">
								<p>To post your job, we need to verify your credit card to ensure that you are valid customer and at-least 18 years old.
									<span>We won't charge your card</span>.</p>
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
										<option>Master</option>
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
					<div class="job-form-submission">
						<div class=" ">
							<button @click="job()" class="btn btn-primary">Create Job
								<loader></loader>
						</button>
						</div>
						<p>Please make sure all the information you entered is accurate before submitting.</p>
					</div>
				</div>

			</form>
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
  methods:{
  	job(){
  		this.$router.push({name: 'My Jobs'});
  	}
  }
}
</script>