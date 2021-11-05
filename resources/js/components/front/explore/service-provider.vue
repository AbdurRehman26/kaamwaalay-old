<template>

    <div class="category-detail">
        <block-spinner v-if="!isService"></block-spinner>
        <div class="next-project grey-bg elementary-banner section-padd md" v-if="isService">
            <div class="container element-index text-center md" style="left: 0">
                <div class="content-sec">
                    <div class="category-image" v-bind:style="{'background-image': 'url('+ getImage(service.images? service.images[0].name : null) +')',}"></div>
                    <div class="category-content">
                        <h2>{{service.title}}</h2>
                        <p>{{service.description}}</p>
                        <p><strong>Are you looking to find a {{service.title}} for hire?</strong> Then, we can help. When you post a job you will receive custom bids from local {{service.title}}!</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grey-bg section-padd xs border-top-bottom">
            <div class="container md">
                <div class="row">
                    <div class="col-md-10 p-r-0">
                        <div class="search-filter m-b-0">
                            <div class="custom-multi category-detail" :class="{'invalid': isInvalid }">
                                <multiselect v-model="searchServiceValue" :options="servicesList"  placeholder="What service do you need?" track-by="id" label="title" :loading="isLoading"  class="ajax" open-direction="bottom" :options-limit="300" :limit="8" :limit-text="limitText" :max-height="600" name="search" @close="onTouch" :internal-search="true">
                                <span slot="noResult">No service found.</span>
                            </multiselect>
                        </div>
                        <div class="container-zip-code">

        										<multiselect  v-model="searchAreaValue" :options="areasList"  placeholder="Where do you need?" track-by="id" label="name"  open-direction="bottom" :searchable="true" :options-limit="500" :limit="8" :max-height="700" name="search" :internal-search="true" :showNoResults="true">
        												<span slot="noResult">No service found.</span>
        										</multiselect>

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

    <no-record-found v-if="noRecordFound"></no-record-found>
    <div class="job-post-container section-padd sm" v-if="!noRecordFound">
        <div class="container md">
            <div class="text-notifer" v-if="isPagination && records.length">
                <p>{{isPagination.total + " " + service.title}} service professionals found near to you.</p>
            </div>
            <div class="job-post-list" v-for="record in records" v-if="records.length" :class="[record.is_featured? 'featured' : '']">
                <div class="job-post-details">
                    <div class="job-image pointer" v-bind:style="{'background-image': 'url('+ getImage(record.user_detail.profileImage) +')',}"></div>
                    <div class="job-common-description">
                        <h3 class="pointer" @click="servicedetail(record)">{{record.business_name}}</h3>
                        <span v-if="record.is_verified"><i class="icon-checked"></i></span>
                        <div class="jobs-rating">
                            <div class="jobs-done">
                                <span class="review-job" v-if="!record.finished_jobs">No Jobs performed</span>
                                <span class="review-job" v-else>{{ record.finished_jobs }} Jobs performed</span>
                            </div>
                        </div>
                        <a :href="postJobRoute+'&service_provider_user_id='+record.user_detail.id" v-if="!inBiddingJobsCount" class="btn btn-primary post-bid">Post Job &amp; Invite</a>

                        <a href="#" v-if="inBiddingJobsCount" @click.prevent="invitePopup = true; userToSendInvite=record.user_detail" :class="['btn' , 'btn-primary', 'post-bid'  ]">
                            Invite
                        </a>


                    </div>

                    <div class="member-details">
                        <p class="location">
                            <i class="icon-location"></i>
                            Location <strong>{{record.user_detail.city + (record.user_detail.state? ', ' +record.user_detail.state : "")}}</strong>
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
            <block-spinner v-if="isLoadProvider"></block-spinner>
        </div>
    </div>

<div class="featured-categories section-padd sm  elementary-banner p-t-130" v-show="relatedServices.length">
    <vue-common-methods
        :url="requestUrl"
        :infiniteLoad="true"
        :force="forcePagination"
        :hideLoader="true"
        @get-records="getProviderRecords"
        @custom-start-loading="startLoading"
        >
    </vue-common-methods>
    <div class="container element-index" style="left: 0;">

        <div class="category-section">
            <div class="category-title">
                <h2>Related Services</h2>
            </div>
            <div class="category-items">
                <div class="items" v-for="subservice in filterRelatedServices(relatedServices)">
                    <a @click="changecategorypopup(subservice)" href="javascript:void(0);">
                        <div class="item-image" v-bind:style="{'background-image': 'url('+ getImage(subservice.images? subservice.images[0].name : null) +')',}"></div>
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

<invite-bid-popup :type="'job'" :user="userToSendInvite" :showModalProp="invitePopup" @HideModalValue="invitePopup = false;" :jobs="jobs" ></invite-bid-popup>

<category-popup @HideModalValue="hideZipModal" :showModalProp="categoryPopup" :selectedValue="selectedService" @onSubmit="onSelectCategory"></category-popup>
</div>
</div>
</template>


