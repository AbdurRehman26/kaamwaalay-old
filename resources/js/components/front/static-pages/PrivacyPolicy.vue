<template>
	<div class="category-detail">
		<div class="content" v-for="listing in joblisting">
			<div class="next-project grey-bg elementary-banner section-padd md border-bottom">
				<div class="container element-index text-center md">
					<div class="content-sec">
						<div class="category-content text-center">
							<h2>Privacy Policy</h2>								
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
						<div class="col-md-12">
							<div class="provider-information">						

									<div class="post-job-description" v-for="description in listing.job_description.split('\n')">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
										consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
										cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
										proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
									</div>					

							</div>
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
    	categoryimage: '/images/front/explore/mds.png',

    	jobimage: '/images/front/profile-images/logoimage1.png',
    	reviewerimage: '/images/front/profile-images/personimage1.png',

    	joblisting:[

	    	{
	    		job_title: 'M.D.S Joinery & Glazing',
	    		job_feedback: 180,
	    		job_perform: 208,
	    		job_full_rating: 4,
	    		job_location: 'New York, NY',
	    		job_member_since: 'Jan, 2018',
	    		job_description: "Hi I'm Matt, I am a time served Joiner with over 15 years experience. I have NVQ 2 & 3 in Carpentry & Joinery. I hold a CSCS Gold card. I have a vast experience in installation of Timber, UPVC & Aluminium Windows & Doors. Also experienced in Secondary Glazing Installation.\n-  I offer a friendly, honest and punctual service \n-  Installation of timber and UPVC Windows & Doors. \n-  UPVC door/window Lock repairs & replacements. \n-  Also repair/replacing broken and misted double/single glazing. \n-  Made to measure Gates, Fencing and Decking. \n-  General Maintenance repairs etc. \n-  My work is carried out to high standards and resonably priced! \n-  No job too small. \n-  Get in touch for a quote.",



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
