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
                <ul class="Popular-services-slides">
                    <li>
                        <div class="box-img"><img src="/images/front/home/carpenter.jpg"></div>
                        <h4>Cleaning Services</h4>
                        <p><i class="icon-location"></i>Cleaning Services</p>
                    </li>
                    <li>
                        <div class="box-img"><img src="/images/front/home/carpenter.jpg"></div>
                        <h4>Cleaning Services</h4>
                        <p><i class="icon-location"></i>Cleaning Services</p>
                    </li>
                    <li>
                        <div class="box-img"><img src="/images/front/home/carpenter.jpg"></div>
                        <h4>Cleaning Services</h4>
                        <p><i class="icon-location"></i>Cleaning Services</p>
                    </li>
                    <li>
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
                            <b-col sm="4" class="text-center">
                                <div class="icon">
                                        <img src="/images/front/svg/find.svg">
                                </div>
                                <div class="list-description">
                                    <h4>Pick Leads</h4>
                                    <p>Pick those which are of interest to you. Signal your interest through the site.</p>
                                </div>
                            </b-col>
                            <b-col sm="4" class="text-center">
                                    <div class="icon">
                                        <img src="/images/front/svg/list.svg">
                                    </div>
                                <div class="list-description">
                                    <h4>Get Shortlisted</h4>
                                    <p>Customers review your profiles online & shortlist you to bid on the job.</p>
                                </div>
                            </b-col>
                            <b-col sm="4" class="text-center">
                                    <div class="icon">
                                        <img src="/images/front/svg/communicate.svg">
                                    </div>
                                <div class="list-description">
                                    <h4>Chat & Arrange Quotes</h4>
                                    <p>Chat with customer to discuss the job or arrange a visit as your normally would.</p>
                                </div>
                            </b-col>
                        </b-row>
                    </div>
                </div>
        </div>

    </div>
</template>


<script>
export default {
    data: function () {
        return{
             headerBanner: 'images/front/banners/home.jpg'
        }
    }
}
</script>
