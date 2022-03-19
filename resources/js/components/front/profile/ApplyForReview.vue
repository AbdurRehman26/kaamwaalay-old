<template>
    <div class="section padding-sm profile-form wrapper-sm">
        <div class="profile-head">
            <h1>Complete your profile &amp; apply for Review</h1>
            <p>To build safety on PSM, we review and approve service provider profiles. All information provided below will be kept secure.</p>
        </div>

        <div v-if="Object.keys(record).length && record.service_provider_profile &&  Object.keys(record.service_provider_profile).length" class="profile-form-section apply-review-sec">

            <div class="form-signup">
                <form @submit.prevent="validateBeforeSubmit">
                    <div class="personal-provider-detail">
                        <div v-if="!imageValue" class="profile-image-placeholder onlyplaceholder">
                        </div>
                        <div class="profile-image-placeholder" v-if="imageValue" v-bind:style="{'background-image':'url('+imageValue+')'}"></div>
                        <div class="row">
                            <div class="browse-btn">
                                <div class="form-group">
                                    <label class="file-upload-label">Browse Photo</label>

                                    <file-upload-component :hideLoader="true" @get-response="getFileUploadResponse">

                                    </file-upload-component>

                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">First Name *</label>
                                    <input type="text" class="form-control"
                                    name="first name" :class="['form-control' , errorBag.first('first name') ? 'is-invalid' : '']" v-validate="'required|max:25'" v-model="record.first_name"
                                    placeholder="Enter your first name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Last Name *</label>
                                    <input type="text" class="form-control"
                                    name="last name" :class="['form-control' , errorBag.first('last name') ? 'is-invalid' : '']" v-validate="'required|max:25'" v-model="record.last_name"
                                    placeholder="Enter your last name">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email Address *</label>
                                    <input type="text" :disabled="true" class="form-control" name="email" v-model="record.email" placeholder="Enter your first email address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Contact Number</label>
                                    <input  v-validate="{ regex:/^([+]||\d)([\d-]{10,15})$/ }" :class="['form-control', 'form-group' , errorBag.first('contact number') ? 'is-invalid' : '']" type="text"
                                    name="contact number" v-model="record.phone_number" placeholder="Enter your mobile or landline number">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="business-detail">
                        <div class="form-label-heading m-b-30">
                            <p>ABOUT YOU</p>
                        </div>


                      <div class="service-offered">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Are you a Business or Individual</label>
                              <select v-model="record.service_provider_profile.business_type" v-validate="'required'" name="service"
                                      :class="['form-control' , errorBag.first('service') ? 'is-invalid' : '']" class="form-control">
                                <option v-for="businessType in [{id: 1, name: 'individual'}, {id: 1, name: 'business'}]" :value="businessType.name">
                                  {{ businessType.name.charAt(0).toUpperCase() + businessType.name.substr(1).toLowerCase() }}
                                </option>
                              </select>
                            </div>
                          </div>
                          <div v-if="record.service_provider_profile.business_type === 'business'" class="col-md-6">
                            <div class="form-group">
                              <label>Business Name</label>
                              <input placeholder="Enter business name.service-professional .multiselect__tags span" v-model="record.service_provider_profile.business_name" v-validate="'required'" name="business_name"
                                      :class="['form-control' , errorBag.first('business_name') ? 'is-invalid' : '']" class="form-control"/>
                            </div>
                          </div>
                        </div>
                      </div>


                      <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Years of Experience</label>
                                    <input v-validate="{required: businessRequired, numeric: true, max : 3}" :class="['form-control', 'form-group' , errorBag.first('years of experience') ? 'is-invalid' : '']" type="number" name="years of experience" v-model="record.service_provider_profile.years_of_experience" placeholder="Enter your years of experience">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">About </label>
                                    <textarea v-validate="{required: businessRequired, max : 1000}" :class="['form-control', 'form-group' , errorBag.first('business details') ? 'is-invalid' : '']" name="business details" v-model="record.service_provider_profile.business_details" placeholder="Enter your business details"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-offered">
                        <div class="form-label-heading m-b-30">
                            <p>SERVICES OFFERED</p>
                        </div>
                        <div v-for="(service_detail, index) in record.service_provider_profile.services_offered" class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" v-if="index == 0">Service</label>
                                    <label for="" v-if="index > 0"></label>
                                    <select v-model="record.service_provider_profile.services_offered[index].id" v-validate="'required'" name="service"
                                    :class="['form-control' , errorBag.first('service') ? 'is-invalid' : '']" class="form-control">
                                    <option v-for="service in servicesList" :value="service.id">
                                        {{ service  | mainServiceOrChildService}}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <a v-if="!pendingProfile && index == record.service_provider_profile.services_offered.length-1" @click.prevent="record.service_provider_profile.services_offered.push({ service_id : servicesList[0].id})" href="javascript:;" :class="['add-photos', 'mt-35']">+ Add more services</a>
                            <a v-id="service_detail.status != 'approved'" v-if="!pendingProfile && index < record.service_provider_profile.services_offered.length-1" @click.prevent="record.service_provider_profile.services_offered.splice(index, 1)" href="javascript:;" :class="['add-photos', 'mt-35']"><strong>X</strong></a>
                        </div>
                    </div>
                </div>

                <div class="home-detail">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" class="form-control" name="address" v-model="record.address" placeholder="Enter your street address">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Area</label>

                            <div class="custom-multi multiselect-z-index">
                                <multiselect  v-model="record.city_area" :options="cityAreas"  placeholder="Select area" track-by="id" label="name"  open-direction="bottom" :options-limit="500" :limit="8" :max-height="700" name="search" :internal-search="true">
                                </multiselect>
                            </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div v-if="!pendingProfile" class="submit-approval-btn">
                    <button :class="['btn', 'btn-primary', loading ? 'show-spinner' : '']">Complete Profile
                        <loader></loader>
                    </button>
                </div>

                <div class="margin-bottom-20px form-detail">
                    <p>Please make sure all the information you entered is accurate before submitting.</p>
                </div>

                <!-- Alert Tag -->
                <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>
                <!-- Alert Tag -->

                <b-alert v-if="pendingProfile" variant="info" show>
                  <p><strong>Info : </strong> Your account is currently in pending process</p>
              </b-alert>


          </form>
      </div>

  </div>

  <vue-common-methods :updateForm="true" @form-error="formError" @form-submitted="formSubmitted" :submitUrl="submitUrl" :formData="submitFormData" :submit="submit" :url="requestUrl" @get-records="getResponse"></vue-common-methods>

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
                record : [],
                submitFormData : {
                    user_details : {

                    }
                },
                url : 'api/user/me?details[profile_data]=true&details[provider_request_data]=true',
                showNoRecordFound : false,
                search : '',
                loading : false,
                isFileUpload : false,
                file: null,
                profileImage : '',
                value: '',
                value_month:'',
                value_year:'',
                time1: '',
                time2: '',
                time3: '',
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
                submit : false,
                pendingProfile : false,
                isSubmit : false,
                isPaymentDetailShow : true,
                plans : [],
                accountCreationAmount: null,
                selectedPlan :null,
                currentCity: null,
            }
        },
        computed : {
            cityAreas(){
              return this.$store.getters.getAreasList;
            },
            requestUrl(){
                return this.url;
            },
            requestCityUrl(){
                return this.cityUrl;
            },
            imageValue(){
                return this.profileImage;
            },
            servicesList(){
                return _.filter(this.$store.getters.getAllServices, ['status', 1]);
            },
            submitUrl(){
                return 'api/user/' + this.record.id;
            },
            businessRequired(){
                return this.record.service_provider_profile.business_type == 'business';
            }
        },

        watch: {
        },
        methods: {
            findUniqueValues(){
                let self = this;
                let services_offered = self.record.service_provider_profile.services_offered;

                var result = _.map(services_offered, function(serviceDetail, serviceDetailIndex) {
                    var eq = _.find(services_offered, function(findServiceDetail, findIndex) {
                        if (serviceDetailIndex != findIndex) {
                            if(findServiceDetail.service_id ==  serviceDetail.service_id){
                                return findServiceDetail;
                            }
                        }
                    });
                    if (typeof(eq) != 'undefined') {
                        return eq;
                    }
                });

                for (var i = result.length - 1; i >= 0; i--) {
                    if(typeof(result[i]) != 'undefined'){
                        return true;
                    }
                }

                return false;

            },
            validateBeforeSubmit() {
                let self = this;
                this.errorMessage = '';
                this.isSubmit = false

                this.$validator.validateAll().then((result) => {
                    if (result) {
                        if(this.findUniqueValues()){
                            this.errorMessage = 'Please remove duplicate services';
                            return false;
                        }

                        _.forEach(self.record, function(value, key) {

                            if(key == 'business_details' || key == 'services_offered'){
                                if(key == 'services_offered'){
                                    for (var i = value.length - 1; i >= 0; i--) {
                                        value[i].id = value.service_provider_profile_request_id;
                                    }
                                }

                                self.submitFormData[key] = value;

                            }else{
                                self.submitFormData.user_details[key] = value;
                            }
                            delete self.submitFormData.user_details.stripe_token;
                            self.submitFormData.user_details['is_profile_completed'] = 1;


                        });

                        if (! self.record.city_area ){
                          this.errorMessage = 'Please select an area.';
                          return false;
                        }

                        self.submitFormData.user_details.city_area_id = self.record.city_area.id;

                        this.submit = true;
                        this.loading = true;

                        this.errorMessage = ''
                        return;
                    }
                    this.errorMessage = this.errorBag.all()[0];
                });
            },
            formError(error){
                this.loading = false;
                this.submit = false;
            },
            formSubmitted(response){

                if(response.data){
                    this.$store.commit('setAuthUser', response.data);

                    this.$router.push({ name : 'my.bids'});

                }
            },
            getFileUploadResponse(response){
                let self = this;
                self.record.profile_image = response.name;
                self.profileImage = response.upload_url;
            },
            getResponse(response){
                let self = this;
                if(response.data.id){

                    self.loading = false;
                    self.record = response.data;
                    console.log(self.record);
                    if(!self.record.service_provider_profile.business_type){
                      self.record.service_provider_profile.business_type = 'individual'
                    }

                    if(!self.record.service_provider_profile.services_offered.length){
                        self.record.service_provider_profile.services_offered = [{
                            service_id : 1
                        }];
                    }

                  if(!self.record.service_provider_profile.business_type){
                    self.record.service_provider_profile.business_type = 'business';
                  }

                    self.profileImage = self.record.profileImage;
                }
            },
        },
        mounted () {
        },
    }
</script>
