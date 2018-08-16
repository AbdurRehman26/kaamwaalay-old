<template>

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
									<a href="javascript:void(0);" class="chat-message"><i class="icon-message"></i></a>						
									<a href="javascript:void(0);" class="btn btn-primary post-bid">View Details</a>
								</div>
							</div>

							<div class="member-details">
								<p class="location">
									<i class="icon-location"></i> 
									Location <strong>{{ listing.job_location }}</strong>
								</p>
								<p class="offer">
								<i class="icon-work-briefcase"></i> 
								Offer: <strong>$250</strong> - <a href="javascript:void(0);">Change Bid</a>
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
								<p class="customer-rating">									
									<strong>Customer rating:</strong>
									<star-rating :star-size="20" read-only :rating="[listing.list_ratings]" active-color="#8200ff"></star-rating>
								</p>								
								<p class="service-requirment">
									<i class="icon-brightness-down"></i>
									Service required 
									<strong v-if="listing.job_service == 'urgent'" class="urgent">{{ listing.job_service }}</strong>
									<strong v-else>{{ listing.job_service }}</strong>
								</p>
							</div>				

						</div>
					</div>

				</div>			

</template>

<script>
import StarRating from 'vue-star-rating';

export default {
  data () {
    return {

    	joblisting:[

	    	{
	    		job_title_image: '/images/front/storage/logoimage1.png',
	    		job_title: 'Concrete Floor Building',
	    		job_category: 'Construction - Concrete Flooring',
	    		job_status: 'Active',
	    		job_perform: 270,
	    		job_bid: false,
	    		job_bid_number: 4,
	    		project_awarded: false,
	    		job_awarded: 'A-General Plumbing & Sewer Service',
	    		job_service: 'within a week',
	    		job_location: 'New York, NY',
	    		job_post_date: '24 Jan, 2018',
	    		job_description: 'In brief CHS US supply a full home reno service including carpentry service.We specialise in stairs repair and the supply and fit of firedoors satisfy the revelant authorities All visits for quotation are free With many successful years in the trade customer satisfaction...',
	    		job_bid_recieved: 10,
	    		job_service_Requirment: 'within a week',
	    		review_details: false,
	    		list_ratings: 4,
	    		latest_review_image: '/images/front/storage/personimage1.png',
	    		latest_review_description: 'I found Frank Mangan of CHS US Carpentry on this site and chose him because of the feedback I reviewed. I was not disappointed. He has done an excellent job. His work is high quality and he is conscientious. He is good at keeping in touch and sticks to times and dates when working. I therefore have no hesitation in recommending him to future clients.',
	    		latest_reviewer_name: 'Shirley Webb',
	    		latest_review_post_date: 'August, 2018',

	    	},

	    	{
	    		job_title_image: '/images/front/storage/logoimage1.png',
	    		job_title: 'Leaking water pipe',
	    		job_category: 'Construction - Concrete Flooring',
	    		job_status: 'Active',
	    		job_perform: 270,
	    		job_bid: false,
	    		job_bid_number: 4,
	    		project_awarded: false,
	    		job_awarded: 'A-General Plumbing & Sewer Service',
	    		job_service: 'within a week',
	    		job_location: 'New York, NY',
	    		job_post_date: '24 Jan, 2018',
	    		job_description: 'In brief CHS US supply a full home reno service including carpentry service.We specialise in stairs repair and the supply and fit of firedoors satisfy the revelant authorities All visits for quotation are free With many successful years in the trade customer satisfaction...',
	    		job_bid_recieved: 10,
	    		job_service_Requirment: 'within a week',
	    		review_details: false,
	    		list_ratings: 4,
	    		latest_review_image: '/images/front/storage/personimage1.png',
	    		latest_review_description: 'I found Frank Mangan of CHS US Carpentry on this site and chose him because of the feedback I reviewed. I was not disappointed. He has done an excellent job. His work is high quality and he is conscientious. He is good at keeping in touch and sticks to times and dates when working. I therefore have no hesitation in recommending him to future clients.',
	    		latest_reviewer_name: 'Shirley Webb',
	    		latest_review_post_date: 'August, 2018',

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
        changestatuspopup() {
            this.changestatus = true;
        },
        HideModal(){
            this.customer = false;
            this.viewcustomer = false;
            this.changestatus = false;
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
