<template>
    <div class="panel-inner">
        <div class="view-details-list main-detail-content">

                <!-- <div class="provider-image user-img">
                    <img src="">
                </div> -->


                <div class="provider-detail">

                    <div class="col-xs-12">
                        <div class="customer-detail-title">
                            <h2 class="page-title">{{records.user | fullName}}</h2>
                        </div>
                    </div>

                    <!-- Basic Detail -->

                    <div class="col-xs-12 block-area">
<!--                             <div class="customer-detail-title">
                                <h4 class="page-title">Basic Detail</h4>
                            </div> -->
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
                                        <a href="tel:+923214325323">{{ records.user ? records.user.phone_number : '' }}</a>
                                    </b-col>
                                </b-row>
                            </div>
                        </div>


                        <!-- Profile Detail -->

                        <div class="col-xs-12 block-area">
<!--                             <div class="customer-detail-title">
                                <h4 class="page-title">Profile Detail</h4>
                            </div> -->
                            <div class="view-details-list">
                                <b-row>
                                    <b-col  class="text-right fixed-label">
                                        <p><strong class="title-head">Business or Individual?</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>{{records.provider_profile && records.provider_profile.business_type == 'individual' ? 'I' : 'B'}}</p>
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
                                        <p>{{records.approved_by_user}}</p>    
                                    </b-col>
                                </b-row>
                            </div>
                        </div>

                        <!-- Service Detail -->
                        <div class="col-xs-12 block-area">
 <!--                            <div class="customer-detail-title">
                                <h4 class="page-title">Service Detail</h4>
                            </div> -->
                            <div class="view-details-list">
                                <b-row>
                                    <b-col  class="text-right fixed-label">
                                        <p><strong class="title-head">Certificates</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <a class="underline" href="javascript:void(0);">
                                            Certificates.docx
                                        </a>
                                        <span>,</span>
                                        <a class="underline" href="javascript:void(0);">
                                            Certificates2.docx
                                        </a>
                                    </b-col>
                                </b-row>
                                <b-row>
                                    <b-col  class="text-right fixed-label">
                                        <p><strong class="title-head">Registrations</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <a class="underline" href="javascript:void(0);">
                                            Registrations.docx
                                        </a>
                                        <span>,</span>
                                        <a class="underline" href="javascript:void(0);">
                                            Registrations2.docx
                                        </a>
                                    </b-col>
                                </b-row>
                                <b-row>
                                    <b-col  class="text-right fixed-label">
                                        <p><strong class="title-head">Proof of business</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <a class="underline" href="javascript:void(0);">
                                            BusinessProof.docx
                                        </a>
                                        <span>,</span>
                                        <a class="underline" href="javascript:void(0);">
                                            BusinessProof2.docx
                                        </a>
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
                                    <b-col class="calculated-value">
                                        <b-form-select v-model="selected" :options="options" class="max-field margin-bottom-20px"/>                                   
                                    </b-col>
                                    <b-col>
                                       <!--  <button class="btn btn-primary">
                                            <span>Apply</span>
                                            <loader></loader>
                                        </button> -->
                                    </b-col>
                                </b-row>

                                <b-row>
                                    <b-col  class="text-right fixed-label">
                                        <p><strong class="title-head">Action</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <button class="btn btn-primary">
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
                    { value: 'a', text: 'Pending' },
                    { value: 'b', text: 'In-Review' },
                    { value: 'c', text: 'Rejected' },
                    { value: 'd', text: 'Approved' }
                    ],
                    url : 'api/service-provider-profile-request',
                    records : [],
                }
            },
            computed : {
                requestUrl(){
                    return this.url+'/'+this.$route.params.id+'?user_details=true&profile_details=true';
                }
            },
            methods : {
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
