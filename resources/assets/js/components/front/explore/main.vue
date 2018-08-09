<template>

    <div class="content-area">
        <div class="main-banner">
            <div class="main-img">
                <img  :src="bannerimage">
            </div>
            <div class="content">
                <div class="verticle-align">
                    <div class="inner">
                        <div class="container">
                            <div class="content-inner md">
                                <h1>Find best skilled service professionals near you.</h1>
                                <div class="search-filter">
                                     <input type="text" placeholder="What service do you need?" class="form-control search-service" name="">
                                     <div class="container-zip-code">
                                     	<i class="icon-location"></i>
                                     	<input type="number" placeholder="Zip code" class="form-control zip-code" name="">
                                     </div>
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

        <div class="featured-categories">

        </div>

    </div>	
</template>

<script>
export default {
  data () {
    return {
		bannerimage: '/images/front/explore/banner-bg/banner.jpg',
    	}
  	},
    methods: {

    }
}
</script>