<template>
<div class="panel-inner">
            <div class="view-job-details main-detail-content">

                <!-- <div class="provider-image user-img">
                    <img src="">
                </div> -->


                <div class="provider-detail">

                        <div class="col-xs-12">
                            <div class="customer-detail-title">
                                <h2 class="page-title">Door Repairing</h2>
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
                                    <b-col cols="4"" class="text-right">
                                        <p><strong class="title-head">Customer</strong></p>
                                    </b-col>
                                    <b-col cols="8">                                        
                                        <a href="javascript:void(0);">Shawn</a>
                                    </b-col>
                                </b-row>                                                              
                                <b-row>
                                    <b-col cols="4"" class="text-right">
                                        <p><strong class="title-head">Service</strong></p>
                                    </b-col>
                                    <b-col cols="8">
                                        <p>Plumber > General Carpentry</p>
                                    </b-col>
                                </b-row>
                                <b-row>
                                    <b-col cols="4"" class="text-right">
                                        <p><strong class="title-head">Address</strong></p>
                                    </b-col>
                                    <b-col cols="8">
                                        <p>4657 Kirk Highway, Geovannyfurt, Missouri, 39185-5150, Pitcairn Islands  </p>
                                    </b-col>
                                </b-row>
                                <b-row>
                                    <b-col cols="4"" class="text-right">
                                        <p><strong class="title-head">Zip Code</strong></p>
                                    </b-col>
                                    <b-col cols="8">
                                        <p>23411</p>
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
                                    <b-col cols="4"" class="text-right">
                                        <p><strong class="title-head">Project Title</strong></p>
                                    </b-col>
                                    <b-col cols="8">
                                        <p>Door Repairing</p>
                                    </b-col>
                                </b-row>
                                <b-row>
                                    <b-col cols="4"" class="text-right">
                                        <p><strong class="title-head">Project Details</strong></p>
                                    </b-col>
                                    <b-col cols="8">
                                        <p>Responsible for disassembling, relocating and reassembling furniture. Will assist carpenters by transporting materials to various job sites, removing construction debris, and various carpentry duties. Must maintain a neat and professional demeanor. Must works effectively with team members and all departments.</p>
                                    </b-col>
                                </b-row>                                                                
                                <b-row>
                                    <b-col cols="4"" class="text-right">
                                        <p><strong class="title-head">Job Status</strong></p>
                                    </b-col>
                                    <b-col cols="8">
                                        <span class="tags inbidding">
                                            In Bidding
                                        </span>
                                    </b-col>
                                </b-row>
                                <b-row>
                                    <b-col cols="4"" class="text-right">
                                        <p><strong class="title-head">Photos</strong></p>
                                    </b-col>
                                    <b-col cols="8">
                                        <div class="gallery-pic">
                                            <div class="gallery-item" v-for="(n, index) in imageList" :data-index="index">
                                                <img @click="open($event)" :src="n.url">
                                            </div>
                                        </div>
                                    </b-col>
                                </b-row>                                                                   
                                                                                                                              
                            </div>
                        </div>



                    <!-- Bidding Detail -->

                        <div class="col-xs-12 block-area">
 <!--                            <div class="customer-detail-title">
                                <h4 class="page-title">Service Detail</h4>
                            </div> -->
                            <div class="view-details-list">
                                <b-row>
                                    <b-col cols="4"" class="text-right">
                                        <p><strong class="title-head">Total Bidding Initiated</strong></p>
                                    </b-col>
                                    <b-col cols="8">
                                        <p>50</p>
                                    </b-col>
                                </b-row>
                                                                                                                                                                                  
                                <b-row>
                                    <b-col cols="4"" class="text-right">
                                        <p><strong class="title-head">Bidding Details</strong></p>
                                    </b-col>
                                    <b-col cols="8">
                                        <a @click="biddingdetails" href="javascript:void(0);">See All</a>
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
              imageList: [
                { width: 900, height: 675, url: '/images/dummy/nice-door.jpg' },
                { width: 900, height: 675, url: '/images/dummy/door-2.jpg' },
              ]            
        }
    },
    components: {
        StarRating
    },
    methods:{
        biddingdetails(){
            this.$router.push('BiddingDetails');
        },
        open (e) {            
            fancyBox(e.target, this.imageList);
        }                
    },    
}

</script>
