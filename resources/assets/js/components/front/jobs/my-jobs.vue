<template>
	<div class="my-job-lising-content">
		<div class="container">
			<div class="my-job-indication">
				<h2>My Jobs</h2>
				<p>You have total <span class="primary-color text-bold">1 active</span> job and <span class="primary-color text-bold">3 completed</span> jobs.</p>
			</div>

			<div class="job-post-container section-padd sm">
				<div class="container md">

					<div class="job-post-list" v-for="listing in joblisting">
						<div class="job-post-details">
							<div class="job-image pointer" @click="servicedetail" v-bind:style="{'background-image': 'url('+ listing.job_title_image +')',}"></div>

							<div class="job-common-description job-perform">
								<div class="col-md-6 p-l-0">
									<h3 class="pointer" @click="servicedetail">{{listing.job_title}}</h3> <span><i class="icon-checked"></i></span>
									<div class="job-notification">									
										<div class="jobs-done">
											<span class="job-category">{{ listing.job_category }}</span>		
											<div class="job-status">
												<span class="tags" :class="[listing.job_status.replace(/\s/g, '').toLowerCase().trim()]">{{ listing.job_status }}</span>	
											</div>
											
										</div>	
									</div>
								</div>
								<div class="col-md-6 job-bid-btn p-r-0">
									<a href="javascript:void(0);" class="btn btn-primary post-bid" @click="servicedetail">View Details</a>
									<a href="javascript:void(0);" @click="WriteReview" class="btn btn-primary post-bid" v-if="listing.job_bid == true">
									Write Review</a>
								</div>
							</div>

							<div class="member-details">
								<p class="location">
									<i class="icon-location"></i> 
									Location <strong>{{ listing.job_location }}</strong>
								</p>
								<p class="member-since">
									<i class="icon-calendar-daily"></i>
									Post Date <strong>{{ listing.job_post_date }}</strong>
								</p>
							</div>

							<div class="post-job-description">
								<p>{{ listing.job_description }}</p>
							</div>


							<div class="job-details">
								<p class="bid">
									<i class="icon-flag"></i> 
									<strong>{{ listing.job_bid_number }} bids received - <a href="javascript:void(0);" @click="servicedetail">View Bids</a></strong>
								</p>
								<p class="awarded" v-if="listing.project_awarded == true">
									<i class="icon-checkmark2"></i> 
									Awarded to <a href="javascript:void(0);">{{ listing.job_awarded }}</a>
								</p>								
								<p class="service-requirment">
									<i class="icon-brightness-down"></i>
									Service required 
									<strong v-if="listing.job_service == 'urgent'" class="urgent">{{ listing.job_service }}</strong>
									<strong v-else>{{ listing.job_service }}</strong>
								</p>
							</div>



							<div class="chat-feedback" v-if="listing.review_details == true">
								<div class="text-notifer">
									<p>My feedback & review</p>	
								</div>
								<div class="chat-feedback-column">
									<div class="chat-feedback-image" v-bind:style="{'background-image': 'url('+ listing.latest_review_image +')',}"></div>
									<div class="chat-feedback-message">
										<p>{{listing.latest_review_description}}</p>
										<div class="feeback-detail">
											<p class="feedback-personal-info">
												<a href="javascript:void(0);">{{listing.latest_reviewer_name}}</a>
												 posted on 
												 <strong>{{listing.latest_review_post_date}}</strong>
											</p>
											<div class="ratings">
												<star-rating :star-size="20" read-only :rating="[listing.list_ratings]" active-color="#8200ff"></star-rating>
											</div>
										</div>
									</div>
								</div>

							</div>						

						</div>
					</div>

				</div>			
			</div>
		</div>
		<write-review-popup @HideModalValue="HideModal" :showModalProp="writereview"></write-review-popup>
	</div>
</template>

<script>
import StarRating from 'vue-star-rating';

