<template>
    <div class="my-job-lising-content">
        <div class="search-fixture">
            <div class="grey-bg section-padd xs border-top-bottom search-fix">
                <div class="container element-index">
                    <div class="content-inner md">
                        <h1 class="heading-large">Find best skilled service professionals near you.</h1>
                        <div class="search-filter">
                            <div class="custom-multi" :class="{ 'invalid': isInvalid }">
                                <multiselect v-model="searchValue" :options="servicesList"  placeholder="What service do you need?" track-by="id" label="title" :loading="isLoading"  id="ajax" open-direction="bottom" :searchable="true" :options-limit="300" :limit="3" :limit-text="limitText" :max-height="600"  @search-change="asyncFind" name="search" >
                                    <span slot="noResult">No Service found. Consider changing the search query.</span>
                                </multiselect>
                            </div>
                            <div class="container-zip-code">
                                <i class="icon-location"></i>
                                <label for="">City</label>
                                <select v-model="selectedCity" class="form-control" name="city">
                                  <option value="">Select City</option>
                                  <option v-for="city in cities" :value="city.id">{{city.name}}</option>
                              </select> 
                          </div>
                          <button class="btn btn-primary" @click="validateBeforeSubmit">
                            <span>Search</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="category-section-search">
            <h1 class="m-b-0">General Carpentry Jobs in New York, NY</h1>
        </div>

        <div class="job-post-container section-padd sm">
            <div class="container md">

                <div class="job-post-list" v-for="record in records">
                    <div class="job-post-details">
                        <div class="job-image pointer" @click="servicedetail" v-bind:style="{'background-image': 'url('+ record.user.profileImage +')',}"></div>

                        <div class="job-common-description job-perform">
                            <div class="col-md-6 p-l-0">
                                <div class="job-main-title">
                                    <h3 class="pointer" @click="servicedetail">{{record.title}}</h3> <span><i class="icon-info pointer" @click="showinfo"><img src="/images/front/svg/info.svg"></i></span>
                                </div>
                                <div class="job-notification">
                                    <div class="jobs-done">
                                        <span class="job-poster">Posted By <a href="javascript:void(0);" @click="showProfile">{{ record.user | fullName }}</a></span>
                                        <span class="job-category noborder">{{ record.service | mainServiceOrChildService('-') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 job-bid-btn p-r-0">
                                <a href="javascript:void(0);" v-if="!record.my_bid" @click="ChangeBid" class="btn btn-primary post-bid m-r-10">Bid Now</a>
                                <a @click="showchatpanel()" href="javascript:void(0);" v-else class="chat-message"><i class="icon-message"></i></a> <a href="javascript:void(0);" @click="servicedetail" class="btn btn-primary post-bid">View Details</a>
                            </div>
                        </div>

                        <div class="member-details">
                            <p class="location">
                                <i class="icon-location"></i>
                                Location <strong>{{ record.city  }}, {{ record.state}}</strong>
                            </p>
                            <p class="offer" v-if="record.my_bid">
                                <i class="icon-work-briefcase"></i>
                                Offer: <strong>
                                {{ record.my_bid.is_tbd ? 'TBD' : record.my_bid.amount }}
                                </strong> - <a v-if="!record.my_bid.is_awarded" @click="ChangeBid" href="javascript:void(0);">Change Bid</a>
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
                                <star-rating :increment="0.5" :star-size="20" read-only :rating="[record.user ? parseFloat(record.user.average_rating) : 0]" active-color="#8200ff"></star-rating>
                            </p>
                            <p class="service-requirment">
                                <i class="icon-brightness-down"></i>
                                Service required
                                <strong v-if="record.job_type == 'urgent'" class="urgent">{{ record.job_type }}</strong>
                                <strong v-else-if="record.preference == 'choose_date'">{{ record.formatted_schedule_at }}</strong>
                                <strong v-else>{{ record.preference | jobPreference }}</strong>
                            </p>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <post-bid-popup @HideModalValue="HideModal" :showModalProp="bidpopup"></post-bid-popup>
    </div>
    <chat-panel v-show="isShowing" @CloseDiscussion='CloseDiscussion()'></chat-panel>
    <!-- <info-popup @HideModalValue="HideModal" :showModalProp="infoval"></info-popup> -->


    <vue-common-methods :infiniteLoad="true" :url="requestUrl" @get-records="getResponse"></vue-common-methods>
    <vue-common-methods :url="requestCityUrl" @get-records="getCityResponse"></vue-common-methods>


</div>
</template>

<script>
    import StarRating from 'vue-star-rating';

    export default {
        data () {
            return {
                url : 'api/job?pagination=true&details["profile_data"]=true',
                bid_selection: 'activebid',
                bidpopup: false,
                isShowing:false,
                infoval:false,
                records : [],
                searchValue: '',
                isLoading : false,
                isTouched: false,
                zipCode : '',
                servicesList : [],
                cityUrl : 'api/city',
                cities : [],
                selectedCity : ''
            }
        },

        methods: {
            getCityResponse(response){
                let self = this;
                self.cities = response.data;
            },
            validateBeforeSubmit() {
                let dateNow = new Date().getMilliseconds();
                
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        this.records = [];

                        this.url = 'api/job?pagination=true&details["profile_data"]=true&time='+dateNow;

                        if(this.searchValue){
                            this.url += '&filter_by_service='+this.searchValue.id;
                        }
                        if(this.selectedCity){
                            this.url += '&filter_by_city='+this.selectedCity
                        }

                        this.errorMessage = "";
                        return;
                    }
                    this.errorMessage = this.errorBag.all()[0];
                });
            }, 
            getResponse(response){
                let self = this;
                self.loading = false;
                for (var i = 0 ; i < response.data.length; i++) {
                    self.records.push( response.data[i] ) ;

                }

            },
            limitText (count) {
                return `and ${count} other services`
            },
            asyncFind: _.debounce(function(query) {
                let self = this;
                if(!query || query.length < 3) return;
                this.searchUrl  = 'api/service?keyword='+query;
                this.isLoading = true;
                this.$http.get(this.searchUrl).then(response => {
                    response = response.data.response;
                    self.servicesList = response.data;
                    self.isLoading = false;

                }).catch(error=>{
                });
            }, 1000),
            AddCustomer() {
                this.customer = true;
            },
            ViewCustomerDetail() {
                window.scrollTo(0,0);
                this.$router.push({name: 'customerdetail'});
            },
            changestatuspopup() {
                this.changestatus = true;
            },
            ChangeBid(){
                this.bidpopup = true;
            },
            showinfo() {
                this.infoval = true;
            },        
            HideModal(){
                this.bidpopup = false;
                this.infoval = false;
            },
            servicedetail(){
                window.scrollTo(0,0);
                this.$router.push('/job-details/serviceprovider');
            },
            showchatpanel(){
                this.isShowing=true;
            },
            CloseDiscussion(){
                this.isShowing=false;
            },
            showProfile(){
                window.scrollTo(0,0);
                this.$router.push({name: 'Explore_Detail'});
            },  

        },
        components: {
            StarRating
        },

        computed : {
            isInvalid () {
                return this.isTouched && !this.searchValue
            },
            requestUrl(){
                return this.url;
            },
            requestCityUrl(){
                return this.cityUrl;
            },
        },
        watch:{
            bid_selection: function (val){
                return this.val
            },
        }

    }
</script>
