<template>
    <div>
        <div class="banner home-banner">
            <img :src="headerBanner">
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

        <div class="featured-categories">

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
