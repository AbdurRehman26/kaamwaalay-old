<template>
    <div class="wrapper-sm">
        <div class="profile-head">
            <h1>Post a Job</h1>
            <p>Please fill out the form below to create a new job.</p>
        </div>
        <div class="post-job-form">
            <form @submit.prevent="validateBeforeSubmit" autocomplete="off">

                <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>

                <div class="job-details">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Select Service</label>

                                <div class="custom-multi multiselect-z-index">
                                    <multiselect  v-model="searchServiceValue" :options="servicesList"  placeholder="What service do you need?" track-by="id" label="title"  open-direction="bottom" :searchable="true" :options-limit="500" :limit="8" :max-height="700" name="search" :internal-search="true" :showNoResults="true">
                                        <span slot="noResult">No service found.</span>
                                    </multiselect>
                                </div>


                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Job Title</label>
                                <input  v-validate="'required|max:250'" name="title"
                                :class="['form-control' , errorBag.first('title') ? 'is-invalid' : '']"
                                v-model="formData.title" type="text" class="form-control"
                                placeholder="Enter job title">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea :maxlength="500" v-validate="'required|max:1000'" name="description"
                                :class="['form-control' , errorBag.first('description') ? 'is-invalid' : '']" v-model="formData.description" class="form-control" rows="4" placeholder="Start typing job details"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="service-need">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Preference</label>
                                <select v-validate="'required'" name="preference"
                                :class="['form-control' , errorBag.first('preference') ? 'is-invalid' : '']" v-model="formData.preference" class="form-control">
                                <option value="choose_date" selected="">Choose Date</option>
                                <option value="few_days">In a few days</option>
                                <option value="with_in_a_week">Within this week</option>
                                <option value="any_time">Any Time</option>
                            </select>
                        </div>
                    </div>
                    <div v-if="formData.preference == 'choose_date'" class="col-md-6">
                        <div :class="[errorBag.first('scheduled at') ? 'is-invalid' : '' ,'custom-datepicker','form-group']">
                            <label>Select Date</label>
                            <datepicker name="scheduled at" v-validate="'required'" v-model="formData.schedule_at"   :disabledDates="disabledDates" placeholder="Select Date"></datepicker>
                        </div>
                    </div>
                </div>
            </div>

            <div class="service-location">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address *</label>
                            <input v-validate="'required|max:250'" name="address"
                            :class="['form-control' , errorBag.first('address') ? 'is-invalid' : '']" v-model="formData.address" type="text" class="form-control" placeholder="Enter your address">
                        </div>
                    </div>
                </div>

            </div>

            <div class="job-form-submission">
                <div class="">

                    <button :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' ]">
                        {{ $route.params.id ? 'Update Job' : 'Create Job' }}
                        <loader></loader>
                    </button>

                </div>
                <p>Please make sure all the information you entered is accurate before submitting.</p>
            </div>

            </form>
        </div>
        <vue-common-methods :url="stateUrl" @get-records="getStateResponse" :hideLoader="true"></vue-common-methods>
        <vue-common-methods v-if="$route.params.id" :url="requestJobUrl" @get-records="getJobResponse"></vue-common-methods>

        <vue-common-methods v-if="formData.state_id" :url="requestCityUrl" :hideLoader="true" @get-records="getCityResponse"></vue-common-methods>
        <vue-common-methods :url="requestUserUrl" @get-records="getUserResponse" :hideLoader="true"></vue-common-methods>

    </div>
</template>

