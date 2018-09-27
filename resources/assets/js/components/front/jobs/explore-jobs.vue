<template>
    <div class="my-job-lising-content">
        <div class="search-fixture">
            <div class="grey-bg section-padd xs border-top-bottom search-fix">
                <div class="container element-index">
                    <div class="content-inner md">                        
                        <div class="search-filter service-professional">
                            <!-- <h1 class="heading-large">Find best skilled service professionals near you.</h1> -->
                            <h3 class="labelheading">Select Service Category</h3>
                            <div class="custom-multi" :class="{ 'invalid': isInvalid }">
                                <multiselect :showNoResults="false" v-model="searchValue" :options="servicesList"  placeholder="Enter the service name whose jobs you want to explore" track-by="id" label="title" :loading="isLoading"  id="ajax" open-direction="bottom" :searchable="true" :options-limit="300" :limit="3" :limit-text="limitText" :max-height="600"  @search-change="asyncFind" name="search">
                                </multiselect>
                            </div>
                            <div class="container-zip-code">
                                <multiselect :showNoResults="false" :custom-label="customLabel" v-model="cityValue" :options="citiesList"  placeholder="Enter city" track-by="id" label="name" :loading="isLoadingCity"  id="ajaxCity" open-direction="bottom" :options-limit="300" :limit="3" :limit-text="limitTextCity" :max-height="600"  @search-change="asyncFindCity" name="search">
                                </multiselect>                                
                            </div>
                            <button class="job-search-btn" :class="['btn', 'btn-primary', loading ? 'show-spinner' : '']" @click="validateBeforeSubmit">
                                <span>Search Jobs</span>
                                <loader></loader>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div v-if="searchService || searchPlace" class="category-section-search">
                <h1 class="m-b-0">{{ searchService ? searchService : '' }} {{  searchPlace ? 'Jobs in '+  searchPlace : ''}}</h1>
            </div>

            <div class="job-post-container section-padd sm">
                <div class="container md">

                        <jobs-list :records="records"></jobs-list>
                    
                </div>
                <no-record-found v-show="noRecordFound"></no-record-found>

            </div>

        </div>
        <chat-panel v-show="isShowing" @CloseDiscussion='CloseDiscussion()'></chat-panel>
        <!-- <info-popup @HideModalValue="HideModal" :showModalProp="infoval"></info-popup> -->


        <vue-common-methods :infiniteLoad="true" :url="requestUrl" @get-records="getResponse"></vue-common-methods>
        <vue-common-methods :url="requestCityUrl" @get-records="getCityResponse" :hideLoader="true"></vue-common-methods>


    </div>
</template>

<script>

    export default {
        data () {
            return {
                url : 'api/job?filter_by_status=in_bidding&pagination=true&details["profile_data"]=true',
                bid_selection: 'activebid',
                isShowing:false,
                infoval:false,
                records : [],
                searchValue: '',
                isLoading : false,
                isLoadingCity : false,
                isTouched: false,
                zipCode : '',
                servicesList : [],
                cityUrl : 'api/city',
                cities : [],
                loading : false,
                searchPlace : '',
                searchService : '',
                noRecordFound : false,
                cityValue : '',
                citiesList : []
            }
        },

        methods: {
            customLabel ({ name, state }) {
                return `${name} → ${state.name}`
            },
            getCityResponse(response){
                if(response.data){
                    let self = this;
                    self.cities = response.data;
                }
            },
            validateBeforeSubmit() {
                let dateNow = new Date().getMilliseconds();
                
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        this.records = [];
                        this.loading = true;

                        this.url = 'api/job?filter_by_status=in_bidding&pagination=true&details["profile_data"]=true&time='+dateNow;

                        if(this.searchValue){
                            this.url += '&filter_by_service='+this.searchValue.id;
                        }
                        if(this.cityValue){
                            this.url += '&filter_by_city='+this.cityValue.id
                        }
                        
                        this.searchService = '';
                        this.searchPlace = '';

                        this.errorMessage = "";
                        return;
                    }
                    this.errorMessage = this.errorBag.all()[0];
                });
            }, 
            getResponse(response){
                let self = this;

                if(typeof(response.pagination) !== 'undefined' && !response.pagination.total){
                    this.loading = false;
                    this.searchService = this.searchValue.title;
                }

                for (var i = 0 ; i < response.data.length; i++) {
                    self.loading = false;
                    self.records.push( response.data[i]);
                    this.searchService = this.searchValue.title;
                }

                let cityId = this.cityValue;
                let obj = _.find(this.cities, item =>{
                    if(item.id == cityId){
                        return item; 
                    }
                });
                self.noRecordFound = response.noRecordFound;

                this.searchPlace = obj ? obj.name : '';

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
            limitTextCity (count) {
                return `and ${count} other services`
            },
            asyncFindCity: _.debounce(function(query) {
                let self = this;
                if(!query || query.length < 3) return;
                let url  = 'api/city?keyword='+query+'&details=true';
                this.isLoadingCity = true;
                this.$http.get(url).then(response => {
                    response = response.data.response;
                    self.citiesList = response.data;
                    self.isLoadingCity = false;

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
                this.showBidPopup = true;
            },
            showinfo() {
                this.infoval = true;
            },        
            HideModal(){
                this.showBidPopup = false;
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
