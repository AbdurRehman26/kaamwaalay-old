<template>

	<div class="container md">

		<div class="job-post-list" v-for="listing in joblisting">
			<div class="job-post-details">
				<div class="job-image pointer" @click="servicedetail" v-bind:style="{'background-image': 'url('+ listing.job_title_image +')',}"></div>

				<div class="job-common-description job-perform">
					<div class="col-md-6 p-l-0">
						<div class="job-main-title">
							<h3 class="pointer" @click="servicedetail">{{listing.job_title}}</h3> <span><i class="icon-checked"></i><i class="icon-info pointer" @click="$emit('showinformation')"><img src="/images/front/svg/info.svg"></i></span>
						</div>
						<div class="job-notification">									
							<div class="jobs-done">											
								<span class="job-poster">Posted By <a href="javascript:void(0);" @click="showProfile()">{{ listing.job_poster }}</a></span>		
								<span class="job-category noborder">{{ listing.job_category }}</span>											
							</div>	
						</div>
					</div>
					<div class="col-md-6 job-bid-btn p-r-0">
						<a href="javascript:void(0);" @click="$emit('chatmessage')" class="chat-message" :class="{disable: listing.chat_message === false}"><i class="icon-message"></i></a>						
						<a href="javascript:void(0);" @click="servicedetail" class="btn btn-primary post-bid">View Details</a>
					</div>
				</div>

				<div class="member-details">
					<p class="location">
						<i class="icon-location"></i> 
						Location <strong>{{ listing.job_location }}</strong>
					</p>
					<p class="offer">
						<i class="icon-work-briefcase"></i> 
						Offer: <strong>{{ listing.job_offer }}</strong> - <a @click="$emit('changebid')" href="javascript:void(0);">Change Bid</a>
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
					job_title_image: '/images/front/profile-images/bidimage1.png',
					job_title: 'Concrete Floor Building',
					job_poster: 'Nathan Alvarez',
					job_category: 'Construction - Concrete Flooring',
					job_status: 'Active',
					job_perform: 270,
					job_service: 'within a week',
					job_location: 'New York, NY',
					chat_message: false,
					job_offer: '$250',
					job_post_date: '24 Jan, 2018',
					job_description: 'Room size is approx. 12 x 8 Ft with one side having a roller door. On two sides it is a sandstone wall and the other two it is breeze block wall, floor is currently a brick flooring. I would like someone to concrete over this up to the height of the roller door and then provide a slight ramp up to the roller door height.',
					list_ratings: 5,
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
				window.scrollTo(0,0);
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
				window.scrollTo(0,0);
				this.$router.push('/job-details/serviceprovider');
			},
			showProfile(){
				window.scrollTo(0,0);
				this.$router.push({name: 'Service_Provider_Detail'});
			},			

		},
		components: {
			StarRating
		},

		mounted(){

		}

	}
</script>
