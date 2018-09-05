<template>
	<div class="profile-rejection-box">
		<div class="rejectionicon">
			<img class="building" src="images/front/svg/sp-default.svg">
			<img class="cross" src="images/front/svg/cancel.svg">
		</div>
		<h2>Your profile has been rejected.</h2>
		<p>You need to provide certification document related to electrician service. Also you need to provide proof of business. </p>
		<a href="javascript:void(0);" @click="profileredirct()" class="btn btn-primary">Re-submit your profile</a>
	</div>
</template>


<script>

export default {
  data () {
    return {
 

    	}
  	},

    methods: {

    	profileredirct() {
    		this.$router.push({name: 'provider_profile'});
    	},
 

    },

}
</script>

