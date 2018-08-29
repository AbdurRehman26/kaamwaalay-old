<template>
	<div class="container md">
		<div class="profile-head">
			<h1>Featured Profile</h1>
			<p>Attract more of the right customers by highlighting your specialties and profile on the service provider listing page.</p>
		</div>

		<div class="featured-profile">
			<div class="row">
				<div class="col-md-6">
					<div class="profile-budget">
						<h2>Please select your featured profile budget.</h2>
						<div class="row">
							<div class="col-md-12">
								<div class="payment-charges custom-circle-radio">
									<p>
									    <input type="radio" id="views1" name="radio-group" checked>
									    <label for="views1">$10.00 one time</label>
									    <p class="patment-detail">100 featured profile listing views</p>
									</p>	
								</div>
							</div>
								
							<div class="col-md-12">
								<div class="payment-charges custom-circle-radio">
									<p>
										<input type="radio" id="views2" name="radio-group" checked>
										<label for="views2">$15.00 one time</label>
										<p class="patment-detail">200 featured profile listing views</p>
									</p>	
								</div>
							</div>

							<div class="col-md-12">
								<div class="payment-charges custom-circle-radio">
									<p>
										<input type="radio" id="views3" name="radio-group" checked>
										<label for="views3">$25.00 one time</label>
										<p class="patment-detail">500 featured profile listing views</p>
									</p>	
								</div>
							</div>
							
							<div class="col-md-3">
								<button class="btn btn-primary payment-continue">
									Continue
									<loader></loader>
								</button>
							</div>
						</div>

					</div>
				</div>
				<div class="col-md-6">
					<div class="featured-profile-section">
						<h3>Your featured profile may appear on a variety of places, including:</h3>
						<div class="featured-places">
							<div><i class="icon-list"></i>
								<span>Service Pages</span>
								<p class="featured-detail">Your featured profile will appear almost at the top of service pages related to the services you are offering.</p>
							</div>
						</div>

						<div class="featured-places">
							<div><i class="icon-search22"></i>
								<span>Search result pages</span>
								<p class="featured-detail">When someone search specific service which you are offering, your profile may appear at the top of the search results.</p>
							</div>
						</div>

						<div class="featured-places">
							<div class="ios-andriod-feature"><i class="ios-andriod-app"></i>
								<span>Inside iOS &amp; Android Apps</span>
								<p class="featured-detail">Your featured profile appear on PSM’s iPhone and Android apps, on search result and service pages.</p>
							</div>
						</div>

					</div>

				</div>
			</div>
		</div>

		<div class="campaigns">
			<h3>MY CAMPAIGNS</h3>
			<div class="camp-views">

				<div class="view-status"><span>100 VIEWS</span></div>

				<div class="view-status-detail">
					<span>Paid $10.00 one time</span>
					<span class="float-right calender-date">
						<i class="icon-calendar-daily"></i> Date: <strong>12 Dec, 2017</strong></span>
					<ul class="views-percentage">
						<li>Actual views: <span>80</span></li>
						<li>Clicks: <span>20</span></li>
						<li>CTR: <span>25%</span></li>
					</ul>
				</div>
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