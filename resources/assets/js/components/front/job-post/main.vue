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
                                <option value="">Select All</option>
                                <option v-for="service in servicesList" :value="service.id">
                                    {{ service  | mainServiceOrChildService}}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Job Title</label>
                            <input  v-validate="'required'" name="title" 
                            :class="['form-control' , errorBag.first('title') ? 'is-invalid' : '']" 
                            v-model="formData.title" type="text" class="form-control" 
                            placeholder="Enter job title">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea v-validate="'required'" name="description" 
                            :class="['form-control' , errorBag.first('description') ? 'is-invalid' : '']" v-model="formData.description" class="form-control" rows="4" placeholder="Start typing job details"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="attach-job-files">
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
                <div class="row ">
                    <div class="col-md-12">
                        <label>Do you need this service urgently?</label>
                    </div>
                    <div class="boxed">
                        <div class="col-md-6">
                            <input type="radio" id="normal" name="need" value="Normal job" checked="">
                            <label for="normal">No, Normal job</label>
                        </div>
                        <div class="col-md-6">
                            <input type="radio" id="urgent" name="need" value="Urgent job" @click="urgentjob()">
                            <label for="urgent">Yes, Urgent job</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <p>In case of urgent job, we will send push notifications to all the service providers around you. You need to pay <strong>$2</strong> fee for urgent job.</p>
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

<div class="verify-account">
    <div class="row">
        <div class="col-md-12">
            <div class="verification-alert">
                <p>To post your job, we need to verify your credit card to ensure that you are valid customer and at-least 18 years old.
                    <span>We won't charge your card</span>.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Credit Card Type</label>
                    <select class="form-control">
                        <option selected="" disabled="">Select credit card type</option>
                        <option>VISA</option>
                        <option>Master</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group custom-datepicker">
                    <label for="">&nbsp;</label>
                    <select class="form-control">
                        <option selected="" disabled="">Select Month</option>
                        <option>January</option>
                        <option>Feburay</option>
                        <option>March</option>
                        <option>April</option>
                        <option>May</option>
                        <option>June</option>
                        <option>July</option>
                        <option>August</option>
                        <option>September</option>
                        <option>October</option>
                        <option>November</option>
                        <option>December</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Credit Card Number</label>
                    <input type="text" class="form-control" placeholder="Enter your credit card number">
                </div>
            </div>
            <div class="col-md-6">							
                <div class="form-group custom-datepicker">
                    <label for="">&nbsp;</label>
                    <select class="form-control">
                        <option selected="" disabled="">Select Year</option>
                        <option>2010</option>
                        <option>2011</option>
                        <option>2012</option>
                        <option>2013</option>
                        <option>2014</option>
                        <option>2015</option>
                        <option>2016</option>
                        <option>2017</option>
                        <option>2018</option>
                        <option>2019</option>
                        <option>2020</option>
                        <option>2021</option>
                    </select>
                </div>													
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Security Code (CVV)</label>
                    <input class="form-control" placeholder="Enter your cvv number" type="" name="">
                </div>
            </div>
        </div>
        <div class="job-form-submission">
            <div class="">

                <button :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' ]">Create Job
                    <loader></loader>
                </button>

            </div>
            <p>Please make sure all the information you entered is accurate before submitting.</p>
        </div>
    </div>

</form>
</div>
<vue-common-methods :url="stateUrl" @get-records="getStateResponse"></vue-common-methods>
<vue-common-methods v-if="formData.state_id" :url="requestCityUrl" @get-records="getCityResponse"></vue-common-methods>

<urgent-job  @HideModalValue="HideModal" :showModalProp="categoryval"></urgent-job>
</div>
</template>

<script>
    import DatePicker from 'vue2-datepicker'

    export default {
        components: { DatePicker },
        data() {
            return {
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
                    images : []
                },
                loading : false,
                numOfImages : 1,
                cities : [],
                stateUrl : 'api/state',
                cityUrl : '',
                states : [],
                
            }
        },
        computed : {
            servicesList(){
                return this.$store.getters.getAllServices;
            },

            requestCityUrl(){
                return this.cityUrl;
            },
        },
        methods:{
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
                        this.onSubmit();
                        this.errorMessage = '';
                        return;
                    }
                    console.log(result , this.errorBag.all());
                    this.errorMessage = this.errorBag.all()[0];
                });
            },
            onSubmit() {
                let self = this;
                let data = this.formData;

                self.loading = true;
                let url = self.url;

                self.$http.post(url, data).then(response => {
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

        }
    }
</script>