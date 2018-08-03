<template>
<div class="panel-inner">
            <div class="view-details-list">

                <!-- <div class="provider-image user-img">
                    <img src="">
                </div> -->


                <div class="provider-detail">

                        <div class="col-xs-12">
                            <div class="customer-detail-title">
                                <h2 class="page-title">Bobby Rodes</h2>
                            </div>
                        </div>
  
                    <!-- Basic Detail -->
 
                        <div class="col-xs-12 block-area">
<!--                             <div class="customer-detail-title">
                                <h4 class="page-title">Basic Detail</h4>
                            </div> -->
                            <div class="view-details-list">
                                <b-row>
                                    <b-col cols="5" class="text-right">
                                        <p><strong class="title-head">First Name</strong></p>
                                    </b-col>
                                    <b-col cols="7">
                                        <p>Bobby</p>
                                    </b-col>
                                </b-row>
                                <b-row>
                                    <b-col cols="5" class="text-right">
                                        <p><strong class="title-head">Last Name</strong></p>
                                    </b-col>
                                    <b-col cols="7">
                                        <p>Rodes</p>
                                    </b-col>
                                </b-row>                                                                
                                <b-row>
                                    <b-col cols="5" class="text-right">
                                        <p><strong class="title-head">Email Address</strong></p>
                                    </b-col>
                                    <b-col cols="7">
                                        <a href="mailto:bobbyrodes@gmail.com">bobbyrodes@gmail.com</a>
                                    </b-col>
                                </b-row>
                                <b-row>
                                    <b-col cols="5" class="text-right">
                                        <p><strong class="title-head">Address</strong></p>
                                    </b-col>
                                    <b-col cols="7">
                                        <p>4657 Kirk Highway, Geovannyfurt, Missouri, 39185-5150, Pitcairn Islands  </p>
                                    </b-col>
                                </b-row>                                
                                <b-row>
                                    <b-col cols="5" class="text-right">
                                        <p><strong class="title-head">Contact</strong></p>
                                    </b-col>
                                    <b-col cols="7">
                                        <a href="tel:+923214325323">+923214325323</a>
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
                                    <b-col cols="5" class="text-right">
                                        <p><strong class="title-head">Business or Individual?</strong></p>
                                    </b-col>
                                    <b-col cols="7">
                                        <p>Business</p>
                                    </b-col>
                                </b-row>
                                <b-row>
                                    <b-col cols="5" class="text-right">
                                        <p><strong class="title-head">Business Name</strong></p>
                                    </b-col>
                                    <b-col cols="7">
                                        <p>Rodes Company</p>
                                    </b-col>
                                </b-row>                                                                
                                <b-row>
                                    <b-col cols="5" class="text-right">
                                        <p><strong class="title-head">DUNS Number</strong></p>
                                    </b-col>
                                    <b-col cols="7">
                                        <p>543351</p>
                                    </b-col>
                                </b-row>
                                <b-row>
                                    <b-col cols="5" class="text-right">
                                        <p><strong class="title-head">Rating</strong></p>
                                    </b-col>
                                    <b-col cols="7">
                                        <star-rating :star-size="20" read-only :rating="2"></star-rating>
                                    </b-col>
                                </b-row>                                                                   
                                <b-row>
                                    <b-col cols="5" class="text-right">
                                        <p><strong class="title-head">Status</strong></p>
                                    </b-col>
                                    <b-col cols="7">
                                        <p class="status-color approved">Active</p>
                                    </b-col>
                                </b-row>                                 
                                <b-row>
                                    <b-col cols="5" class="text-right">
                                        <p><strong class="title-head">Join Date</strong></p>
                                    </b-col>
                                    <b-col cols="7">
                                        <p>May 25 2018</p>
                                    </b-col>
                                </b-row>                                 
                                <b-row>
                                    <b-col cols="5" class="text-right">
                                        <p><strong class="title-head">Approval Date</strong></p>
                                    </b-col>
                                    <b-col cols="7">
                                        <p>May 31 2018</p>
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
                                    <b-col cols="5" class="text-right">
                                        <p><strong class="title-head">Total Jobs Initiated</strong></p>
                                    </b-col>
                                    <b-col cols="7">
                                        <p>50</p>
                                    </b-col>
                                </b-row>
                                <b-row>
                                    <b-col cols="5" class="text-right">
                                        <p><strong class="title-head">Total Jobs Finished</strong></p>
                                    </b-col>
                                    <b-col cols="7">
                                        <p>40</p>
                                    </b-col>
                                </b-row>                                                                
                                <b-row>
                                    <b-col cols="5" class="text-right">
                                        <p><strong class="title-head">Total Urgent Jobs Created</strong></p>
                                    </b-col>
                                    <b-col cols="7">
                                        <p>6</p>
                                    </b-col>
                                </b-row>
                                <b-row>
                                    <b-col cols="5" class="text-right">
                                        <p><strong class="title-head">Total Urgent Jobs Completed</strong></p>
                                    </b-col>
                                    <b-col cols="7">
                                        <p>4</p>
                                    </b-col>
                                </b-row>                                                                   
                                <b-row>
                                    <b-col cols="5" class="text-right">
                                        <p><strong class="title-head">Total revenue earned</strong></p>
                                    </b-col>
                                    <b-col cols="7">
                                        <p>$10000</p>
                                    </b-col>
                                </b-row>                                 
                                <b-row>
                                    <b-col cols="5" class="text-right">
                                        <p><strong class="title-head">Related activites</strong></p>
                                    </b-col>
                                    <b-col cols="7">
                                        <span class="tags">Carpenter</span>
                                        <span class="tags">Developer</span>
                                        <span class="tags">Electrician</span>                                        
                                    </b-col>
                                </b-row>                                 
                                <b-row>
                                    <b-col cols="5" class="text-right">
                                        <p><strong class="title-head">Job Details</strong></p>
                                    </b-col>
                                    <b-col cols="7">
                                        <a href="javascript:void(0);">See All</a>
                                    </b-col>
                                </b-row>                                                                                                 
                            </div>
                        </div>

                    

                </div>
            </div>
</div>
</template>

<script>
import StarRating from 'vue-star-rating';
export default{
        data () {
          return {
        }
    },
    components: {
        StarRating
    },    
}

</script>
