<template>
	<div class="category-detail" v-if="isService">
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
                         <div class="custom-multi category-detail" :class="{'invalid': isInvalid }">
                            <multiselect v-model="searchValue" :options="options"  placeholder="What service do you need?" track-by="id" label="title" :loading="isLoading"  class="ajax" open-direction="bottom" :searchable="true" :options-limit="300" :limit="8" :limit-text="limitText" :max-height="600" @search-change="asyncFind" name="search" @close="onTouch" :internal-search="false" :showNoResults="true" 
                            @select="dispatchAction" @keyup.enter="validateBeforeSubmit">
                              <span slot="noResult">No service found.</span>
                        </multiselect>
                    </div>
                    <div class="container-zip-code">
                     <i class="icon-location"></i>
                     <input type="number" placeholder="Zip code" class="form-control lg zip-code" v-model="zipCode" name="zip" :class="[(errorBag.first('zip') || isZipEmpty) ? 'is-invalid' : '']" v-validate="'required|numeric'" @keyup.enter="validateBeforeSubmit">
                 </div>
             </div>			
         </div>
         <div class="col-md-2 p-r-0">
           <button class="btn btn-primary" @click.prevent="validateBeforeSubmit" :class="[btnLoading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' , 'apply-primary-color' ]" :disabled="loading">
              <span>Search</span>
              <loader></loader>
          </button>
      </div>
  </div>
</div>
</div>

<h5 class="text-center enterzip" v-if="!zipCode">Please enter a zip code to view the list of service providers accordingly.</h5>
<no-record-found v-else-if="noRecordFound"></no-record-found>
<div class="job-post-container section-padd sm" v-if="!noRecordFound">
  <div class="container md">

     <div class="text-notifer" v-if="pagination">
        <p>{{(pagination? pagination.total: pagination) + " " + service.title}} service professionals found near you</p>
    </div>
    <div class="job-post-list" v-for="record in records" v-if="records.length" :class="[record.is_featured? 'featured' : '']">
        <div class="job-post-details">
           <div class="job-image pointer" @click="servicedetail(record.id)" v-bind:style="{'background-image': 'url('+ getImage(record.user_detail.profileImage) +')',}"></div>
           <div class="job-common-description">
              <h3 class="pointer" @click="servicedetail(record)">{{record.business_name}}</h3> 
              <span v-if="record.is_verified"><i class="icon-checked"></i></span>

              <div class="jobs-rating">
                 <star-rating :increment="0.5":star-size="20" read-only :rating="parseInt(record.avg_rating)" active-color="#8200ff"></star-rating>
                 <div class="jobs-done">
                    <span class="review-job">{{ record.total_feedback_count }} Feedback reviews</span>				

                    <span class="review-job" v-if="!record.finished_jobs">No Jobs performed</span>
                    <span class="review-job" v-else>{{ record.finished_jobs }} Jobs performed</span>
                </div>	
            </div>
            <a href="/job-post" v-if="!inBiddingJobs" class="btn btn-primary post-bid">Post Job &amp; Invite to Bid</a>

            <a href="#" v-if="inBiddingJobs" @click.prevent="invitePopup = true; userToSendInvite=record.user_detail" :class="['btn' , 'btn-primary', 'post-bid'  ]">
                Invite to Bid
            </a>


        </div>

        <div class="member-details">
          <p class="location">
             <i class="icon-location"></i> 
             Location <strong>{{ record.user_detail.city }}</strong>
         </p>
         <p class="member-since">
             <i class="icon-calendar-daily"></i>
             Member since <strong>{{record.formatted_created_at }}</strong>
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
         <div class="chat-feedback-image" v-bind:style="{'background-image': 'url('+ getImage(record.reviewedBy.user_detail.profileImage) +')',}"></div>
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
<div class="featured-categories section-padd sm  elementary-banner p-t-130" v-if="relatedServices.length">
  <div class="container element-index">

     <div class="category-section">  
        <div class="category-title">
           <h2>Related Services</h2>
       </div>  		
       <div class="category-items">
           <div class="items" v-for="subservice in filterRelatedServices(relatedServices)">
              <a @click="changecategorypopup(subservice)" href="javascript:void(0);">
                 <div class="item-image" v-bind:style="{'background-image': 'url('+ getImage(subservice.images? subservice.images[0].upload_url : null) +')',}"></div>
                 <h4>{{subservice.title}}</h4>
             </a>
         </div>
         <div class="showmore showmore-link clearfix" v-if="getRemainingSubServices(relatedServices).length">
          <div>
             <!-- element to collapse -->
             <a v-b-toggle="serviceTitle" :aria-controls="serviceTitle" href="javascript:void(0);" >View all related services<i class="icon-angle-right"></i></a>
             <b-collapse :id="serviceTitle">
                <b-card>
                   <div class="items service-remain-category" v-for="remainingSubServices in getRemainingSubServices(relatedServices)">
                      <a @click="changecategorypopup(remainingSubServices)" href="javascript:void(0);">
                         <!--<div class="item-image" v-bind:style="{'background-image': 'url('+ remainingSubServices.images[0].upload_url +')',}"></div>-->
                         <p>{{remainingSubServices.title}}</p>
                     </a>
                 </div>
             </b-card>
         </b-collapse>
     </div>
 </div>

