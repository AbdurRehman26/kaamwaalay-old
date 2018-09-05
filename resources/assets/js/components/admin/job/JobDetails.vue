<template>
    <div class="panel-inner">
        <div v-if="Object.keys(record).length" class="view-job-details main-detail-content">

                <!-- <div class="provider-image user-img">
                    <img src="">
                </div> -->


                <div class="provider-detail">

                    <div class="col-xs-12">
                        <div class="customer-detail-title">
                            <h2 class="page-title">{{record.title}}</h2>
                            <!-- <h4 class="page-title float-right">Category: Plumber</h4> -->
                        </div>
                    </div>

                    <!-- Basic Detail -->

                    <div class="col-xs-12 block-area">
<!--                             <div class="customer-detail-title">
                                <h4 class="page-title">Basic Detail</h4>
                            </div> -->
                            <div class="view-details-list">
                                <b-row>
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">Customer</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">                                        

                                        <router-link tag="a" :to="{name: 'customer.detail' , params : {id  : record.user ? record.user.id : 1}}">
                                            {{ record.user | fullName }}
                                        </router-link>
                                        
                                    </b-col>
                                </b-row>                                                              
                                <b-row>
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">Service</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>{{record.service | mainService }} <span v-if="record.service && record.service.parent_id" class="services-arrow"></span> {{record.service | childOrParentService }}</p>
                                    </b-col>
                                </b-row>
                                <b-row>
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">Address</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>{{record.address}}</p>
                                    </b-col>
                                </b-row>
                                <b-row>
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">Zip Code</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>{{record.zip_code}}</p>
                                    </b-col>
                                </b-row>                                                                                                                                   
                            </div>
                        </div>


                        <!-- Project Detail -->

                        <div class="col-xs-12 block-area">
<!--                             <div class="customer-detail-title">
                                <h4 class="page-title">Profile Detail</h4>
                            </div> -->
                            <div class="view-details-list">
                                <b-row>
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">Project Title</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>{{record.title}}</p>
                                    </b-col>
                                </b-row>
                                <b-row>
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">Project Details</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value max-text">
                                        <p>{{record.description}}</p>
                                    </b-col>
                                </b-row>                                                                
                                <b-row>
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">Job Status</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <span :class="[ 'tags', Object.keys(record).length ? record.status.replace(/\s/g, '').toLowerCase().trim() : '']">
                                            {{ record | jobStatus }}
                                        </span>
                                    </b-col>
                                </b-row>
                                <b-row>
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">Photos</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <div class="gallery-pic">
                                            <div class="gallery-item" v-for="(n, index) in record.images" :data-index="index">
                                                <img @click="open($event)" :src="n.url">
                                            </div>
                                        </div>
                                    </b-col>
                                </b-row>                                                                   

                            </div>
                        </div>



                        <!-- Bidding Detail -->

                        <div class="col-xs-12 block-area">
                            <div class="view-details-list">
                                <b-row>
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">Total Bidding Initiated</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>{{record.bids_count}}</p>
                                    </b-col>
                                </b-row>

                                <b-row>
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">Bidding Details</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <a @click="biddingdetails(record.id)" href="javascript:void(0);">See All</a>
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
            import fancyBox from 'vue-fancybox';
            import StarRating from 'vue-star-rating';
            export default{
                data () {
                  return {
                    url : 'api/job/',
                    record : [],
                    imageList: [
                    { width: 900, height: 675, url: '/images/dummy/nice-door.jpg' },
                    { width: 900, height: 675, url: '/images/dummy/door-2.jpg' },
                    ]            
                }
            },
            computed : {
                requestUrl(){
                    console.log(this.$route);
                    return this.url+this.$route.params.id+'?bid_data=true';
                },
            },
            components: {
                StarRating
            },
            methods:{
                getRecords(response){
                    let self = this;
                    self.loading = false;
                    self.record = response.data;
                    
                },
                biddingdetails(id){
                    this.$router.push({name: 'bidding.details', params : {jobId : id}});
                },
                open (e) {            
                    fancyBox(e.target, this.imageList);
                }                
            },    
        }

    </script>
