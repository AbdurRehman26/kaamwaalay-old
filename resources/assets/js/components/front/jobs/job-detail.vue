
<template>
	<div class="job-main-details">
		<div class="content" v-for="listing in joblisting">
			<div class="job-main-heading grey-bg elementary-banner section-padd xs border-bottom">
				<div class="container element-index text-center md">
					<div class="content-sec">
						<div class="job-image" v-bind:style="{'background-image': 'url('+ jobimage +')',}"></div>

						<div class="job-content">
							<h2>{{listing.job_title}}</h2>
								<div class="job-notification flexable">	
									<div class="col-md-8  p-l-0">
										<div class="jobs-done"  v-if="job_detail_right_panel == 'service-provider-customer-end' || job_detail_right_panel == 'serviceprovidercustomerend' || job_detail_right_panel == 'awarded' || job_detail_right_panel == 'serviceprovider'">
											<div class="job-status job-poster">
												<span>Posted by <a href="javascript:void(0);">Nathan Alvarez</a></span>	
												<star-rating :star-size="20" read-only :rating="4" active-color="#8200ff"></star-rating>												
											</div>												
											<span class="job-category job-post-category">{{ listing.job_category }}</span>									
										</div>											
										<div class="jobs-done" v-else>
											<span class="job-category">{{ listing.job_category }}</span>		
											<div class="job-status">
												<span class="tags" :class="[listing.job_status.replace(/\s/g, '').toLowerCase().trim()]">{{ listing.job_status }}</span>	
											</div>											
										</div>	
									</div>		
									<div class="col-md-6 p-r-0">
										<div class="job-details">
											<p class="awarded">
												<i class="icon-checkmark2"></i> 
												{{ listing.job_awarded }}
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
					</div>
				</div> 
				<div class="elements">
					<img src="/images/front/banner-bg/bg-5.png" class="top-left"> 
					<img src="/images/front/banner-bg/bg-2.png" class="bottom-right">
				</div>
			</div>



			<div class="job-post-container section-padd sm">
				<div class="container md">


					<div class="row">
						<div class="col-md-9">
							<div class="provider-information">
									
									<div class="service-detail">
										<h3>Job Details</h3>
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

									<div class="jobs-post-files">
										<h3>Related Photos</h3>
                                            <div class="gallery-item" v-for="(n, index) in imageList" :data-index="index" v-bind:style="{'background-image':'url('+n.url+')',}">
                                                <img @click="open($event)" :src="n.url" />
                                            </div>
									</div>

									<div class="jobs-post-files">
										<h3>Related Videos</h3>
										<iframe width="1280" height="365" src="https://www.youtube.com/embed/3o7DvKGeZn0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
									</div>

									<div class="jobs-post-files" v-if="job_detail_right_panel == 'service-provider-customer-end' || job_detail_right_panel == 'serviceprovidercustomerend' || job_detail_right_panel == 'awarded' || job_detail_right_panel == 'serviceprovider'">
										<h3>Customer Information</h3>
										<div class="coustomer-info-line">
											<i class="icon-phone_in_talk"></i>
											<p>Phone number: <strong>+1-541-754-3010</strong></p>
										</div>
										<div class="coustomer-info-line">
											<i class="icon-pin"></i>
											<p>Address: 
												<strong>
													1429 Netus Rd. Reedsport NY 48247
												</strong>
												 <a href="javascript:void(0);">
												 	Get driving directions
												 </a>
												</p>
										</div>						
										<div class="coustomer-info-line">
											<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d187.3521292068258!2d-124.0968600187008!3d43.70235783020168!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54c3c3b9ac656e47%3A0x7b79c93b5e4b888!2sReedsport%2C+OR+97467!5e0!3m2!1sen!2s!4v1534485973398" width="600" height="130" frameborder="0" style="border:0" allowfullscreen></iframe>
										</div>				
									</div>


									<div class="chat-feedback" v-if="job_detail_right_panel == 'service-provider-customer-end' || job_detail_right_panel == 'serviceprovidercustomerend' || job_detail_right_panel == 'awarded' || job_detail_right_panel == 'serviceprovider'">
										<div class="text-notifer">
											<h3>My Bid</h3>	
										</div>
										<div class="chat-feedback-column job-bidding" v-for="reviewer in listing.my_bid">
											<div class="chat-feedback-image" v-bind:style="{'background-image': 'url('+ reviewer.latest_review_image +')',}"></div>
											<div class="job-common-description">
												<h3 class="pointer">{{listing.job_title}}</h3>							
											</div>										
											<div class="job-proposal">
												<div class="bit-offered">
													<span><i class="icon-work-briefcase"></i> Offer: 
														<strong>
															{{reviewer.job_bid_amount}}		
														</strong>
													</span>
													<span class="pull-right"><i class="icon-calendar-daily"></i> Date:
														<strong>
															{{reviewer.job_bid_data}}
														</strong>
													</span>
												</div>
												<div class="proposal-message">
													<p>{{reviewer.latest_review_description}}</p>
												</div>
											</div>
										</div>

									</div>


									<div class="chat-feedback" v-else>
										<div class="text-notifer">
											<h3>Bids Received (2)</h3>	
										</div>
										<div class="chat-feedback-column job-bidding" v-for="reviewer in listing.review_details">
											<div class="chat-feedback-image" v-bind:style="{'background-image': 'url('+ reviewer.latest_review_image +')',}"></div>
											<div class="job-common-description">
												<h3 class="pointer">{{listing.job_title}}</h3>
												<div class="jobs-rating">
													<star-rating :star-size="20" read-only :rating="4" active-color="#8200ff"></star-rating>
													<div class="jobs-done">
														<span class="review-job">{{ reviewer.job_feedback }} Feedback reviews</span>				

														<span class="review-job" v-if="reviewer.job_perform == 0">No Jobs performed</span>
														<span class="review-job" v-else>{{ reviewer.job_perform }} Jobs performed</span>
													</div>	
												</div>											
											</div>										
											<div class="job-proposal">
												<div class="bit-offered">
													<span><i class="icon-work-briefcase"></i> Offer: 
														<strong>
															{{reviewer.job_bid_amount}}		
														</strong>
													</span>
													<span class="pull-right"><i class="icon-calendar-daily"></i> Date:
														<strong>
															{{reviewer.job_bid_data}}
														</strong>
													</span>
												</div>
												<div class="proposal-message">
													<p>{{reviewer.latest_review_description}}</p>
												</div>
												<div class="provider-bidding-btn">
													<a href="javascript:void(0);" class="btn btn-primary">View Profile</a>
													<a href="javascript:void(0);" class="btn btn-primary">Chat</a>													
													<a href="javascript:void(0);" @click="AwardJob" v-if="reviewer.job_visited == true" class="btn btn-primary">Award Job</a>

													<a href="javascript:void(0);" @click="VisitApproval" v-else class="btn btn-primary">Visit Approval</a>
												</div>
											</div>
										</div>

									</div>						

							</div>
						</div>

						<div class="col-md-3 p-l-0 p-r-0">

							<div class="service-provider" v-if="job_detail_right_panel == 'awarded'">
								<a href="javascript:void(0);" class="btn btn-primary"><i class="icon-trophy"></i> Job Awarded</a>					
								<a href="javascript:void(0);" class="btn btn-primary"><i class="icon-checkmark2"></i> Mark Done</a>					
								<a href="javascript:void(0);" class="btn btn-primary"><i class="icon-message"></i> Chat</a>					
								<a href="javascript:void(0);" class="btn btn-cancel-job"><i class="icon-folder"></i> Archive</a>								
							</div>


							<div class="service-provider" v-else-if="job_detail_right_panel == 'serviceprovider'">
														
								<a href="javascript:void(0);" class="btn btn-primary"><i class="icon-edit-pencil"></i> Modify Bid</a>	
								<a href="javascript:void(0);" class="btn btn-primary"><i class="icon-message"></i> Chat</a>	
								<a href="javascript:void(0);" class="btn btn-cancel-job"><i class="icon-folder"></i> Archive</a>								
							</div>

							<div class="service-provider" v-else-if="job_detail_right_panel == 'service-provider-customer-end' || job_detail_right_panel == 'serviceprovidercustomerend'">
														
								<a href="javascript:void(0);" class="btn btn-primary" @click="VisitPopup"><i class="icon-front-car"></i> Go to visit</a>	
								<a href="javascript:void(0);" class="btn btn-primary"><i class="icon-message"></i> Chat</a>	
								<a href="javascript:void(0);" class="btn btn-cancel-job"><i class="icon-folder"></i> Archive</a>								
							</div>							

							<div class="service-provider" v-else>
								<div class="service-providers-invite" v-bind:style="{'background-image': 'url('+ jobimage +')',}">
									<h3>Find &amp; invite service providers to bid on your job.</h3>
									<p>14 service providers available around you related to concrete flooring.</p>
									<a href="javascript:void(0);" @click="FindInvite" class="btn btn-primary">Find &amp; Invite</a>				
								</div>						
								<a href="javascript:void(0);" @click="Modify" class="btn btn-primary"><i class="icon-edit-pencil"></i> Modify Details</a>					
								<a href="javascript:void(0);" class="btn btn-cancel-job"><i class="icon-close2"></i> Cancel Job</a>								
							</div>

							
						</div>
					</div>

				</div>			
			</div>
			<award-job-popup @HideModalValue="HideModal" :showModalProp="awardjob"></award-job-popup>
			<visit-request-popup @HideModalValue="HideModal" :showModalProp="visitjob"></visit-request-popup>
			<go-to-visit-popup @HideModalValue="HideModal" :showModalProp="visitpopup"></go-to-visit-popup>			
	</div>
	<!-- <p>{{job_detail_right_panel}}</p> -->
	</div>
