<template>
    <div class="panel-inner">
        <div v-if="Object.keys(records).length" class="view-details-list main-detail-content">

            <div class="provider-detail">

                <div class="col-xs-12">
                    <div class="customer-detail-title">
                        <h2 class="page-title">{{records.user | fullName}}</h2>
                    </div>
                </div>

                <!-- Basic Detail -->

                <div class="col-xs-12 block-area">

                    <div class="view-details-list">
                        <b-row>
                            <b-col  class="text-right fixed-label">
                                <p><strong class="title-head">First Name</strong></p>
                            </b-col>
                            <b-col class="calculated-value">
                                <p>{{records.user ? records.user.first_name : ''}}</p>
                            </b-col>
                        </b-row>
                        <b-row>
                            <b-col  class="text-right fixed-label">
                                <p><strong class="title-head">Last Name</strong></p>
                            </b-col>
                            <b-col class="calculated-value">
                                <p>{{records.user ? records.user.last_name : ''}}</p>
                            </b-col>
                        </b-row>
                        <b-row>
                            <b-col  class="text-right fixed-label">
                                <p><strong class="title-head">Email Address</strong></p>
                            </b-col>
                            <b-col class="calculated-value">
                                <p href="mailto:bobbyrodes@gmail.com">{{records.user ? records.user.email : ''}}</p>
                            </b-col>
                        </b-row>
                        <b-row>
                            <b-col  class="text-right fixed-label">
                                <p><strong class="title-head">Address</strong></p>
                            </b-col>
                            <b-col class="calculated-value">
                                <p>{{records.user ? records.user.address : ''}}</p>
                            </b-col>
                        </b-row>
                        <b-row>
                            <b-col  class="text-right fixed-label">
                                <p><strong class="title-head">Years of Experience</strong></p>
                            </b-col>
                            <b-col class="calculated-value">
                                <p>{{records.provider_profile ? records.provider_profile.years_of_experience : ''}}</p>
                            </b-col>
                        </b-row>

                        <b-row>
                            <b-col  class="text-right fixed-label">
                                <p><strong class="title-head">Contact</strong></p>
                            </b-col>
                            <b-col class="calculated-value">
                                <a :href="records.user | phoneNumber">{{ records.user ? records.user.phone_number : '' }}</a>
                            </b-col>
                        </b-row>
                    </div>
                </div>


                <!-- Profile Detail -->

                <div class="col-xs-12 block-area">

                    <div class="view-details-list">
                        <b-row>
                            <b-col  class="text-right fixed-label">
                                <p><strong class="title-head">Business or Individual?</strong></p>
                            </b-col>
                            <b-col class="calculated-value">
                                <p>{{records.provider_profile && records.provider_profile.business_type == 'individual' ? 'Individual' : 'Business'}}</p>
                            </b-col>
                        </b-row>
                        <b-row>
                            <b-col  class="text-right fixed-label">
                                <p><strong class="title-head">Business Name</strong></p>
                            </b-col>
                            <b-col class="calculated-value">
                                <p>{{records.provider_profile ? records.provider_profile.business_name : ''}}</p>
                            </b-col>
                        </b-row>
                        <b-row>
                            <b-col  class="text-right fixed-label">
                                <p><strong class="title-head">DUNS Number</strong></p>
                            </b-col>
                            <b-col class="calculated-value">
                                <p>{{records.provider_profile ? records.provider_profile.duns_number : ''}}</p>
                            </b-col>
                        </b-row>
                        <b-row>
                            <b-col  class="text-right fixed-label">
                                <p><strong class="title-head">Review</strong></p>
                            </b-col>
                            <b-col class="calculated-value">
                                <span :class="['tags', records.status]">{{records.status}}</span>
                            </b-col>
                        </b-row>
                        <b-row>
                            <b-col  class="text-right fixed-label">
                                <p><strong class="title-head">Submited Date</strong></p>
                            </b-col>
                            <b-col class="calculated-value">
                                <p>{{records.formatted_created_at}}</p>    
                            </b-col>
                        </b-row>
                        <b-row>
                            <b-col  class="text-right fixed-label">
                                <p><strong class="title-head">Updated Date</strong></p>
                            </b-col>
                            <b-col class="calculated-value">
                                <p>{{records.formatted_updated_at}}</p>    
                            </b-col>
                        </b-row>
                        <b-row>
                            <b-col  class="text-right fixed-label">
                                <p><strong class="title-head">Reviewed by</strong></p>
                            </b-col>
                            <b-col class="calculated-value">
                                <p>{{records.approved_by_user | fullName}}</p>    
                            </b-col>
                        </b-row>
                    </div>
                </div>

                <!-- Service Detail -->
                <div class="col-xs-12 block-area">

                    <div class="view-details-list">
                        <b-row>
                            <b-col  class="text-right fixed-label">
                                <p><strong class="title-head">Certificates</strong></p>
                            </b-col>
                            <b-col class="calculated-value">
                                <span v-for="(attachment, index) in records.provider_profile.attachmentsUrl.certifications">     
                                    <a target="_blank" download class="underline" :href="attachment.name">
                                        {{ attachment.original_name }}
                                    </a>
                                    &nbsp;
                                </span>
                            </b-col>
                        </b-row>
                        <b-row>
                            <b-col  class="text-right fixed-label">
                                <p><strong class="title-head">Registrations</strong></p>
                            </b-col>
                            <b-col v-if="records.provider_profile.attachmentsUrl" class="calculated-value">

                                <span v-for="(attachment, index) in records.provider_profile.attachmentsUrl.registrations">
                                    <a target="_blank" download   class="underline" :href="attachment.name">
                                        {{ attachment.original_name }}
                                    </a>
                                    &nbsp;
                                </span>
                            </b-col>
                        </b-row>
                        <b-row>
                            <b-col  class="text-right fixed-label">
                                <p><strong class="title-head">Proof of business</strong></p>
                            </b-col>
                            <b-col v-if="records.provider_profile.attachmentsUrl" class="calculated-value">
                                <span v-for="(attachment, index) in records.provider_profile.attachmentsUrl.proof_of_business">

                                    <a target="_blank" download class="underline" :href="attachment.name">
                                        {{ attachment.original_name }} 
                                    </a>
                                    
                                    &nbsp;
                                </span>
                            </b-col>
                        </b-row>
                        <b-row>
                            <b-col  class="text-right fixed-label">
                                <p><strong class="title-head">Profile/business details</strong></p>
                            </b-col>
                            <b-col class="calculated-value max-text">
                                <p>{{records.provider_profile ?  records.provider_profile.business_details : ''}}</p>
                            </b-col>
                        </b-row>

                        <b-row>
                            <b-col  class="text-right fixed-label">
                                <p><strong class="title-head">Status</strong></p>
                            </b-col>
                            <b-col class="calculated-value general-setting">
                                <b-form-select v-validate="'required'" :disabled="records.status  | disableProfileStatusButton" v-model="selected" :options="options" class="max-field margin-bottom-20px"/>                                   
                                <textarea placeholder="Enter rejection reason" v-model="reason" name="reason" v-validate="'required'" 
                                v-if="selected == 'rejected' && records.status != 'rejected' && records.status != 'approved'"  
                                class="rejected-textbox form-control margin-bottom-20px">
                            </textarea>
                        </b-col>
                    </b-row>

                    <b-row>
                        <b-col  class="text-right fixed-label">
                            <p><strong class="title-head">Action</strong></p>
                        </b-col>
                        <b-col class="calculated-value">
                            <button @click.prevent="validateBeforeSubmit();"
                            :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-primary']" :disabled="records.status  | disableProfileStatusButton">
                            <span>Apply</span>
                            <loader></loader>
                        </button>                       
                    </b-col>
                </b-row>

            </div>
        </div>
    </div>
