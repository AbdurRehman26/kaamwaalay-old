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
								<input type="text" class="form-control" value="Carpanter - General Carpentry" placeholder="Carpanter - General Carpentry">
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
								<textarea class="form-control" rows="4">Start typing job details</textarea>
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
									<option>May 20, 2017</option>
									<option>May 22, 2017</option>
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
								<input type="text" class="form-control" value="4695 Chabot Dr. Suite 200," placeholder="4695 Chabot Dr. Suite 200,">
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
								<input type="text" class="form-control" value="Pleasanton" placeholder="Pleasanton">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>State</label>
								<input type="text" class="form-control" placeholder="CA">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Zip Code</label>
								<input type="text" class="form-control" value="94588">
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
									<input type="text" class="form-control" placeholder="Enter your credit card number" value="Enter your credit card number">
							</div>
						</div>
						<div class="col-md-6">
							<label for="">Expiry Date</label>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group custom-datepicker">
										<date-picker v-model="value_month" type="month" placeholder="Select Month" format="MM" lang="en"></date-picker>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group custom-datepicker">
										<date-picker v-model="value_year" type="year" placeholder="Select Year" format="YYYY" lang="en"></date-picker>
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
							<button class="btn btn-primary">Create Job
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
  }
}
</script>