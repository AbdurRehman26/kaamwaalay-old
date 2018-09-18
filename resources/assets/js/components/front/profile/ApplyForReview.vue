<template>	
    <div class="section padding-sm profile-form wrapper-sm">
        <div class="profile-head">
            <h1>Complete your profile &amp; apply for Review</h1>
            <p>To build safety on PSM, we review and approve service provider profiles. All information provided below will be kept secure.</p>
        </div>

        <div v-if="Object.keys(record).length" class="profile-form-section apply-review-sec">

            <div class="form-signup">
                <form @submit.prevent="validateBeforeSubmit">
                    <div class="personal-provider-detail">
                        <div class="profile-image-placeholder">
                            <img :src="imageValue">
                        </div>						
                        <div class="row">
                            <div class="browse-btn">
                                <div class="form-group">
                                    <label class="file-upload-label">Browse Photo</label>

                                    <file-upload-component @get-response="getFileUploadResponse">

                                    </file-upload-component>

                                </div>
                            </div>
                        </div>

                        <!-- Alert Tag -->
                        <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>        
                        <!-- Alert Tag -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">First Name *</label>
                                    <input type="text" v-validate="'required'" class="form-control"
                                    name="first name" :class="['form-control' , errorBag.first('first name') ? 'is-invalid' : '']" v-model="record.first_name" 
                                    placeholder="Enter your first name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Last Name *</label>
                                    <input type="text" v-validate="'required'" class="form-control"
                                    name="last name" :class="['form-control' , errorBag.first('last name') ? 'is-invalid' : '']" v-model="record.last_name" 
                                    placeholder="Enter your last name">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email Address</label>
                                    <input type="text" :disabled="true" class="form-control" name="email" v-model="record.email" placeholder="Enter your first email address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Contact Number</label>
                                    <input  v-validate="{ regex:/^(1\s?)?((\([0-9]{3}\))|[0-9]{3})[\s\-]?[\0-9]{3}[\s\-]?[0-9]{4}$/ }" :class="['form-control', 'form-group' , errorBag.first('phone number') ? 'is-invalid' : '']" type="text"
                                    name="phone number" v-model="record.phone_number" placeholder="Enter your mobile or landline number">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="business-detail">
                        <div class="form-label-heading m-b-30">
                            <p>BUSINESS DETAILS</p>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Are you an individual or a business?</label>

                                    <select :class="['form-control', 'form-group' , errorBag.first('business_type') ? 'is-invalid' : '']" v-validate="'required'" name="business_type" v-model="record.business_details.business_type">
                                        <option value="business">Business</option>
                                        <option value="individual">Individual</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">DUNS Number <span v-b-tooltip.hover title="This is required for business verification" class="duns-help-icon"><i class="icon-help"></i></span></label>
                                    <input :class="['form-control', 'form-group' , errorBag.first('duns') ? 'is-invalid' : '']" type="text" name="duns" v-model="record.business_details.duns_number" placeholder="Enter your duns number">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Business Name</label>
                                    <input :class="['form-control', 'form-group' , errorBag.first('business_name') ? 'is-invalid' : '']" type="text" name="business_name" v-model="record.business_details.business_name" placeholder="Enter your business name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Working since</label>
                                    <input :class="['form-control', 'form-group' , errorBag.first('working_since') ? 'is-invalid' : '']" type="number" name="years_of_exprience" v-model="record.business_details.years_of_exprience" placeholder="Enter your years of exprience">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">About</label>
                                    <textarea :class="['form-control', 'form-group' , errorBag.first('business_details') ? 'is-invalid' : '']" name="business_details" v-model="record.business_details.business_details" placeholder="Enter your business details"></textarea>
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
                                    <label for="">Service</label>
                                    <select v-model="record.service_details[index].service_id" v-validate="'required'" name="service" 
                                    :class="['form-control' , errorBag.first('service') ? 'is-invalid' : '']" class="form-control">
                                    <option value="">Select All</option>
                                    <option v-for="service in servicesList" :value="service.id">
                                        {{ service  | mainServiceOrChildService}}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <a v-if="!pendingProfile && index == record.service_details.length-1" @click.prevent="record.service_details.push({ service_id : ''})" href="javascript:;" :class="['add-photos', 'mt-35']">+ Add more services</a>
                            <a v-if="!pendingProfile && index < record.service_details.length-1" @click.prevent="record.service_details.splice(index, 1)" href="javascript:;" :class="['add-photos', 'mt-35']"><strong>X</strong></a>
                        </div>
                    </div>
                </div>

                <div class="business-proof">
                    <div class="form-label-heading m-b-30">
                        <p>PROOF OF BUSINESS</p>
                    </div>                    
                    <div class="row">
                        <div class="col-md-12">
                            <p>We can confirm your association to the business or organization with any of these documents:
                                <ul>
                                    <!-- <li>Certificate of Formation (for a partnership)</li> -->
                                    <!-- <li>Articles of Incorporation (for a corporation)</li> -->
                                    <!-- <li>Local Business License (issued by your city, county, state, etc.)</li> -->
                                    <li>More documents to be decided.</li>
                                </ul>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group custom-file">
                                <label>Browse</label>
                                <file-upload-component :uploadKey="'service_provider'" @get-response="getFileUploadResponse">

                                </file-upload-component>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>&nbsp;</label>
                            <a href="javascript:;" class="add-photos filter-btn-top-space">+ Add more photos</a>
                        </div>
                    </div>
                </div>

                <div class="business-proof">
                    <div class="row">
                        <div class="col-md-12">
                            <p>We can confirm your association to the business or organization with any of these documents:
                                <ul>
                                    <!-- <li>Certificate of Formation (for a partnership)</li> -->
                                    <!-- <li>Articles of Incorporation (for a corporation)</li> -->
                                    <!-- <li>Local Business License (issued by your city, county, state, etc.)</li> -->
                                    <li>More documents to be decided.</li>
                                </ul>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group custom-file">
                                <label>Browse</label>
                                <file-upload-component :uploadKey="'service_provider'" @get-response="getFileUploadResponse">

                                </file-upload-component>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>&nbsp;</label>
                            <a href="javascript:;" class="add-photos filter-btn-top-space">+ Add more photos</a>
                        </div>
                    </div>
                </div>

                <div class="business-proof">
                    <div class="row">
                        <div class="col-md-12">
                            <p>We can confirm your association to the business or organization with any of these documents:
                                <ul>
                                    <!-- <li>Certificate of Formation (for a partnership)</li> -->
                                    <!-- <li>Articles of Incorporation (for a corporation)</li> -->
                                    <!-- <li>Local Business License (issued by your city, county, state, etc.)</li> -->
                                    <li>More documents to be decided.</li>
                                </ul>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group custom-file">
                                <label>Browse</label>
                                <file-upload-component :uploadKey="'service_provider'" @get-response="getFileUploadResponse">

                                </file-upload-component>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>&nbsp;</label>
                            <a href="javascript:;" class="add-photos filter-btn-top-space">+ Add more photos</a>
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
                                <label for="">Apartment, Suite, Unit</label>
                                <input type="text" class="form-control" name="apartment" v-model="record.apartment" placeholder="Enter your apartment and suite number">
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">State *</label>
                                <select :class="['form-control', 'form-group' , errorBag.first('state') ? 'is-invalid' : '']" v-validate="'required'" @change="onStateChange" name="state" v-model="record.state_id">
                                    <option :value="null">Select State</option>
                                    <option v-for="state in states" :value="state.id">{{state.name}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">City *</label>
                                <select name="city" :class="['form-control', 'form-group' , errorBag.first('city') ? 'is-invalid' : '']"  v-validate="'required'" v-model="record.city_id">
                                    <option :value="null">Select City</option>
                                    <option v-for="city in cities" :value="city.id">{{city.name}}</option>
                                </select>
                            </div>
                        </div>


                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Zip Code *</label>
                                <input :class="['form-control', 'form-group' , errorBag.first('zip code') ? 'is-invalid' : '']" v-validate="'required|numeric|max:5'" max="5" type="text" name="zip code" data-vv-name="zip code" v-model="record.zip_code" placeholder="Enter your zip code">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="account-fee">
                    <div class="form-label-heading m-b-30 m-t-30">
                        <p>ACCOUNT FEE</p>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="verification-alert">
                                <p>Enter your credit card details to pay service provider account creation fee of <span>$50</span>.</p>
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
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Card Holder Name</label>
                                <input type="" class="form-control" placeholder="Enter card holder name" name="">
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
                            <label for="">Expiry Date</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group custom-datepicker">
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
                                <div class="col-md-6">
                                    <div class="form-group custom-datepicker">
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
                </div>

                <div class="submit-approval-btn">
                    <button :class="['btn', 'btn-primary', loading ? 'show-spinner' : '']">Submit for Apporoval
                        <loader></loader>
                    </button>
                </div>

                <div class="form-detail">
                    <p>Please make sure all the information you entered is accurate before submitting.</p>
                </div>
            </form>
        </div>

    </div>

    <vue-common-methods :updateForm="true" @form-error="formError" @form-submitted="formSubmitted" :submitUrl="submitUrl" :formData="submitFormData" :submit="submit" :url="requestUrl" @get-records="getResponse"></vue-common-methods>
    <vue-common-methods :hideLoader="true" :url="stateUrl" @get-records="getStateResponse"></vue-common-methods>
    <vue-common-methods :hideLoader="true" v-if="record.state_id" :url="requestCityUrl" @get-records="getCityResponse"></vue-common-methods>


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
                cities : [],
                stateUrl : 'api/state',
                cityUrl : '',
                states : [],
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
                return this.$store.getters.getAllServices;
            },
            submitUrl(){
                return 'api/user/' + this.record.id
            }
        },
        methods: {
            validateBeforeSubmit() {
                let self = this;

                this.$validator.validateAll().then((result) => {
                    if (result) {

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

                        });
                        this.loading = true;
                        this.submit = true;
                        this.errorMessage = ''
                        return;
                    }
                    this.errorMessage = this.errorBag.all()[0];
                });
            },
            formError(error){
                console.log(error , 'inside formError method Apply for review comp');
                this.loading = false;
                this.submit = false;
            },
            formSubmitted(response){
                this.loading = false;
                this.submit = false;
                console.log(response , 'inside formSubmit method Apply for review comp');
            },
            onStateChange(){
                this.record.city_id = null;
                this.cityUrl = 'api/city?state_id=' + this.record.state_id;
            },
            getFileUploadResponse(response){
                console.log(response , 1);
            },
            getResponse(response){
                let self = this;
                
                if(response.data){

                    self.loading = false;
                    self.record = response.data;


                    for (var i = this.record.service_details.length-1; i >= 0; i--) {
                        if(this.record.service_details[i].status == 'pending'){
                            self.pendingProfile = true;
                        }
                    }

                    if(self.record.state_id){  
                        this.cityUrl = 'api/city?state_id=' + this.record.state_id;
                    }
                    self.profileImage = self.record.profileImage;
                }

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

        }
    }
</script>