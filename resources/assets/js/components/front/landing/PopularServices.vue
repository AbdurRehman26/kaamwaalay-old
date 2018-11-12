<template>
    <div class="section">
        <div class="section-title">
            <h2>Popular services in your area</h2>
        </div>
        <div class="container" v-if="services">
            <ul class="Popular-services-slides my-owl-carousel owl-carousel owl-theme">
                <li class="item" v-for="service in services">
                    <a href="javascript:;" @click="changecategorypopup(service)">
                        <div class="box-img" v-bind:style="{'background-image': 'url('+ getImage(service.images) +')'}"></div>
                        <h6>{{service.title}}</h6>
                        <p><i class="icon-map-marker2"></i>{{getProviders(service.provider_count)}}</p>
                    </a>
                </li>
            </ul>
        </div>
        <category-popup @HideModalValue="hideModal" :showModalProp="categoryPopup" :selectedValue="selectedService" @onSubmit="onSelectCategory"></category-popup>
    </div>
</template>

<script>
    export default {

        data() {
            return{
                categoryval: false,
                categoryPopup: false,
                selectedService: '',
                categories: [],
                routeName: 'Explore_Detail',
                services:[]
           }
        },
        methods: {
            initializeCarousel() {
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
            },
            getProviders(count) {
                let str = "service providers near you."
                return count? count +" "+str : "No "+str;
            },
            changecategorypopup(service) {
                this.selectedService = service;
                if(localStorage['zip']) {
                    this.onSelectCategory(localStorage['zip']);
                }else {
                    this.categoryPopup = true;  
                }
            },
            hideModal(){
                this.categoryPopup = false;
            },
            getPopularServices() {
                let self = this;
                let zip = localStorage['zip']? localStorage['zip'] : false;

                let url = 'api/service?filter_by_popular_services=' + zip;
                self.$http.get(url).then(response=>{
                    self.initializeCarousel();
                    response = response.data;
                    self.services = response.data;
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
            this.getPopularServices();
        },
   }
</script>
