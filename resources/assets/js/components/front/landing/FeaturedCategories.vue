<template>
    <div class="section padding-sm featured-categories-home">
        <div class="container">
            <div class="services-list">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-2" v-for="category in categories">
                        <a href="javascript:;" @click="changecategorypopup">
                            <div class="list-icon sm white">
                                <div class="inner"><img :src="category.image"></div>
                            </div>
                            <div class="list-description">
                                <p>{{category.heading}}</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <category-popup @HideModalValue="HideModal" :showModalProp="categoryval"></category-popup>        
    </div>
</template>

<script type="text/javascript">
    export default {
        methods: {
            changecategorypopup() {
                this.categoryval = true;
            },
            HideModal(){
                this.categoryval = false;
            },

        },
        
        data(){
            return{
                categoryval: false,
                //featured categories
                categories: [
                    {
                        image:'images/front/svg/electricians.svg',
                        heading:'Electricians',
                    },
                    {
                        image:'images/front/svg/carpenters.svg',
                        heading:'Carpenters',
                    },
                    {
                        image:'images/front/svg/painters.svg',
                        heading:'Painters',
                    },
                    {
                        image:'images/front/svg/plumbers.svg',
                        heading:'Plumbers',
                    },
                    {
                        image:'images/front/svg/movers.svg',
                        heading:'Movers',
                    },
                    {
                        image:'images/front/svg/gardner.svg',
                        heading:'Gardeners',
                    }
                ],
            }
        }
    }
</script>
