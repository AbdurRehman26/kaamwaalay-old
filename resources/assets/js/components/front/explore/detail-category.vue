<template>
	<div class="category-detail">
		<div class="next-project grey-bg elementary-banner section-padd md">
			<div class="container element-index text-center md">
				<div class="content-sec">
					<div class="category-image" v-bind:style="{'background-image': 'url('+ categoryimage +')',}"></div>

					<div class="category-content">
						<h2>General carpentry</h2>
						<p>Carpenters perform a wide array of tasks and generally work with wood. However, some carpenters also train to work with concrete, metal, plastic, and tile.</p>
						<p><strong>Are you looking to find a carpenter for hire?</strong> Then, we can help. When you post a job you will receive custom bids from local carpenters!</p>
					</div>
				</div>
			</div> 
			<div class="elements">
				<img src="/images/front/banner-bg/bg-5.png" class="top-left"> 
				<img src="/images/front/banner-bg/bg-2.png" class="bottom-right">
			</div>
		</div>

		<div class="grey-bg section-padd xs border-top-bottom">
			<div class="container md">
				<div class="row">
					<div class="col-md-10 p-r-0">
			            <div class="search-filter m-b-0">
			                <input type="text" placeholder="What service do you need?" class="form-control lg search-service" name="">
			                <div class="container-zip-code">
								<i class="icon-location"></i>
								<input type="number" placeholder="Zip code" class="form-control lg zip-code" name="">
							</div>
						</div>			
					</div>
					<div class="col-md-2 p-r-0">
						<a href="javscript:void(0);" class="btn btn-primary width-100">Search</a>
					</div>
				</div>
			</div>
		</div>


		<div class="job-post-container section-padd sm">
			<div class="container md">

				<div class="text-notifer">
					<p>14 General carpentry service professionals found near you</p>
				</div>

				<div class="job-post-list" v-for="listing in joblisting">
					<div class="job-post-details">
						<div class="job-image" v-bind:style="{'background-image': 'url('+ listing.job_title_image +')',}"></div>

						<div class="job-common-description">
							<h3>{{listing.job_title}}</h3> <span><i class="icon-checked"></i></span>
							<div class="jobs-rating">
								<star-rating :star-size="20" read-only :rating="4" active-color="#8200ff"></star-rating>
								<div class="jobs-done">
									<span class="review-job">{{ listing.job_feedback }} Feedback reviews</span>					
									<span class="review-job">{{ listing.job_perform }} Jobs performed</span>
								</div>	
							</div>
							<a href="javascript:void(0);" class="btn btn-primary post-bid">Post Job & Invite to Bid</a>
						</div>

						<div class="member-details">
							<p class="location">
								<i class="icon-location"></i> 
								Location <strong>{{ listing.job_location }}</strong>
							</p>
							<p class="member-since">
								<i class="icon-calendar-daily"></i>
								Member since <strong>{{ listing.job_member_since }}</strong>
							</p>
						</div>

						<div class="post-job-description">
							<p>{{ listing.job_description }}</p>
						</div>

						<div class="chat-feedback">
							<div class="text-notifer">
								<p>Latest feedback & review</p>	
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
										<i class="icon-quotes-right3"></i>
									</div>
								</div>
							</div>

						</div>						

					</div>
				</div>

			</div>			
		</div>

        <div class="featured-categories section-padd sm">
        	<div class="container">

	        	<div class="category-section" v-for="maincategory in category">
	        		<div class="category-title">
	        			<h2>{{ maincategory.title }}</h2>	        			
	        		</div>	        		
	        		<div class="category-items">

	        			<div class="items" v-for="categoryabc in maincategory.categoryitems">
	        				<a href="javascript:void(0);">
		        			<div class="item-image" v-bind:style="{'background-image': 'url('+ categoryabc.itemimage +')',}"></div>
		        				<h4>{{categoryabc.itemtitle}}</h4>
		        			</a>
		        		</div>
		        		<div class="showmore"><a href="javascript:void(0);">View all services related to electricians <i class="icon-keyboard_arrow_right"></i></a></div>
	        				
	        		</div>  	        	      		
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
    	categoryimage: '/images/front/explore/carpenter1.jpg',

    	jobimage: '/images/front/storage/logoimage1.png',
    	reviewerimage: '/images/front/storage/personimage1.png',

    	joblisting:[

	    	{
	    		job_title_image: '/images/front/storage/logoimage1.png',
	    		job_title: 'CHS US Carpenter and Roofing',
	    		job_feedback: 261,
	    		job_perform: 270,
	    		job_location: 'New York, NY',
	    		job_member_since: 'Jan, 2018',
	    		job_description: 'In brief CHS US supply a full home reno service including carpentry service.We specialise in stairs repair and the supply and fit of firedoors satisfy the revelant authorities All visits for quotation are free With many successful years in the trade customer satisfaction...',

	    		latest_review_image: '/images/front/storage/personimage1.png',
	    		latest_review_description: 'I found Frank Mangan of CHS US Carpentry on this site and chose him because of the feedback I reviewed. I was not disappointed. He has done an excellent job. His work is high quality and he is conscientious. He is good at keeping in touch and sticks to times and dates when working. I therefore have no hesitation in recommending him to future clients.',
	    		latest_reviewer_name: 'Shirley Webb',
	    		latest_review_post_date: 'August, 2018',

	    	},

	    	{
	    		job_title_image: '/images/front/storage/logoimage2.png',
	    		job_title: 'M.D.S Joinery & Glazing',
	    		job_feedback: 180,
	    		job_perform: 208,
	    		job_location: 'New York, NY',
	    		job_member_since: 'Feb, 2018',
	    		job_description: 'Hi Im Matt, I am a time served Joiner with over 15 years experience. I have NVQ 2 & 3 in Carpentry & Joinery. I hold a CSCS Gold card. I have a vast experience in installation of Timber, UPVC & Aluminium Windows & Doors. Also experienced in Secondary...',

	    		latest_review_image: '/images/front/storage/personimage2.png',
	    		latest_review_description: 'Very good. Matt arrived when agreed, did a good job and was good value - I would certainly use MDS again and have no concerns recommending him.',
	    		latest_reviewer_name: 'Keith McCoy',
	    		latest_review_post_date: 'August, 2018',

	    	},	    	

    	],

		category:[

		{

			title:'Related services',
			categoryitems:[
				{
					itemimage: '/images/front/explore/carpenter1.jpg',
					itemtitle: 'Wooden partition service'
				},

				{
					itemimage: '/images/front/explore/carpenter2.jpg',
					itemtitle: 'Furniture repair & Installation',
				},

				{
					itemimage: '/images/front/explore/carpenter3.jpg',
					itemtitle: 'Wooden deck building & repair',
				},

			],

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

    },
    components: {
        StarRating
    },

    mounted(){

    }

}
</script>
