<template>
    <div class="section">
        <div class="section-title">
            <h2>Popular services in your area</h2>
        </div>
        <div class="container">
            <ul class="Popular-services-slides my-owl-carousel owl-carousel owl-theme">
                <li class="item" v-for="service in services">
                    <a href="javascript:;">
                        <div class="box-img"><img :src="service.serviceImage"></div>
                        <h6>{{service.serviceHeading}}</h6>
                        <p><i class="icon-location"></i>{{service.serviceDesc}}</p>
                    </a>
                </li>
            </ul>
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
                services:[
                    {
                        serviceImage:'images/front/home/cleaning.jpg',
                        serviceHeading:'Cleaning Services',
                        serviceDesc:'4 service providers near you',
                    },
                    {
                        serviceImage:'images/front/home/carpenter.jpg',
                        serviceHeading:'Carpenter',
                        serviceDesc:'3 service providers near you',
                    },
                    {
                        serviceImage:'images/front/home/electrician.jpg',
                        serviceHeading:'Electricians',
                        serviceDesc:'8 service providers near you',
                    },
                    {
                        serviceImage:'images/front/home/movers.jpg',
                        serviceHeading:'Movers',
                        serviceDesc:'2 service providers near you',
                    },
                    {
                        serviceImage:'images/front/home/cleaning.jpg',
                        serviceHeading:'Cleaning Services',
                        serviceDesc:'4 service providers near you',
                    },
                    {
                        serviceImage:'images/front/home/carpenter.jpg',
                        serviceHeading:'Carpenter',
                        serviceDesc:'3 service providers near you',
                    },
                    {
                        serviceImage:'images/front/home/electrician.jpg',
                        serviceHeading:'Electricians',
                        serviceDesc:'8 service providers near you',
                    },
                    {
                        serviceImage:'images/front/home/movers.jpg',
                        serviceHeading:'Movers',
                        serviceDesc:'2 service providers near you',
                    },
                    {
                        serviceImage:'images/front/home/cleaning.jpg',
                        serviceHeading:'Cleaning Services',
                        serviceDesc:'4 service providers near you',
                    },
                    {
                        serviceImage:'images/front/home/carpenter.jpg',
                        serviceHeading:'Carpenter',
                        serviceDesc:'3 service providers near you',
                    },
                    {
                        serviceImage:'images/front/home/electrician.jpg',
                        serviceHeading:'Electricians',
                        serviceDesc:'8 service providers near you',
                    },
                    {
                        serviceImage:'images/front/home/movers.jpg',
                        serviceHeading:'Movers',
                        serviceDesc:'2 service providers near you',
                    },
                ]
           }
       },
   }
</script>