</div>
<vue-common-methods :url="requestUrl" @get-records="getRecords"></vue-common-methods>

</div>
</template>

<script>
    import StarRating from 'vue-star-rating';
    export default{
        data () {
          return {
            selected: null,
            options: [
            { value: null, text: 'Please select Status' },
            { value: 'rejected', text: 'Rejected' },
            { value: 'approved', text: 'Approved' }
            ],
            url : 'api/service-provider-profile-request',
            records : [],
            errorMessage : '',
            successMessage : '',
            loading : false,
            reason : ''
        }
    },
    computed : {
        requestUrl(){
            return this.url+'/'+this.$route.params.id+'?user_details=true&profile_details=true';
        }
    },
    methods : {
       validateBeforeSubmit() {
        let self = this;
        self.errorMessage = '';
        self.$validator.validateAll().then((result) => {
         if (result) {
          self.onSubmit();
          self.errorMessage =  '';
          return;
      }
      self.errorMessage =  self.errorBag.all()[0];
  });
    },
    onSubmit(){
        let self = this;
        self.loading = true;
        let url = self.url + '/' + this.$route.params.id;
        let data = {
            status : self.selected,
            reason : self.reason
        };

        self.$http.put(url , data).then(response=>{
         self.loading = false;
         response = response.data;
         self.records.status = response.data.status;
         self.records.approved_by_user = response.data.approved_by_user;

     }).catch(error=>{
        console.log('error' , error);

    });

 }, 
 getRecords(response){
    let self = this;
    self.loading = false;
    self.records = response.data;
    self.noRecordFound = response.noRecordFound;
},
},
components: {
    StarRating
},
}

</script>
