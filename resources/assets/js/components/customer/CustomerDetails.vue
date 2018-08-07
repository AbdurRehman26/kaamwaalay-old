<template>
<div class="panel-inner">
            <div class="main-detail-content">

<!--                 <div class="basic-details">
                    <div class="provider-image user-img" style="background-image: url(/images/dummy/profile-image.jpg)">
                    </div>
                    <h2 class="page-title">Lisa David</h2>
                    <div class="addition-info">
                        <ul>
                            <li><i class="icon-envelope2"></i><a href="mailto:Chester_Kris15@gmail.com">Chester_Kris15@gmail.com</a></li>
                            <li><i class="icon-address-book"></i><a href="tel:+923214325323">+923214325323</a></li>
                            <li><i class="icon-credit-card"></i><span>$10000</span></li>
                            <li><i class="icon-checkmark"></i><span>40</span></li>
                            <li><i class="icon-user-tie"></i><span>May 25 2018</span></li>
                        </ul>
                    </div>
                </div> -->


                <div class="provider-detail">

                          <div class="col-xs-12">
                            <div class="customer-detail-title">
                                <h2 class="page-title">Levi Boyer</h2>
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
                                        <p>Levi</p>
                                    </b-col>
                                </b-row>
                                <b-row>
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">Last Name</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>Boyer</p>
                                    </b-col>
                                </b-row>                                                                
                                <b-row>
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">Email Address</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <a href="mailto:Chester_Kris15@gmail.com">Chester_Kris15@gmail.com</a>
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
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">City</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>New Hampshire</p>
                                    </b-col>
                                </b-row>
                                <b-row>
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">State</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>US</p>
                                    </b-col>
                                </b-row>                                                                
                                <b-row>
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">Zipcode</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>125964</p>
                                    </b-col>
                                </b-row>
                                <b-row>
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">Country</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>USA</p>
                                    </b-col>
                                </b-row>                                
                                <b-row>
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">Avg. Rating</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <star-rating :star-size="20" read-only :rating="4" active-color="#8200ff"></star-rating>
                                    </b-col>
                                </b-row>                                                                                                 
                                <b-row>
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">Join Date</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>May 25 2018</p>
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
                                        <p>50</p>
                                    </b-col>
                                </b-row>
                                <b-row>
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">Total Jobs Finished</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>40</p>
                                    </b-col>
                                </b-row>                                                                
                                <b-row>
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">Total Urgent Jobs Created</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>6</p>
                                    </b-col>
                                </b-row>
                                <b-row>
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">Total Urgent Jobs Completed</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>4</p>
                                    </b-col>
                                </b-row>                                                                   
                                <b-row>
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">Total revenue earned</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <p>$10000</p>
                                    </b-col>
                                </b-row>                                 
<!--                                 <b-row>
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">Related activites</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <span class="tags">Carpenter</span>
                                        <span class="tags">Developer</span>
                                        <span class="tags">Electrician</span>                                        
                                    </b-col>
                                </b-row> -->                                 
                                <b-row>
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">Description</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value max-text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    </b-col>
                                </b-row>                                 
                                <b-row>
                                    <b-col class="text-right fixed-label">
                                        <p><strong class="title-head">Job Details</strong></p>
                                    </b-col>
                                    <b-col class="calculated-value">
                                        <a @click="viewjob" href="javascript:void(0);">View Jobs</a>
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

    methods:{
        viewjob(){
            this.$router.push('/customer/viewjobdetail');
        }
    }
}

</script>
