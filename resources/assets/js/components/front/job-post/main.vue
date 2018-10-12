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
                                <select v-validate="'required'" name="service" 
                                :class="['form-control' , errorBag.first('service') ? 'is-invalid' : '']" v-model="formData.service_id" class="form-control">
                                <option value="">Select Service</option>
                                <option v-for="service in servicesList" :value="service.id">
                                    {{ service  | mainServiceOrChildService}}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Job Title</label>
                            <input  :maxlength="100" v-validate="'required|max:150'" name="title" 
                            :class="['form-control' , errorBag.first('title') ? 'is-invalid' : '']" 
                            v-model="formData.title" type="text" class="form-control" 
                            placeholder="Enter job title">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea :maxlength="500" v-validate="'required|max:500'" name="description" 
                            :class="['form-control' , errorBag.first('description') ? 'is-invalid' : '']" v-model="formData.description" class="form-control" rows="4" placeholder="Start typing job details"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="attach-job-files">
                <div class="form-label-heading">
                    <p>Attach Photo</p>
                </div>
                <file-upload-component @get-response="getResponse($event)" :uploadKey="'job'"></file-upload-component>

                <div class="margin-bottom-20px row" v-for="(image, index) in jobImages">

                    <div class="col-md-6">
                        <div class="form-group custom-file">
                            {{image.original_name}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <a href="javascript:;" @click.prevent="removeImage(index);" class="add-photos filter-btn-top-space">remove</a>
                    </div>
                </div>
            </div>

            <div class="attach-video-files">
                <div class="form-label-heading">
                    <p>ATTACH VIDEO</p>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Youtube video ID</label>
                            <input v-model="formData.videos" class="form-control" placeholder="e.g. BCFuE1tlqwU">
                        </div>
                    </div>
                    <div class="col-md-6 video-url">
                        <p>Video id available at the end of youtube video url. https://www.youtube.com/watch?v={VIDEO-ID}</p>
                    </div>
                </div>
            </div>

            <div class="service-need">
                <div class="form-label-heading m-b-25">
                    <p>WHEN YOU NEED THIS SERVICE</p>
                </div>
                <div class="row ">
                    <div class="col-md-12">
                        <label>Do you need this service urgently?</label>
                    </div>
                    <div class="boxed">
                        <div class="col-md-6">
                            <input type="radio" id="normal" name="need" value="normal_job" checked="" v-model="jobType">
                            <label for="normal">No, Normal job</label>
                        </div>
                        <div class="col-md-6">
                            <input type="radio" id="urgent" name="need" value="urgent_job"  v-model="jobType">
                            <label for="urgent">Yes, Urgent job</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <p>In case of urgent job, we will send push notifications to all the service providers around you. You need to pay <strong>${{urgentJobAmount}}</strong> fee for urgent job.</p>
                    </div>
                </div>
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
                        <label>Address</label>
                        <input v-validate="'required'" name="address" 
                        :class="['form-control' , errorBag.first('address') ? 'is-invalid' : '']" v-model="formData.address" type="text" class="form-control" placeholder="Enter your address">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Apartment, Suite, Unit</label>
                        <input v-model="formData.apartment" type="text" class="form-control" placeholder="Enter apartment, suite, unit (optional)">
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">State</label>
                        <select :class="['form-control', 'form-group' , errorBag.first('state') ? 'is-invalid' : '']" v-validate="'required'" @change="onStateChange" name="state" v-model="formData.state_id">
                            <option value="">Select State</option>
                            <option v-for="state in states" :value="state.id">{{state.name}}</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">City</label>
                        <select :class="['form-control', 'form-group' , errorBag.first('city') ? 'is-invalid' : '']"  v-validate="'required'" name="city" v-model="formData.city_id">
                            <option value="">Select City</option>
                            <option v-for="city in cities" :value="city.id">{{city.name}}</option>
                        </select>
                    </div>
                </div>


            </div>


            <div class="row">
                <div class="col-md-6">
                    <zip @onSelect="setZipCode" :initialValue="formData.zip_code" :showError="invalidZip"></zip>
                </div>
            </div>
        </div>
        
        <div class="verify-account">
            <div v-if="isShowCardDetail && isPaymentDetailShow && !$route.params.id" class="form-label-heading m-b-25">
                <p>VERIFY ACCOUNT</p>
            </div> 
            <div v-else-if="!isShowCardDetail" class="form-label-heading m-b-25">
                <p>URGENT JOB</p>
            </div>
            <div class="row">
                <div v-if="isShowCardDetail && isPaymentDetailShow" class="col-md-12">
                    <div class="verification-alert">
                        <p>To post your job, we need to verify your credit card to ensure that you are valid customer and at-least 18 years old.
                            <span>We won't charge your card</span>.</p>
                        </div>
                    </div>
                    <div v-else-if="!isShowCardDetail" class="col-md-12">
                        <div class="verification-alert">
                            <p>In case of urgent job, we will send push notifications to all the service providers around you. You need to pay <strong>${{urgentJobAmount}}</strong> fee for urgent job.</p>
                        </div>
                    </div>
                </div>
                <div>
                    <card-element :showCardInfo="(isPaymentDetailShow || isUrgentJob)" :isPopup='false' :submit='isSubmit'  :planId='selectedPlan' :fromFeaturedProfile="'false'" :urgentJob='isUrgentJob'></card-element>
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
    <vue-common-methods :url="stateUrl" @get-records="getStateResponse"></vue-common-methods>
    <vue-common-methods v-if="$route.params.id" :url="requestJobUrl" @get-records="getJobResponse"></vue-common-methods>

    <vue-common-methods v-if="formData.state_id" :url="requestCityUrl" @get-records="getCityResponse"></vue-common-methods>
    <vue-common-methods :url="requestUserUrl" @get-records="getUserResponse"></vue-common-methods>

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
                isSubmit : false,
                isUrgentJob : false,
                invalidZip: false,
                forceUserValue : false,
                requestUserUrl : ''

            }
        },
        computed : {
            servicesList(){
                return this.$store.getters.getAllServices;
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
            setZipCode(val) {
                this.formData.zip_code = val.zip_code;
                this.invalidZip = false;
                if(!val.zip_code) {
                    this.invalidZip = true;
                }
            },
            paymentDetailShow(){
                let user = JSON.parse(this.$store.getters.getAuthUser)   
                if(user.stripe_token){
                    this.isPaymentDetailShow = false
                }else{
                    this.isPaymentDetailShow = true
                }
            },
            getJobResponse(response){
                let self = this;
                this.formData = response.data;
                this.onStateChange();
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
            },

            onStateChange(){
                this.cityUrl = 'api/city?state_id=' + this.formData.state_id;
            },
            getResponse($event){
                this.formData['images'][this.formData['images'].length] = {
                    name : $event.name,
                    original_name : $event.original_name
                };
                this.$forceUpdate();
            },
            validateBeforeSubmit() {
                self = this;
                this.isSubmit = false
                this.$validator.validateAll().then((result) => {
                    this.invalidZip = null;
                    if(!this.formData.zip_code) {
                        this.invalidZip = true;
                        return;
                    }
                    if (result) {
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

                this.formData.job_type = (this.jobType == 'urgent_job')?'urgent':'normal';
                let data = this.formData;

                self.loading = true;
                let url = self.url;
                let urlRequest = '';

                if(this.$route.params.id){
                    url += '/' + this.$route.params.id;    
                    urlRequest =  self.$http.put(url , data)
                }else{
                    urlRequest = self.$http.post(url, data);
                }

                urlRequest.then(response => {
                    response = response.data.response;

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
                    self.plans = response.data.response.data
                    self.selectedPlan = self.plans[0].id
                    self.urgentJobAmount = self.plans[0].amount
                }).catch(error=>{
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
                if(response.data){
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