<script>
    import Datepicker from 'vuejs-datepicker';
    import _ from 'lodash';

    export default {
        components: { Datepicker },
        data() {
            return {
                disabledDates: {
                    to: new Date(new Date().getTime() - (1 * 24 * 60 * 60 * 1000)),
                },
                plans : [],
                urgentJobAmount: null,
                selectedPlan :null,
                paymentSuccess :false,
                successMessage : '',
                errorMessage : '',
                url : 'api/job',
                value: '',
                customdate: '',
                value_month:'',
                value_year:'',
                time1: '',
                time2: '',
                time3: '',
                jobdes: '',
                jobType: 'normal_job',
                shortcuts: [
                {
                    text: 'Today',
                    onClick: () => {
                        this.time3 = [ new Date(), new Date() ]
                    }
                }
                ],
                timePickerOptions:{
                    start: '00:00',
                    step: '00:30',
                    end: '23:30'
                },
                choosedate: 'choosedate',
                formData : {
                    service_id : '',
                    title : '',
                    description : '',
                    preference : 'choose_date',
                    schedule_at :  new Date(),
                    address : '',
                    apartment : '',
                    city_id : '',
                    country_id : 231,
                    state_id : '',
                    zip_code : '',
                    videos : '',
                    images : [],
                    subscription_id : null
                },
                loading : false,
                numOfImages : 1,
                cities : [],
                stateUrl : 'api/state',
                cityUrl : '',
                states : [],
                isShowCardDetail : true,
                isPaymentDetailShow : true,
                invalidZip: false,
                isSubmit : false,
                isUrgentJob : false,
                forceUserValue : false,
                requestUserUrl : '',
                currentCity: '',
                videoValid : true,
                searchServiceValue : '',
                currentJob : '',
                checkZip: false,
                checkJob: false,

            }
        },
        computed : {
            servicesList(){
                // if(this.$route.params.id){
                //     this.prefillValues();
                // }
                this.prefillValues();
                let self = this;
                this.searchServiceValue =  _.find(this.$store.getters.getAllServices , function(service){
                    return self.formData.service_id == service.id;
                });
                var services = _.forEach(this.$store.getters.getAllServices, function(service) {
                    if(!service.parent_id) {
                        var tempStr = service.title.replace(/\(Main Category\)/ig, "");
                        service.title = tempStr + " (Main Category)";
                    }
                });
                return services;
            },

            requestCityUrl(){
                return this.cityUrl;
            },
            requestJobUrl () {
                return this.url + '/' + this.$route.params.id;
            },
            jobImages(){
                return this.formData['images'];
            }
        },
        mounted () {
            this.getPlansList();
            this.paymentDetailShow();
        },
        methods:{
            asyncFind: _.debounce(function(query) {
                let self = this;
                this.videoValid = false;
                if(!query) {
                    this.videoValid = true;
                    this.loading = false;
                    return false;
                }
                if(query.length != 11) {
                    return;
                };
                this.videoValid = true;
                this.checkYouTubeVideo();

            }, 1000),

            checkYouTubeVideo(){
                let self = this;

                self.loading = true;
                let url = 'youtube/validate/video?id='+this.formData.videos;

                this.$http.get(url).then(response => {

                    self.successMessage = response.message;
                    self.videoValid = true;
                    self.loading = false;
                }).catch(error => {
                    self.videoValid = false;
                    self.loading = false;
                });
            },


            prefillValues(){


                let user = JSON.parse(this.$store.getters.getAuthUser);
                this.formData.state_id = this.formData.state_id ? this.formData.state_id : user.state_id;
                this.formData.zip_code = this.formData.zip_code ? this.formData.zip_code : user.zip_code;
                this.formData.city_id = this.formData.city_id ? this.formData.city_id : user.city_id;
                this.onStateChange();

                let self = this;
                let zipCode = this.$route.query.zip;
                let serviceName = this.$route.query.service_name;
                if(zipCode){
                    this.formData.zip_code = zipCode;
                }

                if(serviceName){
                    let allServices = this.$store.getters.getAllServices;
                    if(allServices){
                        _.find(allServices , function(service){
                            if(service.url_suffix == serviceName){
                                self.searchServiceValue = service;
                            }
                        });
                    }
                }

                if(this.$route.query.service_provider_user_id){
                    self.formData.service_provider_user_id = this.$route.query.service_provider_user_id;
                }

            },
            setZipCode(val) {
                //This is for select service unselected value start
                let self = this;
                // var searchServiceValue = this.searchServiceValue;
                // setTimeout(function() {
                //     self.searchServiceValue = searchServiceValue;
                // }, 2000);
                //This is for select service unselected value end
                //if(this.checkZip) {
                    if(val.zip_code){
                        this.formData.zip_code = val.zip_code;
                        this.setCity(val)
                        this.invalidZip = false;
                    }
                    if(!val.zip_code) {
                        this.invalidZip = true;
                    }
                //}
                //this.checkZip = true;
            },
            setCity(object){
                if(object.state_id){
                    this.formData.state_id = object.state_id;
                }else{
                    this.formData.state_id = ''
                }

                if(object.city_id){
                    this.currentCity = object.city_id;
                }else{
                    this.currentCity = ''
                }

                this.onStateChange();
            },
            paymentDetailShow(){
                let user = JSON.parse(this.$store.getters.getAuthUser)
                if(user.stripe_id){
                    this.isPaymentDetailShow = false
                }else{
                    this.isPaymentDetailShow = true
                }
            },
            getJobResponse(response){

                let self = this;

                this.currentJob = response.data;
                this.formData = response.data;
                this.currentCity = this.formData.city_id;
                if(this.checkJob && response.data.length){
                    this.onStateChange();
                 }
                this.checkJob = true;
                setTimeout(function () {
                    Vue.nextTick(() => {
                        self.errorBag.clear()
                    })

                }, 100);


            },
            getStateResponse(response){
                let self = this;
                self.loading = false;
                self.states = response.data;

            },
            getCityResponse(response){
                let self = this;
                self.cities = response.data;
                if(this.currentCity){
                    this.formData.city_id = this.currentCity;
                    this.currentCity = '';
                }
            },

            onStateChange(select){

                if(typeof(this.formData.state_id) == 'undefined'){
                    return false;
                }

                var select = select|false;
                if(select){
                    this.formData.city_id = '';
                }
                this.cityUrl = 'api/city?state_id=' + this.formData.state_id;
                if(this.currentCity){
                    this.formData.city_id = this.currentCity;
                    this.currentCity = '';
                }
            },
            getResponse($event){
                if(this.formData['images']){
                    this.formData['images'][this.formData['images'].length] = {
                        name : $event.name,
                        original_name : $event.original_name
                    };
                }else{
                    this.formData['images'] = [{
                        name : $event.name,
                        original_name : $event.original_name
                    }];
                }
                this.$forceUpdate();
            },
            validateBeforeSubmit() {
                self = this;
                this.isSubmit = false;
                this.$validator.validateAll().then((result) => {
                    this.invalidZip = null;
                    if(!this.formData.zip_code) {
                        this.invalidZip = true;
                        result = false;
                    }


                    if(!this.searchServiceValue) {
                        this.errorMessage = 'The service field is required';
                        return;
                    }



                    if (result) {

                        if(!this.videoValid){
                            this.errorMessage = 'The youtube video ID is invalid';
                            return;
                        }

                        setTimeout(function () {
                            if(!this.errorMessage){
                                self.isSubmit = true;
                            }else{
                                self.isSubmit = false;
                            }
                        }, 500);

                        if(!this.isPaymentDetailShow && !this.isUrgentJob && !this.invalidZip){
                            this.onSubmit();
                        }
                        this.errorMessage = '';
                        return;
                    }
                    this.errorMessage = this.errorBag.all()[0];
                });
            },
            onSubmit() {
                let self = this;
                let data = JSON.parse(JSON.stringify(this.formData));

                data.service_id = this.searchServiceValue.id;
                data.job_type = (this.jobType == 'urgent_job')?'urgent':'normal';
                self.loading = true;
                let url = self.url;
                let urlRequest = '';
                if(this.$route.params.id){
                    url += '/' + this.$route.params.id;
                    urlRequest =  self.$http.put(url , data);
                }else{
                    urlRequest = self.$http.post(url, data);
                }

                urlRequest.then(response => {
                    response = response.data;

                    self.successMessage = response.message;

                    self.requestUserUrl = 'api/user/me';

                    setTimeout(function () {
                        self.$router.push({ name : 'job.details' , params : { id : response.data.id}});
                        self.successMessage = '';
                        self.loading = false;
                    }, 2000);

                }).catch(error => {
                    self.loading = false;
                });

            },
            job(){
                window.scrollTo(0,0);
                this.$router.push({name: 'My Jobs'});
            },
            getPlansList (){
                let self = this;
                let url = 'api/plan';
                let params = {
                    pagination: false,
                    type: 'job',
                    product: 'urgent_job',
                };
                self.$http.get(url, {params: params}).then(response=>{
                    self.plans = response.data.data
                    self.selectedPlan = self.plans[0].id
                    self.urgentJobAmount = self.plans[0].amount
                }).catch(error=>{
                    if(error.response.status == 401) {
                        self.$router.push({name: 'login'});
                    }
                });
            },
            removeImage(imageIndex){
                this.formData.images.splice(imageIndex , 1);
                this.$forceUpdate();
                return false;
            },
            addImages(){
                this.formData.images[this.formData.images.length] = '';
                this.$forceUpdate();
            },
            getUserResponse(response){

                if(response.data.length){
                    this.$store.commit('setAuthUser', response.data);
                }
            }

        },
        watch:{
            'formData.zip_code'(val) {
                if(!val) {
                    this.invalidZip = true;
                }
            },
            jobType (value) {
                if(value == 'urgent_job'){
                    this.isShowCardDetail = false
                    this.isUrgentJob = true
                } else{
                    this.isShowCardDetail = true
                    this.isUrgentJob = false
                }
            },
        }
    }
</script>
