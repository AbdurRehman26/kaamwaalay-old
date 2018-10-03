<template>
    <div class="section">
        <div class="section-title">
            <h2>Popular services in your area</h2>
        </div>
        <div class="container">
            <ul class="Popular-services-slides my-owl-carousel owl-carousel owl-theme">
                <li class="item" v-for="service in services">
                    <a href="javascript:;" @click="changecategorypopup">
                        <div class="box-img"><img :src="service.serviceImage"></div>
                        <h6>{{service.serviceHeading}}</h6>
                        <p><i class="icon-map-marker2"></i>{{service.serviceDesc}}</p>
                    </a>
                </li>
            </ul>
        </div>
        <category-popup @HideModalValue="HideModal" :showModalProp="categoryval"></category-popup>
    </div>
</template>

<script>
    export default {
        methods: {
            changecategorypopup() {
                this.categoryval = true;
            },
            HideModal(){
                this.categoryval = false;
            },
            hideModal(){
                this.categoryPopup = false;
            },
            getPopularServices() {
                let self = this;
                let url = 'api/service?filter_by_popular_services=true';
                self.$http.get(url).then(response=>{
                    response = response.data.response;
                    self.categories = response.data;
                }).catch(error=>{
                });
            },

            getImage(img) {
                return img? (typeof(img[0].upload_url) != 'undefined'? img[0].upload_url : 'images/dummy/image-placeholder.jpg') : 'images/dummy/image-placeholder.jpg';
            },

            onSelectCategory(val) {
                this.hideModal();
                this.$router.push({ name: this.routeName, params: { serviceName: this.selectedService.url_suffix, zip : val }});
                localStorage.setItem("zip", val);
            },

            changecategorypopup(service) {
                this.selectedService = service;
                if(localStorage['zip']) {
                    this.onSelectCategory(localStorage['zip']);
                }else {
                    this.categoryPopup = true;  
                }
            },

        },
        mounted(){
            require('jquery');
            require('owl.carousel');
            $(document).ready(function(){
              $('.my-owl-carousel').owlCarousel({
                    margin:40,
                    nav:true,
                    items:4,
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:2
                        },
                        1000:{
                            items:4
                        }
                    }
              });
          });
            this.getPopularServices();
        },
        data() {
            return{
                categoryval: false,
                categoryPopup: false,
                selectedService: '',
                categories: [],
                routeName: 'Explore_Detail',
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
