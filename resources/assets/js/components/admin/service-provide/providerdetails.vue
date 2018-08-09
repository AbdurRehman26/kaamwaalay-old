<template>
<div class="panel-inner">
            <div class="main-detail-content">

<!--                 <div class="provider-image user-img" style="background-image: url(/images/dummy/profile-image.jpg)">
                    
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
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">First Name</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>Bobby</p>
                                    </b-col>
                                </b-row>
                                <b-row>
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">Last Name</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>Rodes</p>
                                    </b-col>
                                </b-row>                                                                
                                <b-row>
                                    <b-col  class="text-right fixed-label">
                                        <p><strong class="title-head">Email Address</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <a href="mailto:bobbyrodes@gmail.com">bobbyrodes@gmail.com</a>
                                    </b-col>
                                </b-row>
                                <b-row>
                                    <b-col  class="text-right fixed-label">
                                        <p><strong class="title-head">Address</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>4657 Kirk Highway, Geovannyfurt, Missouri, 39185-5150, Pitcairn Islands  </p>
                                    </b-col>
                                </b-row>                                
                                <b-row>
                                    <b-col  class="text-right fixed-label">
                                        <p><strong class="title-head">Contact</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
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
                                    <b-col  class="text-right fixed-label">
                                        <p><strong class="title-head">Business or Individual?</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>Business</p>
                                    </b-col>
                                </b-row>
                                <b-row>
                                    <b-col  class="text-right fixed-label">
                                        <p><strong class="title-head">Business Name</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>Rodes Company</p>
                                    </b-col>
                                </b-row>                                                                
                                <b-row>
                                    <b-col  class="text-right fixed-label">
                                        <p><strong class="title-head">DUNS Number</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>543351</p>
                                    </b-col>
                                </b-row>
                                <b-row>
                                    <b-col  class="text-right fixed-label">
                                        <p><strong class="title-head">Rating</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <star-rating :star-size="20" read-only :rating="2" active-color="#8200ff"></star-rating>
                                    </b-col>
                                </b-row>                                                                   
                                <b-row>
                                    <b-col  class="text-right fixed-label">
                                        <p><strong class="title-head">Status</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p class="status-color approved">Active</p>
                                    </b-col>
                                </b-row>                                 
                                <b-row>
                                    <b-col  class="text-right fixed-label">
                                        <p><strong class="title-head">Join Date</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>May 25 2018</p>
                                    </b-col>
                                </b-row>                                 
                                <b-row>
                                    <b-col  class="text-right fixed-label">
                                        <p><strong class="title-head">Approval Date</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
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
                                    <b-col  class="text-right fixed-label">
                                        <p><strong class="title-head">Total Jobs Initiated</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>50</p>
                                    </b-col>
                                </b-row>
                                <b-row>
                                    <b-col  class="text-right fixed-label">
                                        <p><strong class="title-head">Total Jobs Finished</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>40</p>
                                    </b-col>
                                </b-row>                                                                
                                <b-row>
                                    <b-col  class="text-right fixed-label">
                                        <p><strong class="title-head">Total Urgent Jobs Created</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>6</p>
                                    </b-col>
                                </b-row>
                                <b-row>
                                    <b-col  class="text-right fixed-label">
                                        <p><strong class="title-head">Total Urgent Jobs Completed</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>4</p>
                                    </b-col>
                                </b-row>                                                                   
                                <b-row>
                                    <b-col  class="text-right fixed-label">
                                        <p><strong class="title-head">Total revenue earned</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>$10000</p>
                                    </b-col>
                                </b-row>                                 
                                <b-row>
                                    <b-col  class="text-right fixed-label">
                                        <p><strong class="title-head">Related activites</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <span class="tags">Carpenter</span>
                                        <span class="tags">Developer</span>
                                        <span class="tags">Electrician</span>                                        
                                    </b-col>
                                </b-row>                                 
                                <b-row>
                                    <b-col  class="text-right fixed-label">
                                        <p><strong class="title-head">Job Details</strong></p>
                                    </b-col>

                                    <b-col class="calculated-value">
                                        <a href="javascript:void(0);" @click="ServiceJobDetail">See All</a>
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
    methods: {
        ServiceJobDetail() {
            this.$router.push({name: 'viewservicejobdetail'});
        }
    }
}

</script>
