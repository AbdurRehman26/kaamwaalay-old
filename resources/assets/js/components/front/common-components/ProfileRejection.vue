<template>
	<div class="profile-rejection-box m-t-50 m-b-50">
		<div class="rejectionicon">
			<img class="building" src="images/front/svg/sp-default.svg">
			<img class="cross" src="images/front/svg/cancel.svg">
		</div>
		<h2>Your profile has been rejected.</h2>
        <h3>{{formData.reason}} </h3>
        <router-link to="/apply-for-review" class="btn btn-primary">Re-submit your profile </router-link>        
    </div>
</template>


<script>

    export default {
      props : ['formData'],
      data () {
        return {


        }
    },

}
</script>

