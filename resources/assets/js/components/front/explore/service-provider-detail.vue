<template>
	<div class="category-detail">
		<div class="next-project grey-bg elementary-banner section-padd md border-bottom">
			<div class="container element-index text-center md">
				<div class="content-sec">
					<div class="category-image" v-bind:style="{'background-image': 'url('+ categoryimage +')',}"></div>

					<div class="category-content">
						<h2>General carpentry</h2>
						<div class="jobs-completed">
							<star-rating :star-size="20" read-only :rating="4" active-color="#8200ff"></star-rating>	
							<span class="review-job">180 Feedback reviews</span>				
							<span class="review-job left-border">208 Jobs performed</span>
						</div>
						<div class="service-detail">
							<a href="javascript:void(0);" class="btn btn-primary">Post Job & Invite to Bid</a>
							<a @click="categorylisting" href="javascript:void(0);" class="btn btn-link">Go back</a>
						</div>	
					</div>
				</div>
			</div> 
			<div class="elements">
				<img src="/images/front/banner-bg/bg-5.png" class="top-left"> 
				<img src="/images/front/banner-bg/bg-2.png" class="bottom-right">
			</div>
		</div>



		<div class="job-post-container section-padd sm">
			<div class="container md">


				<div class="row"  v-for="listing in joblisting">
					<div class="col-md-9">
						<div class="provider-information">
								
								<div class="service-detail">
									<h3>{{listing.job_title}}</h3>
								</div>

								<div class="member-details">
									<p class="location">
										<i class="icon-location"></i> 
										Location <strong>{{ listing.job_location }}</strong>
									</p>
									<p class="member-since">										
										Member since <strong>{{ listing.job_member_since }}</strong>
									</p>
								</div>

								<div class="post-job-description">
									<p>{{ listing.job_description }}</p>
								</div>

								<div class="chat-feedback"">
									<div class="text-notifer">
										<h3>Feedback & Reviews</h3>	
									</div>
									<div class="chat-feedback-column" v-for="reviewer in listing.review_details">
										<div class="chat-feedback-image" v-bind:style="{'background-image': 'url('+ reviewer.latest_review_image +')',}"></div>
										<div class="chat-feedback-message white-msg">
											<p>{{reviewer.latest_review_description}}</p>
											<div class="feeback-detail">
												<p class="feedback-personal-info">
													<a href="javascript:void(0);">{{reviewer.latest_reviewer_name}}</a>
													 posted on 
													 <strong>{{reviewer.latest_review_post_date}}</strong>
												</p>
												<div class="ratings">
													<star-rating :star-size="20" read-only :rating="[reviewer.list_ratings]" active-color="#8200ff"></star-rating>
												</div>
											</div>
										</div>
									</div>

								</div>						

						</div>
					</div>




					<div class="col-md-3 p-l-0 p-r-0">

						<div class="service-avaliable">
							<h3 class="m-b-20">Services offered</h3>
							<ul>
								<li v-for="service in listing.servicesavaliable">
									{{ service.title }}
								</li>
							</ul>
						</div>						
						
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
	    		job_title: 'CHS US Carpenter and Roofing',
	    		job_feedback: 261,
	    		job_perform: 270,
	    		job_location: 'New York, NY',
	    		job_member_since: 'Jan, 2018',
	    		job_description: "Hi I'm Matt, I am a time served Joiner with over 15 years experience. I have NVQ 2 & 3 in Carpentry & Joinery. I hold a CSCS Gold card. I have a vast experience in installation of Timber, UPVC & Aluminium Windows & Doors. Also experienced in Secondary Glazing Installation.",

	    		servicesavaliable:[

		    		{
		    			title:'General carpentry',
		    		},

		    		{
		    			title:'Furniture',
		    		},

		    		{
		    			title:'Glazing Installation',
		    		},

		    		{
		    			title:'Wooden deck repair',
		    		},	    			    			    		

	    		],
	    		review_details:[

		    		{

			    		latest_review_image: '/images/front/storage/personimage1.png',
			    		latest_review_description: 'Matt installed a new fence at our school and I am more than pleased, he was punctual, polite and did the work quickly and I would offer him other work without hesitation.',
			    		list_ratings: 5,
			    		latest_reviewer_name: 'Lauren Gomez',
			    		latest_review_post_date: 'August, 2018',
		    		},

		    		{

			    		latest_review_image: '/images/front/storage/personimage2.png',
			    		latest_review_description: 'Matt did a great job. Took him about 10 minutes to get the door down to size and re-hang it. Room looks a lot better now. Thank you!',
			    		list_ratings: 4,
			    		latest_reviewer_name: 'Paul Payne',
			    		latest_review_post_date: 'August, 2018',
		    		},

		    		{

			    		latest_review_image: '/images/front/storage/personimage3.png',
			    		latest_review_description: 'Matt came exactly when he said, fixed the problem with my window with no fuss and at a good price. Very good bloke and would highly recommend!',
			    		list_ratings: 3,
			    		latest_reviewer_name: 'William Willis',
			    		latest_review_post_date: 'July, 2018',
		    		},

		    		{

			    		latest_review_image: '/images/front/storage/personimage4.png',
			    		latest_review_description: 'Matt did an amazing job.I was happy with every part of the service he provided. He turned up at the agreed time for the estimate and returned promptly at the agreed time and date to complete the job, which was very affordable.',
			    		list_ratings: 4,
			    		latest_reviewer_name: 'Brian Howell',
			    		latest_review_post_date: 'June, 2018',
		    		},

		    		{

			    		latest_review_image: '/images/front/storage/personimage5.png',
			    		latest_review_description: 'I would highly recommend Matt. He fitted a loft hatch and ladder for us, fitted new handles and locks to our windows and also child safety catches to all our windows upstairs. He was very professional and punctual and we were happy with the work undertaken, which he did very quickly.',
			    		list_ratings: 5,
			    		latest_reviewer_name: 'Timothy Schultz',
			    		latest_review_post_date: 'June, 2018',
		    		},	    			    			    			    		

	    		]


	    	},

	    		    	    		    	

    	],
 	
    	}
  	},

    methods: {

    	AddCustomer() {
    		this.customer = true;
    	},

        changestatuspopup() {
            this.changestatus = true;
        },
        HideModal(){
            this.customer = false;
            this.viewcustomer = false;
            this.changestatus = false;
        },
        categorylisting(){
        	this.$router.push({name: 'Explore_Detail'});	
        }

    },
    components: {
        StarRating
    },

    mounted(){

    }

}
</script>
