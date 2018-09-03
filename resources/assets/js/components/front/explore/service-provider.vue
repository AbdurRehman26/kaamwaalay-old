<template>
	<div class="category-detail">
		<div class="next-project grey-bg elementary-banner section-padd md">
			<div class="container element-index text-center md">
				<div class="content-sec">
					<div class="category-image" v-bind:style="{'background-image': 'url('+ getImage(service.images? service.images[0].upload_url : null) +')',}"></div>
					<div class="category-content">
						<h2>{{service.title}}</h2>
						<p>{{service.description}}</p>
						<p><strong>Are you looking to find a {{service.title}} for hire?</strong> Then, we can help. When you post a job you will receive custom bids from local {{service.title}}!</p>
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
							<div :class="{'invalid': isInvalid }">
								<multiselect v-model="searchValue" :options="options"  placeholder="What service do you need?" track-by="id" label="title" :loading="isLoading"  id="ajax" open-direction="bottom" :searchable="true" :options-limit="300" :limit="3" :limit-text="limitText" :max-height="600" @search-change="asyncFind" name="search" @close="onTouch">
									<span slot="noResult">No Service found. Consider changing the search query.</span>
								</multiselect>
							</div>
							<div class="container-zip-code">
								<i class="icon-location"></i>
								<input type="number" placeholder="Zip code" class="form-control lg zip-code" v-model="zipCode" name="zip" :class="[errorBag.first('zip') ? 'is-invalid' : '']" v-validate="'required'">
							</div>
						</div>			
					</div>
					<div class="col-md-2 p-r-0">			
						<button class="btn btn-primary" @click="validateBeforeSubmit" :class="[btnLoading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' , 'apply-primary-color' ]">
							<span>Search</span>
            				<loader></loader>
						</button>
					</div>
				</div>
			</div>
		</div>


         <no-record-found v-if="noRecordFound"></no-record-found>
		<div class="job-post-container section-padd sm" v-if="!noRecordFound">
			<div class="container md">

				<div class="text-notifer">
					<p>{{service.title}} service professionals found near you</p>
				</div>

				<div class="job-post-list" v-for="record in records" v-if="record.profile_request">
					<div class="job-post-details">
						<div class="job-image pointer" @click="servicedetail" v-bind:style="{'background-image': 'url('+ getImage(record.user_detail.profile_image) +')',}"></div>
						<div class="job-common-description">
							<h3 class="pointer" @click="servicedetail">{{record.business_name}}</h3> 
							<span v-if="record.profile_request && record.profile_request.status == 'approved'"><i class="icon-checked"></i></span>
							
							<div class="jobs-rating">
								<star-rating :star-size="20" read-only :rating="parseInt(record.avg_rating)" active-color="#8200ff"></star-rating>
								<div class="jobs-done">
									<span class="review-job">{{ record.total_feedback_count }} Feedback reviews</span>				

									<span class="review-job" v-if="!record.finished_jobs">No Jobs performed</span>
									<span class="review-job" v-else>{{ record.finished_jobs }} Jobs performed</span>
								</div>	
							</div>
							<a href="/job-post" class="btn btn-primary post-bid">Post Job &amp; Invite to Bid</a>
						</div>

						<div class="member-details">
							<p class="location">
								<i class="icon-location"></i> 
								Location <strong>{{ record.user_detail.city }}</strong>
							</p>
							<p class="member-since">
								<i class="icon-calendar-daily"></i>
								Member since <strong>{{record.profile_request.formatted_created_at }}</strong>
							</p>
						</div>

						<div class="post-job-description">
							<p>{{ record.business_details }}</p>
						</div>

						<div class="chat-feedback" v-if="record.reviewedBy">
							<div class="text-notifer">
								<p>Latest feedback & review</p>	
							</div>
							<div class="chat-feedback-column">
								<div class="chat-feedback-image" v-bind:style="{'background-image': 'url('+ getImage(record.reviewedBy.user_detail.profile_image) +')',}"></div>
								<div class="chat-feedback-message">
									<p>{{record.reviewedBy.review.message}}</p>
									<div class="feeback-detail">
										<p class="feedback-personal-info">
											<a href="javascript:void(0);">{{record.reviewedBy.user_detail.first_name + " " + record.reviewedBy.user_detail.last_name}}</a>
											posted on 
											<strong>{{record.reviewedBy.review.formatted_created_at}}</strong>
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

		<vue-common-methods :url="requestUrl" :infiniteLoad="true" @get-records="getProviderRecords"></vue-common-methods>
		<div class="featured-categories section-padd sm  elementary-banner p-t-130">
			<div class="container element-index">

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
						<div class="showmore"><a href="/explore/service_provider">View all services related to electricians <i class="icon-keyboard_arrow_right"></i></a></div>

					</div>  	        	      		
				</div>
			</div>
			<div class="elements">
				<img class="top-left" src="/images/front/banner-bg/bg-3-top.png">
				<img class="bottom-right width-max" src="/images/front/banner-bg/bg-8.png">
			</div>        	
		</div>
	</div>
	</div>
