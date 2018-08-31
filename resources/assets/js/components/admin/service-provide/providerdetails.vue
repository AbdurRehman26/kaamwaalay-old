<template>
    <div class="panel-inner">
        <div v-if="Object.keys(records).length" class="main-detail-content">

            <div class="provider-detail">

                <div class="col-xs-12">
                    <div class="customer-detail-title">
                        <h2 class="page-title">{{ records.user_detail | fullName }}</h2>
                    </div>
                </div>

                <!-- Basic Detail -->

                <div class="col-xs-12 block-area">
                    <div class="view-details-list">
                        <b-row>
                            <b-col class="text-right fixed-label">
                                <p><strong class="title-head">First Name</strong></p>
                            </b-col>
                            <b-col class="calculated-value">
                                <p>{{ records.user_detail ? records.user_detail.first_name : '' }}</p>
                            </b-col>
                        </b-row>
                        <b-row>
                            <b-col class="text-right fixed-label">
                                <p><strong class="title-head">Last Name</strong></p>
                            </b-col>
                            <b-col class="calculated-value">
                                <p>{{ records.user_detail ? records.user_detail.last_name : '' }}</p>
                            </b-col>
                        </b-row>                                                                
                        <b-row>
                            <b-col  class="text-right fixed-label">
                                <p><strong class="title-head">Email Address</strong></p>
                            </b-col>
                            <b-col class="calculated-value">
                                <a href="mailto:bobbyrodes@gmail.com">
                                    {{ records.user_detail ? records.user_detail.email : '' }}
                                </a>
                            </b-col>
                        </b-row>
                        <b-row>
                            <b-col  class="text-right fixed-label">
                                <p><strong class="title-head">Address</strong></p>
                            </b-col>
                            <b-col class="calculated-value">
                                <p>
                                    {{ records.user_detail ? records.user_detail.address : '' }}
                                </p>
                            </b-col>
                        </b-row>                                
                        <b-row>
                            <b-col  class="text-right fixed-label">
                                <p><strong class="title-head">Contact</strong></p>
                            </b-col>
                            <b-col class="calculated-value">
                                <a :href="records.user_detail | phoneNumber">{{ records.user_detail ? records.user_detail.phone_number : '' }}</a>
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
                                <p>{{records.business_type == 'individual' ? 'I' : 'B'}}</p>
                            </b-col>
                        </b-row>
                        <b-row>
                            <b-col  class="text-right fixed-label">
                                <p><strong class="title-head">Business Name</strong></p>
                            </b-col>
                            <b-col class="calculated-value">
                                <p>{{records.business_name}}</p>
                            </b-col>
                        </b-row>                                                                
                        <b-row>
                            <b-col  class="text-right fixed-label">
                                <p><strong class="title-head">DUNS Number</strong></p>
                            </b-col>
                            <b-col class="calculated-value">
                                <p>{{records.duns_number}}</p>
                            </b-col>
                        </b-row>
                        <b-row>
                            <b-col  class="text-right fixed-label">
                                <p><strong class="title-head">Rating</strong></p>
                            </b-col>
                            <b-col class="calculated-value">
                                <star-rating :star-size="20" :increment="0.02" read-only :rating="records.user_detail ? parseInt(records.user_detail.average_rating) : 0" active-color="#8200ff"></star-rating>
                            </b-col>
                        </b-row>                                                                   
                        <b-row>
                            <b-col  class="text-right fixed-label">
                                <p><strong class="title-head">Status</strong></p>
                            </b-col>
                            <b-col class="calculated-value">
                                <p :class="['status-color', records.user_detail ? records.user_detail.status : '']">
                                    {{records.user_detail ? records.user_detail.status.toUpperCase() : ''}}
                                </p>
                            </b-col>
                        </b-row>                                 
                        <b-row>
                            <b-col  class="text-right fixed-label">
                                <p><strong class="title-head">Join Date</strong></p>
                            </b-col>
                            <b-col class="calculated-value">
                                <p>{{records.formatted_created_at}}</p>
                            </b-col>
                        </b-row>                                 
                        <b-row>
                            <b-col  class="text-right fixed-label">
                                <p><strong class="title-head">Approval Date</strong></p>
                            </b-col>
                            <b-col class="calculated-value">
                                <p>{{records.profile_request ? records.profile_request.formatted_approved_at : ''}}</p>
                            </b-col>
                        </b-row>                                                                                                 
                    </div>
                </div>



                <!-- Service Detail -->

                <div class="col-xs-12 block-area">

                    <div class="view-details-list">
                        <b-row>
                            <b-col  class="text-right fixed-label">
                                <p><strong class="title-head">Total Jobs Initiated</strong></p>
                            </b-col>
                            <b-col class="calculated-value">
                                <p>{{records.initiated_jobs ?  records.initiated_jobs : 0}}</p>
                            </b-col>
                        </b-row>
                        <b-row>
                            <b-col  class="text-right fixed-label">
                                <p><strong class="title-head">Total Jobs Finished</strong></p>
                            </b-col>
                            <b-col class="calculated-value">
                                <p>{{records.finished_jobs ?  records.finished_jobs : 0}}</p>
                            </b-col>
                        </b-row>                                                                
                        <b-row>
                            <b-col  class="text-right fixed-label">
                                <p><strong class="title-head">Total Urgent Jobs Created</strong></p>
                            </b-col>
                            <b-col class="calculated-value">
                                <p>{{records.urgent_jobs_created ?  records.urgent_jobs_created : 0}}</p>
                            </b-col>
                        </b-row>
                        <b-row>
                            <b-col  class="text-right fixed-label">
                                <p><strong class="title-head">Total Urgent Jobs Completed</strong></p>
                            </b-col>
                            <b-col class="calculated-value">
                                <p>{{records.urgent_jobs_completed ?  records.urgent_jobs_completed : 0}}</p>
                            </b-col>
                        </b-row>                                                                   
                        <b-row>
                            <b-col  class="text-right fixed-label">
                                <p><strong class="title-head">Total revenue earned</strong></p>
                            </b-col>
                            <b-col class="calculated-value">
                                <p>{{records.total_revenue ?  records.total_revenue : 0}}</p>
                            </b-col>
                        </b-row>                                 
                        <b-row>
                            <b-col  class="text-right fixed-label">
                                <p><strong class="title-head">Related activites</strong></p>
                            </b-col>
                            <b-col v-show="records.services_offered" class="calculated-value">
                                <span v-for="service in records.services_offered" class="tags">{{service}}</span>
                            </b-col>
                        </b-row>                                 
                        <b-row>
                            <b-col  class="text-right fixed-label">
                                <p><strong class="title-head">Job Details</strong></p>
                            </b-col>

                            <b-col class="calculated-value">
                                <a href="javascript:void(0);" @click="ServiceJobDetail(records.user_id)">See All</a>
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
            noRecordFound : false,
            records : [],
            url : 'api/service-provider-profile'
        }
    },
    components: {
        StarRating
    },    
    methods: {
        ServiceJobDetail(id) {
            this.$router.push({name: 'viewservicejobdetail', params : {id : id}});
        },
        getRecords(response){
            let self = this;
            self.loading = false;
            self.records = response.data;
            self.noRecordFound = response.noRecordFound;
        },
    },
    computed : {
        requestUrl(){
            return this.url+'/'+this.$route.params.id+'?user_rating=true&profile_data=true&provider_request_data=true';
        },
    },

}

</script>
