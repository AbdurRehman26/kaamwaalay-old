<template>
    <div class="wrapper-sm">
        <div class="profile-head">
            <h1>Post a Job</h1>
            <p>Please fill out the form below to create a new job.</p>
        </div>
        <div class="post-job-form">
            <form @submit.prevent="validateBeforeSubmit">

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
                            <input  :maxlength="100" v-validate="'required'" name="title" 
                            :class="['form-control' , errorBag.first('title') ? 'is-invalid' : '']" 
                            v-model="formData.title" type="text" class="form-control" 
                            placeholder="Enter job title">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea :maxlength="500" v-validate="'required'" name="description" 
                            :class="['form-control' , errorBag.first('description') ? 'is-invalid' : '']" v-model="formData.description" class="form-control" rows="4" placeholder="Start typing job details"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="attach-job-files">
                <div class="form-label-heading">
                    <p>Attach Photo</p>
                </div>
                <div class="margin-bottom-20px row" v-for="(image, index) in numOfImages">
                    <div class="col-md-6">
                        <div class="form-group custom-file">

                            <file-upload-component @get-response="getResponse" :uploadKey="'job'"></file-upload-component>

                        </div>
                    </div>
                    <div class="col-md-6" v-if="parseInt(index) === parseInt(numOfImages-1)">
                        <a href="javascript:;" @click.prevent="numOfImages++" class="add-photos filter-btn-top-space">+ Add more photos</a>
                    </div>
                </div>
            </div>

            <div class="attach-video-files">
                <div class="form-label-heading">
                    <p>ATTACH VIDEO</p>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group custom-file">
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
                    <div class="form-group custom-datepicker">
                        <label>Select Date</label>
                        <date-picker v-validate="'required'" v-model="formData.schedule_at" format="DD-MM-YYYY" lang="en"></date-picker>
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
                        <label>Apartment, suite, unit</label>
                        <input v-model="formData.apartment" type="text" class="form-control" placeholder="Enter apartment, suite, unit (optional)">
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6">
                 <div class="form-group">
                    <label for="">State</label>
                    <select @change="onStateChange" class="form-control" name="state" v-model="formData.state_id">
                      <option value="">Select State</option>
                      <option v-for="state in states" :value="state.id">{{state.name}}</option>
                  </select>
              </div>
          </div>

          <div class="col-md-6">
             <div class="form-group">
                <label for="">City</label>
                <select class="form-control" name="city" v-model="formData.city_id">
                  <option value="">Select City</option>
                  <option v-for="city in cities" :value="city.id">{{city.name}}</option>
              </select>
          </div>
      </div>


  </div>


  <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Zip Code</label>
            <input v-validate="'required'" name="zip_code" 
            :class="['form-control' , errorBag.first('zip_code') ? 'is-invalid' : '']" v-model="formData.zip_code" type="text" class="form-control" placeholder="Enter your zip code">
        </div>
    </div>
</div>
</div>

<div class="verify-account" v-if="isShowCardDetail && isPaymentDetailShow">
    <div class="form-label-heading m-b-25">
        <p>VERIFY ACCOUNT</p>
    </div> 
    <div class="row">
        <div class="col-md-12">
            <div class="verification-alert">
                <p>To post your job, we need to verify your credit card to ensure that you are valid customer and at-least 18 years old.
                    <span>We won't charge your card</span>.</p>
                </div>
            </div>
        </div>
        <div>
         <payment-component  :submit='isSubmitNormalJob'></payment-component>
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

<!-- <urgent-job  @HideModalValue="HideModal" :showModalProp="categoryval"></urgent-job> -->
<div v-if='!isShowCardDetail'>
<card-element  @HideModalValue="HideModal" :showModalProp="categoryval" :planId='selectedPlan' :fromFeaturedProfile="'false'"></card-element>
</div>
</div>
</template>

<script>
    import DatePicker from 'vue2-datepicker'

    export default {
        components: { DatePicker },
        data() {
            return {
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
                categoryval: false,
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
                    schedule_at : '',
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
                isSubmitNormalJob : false,
                isPaymentDetailShow : true
                
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
            }
        },
        mounted () {
             this.getPlansList(),
             this.paymentDetailShow()
        },
        methods:{
             paymentDetailShow(){
                 let user = JSON.parse(this.$store.getters.getAuthUser)   
                 if(user.stripe_token){
                    this.isPaymentDetailShow = false
                 }else{
                    this.isPaymentDetailShow = true
                 }
            },
            getJobResponse(response){
                this.formData = response.data;
                this.onStateChange();

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
            getResponse(response){
                this.formData.images.push(response.name);
            },
            validateBeforeSubmit() {
                this.$validator.validateAll().then((result) => {
                    if (result) {
                         if(this.jobType == 'urgent_job'){
                             this.urgentjob()
                         }else{
                            if(!this.errorMessage){    
                               this.isSubmitNormalJob = true
                            }else{
                               this.isSubmitNormalJob = false 
                            }
                            if(!this.isPaymentDetailShow){
                              this.onSubmit();
                            }
                         }
                        this.errorMessage = '';
                        return;
                    }
                    this.errorMessage = this.errorBag.all()[0];
                });
            },
            onSubmit() {
                let self = this;
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

                    self.$router.push({ name : 'job.details' , params : { id : response.data.id}});

                    setTimeout(function () {
                        self.successMessage = '';
                        self.loading = false;
                    }, 2000);

                }).catch(error => {
                    console.log(error , 'error in job posting');
                    self.loading = false;
                });

            },
            job(){
                window.scrollTo(0,0);
                this.$router.push({name: 'My Jobs'});
            },
            urgentjob() {
                this.categoryval = true;
            },
            HideModal(){
                this.categoryval = false;
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

        },
       watch:{
            jobType (value) {
                if(value == 'urgent_job'){
                    this.isShowCardDetail = false
                } else{
                    this.isShowCardDetail = true
                }
            },
        }
    }
</script>