<script>
    import StarRating from 'vue-star-rating';

    export default {
        props: ['zip', 'serviceName', 'childServiceName'],
        components: {
            StarRating
        },
        data () {
            return {
                allServices: [],
                allCityAreas: [],
                searchAreaValue: '',
                forcePagination: false,
                userToSendInvite : '',
                max: 6,
                noRecordFound: false,
                btnLoading: false,
                options: [],
                zipCode: '',
                isTouched: false,
                searchServiceValue: '',
                isLoading: false,
                loading : false,
                isPagination: '',
                records : [],
                groupByRecords : [],
                url: '',
                serviceProviderUrl : null,
                service: '',
                serviceTitle: '',
                relatedServices: '',
                loading: false,
                isLoadProvider: true,
                categoryPopup: false,
                selectedService: '',
                serviceSuffix: '',
                isService: false,
                showCollapse: true,
                authUser: '',
                routeName: '',
                isZipEmpty: false,
                invitePopup : false,
                serName: '',
                jobs : '',
                service_url_suffix : '',
                inBiddingJobsCount: 0,
            }
        },
        computed : {
            servicesList(){
              return this.allServices;
            },

            areasList(){
              return this.$store.getters.getAreasList;
            },
            requestUrl(){
                return this.serviceProviderUrl;
            },
            isInvalid () {
                return this.isTouched && !this.searchServiceValue
            },
            inBiddingJobs(){
                let user = JSON.parse(this.$store.getters.getAuthUser);
                return user ? user.total_inbidding_jobs : false;
            },
            postJobRoute(){
                let zipCode = '';
                let serviceName = '';
                var params = Object.keys(this.$route.params);

                // Had to do this -> not my fault
                // Due to change in requirement i-e added parent service parameter in route url

                if(params.length == 3 && !this.$route.params.zip){

                    zipCode = this.$route.params.childServiceName;
                    serviceName = this.$route.params.serviceName;

                }else if(params.length == 2){

                    zipCode = this.$route.params.zip;
                    serviceName = this.$route.params.serviceName;

                }else if(params.length == 3 && this.$route.params.zip){

                    zipCode = this.$route.params.zip;
                    serviceName = this.$route.params.childServiceName;

                }else{

                }

                this.service_url_suffix = serviceName;

                return '/job-post?service_name='+serviceName+'&zip='+zipCode;
            }
        },
        methods: {
            getList(data , page , successCallback) {
              let self = this;
              self.loadingService = true;
              let url = 'api/service';

              if(typeof(page) == 'undefined' || !page){
                self.allServices = [];
              }

                self.$http.get(url).then(response => {
                  response = response.data;
                  self.allServices = response.data;
                  if(!self.allServices.length) {
                    self.showNoRecordFound = true;
                  }

                self.loadingService = false;
                  successCallback(true);

                }).catch(error=>{
                  if(error.status == 403) {
                    self.pagination = false;
                  }
                self.loadingService = false;

                });
            },

            getCityAreaList(data , page , successCallback) {
              let self = this;
              self.loadingAreas = true;
              let url = 'api/city-area';

                if(typeof(page) == 'undefined' || !page){
                  self.records = [];
                }

                self.$http.get(url).then(response => {
                  response = response.data;
                  self.allCityAreas = response.data;
                  self.$store.commit('setAreasList', self.allCityAreas)
                  if(!self.allCityAreas.length) {
                    self.showNoRecordFound = true;
                  }

                  self.loadingAreas = false;
                  self.getCityArea();
                  successCallback(true);

                }).catch(error=>{
                  if(error.status == 403) {
                    self.pagination = false;
                  }
                self.loadingAreas = false;

                });
            },

            startLoading(isLoading) {
                this.isLoadProvider = isLoading;
            },
            getInBiddingJobs() {
                let self = this;
                let url = 'api/job-invite-to-bid';
                self.$http.get(url).then(response=>{
                    response = response.data;
                    this.jobs = response.data;
                    self.inBiddingJobsCount = response.data.length;

                }).catch(error=>{


                });
            },
            onSelectCategory(cityArea) {
                this.hideZipModal();
                if(this.selectedService.parent) {
                    localStorage.setItem("parentService", this.selectedService.parent.url_suffix);
                    localStorage.setItem("childService", this.selectedService.url_suffix);
                    this.$router.push({ name: this.routeName, params: { serviceName: this.selectedService.parent.url_suffix, childServiceName: this.selectedService.url_suffix, cityArea : cityArea.slug }});
                }else {
                    localStorage.setItem("parentService", this.selectedService.url_suffix);
                    localStorage.setItem("childService", "");
                    this.$router.push({ name: this.routeName, params: { serviceName: this.selectedService.url_suffix, cityArea : cityArea.slug }});
                }
            },
            changecategorypopup(service) {
                this.selectedService = service;
                this.categoryPopup = true;
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
                this.searchServiceValue = '';
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
        			this.btnLoading = true;
        			this.isTouched = false;
        			if(!this.searchServiceValue) {
        				this.btnLoading = false;
        				this.isTouched = true;
        				return;
        			}
        			if(this.searchServiceValue.parent) {
                        localStorage.setItem("parentService", this.searchServiceValue.parent.url_suffix);
                        localStorage.setItem("childService", this.searchServiceValue.url_suffix);
           							this.$router.push({ name: this.routeName, params: { serviceName: this.searchServiceValue.parent.url_suffix, childServiceName: this.searchServiceValue.url_suffix, cityArea : this.searchAreaValue?.slug }});
        			}else {
                        localStorage.setItem("parentService", "");
                        localStorage.setItem("childService", this.searchServiceValue.url_suffix);
        								this.$router.push({ name: this.routeName, params: { serviceName: this.searchServiceValue.url_suffix, cityArea : this.searchAreaValue?.slug }});
        			}

        		},
            onTouch () {
                this.loading = false;
                this.isTouched = true;
            },
            getImage(img) {
                return img? img : 'images/dummy/image-placeholder.jpg';
            },
            AddCustomer() {
                this.customer = true;
            },
            ViewCustomerDetail() {
                this.$router.push({name: 'customerdetail'});
                window.scrollTo(0, 0);
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

                if(record.is_featured){
                    this.updateCampaignClickCount(record.user_id);
                }

                let routeData = this.$router.resolve({ name: 'service-provider-detail.view', params: { id: record.id }, query: { zip: this.zipCode , service_name : this.service_url_suffix }});
                window.open(routeData.href, '_blank');

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
            getCityArea(){
              let self = this;


              _.forEach(self.areasList, function(cityArea, key) {
                  if(self.$route.params.cityArea == cityArea.slug){
                    self.searchAreaValue = cityArea;
                  }
              });


            },
            getService() {
                let self = this;
                this.checkRoute();
                window.scrollTo(0, 0);
                this.btnLoading = true;
                self.isService = false;
                this.$http.get(this.url).then(response => {
                    response = response.data;
                    if(!response.data.length) {
                        return;
                    }
                    self.isService = response.data.length;
                    self.service = response.data[0];
                    self.searchServiceValue = self.service;
                    self.getRelatedServices();
                    self.btnLoading = false;

                    if(!self.serviceSuffix) {
                        self.serviceSuffix = self.serviceName;
                    }
                    self.serviceProviderUrl = 'api/service-provider-profile?pagination=true&user_detail=true&is_approved=approved&filter_by_top_providers=true&filter_by_service='+self.serviceSuffix+'&city_area='+self.$route.params.cityArea+'&from_explore=true';


                }).catch(error=>{
                    self.isPagination = false;
                    self.btnLoading = false;
                });
            },
            getRelatedServices() {
                let self = this;
                let url = 'api/service?filter_by_related_services=' + this.service.id;
                self.$http.get(url).then(response => {
                    response = response.data;
                    self.relatedServices = response.data;
                }).catch(error=>{
                    self.isPagination = false;
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
                // self.groupByRecords = _.groupBy(self.records, function(element) {
                //     return element.user_detail.zip_code;
                // });
                self.noRecordFound = response.noRecordFound;
                self.isPagination = response.pagination;
            },
            checkRoute() {
                this.records = [];
                this.zipCode = this.zip? this.zip : this.zipCode;
                if(typeof(this.childServiceName) != "undefined" && !isNaN(this.childServiceName) && this.childServiceName){
                    this.zipCode =  this.childServiceName;
                    localStorage.setItem("zip", this.zipCode);
                    this.serviceSuffix = "";
                }
                if(typeof(this.childServiceName) != "undefined" && isNaN(this.childServiceName) && this.childServiceName) {
                    this.url  = 'api/service?service_name=' + this.childServiceName;
                    localStorage.setItem("childService", this.childServiceName);
                    this.serviceSuffix = this.childServiceName;
                }else if(typeof(this.serviceName) != "undefined") {
                    this.url  = 'api/service?service_name=' + this.serviceName;
                    localStorage.setItem("parentService", this.serviceName);
                }
            },

},
created() {
  this.getList();
},
watch: {
    '$route' (to, from) {
        location.reload();
        this.getService();
        window.scrollTo(0,0);
    },
    'service.title' (val) {
        this.serviceTitle = val;
        setTimeout(function(){
            window.scrollTo(0,0);
        }, 1000);
    },
    serviceName(val) {
// if(!val) {
//   this.$router.push({ name: 'Explore'})
// }
this.serviceName = val;
//this.getService();
},
childServiceName(val) {

// if(!val) {
// 	this.$router.push({ name: 'Explore'})
// }
this.childServiceName = val;
//this.getService();
},
searchServiceValue(val) {
    if(val == null) {
        this.loading = false;
    }
}
},
mounted(){
    this.getInBiddingJobs();
    this.authUser = JSON.parse(this.$store.getters.getAuthUser);
    this.routeName = 'Explore_Detail';
    this.getService();
    this.getCityAreaList({},false);

},

}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
