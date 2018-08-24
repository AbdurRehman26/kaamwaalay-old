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
                                <h5 class="banner-hd-sub">Get expert help to get done almost anything.</h5>
                                <div class="search-filter">
                                    <input type="text" placeholder="What service do you need?" class="form-control lg search-service" name="">
                                    <div class="container-zip-code">
                                        <i class="icon-location"></i>
                                        <input type="number" placeholder="Zip code" class="form-control lg zip-code" name="">
                                    </div>
                                </div>
                                <button class="btn btn-primary" @click="SignUp">
                                    <span>Get Started</span>
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--featured categories -->
        <featuredCategories></featuredCategories>
        <!--popular sevice-->
        <popularservices></popularservices>

        <!--how its works-->
        <div class="section section-grey how-it-work elementary-banner">
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
                                <img src="/images/front/svg/bidding.svg">
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
                                <h4>Communicate &amp; Hire</h4>
                                <p>You can communicate with service provider before hiring and after that award the job to right service provider.</p>
                            </div>
                        </b-col>
                        <b-col sm="12" md="3" class="text-center">
                            <div class="icon">
                                <img src="/images/front/svg/like.svg">
                            </div>
                            <div class="list-description">
                                <h4>Work &amp; Pay</h4>
                                <p>The service provider work on your assignment and once you satisfied with the work you pay to service provider.</p>
                            </div>
                        </b-col>
                    </b-row>
                </div>
            </div>
            <!-- splash elements -->
            <span class="splash-design lg d-2 top-right"></span>
            <span class="splash-design d-3 bottom-left md"></span>
            <span class="splash-design d-6 bottom-right sm sp-rt"></span>
        </div>
        <!-- app store section -->
        <div class="section ready-to-meet">
            <div class="container">
                <div class="two-column">
                    <div class="content-sec">
                        <h2 >When you need someone to get the job done, whether it's an electrician, a plumber, a carpenter, or someone else - we find them for you, for free!</h2>
                        <p>See cost estimates, read reviews and chat with service providers, all in the app. Available on both iOS and Android.</p>
                        <appstore></appstore>
                    </div>
                    <div class="image-sec">
                        <img src="/images/front/home/job-search.jpg">
                    </div>
                </div>
            </div>
        </div>

        <!--testimonial-section-->
        <div class="section section-grey">
            <div class="container">
                <div class="section-title">
                    <h2 class="btm-space">What our customers are saying</h2>
                    <p>Professional service marketplace has helped tens of thousands of people around US to get the job done.</p>
                </div>
                <testmonial-sec></testmonial-sec>
            </div>
        </div>

        <!-- -->
        <div class="section ready-to-meet">
            <div class="container">
                <div class="two-column">
                    <div class="content-sec">
                        <h2>Proud of your work? Join us.</h2>
                        <p>We keep it simple and straight forward. Demonstrate your skills and experience to customers with a winning profile, receive email alert and push notifications for jobs posted near you within your service area. If you are business or service provider you can sign up today by creating a service provider account. </p>
                        <button class="btn btn-primary" @click="JoinUsPro">
                            <span>Join Us</span>
                        </button>
                    </div>
                    <div class="image-sec">
                        <img src="/images/front/home/join-us.jpg">
                    </div>
                </div>
            </div>
        </div>

        <!--get started-->
        <div class="section section-grey get-started-section next-project  elementary-banner">
           <explorenow></explorenow>
       </div>
   </div>
</template>


<script>

export default {
    data() {
        return{
            headerBanner: 'images/front/banners/home.jpg',
        }
    },
    methods: {
        SignUp() {
            this.$router.push('explore/service_provider');
        },
        JoinUsPro() {
            this.$router.push('/join-as-pro');
        },
    }
}
</script>
