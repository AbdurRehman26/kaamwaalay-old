<template>
    <div class="panel-inner">
        <div class="main-detail-content">

            <div class="provider-detail">

              <div class="col-xs-12">
                <div class="customer-detail-title">
                    <h2 class="page-title">{{customerDetail.first_name}} {{customerDetail.last_name}}</h2>
                </div>
            </div>
            
            <!-- Basic Detail -->
            
            <div class="col-xs-12 block-area">

                <div class="view-details-list">
                    <b-row>
                        <b-col class="text-right fixed-label">
                            <p><strong class="title-head">First Name </strong></p>
                        </b-col>
                        <b-col class="calculated-value">
                            <p>{{customerDetail.first_name}}</p>
                        </b-col>
                    </b-row>
                    <b-row>
                        <b-col class="text-right fixed-label">
                            <p><strong class="title-head">Last Name</strong></p>
                        </b-col>
                        <b-col class="calculated-value">
                            <p>{{customerDetail.last_name}}</p>
                        </b-col>
                    </b-row>                                                                
                    <b-row>
                        <b-col class="text-right fixed-label">
                            <p><strong class="title-head">Email Address</strong></p>
                        </b-col>
                        <b-col class="calculated-value">
                            <a href="mailto:Chester_Kris15@gmail.com">{{customerDetail.email}}</a>
                        </b-col>
                    </b-row>
<!--                                 <b-row>
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">Address</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>4657 Kirk Highway, Geovannyfurt, Missouri, 39185-5150, Pitcairn Islands  </p>
                                    </b-col>
                                </b-row>       -->                          
                                <b-row>
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">Contact</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <a>{{customerDetail.phone_number}}</a>
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
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">Address</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>{{customerDetail.address}} {{customerDetail.apartment}} {{customerDetail.city}} {{customerDetail.state}} {{customerDetail.country}} </p>
                                    </b-col>
                                </b-row>                                
                                <b-row>
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">Zipcode</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>{{customerDetail.zip_code}}</p>
                                    </b-col>
                                </b-row>                                
                                <b-row>
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">Avg. Rating</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <star-rating :star-size="20" :increment="0.02" read-only :rating="customerDetail.avg_rating" active-color="#8200ff"></star-rating>
                                    </b-col>
                                </b-row>                                                                                                 
                                <b-row>
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">Join Date</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>{{customerDetail.activated_at | formatDate}}</p>
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
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">Total Jobs Initiated</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>{{customerDetail.total_initiated_jobs}}</p>
                                    </b-col>
                                </b-row>
                                <b-row>
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">Total Jobs Finished</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>{{customerDetail.total_finshed_jobs}}</p>
                                    </b-col>
                                </b-row>                                                                
                                <b-row>
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">Total Urgent Jobs Created</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>{{customerDetail.total_urgent_jobs_created}}</p>
                                    </b-col>
                                </b-row>
                                <b-row>
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">Total Urgent Jobs Completed</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>{{customerDetail.total_urgent_jobs_completed}}</p>
                                    </b-col>
                                </b-row>                                                                   
                                <b-row>
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">Job Details</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        
                                        <router-link :to="{name: 'customer.job.detail',params: { id: customerDetail.id }}">View All Jobs</router-link>
                                        
                                    </b-col>
                                </b-row>                                                                                                 
                            </div>
                        </div>

                        

                    </div>
                </div>
            </div>
        </template>

        <script>
            import fancyBox from 'vue-fancybox';
            import StarRating from 'vue-star-rating';
            export default{
                data () {
                    return {
                        customerId: this.$route.params.id,
                        userURL : 'api/user',
                        customerDetail : '',
                    }
                },
                components: {
                    StarRating
                },    
                mounted() {
                    this.getSingle();
                },

                methods:{
                    getSingle(){
            // alert('single')
            let self = this;
            self.showModalValue = false;
            self.showNoRecordFound = false;
            let url = self.userURL;

            let _id = this.$route.params.id;

            self.$http.get(url+'/'+_id).then(response=>{
                response = response.data;

                self.customerDetail = response.data;


                if (!self.report.length) {
                    self.showNoRecordFound = true;
                }
            }).catch(error=>{

            });
        },
    },


}

</script>