</template>


<script>
	import StarRating from 'vue-star-rating';

	export default {
		props: ['serviceId', 'zip'],
		data () {
			return {
				noRecordFound: false,
				btnLoading: false,
				options: [],
				zipCode: '',
				isTouched: false,
				searchValue: '',
				isLoading: false,
            	loading : false,
				noRecordFound : false,
				pagination: [],
				records : [],
				serviceProviderUrl : 'api/service-provider-profile?pagination=true&user_detail=true&filter_by_service='+this.serviceId+'&zip='+this.zip,
				service: '',
				categoryimage: '/images/front/explore/carpenter1.jpg',

				jobimage: '/images/front/profile-images/logoimage1.png',
				reviewerimage: '/images/front/profile-images/personimage1.png',
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

	    computed : {
	        requestUrl(){
	            return this.serviceProviderUrl;
	        },
		    isInvalid () {
		      return this.isTouched && !this.searchValue
		    }
	    },
		methods: {
		    limitText (count) {
		      return `and ${count} other services`
		    },
            validateBeforeSubmit() {
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        this.ServiceProviderPage();
                        this.errorMessage = "";
                        return;
                    }
                    this.errorMessage = this.errorBag.all()[0];
                });
            },  

			ServiceProviderPage() {
				this.isTouched = false;
				if(!this.searchValue) {
					this.isTouched = true;
					return;
				}
				this.serviceId = this.searchValue.id;
				this.zip = this.zipCode;
				this.getService(); 
			},
			onTouch () {
		      this.isTouched = true
		    },
			asyncFind: _.debounce(function(query) {
				let self = this;
		        this.searchUrl  = 'api/service?keyword='+query;
				this.isLoading = true;
				this.$http.get(this.searchUrl).then(response => {
					response = response.data.response;
					self.options = response.data;
					self.isLoading = false;

				}).catch(error=>{
				});
			}, 1000),
	        getImage(img) {
	        	return img? img : 'images/dummy/image-placeholder.jpg';
	        },
			startLoading(){
	            this.loading = true;
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
				this.$router.push({name: 'Service_Provider_Detail'});
			},
			getService() {
				let self = this;
				let id = this.serviceId;
				this.btnLoading = true;
				this.searchUrl  = 'search/explore/'+id;
				self.$http.get(this.searchUrl).then(response => {
			    	response = response.data.response;
					self.service = response.data;
					self.categoryimage = self.getImage(self.service.images);
					self.btnLoading = false;
					self.serviceProviderUrl = 'api/service-provider-profile?pagination=true&user_detail=true&filter_by_service='+self.serviceId+'&zip='+self.zip;
			    }).catch(error=>{
			    	if(error.status == 403) {
			    		self.pagination = false;
			    	}
			    });
			},
	        getProviderRecords(response){
	            let self = this;
	            self.loading = false;
	            self.records = response.data;
	            self.noRecordFound = response.noRecordFound;
	            self.pagination = response.pagination;
	        },

		},
		components: {
			StarRating
		},

		watch: {
			serviceId(val) {
				this.serviceId = val;
			}
		},
		mounted(){
			this.getService();
		},

	}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>