</template>


<script>
import StarRating from 'vue-star-rating';
import fancyBox from 'vue-fancybox';
export default {
  data () {
    return {
    	awardjob: false,
    	visitjob: false,
    	visitpopup: false,
    	jobimage: '/images/front/explore/concret.png',
    	job_detail_right_panel: this.$route.params.id,
    	reviewerimage: '/images/front/storage/personimage1.png',

        imageList: [
            { width: 900, height: 675, url: '/images/dummy/jobfileimage1.png' },
            { width: 900, height: 675, url: '/images/dummy/jobfileimage2.png' },
            { width: 900, height: 675, url: '/images/dummy/jobfileimage3.png' },
        ],


    	joblisting:[

	    	{
	    		job_title: 'M.D.S Joinery & Glazing',
	    		job_feedback: 180,
	    		job_perform: 208,
	    		job_full_rating: 4,
	    		job_category: 'Construction - Concrete Flooring',
	    		job_status: 'ACTIVE',
	    		job_awarded: 'Job not awarded yet',
	    		job_service: 'urgent',
	    		job_location: 'New York, NY',
	    		job_member_since: 'Jan, 2018',
	    		job_description: "Hi I'm Matt, I am a time served Joiner with over 15 years experience. I have NVQ 2 & 3 in Carpentry & Joinery. I hold a CSCS Gold card. I have a vast experience in installation of Timber, UPVC & Aluminium Windows & Doors. Also experienced in Secondary Glazing Installation.\r\n-  I offer a friendly, honest and punctual service \r\n-  Installation of timber and UPVC Windows & Doors. \r\n-  UPVC door/window Lock repairs & replacements. \r\n-  Also repair/replacing broken and misted double/single glazing. \r\n-  Made to measure Gates, Fencing and Decking. \r\n-  General Maintenance repairs etc. \r\n-  My work is carried out to high standards and resonably priced! \r\n-  No job too small. \r\n-  Get in touch for a quote.",

	    		review_details:[

		    		{

			    		latest_review_image: '/images/front/storage/personimage1.png',
			    		latest_review_description: 'Hi, we have a 10 years experience in home constructions and repairing including concrete flooring. Our team will get done this work within 3 days. Please contact for further discussion. The bid amount is based on the details you have provided however it may vary slightly. ',
			    		list_ratings: 5,
			    		job_feedback: 124,
			    		job_perform: 148,
			    		latest_reviewer_name: 'C&N Home Solutions',
			    		latest_review_post_date: 'August, 2018',
			    		job_bid_amount: '$250',
			    		job_bid_data: '12 Dec, 2017',
			    		job_visited: true,
		    		},

		    		{

			    		latest_review_image: '/images/front/storage/personimage2.png',
			    		latest_review_description: 'We have experienced team of talented workers who can do this job. Before quoting, we have some queries. Let’s chat to discuss further.',
			    		list_ratings: 4,
						job_feedback: 164,
			    		job_perform: 174,			    		
			    		latest_reviewer_name: 'Christopher Ward Joinery Services',
			    		latest_review_post_date: 'August, 2018',
			    		job_bid_amount: 'Visit Request',
			    		job_bid_data: '12 Dec, 2017',			    		
		    		},
	    			    			    			    		

	    		],
	    		my_bid:[
	    				{
				    		latest_review_image: '/images/front/storage/personimage2.png',
				    		latest_review_description: 'We have experienced team of talented workers who can do this job. Before quoting, we have some queries. Let’s chat to discuss further.',
				    		list_ratings: 4,
							job_feedback: 164,
				    		job_perform: 174,			    		
				    		latest_reviewer_name: 'Christopher Ward Joinery Services',
				    		latest_review_post_date: 'August, 2018',
				    		job_bid_amount: 'Visit Request',
				    		job_bid_data: '12 Dec, 2017',		    		
			    		}
	    		],


	    	},

	    		    	    		    	

    	],
 	
    	}
  	},

    methods: {
/*
    	AddCustomer() {
    		this.customer = true;
    	},

        changestatuspopup() {
            this.changestatus = true;
        },
        categorylisting(){
        	this.$router.push({name: 'Explore_Detail'});	
        },
        biddingdetails(){
            this.$router.push({name: 'BiddingDetails'});
        },*/
        open (e) {            
            fancyBox(e.target, this.imageList);
        },                        

        routerparama(){
        	this.list = this.$route.params.id
        	alert(this.$route.params.id);
        },
        FindInvite(){
        	this.$router.push({name: 'Explore_Detail'});
        },
        Modify(){
        	this.$router.push({name: 'Job-Post'});
        },        
        VisitPopup(){
        	this.visitpopup = true;
        },
        AwardJob(){
        	this.awardjob = true;
        },
        VisitApproval(){
			this.visitjob = true;
        },
        HideModal(){
            this.awardjob = false;
            this.visitjob = false;
            this.visitpopup = false;
        },        

    },
    components: {
        StarRating
    },

    mounted(){
    	routerparama();
    },

}
</script>