</div>  	        	      		
</div>
</div>
<div class="elements">
 <img class="top-left" src="/images/front/banner-bg/bg-3-top.png">
 <img class="bottom-right width-max" src="/images/front/banner-bg/bg-8.png">
</div>        	
</div>

<invite-bid-popup :type="'job'" :user="userToSendInvite" :showModalProp="invitePopup" @HideModalValue="invitePopup = false;"></invite-bid-popup>

<category-popup @HideModalValue="hideZipModal" :showModalProp="categoryPopup" :selectedValue="selectedService" @onSubmit="onSelectCategory"></category-popup>
</div>
</div>
</template>


<script>
	import StarRating from 'vue-star-rating';

	export default {
		props: ['zip', 'serviceName', 'childServiceName'],
		data () {
			return {
                userToSendInvite : '',
                max: 6,
                noRecordFound: false,
                btnLoading: false,
                options: [],
                zipCode: '',
                isTouched: false,
                searchValue: '',
                isLoading: false,
                loading : false,
                pagination: '',
                records : [],
                url: '',
                serviceProviderUrl : null,
                service: '',
                serviceTitle: '',
                relatedServices: '',
                loading: false,
                categoryPopup: false,
                selectedService: '',
                isService: false,
                showCollapse: true,
                authUser: '',
                routeName: '',
                isZipEmpty: false,
                invitePopup : false,
                serName: '',
            }
        },
        computed : {
         requestUrl(){
            return this.serviceProviderUrl;
        },
        isInvalid () {
            return this.isTouched && !this.searchValue
        },
        inBiddingJobs(){
            let user = JSON.parse(this.$store.getters.getAuthUser);
            return user ? user.total_inbidding_jobs : false;
        }
    },
    methods: {
     onSelectCategory(val) {
        this.hideZipModal();
        localStorage.setItem("zip", val);
        if(this.selectedService.parent) {
            this.$router.push({ name: this.routeName, params: { serviceName: this.selectedService.parent.url_suffix, childServiceName: this.selectedService.url_suffix, zip : val }});
        }else {
          this.$router.push({ name: this.routeName, params: { serviceName: this.selectedService.url_suffix, zip : val }});  
        }
    },
    changecategorypopup(service) {
        this.selectedService = service;

        if(localStorage['zip']) {
           this.onSelectCategory(localStorage['zip']);
       }else {
           this.categoryPopup = true;	
       }
   },
   filterRelatedServices (subservices) {
    if(subservices.length > 3) {
       subservices = subservices.slice(0,3);
   }
   return subservices;
},
getRemainingSubServices (subservices) {
    if(subservices.length > 3) {
       subservices = subservices.slice(3);
       return subservices;
   }
   return [];
},
dispatchAction (actionName) {
    this.searchValue = '';
    this.options = [];
    this.loading = false;
},
limitText (count) {
    return `and ${count} other services`
},
validateBeforeSubmit() {
    this.$validator.validateAll().then((result) => {
       if (result && !this.loading) {
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
   this.serName = this.searchValue.url_suffix;
   localStorage.setItem('zip', this.zipCode);
   if(this.searchValue.parent) {
        this.$router.push({ name: this.routeName, params: { serviceName: this.searchValue.parent.url_suffix, childServiceName: this.searchValue.url_suffix, zip : this.zipCode }});
    }else {
      this.$router.push({ name: this.routeName, params: { serviceName: this.searchValue.url_suffix, childServiceName: null, zip : this.zipCode }}); 
    }
		},
		onTouch () {
			this.options = [];
			this.loading = false;
			this.isTouched = true;
		},
		asyncFind: _.debounce(function(query) {
			let self = this;

			this.loading = true;
			if(!query) {
				this.loading = false;
			}
			if(!query || query.length < 3) {
				return;
			};
			this.searchUrl  = 'api/service?keyword=' + query + '&filter_by_status=1';
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
		AddCustomer() {
			this.customer = true;
		},
		ViewCustomerDetail() {
			this.$router.push({name: 'customerdetail'});
			window.scrollTo(0,0);
		},
		changestatuspopup() {
			this.changestatus = true;
		},
		HideModal(){
			this.customer = false;
			this.viewcustomer = false;
			this.changestatus = false;
		},

		hideZipModal(){
			this.categoryPopup = false;
		},
		servicedetail(record){        	
			window.scrollTo(0,0);
            this.updateCampaignClickCount(record.user_id);
			this.$router.push({ name: 'service-provider-detail.view', params: { id: record.id }});
		},
    updateCampaignClickCount(id){
            let update = {
                'service_provider_user_id' : id,
                'type' : 'click',
            };
            let url = 'api/campaign/update-campaign';
            this.$http.post(url, update).then(response => {
            }).catch(error => {
            });
    },
		getService() {
			window.scrollTo(0,0);
			let self = this;
			this.checkRoute();
			this.btnLoading = true;
			this.$http.get(this.url).then(response => {
				response = response.data.response;
				if(!response.data.length) {
					//this.$router.push({name: '404'});
					return;
				}
				self.isService = response.data.length;
				self.service = response.data[0];
				self.getRelatedServices();
				self.searchValue = self.service;
				self.btnLoading = false;
				if(self.zipCode) {
					self.serviceProviderUrl = 'api/service-provider-profile?pagination=true&user_detail=true&is_approved=approved&filter_by_top_providers=true&filter_by_service='+self.serviceName+'&zip='+self.zipCode+'&from_explore=true';
				}

				window.scrollTo(0,0);

			}).catch(error=>{
				self.pagination = false;
				self.btnLoading = false;
			});
		},
		getRelatedServices() {
			let self = this;
			let url = 'api/service?filter_by_related_services=' + this.service.id;
			self.$http.get(url).then(response => {
				response = response.data.response;
				self.relatedServices = response.data;
			}).catch(error=>{
				self.pagination = false;
			});
		},
		getProviderRecords(response){
			let self = this;
			self.loading = false;
            //self.records = response.data;
            let len = response.data.length;
            for (var i = 0 ; i < len; i++) {
            	self.records.push( response.data[i] ) ;
            	
            }
            self.noRecordFound = response.noRecordFound;
            self.pagination = response.pagination;
        },
        checkRoute() {
          this.records = [];
          this.zipCode = this.zip? this.zip : this.zipCode;
          if(typeof(this.childServiceName) != "undefined" && !isNaN(this.childServiceName) && this.childServiceName){
            this.zipCode =  this.childServiceName;
          }
          if(typeof(this.childServiceName) != "undefined" && isNaN(this.childServiceName) && this.childServiceName) {
            this.url  = 'api/service?service_name=' + this.childServiceName;
          }else if(typeof(this.serviceName) != "undefined") {
            this.url  = 'api/service?service_name=' + this.serviceName;
          }
          if(typeof(this.zipCode) != "undefined") {
            let val = this.zipCode;
            if(val.length > 5) {
              val = val.substr(0, 5);
            }
            this.url += '&zip=' + val;
          }
        	if(!this.zipCode) {
        		this.validateBeforeSubmit();
        	}
        }

    },
    components: {
    	StarRating
    },

    watch: {
    	'service.title' (val) {
    		this.serviceTitle = val;
    	},
      serviceName(val) {
        // if(!val) {
        //   this.$router.push({ name: 'Explore'})
        // }
        this.serviceName = val;
        this.getService();
      },
    	childServiceName(val) {

    		// if(!val) {
    		// 	this.$router.push({ name: 'Explore'})
    		// }
    		this.childServiceName = val;
    		this.getService();
    	},
    	zip(val) {
    		if(val.length > 5) {
    			val = val.substr(0, 5);
    		}
    		this.zip = val;
    		this.getService();
    	},
    	zipCode(val) {
         this.isZipEmpty = false;
         if(val.length > 5) {
             val = val.substr(0, 5);
         }
         this.zipCode = val; 
     },
     searchValue(val) {
      if(val == null) {
         this.loading = false;
     }
 }
},
mounted(){	

  if(!this.zip) {
     localStorage.removeItem('zip');
     this.isZipEmpty = true;
 }
 this.authUser = JSON.parse(this.$store.getters.getAuthUser);
 this.routeName = 'Explore_Detail';
		// if(this.authUser) {
		// 	this.routeName = 'Customer_Explore_Detail';
		// }
       this.getService();
   },

}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>