<template>

	<div class="container md">

		<div class="job-post-list" v-for="record in records">
			<div class="job-post-details">
				<div class="job-image pointer" @click="servicedetail" v-bind:style="{'background-image': 'url('+ getImage(getJobUser(record)) +')',}"></div>

				<div class="job-common-description job-perform">
					<div class="col-md-6 p-l-0">
						<h3 class="pointer" @click="servicedetail">{{record.job.title}}</h3> 
						<div class="job-notification">									
							<div class="jobs-done">											
								<span class="job-poster">Posted By <a href="javascript:void(0);" @click="showProfile()">{{getUserName(getJobUser(record))}}</a></span>		
								<span class="job-category noborder">{{ getJobCategory(record.job) }}</span>											
							</div>	
						</div>
					</div>
					<div class="col-md-6 job-bid-btn p-r-0">
						<a href="javascript:void(0);" @click="$emit('chatmessage')" class="chat-message" :class="{disable: chat_message === false}"><i class="icon-message"></i></a>						
						<a href="javascript:void(0);" @click="servicedetail" class="btn btn-primary post-bid">View Details</a>
					</div>
				</div>

				<div class="member-details">
					<p class="location">
						<i class="icon-location"></i> 
						Location <strong>{{ record.job.state }}</strong>
					</p>
					<p class="offer">
						<i class="icon-work-briefcase"></i> 
						Offer: <strong>{{ getJobAmount(record.amount) }}</strong> - <a @click="$emit('changebid')" href="javascript:void(0);">Change Bid</a>
					</p>

					<p class="member-since">
						<i class="icon-calendar-daily"></i>
						Post Date <strong>{{ record.formatted_created_at }}</strong>
					</p>
				</div>

				<div class="post-job-description">
					<p>{{ record.description }}</p>
				</div>

				<div class="job-details">
					<p class="customer-rating">									
						<strong>Customer rating:</strong>
						<star-rating :star-size="20" read-only :rating="getRating(getJobUser(record))" active-color="#8200ff"></star-rating>
					</p>								
					<p class="service-requirment">
						<i class="icon-brightness-down"></i>
						Service required 
						<strong v-if="record.job_type == 'urgent'" class="urgent">{{ record.job_type }}</strong>
						<strong v-else>{{ record.preferred_date }}</strong>
					</p>
				</div>				
			</div>
		</div>
		<vue-common-methods :url="url" :infiniteLoad="true" @get-records="getProviderRecords"></vue-common-methods>
	</div>			

</template>

<script>
	import StarRating from 'vue-star-rating';

	export default {
		props: ['show', 'count'],
		data () {
			return {
				url: null,
				user: '',
				records : [],
				chat_message: false,
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
			formatMoney(val, c, d, t) {
			    var n = val, 
			    c = isNaN(c = Math.abs(c)) ? 2 : c, 
			    d = d == undefined ? "." : d, 
			    t = t == undefined ? "," : t, 
			    s = n < 0 ? "-" : "", 
			    i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))), 
			    j = (j = i.length) > 3 ? j % 3 : 0;
			   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
			},
			getRating(record) {
				return parseInt(record.avg_rating);
			},
			getJobAmount(amount) {
				return '$' + this.formatMoney(amount, 2, '.', ',');
			},
			getJobCategory(job) {
				var category = "";
				if(job.service.parent_id) {
					category = category + job.service.parent.title + " - ";
				}
				return category + job.service.title;
			},
			getJobUser(record) {
				return record.job.user;
			},
			getUserName(record) {
				return record.first_name + " " + record.last_name;
			},
			getImage(record) {
				return record.profile_image? record.profile_image : 'images/dummy/image-placeholder.jpg';
			},
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
				this.$router.push('/job-details/serviceprovider');
			},
			showProfile(){
				this.$router.push({name: 'Service_Provider_Detail'});
			},		
	        getProviderRecords(response){
	            let self = this;
	            self.loading = false;
	            let len = response.data.length;
			    for (var i = 0 ; i < len; i++) {
			        self.records.push( response.data[i] ) ;
			        
			    }
	            this.$emit("recordCount", response.pagination? response.pagination.total : count);
	            self.noRecordFound = response.noRecordFound;
	            self.pagination = response.pagination;
	        },	

		},
		components: {
			StarRating
		},
		computed: {
			requestUrl() {
				//return 'api/job-bid?pagination=true&filter_by_invitation=1&filter_by_archived=0&filter_by_completed=invited&filter_by_awarded=0&filter_by_active_bids=0&user_id=' + this.user.id;
				return null;
			}
		},
		mounted(){
			window.scrollTo(0,0);
			this.user = JSON.parse(this.$store.getters.getAuthUser);
		},
		watch: {
			show(val) {
				if(val) {
					this.url = 'api/job-bid?pagination=true&filter_by_job_detail=true&filter_by_invitation=1&filter_by_archived=1';
				}else {
					//this.url = null;
					//self.pagination = false;
				}
			}
		}

	}
</script>