export default {
  data () {
    return {
    	categoryimage: '/images/front/explore/carpenter1.jpg',
    	writereview: false,
    	jobimage: '/images/front/storage/logoimage1.png',
    	reviewerimage: '/images/front/storage/personimage1.png',

    	joblisting:[

	    	{
	    		job_title_image: '/images/front/storage/logoimage1.png',
	    		job_title: 'CHS US Carpenter and Roofing',
	    		job_category: 'Construction - Concrete Flooring',
	    		job_status: 'Active',
	    		job_perform: 270,
	    		job_bid: false,
	    		job_bid_number: 4,
	    		project_awarded: false,
	    		job_awarded: 'A-General Plumbing & Sewer Service',
	    		job_service: 'within a week',
	    		job_location: 'New York, NY',
	    		job_post_date: 'Jan, 2018',
	    		job_description: 'In brief CHS US supply a full home reno service including carpentry service.We specialise in stairs repair and the supply and fit of firedoors satisfy the revelant authorities All visits for quotation are free With many successful years in the trade customer satisfaction...',
	    		job_bid_recieved: 10,
	    		job_service_Requirment: 'within a week',
	    		review_details: false,
	    		latest_review_image: '/images/front/storage/personimage1.png',
	    		latest_review_description: 'I found Frank Mangan of CHS US Carpentry on this site and chose him because of the feedback I reviewed. I was not disappointed. He has done an excellent job. His work is high quality and he is conscientious. He is good at keeping in touch and sticks to times and dates when working. I therefore have no hesitation in recommending him to future clients.',
	    		latest_reviewer_name: 'Shirley Webb',
	    		latest_review_post_date: 'August, 2018',

	    	},


	    	{
	    		job_title_image: '/images/front/storage/logoimage1.png',
	    		job_title: 'Leaking water pipe',
	    		job_category: 'Plumber - Sewer Service',
	    		job_status: 'COMPLETED',
	    		job_perform: 270,
	    		job_bid: true,
	    		job_bid_number: 4,
	    		project_awarded: true,
	    		job_awarded: 'A-General Plumbing & Sewer Service',	    		
	    		job_service: 'within a week',
	    		job_location: 'New York, NY',
	    		job_post_date: 'Jan, 2018',
	    		job_description: 'We bought the 60 m² flat in 2017 and want to bring it to a “modern” standard. The 2 storey detached building itself is probably more than 100 years old. All in all there are approximately 184 m² walls (gross, including windows, doors, tiles). Ceilings are 56 m². Some areas can stay as they...',
	    		job_bid_recieved: 2,
	    		job_service_Requirment: 'urgent',
	    		review_details: false,
	    		latest_review_image: '/images/front/storage/personimage1.png',
	    		latest_review_description: 'Old water pipe to garden tap leaking so we have an unwanted water feature. The leak is underground from Old steel pipes. This was a branch of the previous main supply to the house. Job capping off old supply to house and repairing/capping off the leaking supply to garden tap.',
	    		latest_reviewer_name: 'Shirley Webb',
	    		latest_review_post_date: 'August, 2018',

	    	},	    	
	    	

	    	{
	    		job_title_image: '/images/front/storage/logoimage1.png',
	    		job_title: 'Painting and other jobs',
	    		job_category: 'Painters - interior Painting',
	    		job_status: 'CANCELED',
	    		job_perform: 270,
	    		job_bid: false,
	    		job_bid_number: 4,
	    		project_awarded: false,
	    		job_awarded: 'A-General Plumbing & Sewer Service',	    		
	    		job_service: 'May 20,2018',
	    		job_location: 'New York, NY',
	    		job_post_date: 'Jan, 2018',
	    		job_description: 'We bought the 60 m² flat in 2017 and want to bring it to a “modern” standard. The 2 storey detached building itself is probably more than 100 years old. All in all there are approximately 184 m² walls (gross, including windows, doors, tiles). Ceilings are 56 m². Some areas can stay as they...',
	    		job_bid_recieved: 1,
	    		job_service_Requirment: 'within a week',
	    		review_details: false,
	    		latest_review_image: '/images/front/storage/personimage1.png',
	    		latest_review_description: 'I found Frank Mangan of CHS US Carpentry on this site and chose him because of the feedback I reviewed. I was not disappointed. He has done an excellent job. His work is high quality and he is conscientious. He is good at keeping in touch and sticks to times and dates when working. I therefore have no hesitation in recommending him to future clients.',
	    		latest_reviewer_name: 'Shirley Webb',
	    		latest_review_post_date: 'August, 2018',

	    	},


	    	{
	    		job_title_image: '/images/front/storage/logoimage1.png',
	    		job_title: 'Flat roof to be repaired',
	    		job_category: 'Roofing',
	    		job_status: 'COMPLETED',
	    		job_perform: 270,
	    		job_bid: false,
	    		job_bid_number: 4,
	    		project_awarded: true,
	    		job_awarded: 'A-General Plumbing & Sewer Service',	    		
	    		job_service: 'May 20,2018',
	    		job_location: 'New York, NY',
	    		job_post_date: 'Jan, 2018',
	    		job_description: "Room at the back of the garden has a flat roof that's 10 years old, roofing membrane is now coming away around edging. Need a quote to preferably replace.",
	    		job_bid_recieved: 2,
	    		job_service_Requirment: 'in next few days',
	    		review_details: true,
	    		latest_review_image: '/images/front/storage/personimage1.png',
	    		latest_review_description: 'Excellent service, work carried out as quoted and to a very high standard. Stairs were extremely noisy and creaking, they are now virtually silent . Excellent work and a thoroughly nice guy.',
	    		latest_reviewer_name: 'Ashley Bell',
	    		latest_review_post_date: 'September, 2018',
	    		list_ratings: 3,

	    	},



    	], 	

    	}
  	},

    methods: {

    	AddCustomer() {
    		this.customer = true;
    	},
        ViewCustomerDetail() {
            /*this.viewcustomer = true;*/
            this.$router.push({name: 'customerdetail'});
        },
        WriteReview(){
        	this.writereview = true;
        },
        HideModal(){
            this.writereview = false;
        },
        servicedetail(){
        	this.$router.push({name: 'job-details'});
        }

    },
    components: {
        StarRating
    },

    mounted(){

    }

}
</script>
