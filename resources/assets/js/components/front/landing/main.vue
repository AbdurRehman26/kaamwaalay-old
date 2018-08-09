<template>
    <div>
        <div class="main-banner home-banner">
            <div class="main-img">
                <img  :src="headerBanner">
            </div>
            <div class="content">
                <div class="verticle-align">
                    <div class="inner">
                        <div class="container">
                            <div class="content-inner">
                                <h1>Find the right service provider for the job!</h1>
                                <h4>Get expert help to get done almost anything.</h4>
                                <div class="form-control">
                                   <input type="text" name="">
                                   <input type="text" name="">
                               </div>
                               <button class="btn btn-primary">
                                <span>Get Started</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--featured categories -->
    <div class="section padding-sm featured-categories-home">
        <div class="container">
            <div class="services-list">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-2">
                        <div class="list-icon sm white">
                            <div class="inner"><img src="/images/front/svg/electricians.svg"></div>
                        </div>
                        <div class="list-description">
                            <p>Electricians</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-2">
                        <div class="list-icon sm white">
                            <div class="inner"><img src="/images/front/svg/carpenters.svg"></div>
                        </div>
                        <div class="list-description">
                            <p>Carpenters</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-2">
                        <div class="list-icon sm white">
                            <div class="inner"><img src="/images/front/svg/painters.svg"></div>
                        </div>
                        <div class="list-description">
                            <p>Painters</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-2">
                        <div class="list-icon sm white">
                            <div class="inner"><img src="/images/front/svg/plumbers.svg"></div>
                        </div>
                        <div class="list-description">
                            <p>Plumbers</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-2">
                        <div class="list-icon sm white">
                            <div class="inner"><img src="/images/front/svg/movers.svg"></div>
                        </div>
                        <div class="list-description">
                            <p>Movers</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-2">
                        <div class="list-icon sm white">
                            <div class="inner"><img src="/images/front/svg/gardner.svg"></div>
                        </div>
                        <div class="list-description">
                            <p>Gardeners</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--popular sevice-->
    <div class="section">
        <div class="section-title">
            <h2>Popular services in your area</h2>
        </div>
        <div class="container">
            <ul class="Popular-services-slides my-owl-carousel owl-carousel owl-theme">
                <li class="item">
                    <div class="box-img"><img src="/images/front/home/carpenter.jpg"></div>
                    <h4>Cleaning Services</h4>
                    <p><i class="icon-location"></i>Cleaning Services</p>
                </li>
                <li class="item">
                    <div class="box-img"><img src="/images/front/home/carpenter.jpg"></div>
                    <h4>Cleaning Services</h4>
                    <p><i class="icon-location"></i>Cleaning Services</p>
                </li>
                <li class="item">
                    <div class="box-img"><img src="/images/front/home/carpenter.jpg"></div>
                    <h4>Cleaning Services</h4>
                    <p><i class="icon-location"></i>Cleaning Services</p>
                </li>
                <li class="item">
                    <div class="box-img"><img src="/images/front/home/carpenter.jpg"></div>
                    <h4>Cleaning Services</h4>
                    <p><i class="icon-location"></i>Cleaning Services</p>
                </li>
            </ul>
            <div class="slide-blts">
                <ul>
                    <li class="active"></li>
                    <li class=""></li>
                    <li class=""></li>
                </ul>
            </div>
        </div>
    </div>

    <!--how its works-->
    <div class="section section-grey how-it-work">
        <div class="container element-index">
            <div class="section-title">
                <h2>How it works</h2>
            </div>
            <div class="how-it-work-list">
                <b-row>
                    <b-col sm="12" md="3" class="text-center">
                        <div class="icon">
                            <img src="/images/front/svg/find.svg">
                        </div>
                        <div class="list-description">
                            <h4>Find</h4>
                            <p>Post a job to tell us about your assignment or task. We'll quickly match you with the right service provider.</p>
                        </div>
                    </b-col>
                    <b-col sm="12" md="3" class="text-center">
                        <div class="icon">
                            <img src="/images/front/svg/list.svg">
                        </div>
                        <div class="list-description">
                            <h4>Bidding Process</h4>
                            <p>Professional service providers will post a bid on your job after evaluating your task and give you estimate.</p>
                        </div>
                    </b-col>
                    <b-col sm="12" md="3" class="text-center">
                        <div class="icon">
                            <img src="/images/front/svg/communicate.svg">
                        </div>
                        <div class="list-description">
                            <h4>Communicate & Hire</h4>
                            <p>CYou can communicate with service provider before hiring and after that award the job to right service provider.</p>
                        </div>
                    </b-col>
                    <b-col sm="12" md="3" class="text-center">
                        <div class="icon">
                            <img src="/images/front/svg/communicate.svg">
                        </div>
                        <div class="list-description">
                            <h4>Work & Pay</h4>
                            <p>The service provider work on your assignment and once you satisfied with the work you pay to service provider.</p>
                        </div>
                    </b-col>
                </b-row>
            </div>
        </div>
    </div>
    <!-- app store section -->
    <div class="section ready-to-meet">
        <div class="container">
            <div class="two-column">
                <div class="content-sec">
                    <h2>Ready to meet your next favorite customer? Whether you’re a new business or just new to PSM, we’re excited to help you grow.</h2>
                    <p>Ready to meet your next favorite customer? Whether you’re a new business or just new to PSM, we’re excited to help you grow.</p>
                    <div class="avability-app">
                        <a href="javascript:void(0)"><img src="/images/front/common-images/app-store.jpg"></a>
                        <a href="javascript:void(0)"><img src="/images/front/common-images/google-play.jpg"></a>
                    </div>
                </div>
                <div class="image-sec">
                    <img src="/images/front/join-as-pro/customer.jpg">
                </div>
            </div>
        </div>
    </div>

    <!--testimonial-section-->
    <div class="section section-grey">
        <div class="container">
            <div class="section-title">
                <h2>What our customers are saying</h2>
                <p>Professional service marketplace has helped tens of thousands of people around US to get the job done.</p>
            </div>
            <testmonial-sec></testmonial-sec>
        </div>
    </div>
</div>
</template>


<script>

    export default {
        mounted(){
            require('jquery');
            require('owl.carousel');
            $(document).ready(function(){
              $('.my-owl-carousel').owlCarousel({
                    margin:10,
                    nav:true,
                    items:4,
                    responsive:{
/*                        0:{
                            items:1
                        },
                        600:{
                            items:3
                        },
                        1000:{
                            items:5
                        }*/
                    }
              });
          });
        },
        data() {
            return{
               headerBanner: 'images/front/banners/home.jpg'
           }
       },
   }
</script>
