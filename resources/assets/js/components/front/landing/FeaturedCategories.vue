<template>
    <div class="section padding-sm featured-categories-home" v-if="categories.length">
        <div class="container">
            <div class="services-list">
                <div class="row">
                    <div class="featurecategory owl-carousel owl-theme">
                        <div class="col-xs-12 col-sm-4 col-md-2 item" v-for="category in categories">
                            <a href="javascript:void(0);" @click="changecategorypopup(category)">
                                <div class="list-icon sm white">
                                    <div class="inner"><img :src="getImage(category.images)"></div>
                                </div>
                                <div class="list-description">
                                    <p>{{category.title}}</p>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <category-popup @HideModalValue="hideModal" :showModalProp="categoryPopup" :selectedValue="selectedService" @onSubmit="onSelectCategory"></category-popup>        
    </div>
</template>

<script type="text/javascript">
    export default {
        data(){
            return{
                categoryPopup: false,
                selectedService: '',
                categories: [],
                routeName: 'Explore_Detail',
            }
        },
        mounted(){
            require('jquery');
            require('owl.carousel');
            $(document).ready(function(){
                if( $(window).width() < 600 ) {
                    $('.featurecategory').owlCarousel({
                        margin:40,
                        nav:true,
                        items:1,
                        autoplay:true,
                        autoplayTimeout:3000,
                        autoplayHoverPause:true                        
                    });                  
                }
            });
            this.getAllServices();
        },
        methods: {
            hideModal(){
                this.categoryPopup = false;
            },
            getAllServices() {
                let self = this;
                let url = 'api/service?filter_by_parent=true';
                self.$http.get(url).then(response=>{
                    response = response.data.response;
                    self.categories = response.data;
                }).catch(error=>{
                });
            },

            getImage(img) {
                return img? img[0].upload_url : 'images/dummy/image-placeholder.jpg';
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
    }
</script>
