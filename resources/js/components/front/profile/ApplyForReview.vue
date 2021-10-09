<template>
    <div class="section padding-sm profile-form wrapper-sm">
        <div class="profile-head">
            <h1>Complete your profile &amp; apply for Review</h1>
            <p>To build safety on PSM, we review and approve service provider profiles. All information provided below will be kept secure.</p>
        </div>

        <div v-if="Object.keys(record).length && record.business_details &&  Object.keys(record.business_details).length" class="profile-form-section apply-review-sec">

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

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Years of Experience</label>
                                    <input v-validate="{required: businessRequired, numeric: true, max : 3}" :class="['form-control', 'form-group' , errorBag.first('years of experience') ? 'is-invalid' : '']" type="number" name="years of experience" v-model="record.business_details.years_of_experience" placeholder="Enter your years of experience">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">About </label>
                                    <textarea v-validate="{required: businessRequired, max : 1000}" :class="['form-control', 'form-group' , errorBag.first('business details') ? 'is-invalid' : '']" name="business details" v-model="record.business_details.business_details" placeholder="Enter your business details"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-offered">
                        <div class="form-label-heading m-b-30">
                            <p>SERVICES OFFERED</p>
                        </div>
                        <div v-for="(service_detail, index) in record.service_details" class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" v-if="index == 0">Service</label>
                                    <label for="" v-if="index > 0"></label>
                                    <select :disabled="service_detail.status == 'approved'"  v-model="record.service_details[index].service_id" v-validate="'required'" name="service"
                                    :class="['form-control' , errorBag.first('service') ? 'is-invalid' : '']" class="form-control">
                                    <option v-for="service in servicesList" :value="service.id">
                                        {{ service  | mainServiceOrChildService}}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <a v-if="!pendingProfile && index == record.service_details.length-1" @click.prevent="record.service_details.push({ service_id : servicesList[0].id})" href="javascript:;" :class="['add-photos', 'mt-35']">+ Add more services</a>
                            <a v-id="service_detail.status != 'approved'" v-if="service_detail.status != 'approved' && !pendingProfile && index < record.service_details.length-1" @click.prevent="record.service_details.splice(index, 1)" href="javascript:;" :class="['add-photos', 'mt-35']"><strong>X</strong></a>
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
                    </div>
                </div>

                <div v-if="!pendingProfile" class="submit-approval-btn">
                    <button :class="['btn', 'btn-primary', loading ? 'show-spinner' : '']">Submit for Approval
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
                return this.record.business_details.business_type == 'business';
            }
        },

        watch: {
        },
        methods: {
            removeFile(type, index){
                this.record.business_details.attachments[type].splice(index , 1);
                this.$forceUpdate();
                return false;

            },
            findUniqueValues(){
                let self = this;
                let service_details = self.record.service_details;

                var result = _.map(service_details, function(serviceDetail, serviceDetailIndex) {
                    var eq = _.find(service_details, function(findServiceDetail, findIndex) {
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
            checkUploadedDocuments(){

                let attachments = this.record.business_details.attachments;

                if(typeof(attachments['certifications']) == 'undefined' || !attachments['certifications'][0]){
                    return false;
                }

                if(typeof(attachments['registrations']) == 'undefined' || !attachments['registrations'][0]){
                    return false;
                }

                if(typeof(attachments['proof_of_business']) == 'undefined' || !attachments['proof_of_business'][0]){
                    return false;
                }

                return true;

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

                        if(!this.checkUploadedDocuments()){
                            this.errorMessage = 'Please add at least one file for each document';
                            return false;
                        }


                        _.forEach(self.record, function(value, key) {

                            if(key == 'business_details' || key == 'service_details'){
                                if(key == 'service_details'){
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
                        if(!this.isPaymentDetailShow){
                            this.submit = true;
                            this.loading = true;
                        }else{
                            setTimeout(function () {
                                if(!self.errorMessage){
                                    self.isSubmit = true
                                }else{
                                    self.isSubmit = false
                                }
                            }, 500);

                        }
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
            getDocumentUploadResponse(response, type){
                var lengthOfAttachmentTypes = this.record.business_details.attachments[type];

                if(typeof(lengthOfAttachmentTypes) == 'undefined' || !lengthOfAttachmentTypes.length){
                    this.record.business_details.attachments[type] = [];
                }

                this.record.business_details.attachments[type].push({
                   name : response.name,
                   original_name : response.original_name
               });

                this.$forceUpdate();
            },
            getResponse(response){
                let self = this;
                if(response.data.id){

                    self.loading = false;
                    self.record = response.data;

                    if(self.record && self.record.business_details && !self.record.business_details.attachments){

                        self.record.business_details.attachments = {
                        }

                    }

                    if(self.record.service_details.length){

                        for (var i = self.record.service_details.length-1; i >= 0; i--) {
                            if(self.record.service_details[i].status == 'pending'){
                                self.pendingProfile = true;
                            }
                        }
                    }

                    if(!self.record.service_details.length){
                        self.record.service_details = [{
                            service_id : 1
                        }];
                    }

                    if(self.record.business_details){

                        if(!self.record.business_details.business_type){
                            self.record.business_details.business_type = 'business';
                        }
                    }

                    self.profileImage = self.record.profileImage;
                }

            },
            paymentDetailShow(){
                let user = JSON.parse(this.$store.getters.getAuthUser)
                if(user.is_profile_completed){
                    this.isPaymentDetailShow = false
                }else{
                    this.isPaymentDetailShow = true
                }
            },
            getPlansList (){
                let self = this;
                let url = 'api/plan';
                let params = {
                    pagination: false,
                    type: 'service',
                    product: 'account_creation',
                };
                self.$http.get(url, {params: params}).then(response=>{
                    self.plans = response.data.data
                    self.selectedPlan = self.plans[0].id
                    self.accountCreationAmount = self.plans[0].amount
                }).catch(error=>{
                });
            },
        },
        mounted () {
            this.getPlansList(),
            this.paymentDetailShow()
        },
    }
</script>
