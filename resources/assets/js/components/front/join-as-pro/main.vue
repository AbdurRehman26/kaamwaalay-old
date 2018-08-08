<template>
	<div class="content-area">
		<!-- banner section start-->
		<div class="main-banner" v-bind:style="{'background-image': 'url(' + bannerimage + ')',}">
			<div class="container">
				<div class="banner-slogan">
					<h2>Your next job is just around the corner</h2>
					<p>There’s plenty of local work but finding it is easier said than done. On Professional Service Marketplace, you set a custom working area so every lead you receive is exactly where you want to work.</p>
					<a href="javascript:void(0);" class="btn btn-primary">Sign up today</a>
				</div>
			</div>
		</div>
		<!-- banner section end -->
	</div>
</template>

<script>
export default {
  data () {
    return {
    	bannerimage: '/images/',
    	}
  	},
    methods: {

    }
}
</script>