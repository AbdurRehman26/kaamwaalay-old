<template>
	<div class="profile-rejection-box">
		<div class="rejectionicon">
			<img class="building" src="images/front/svg/sp-default.svg">
			<img class="cross" src="images/front/svg/cancel.svg">
		</div>
		<h2>Your profile has been rejected.</h2>
        <router-link to="/apply-for-review" class="btn btn-primary">Re-submit your profile </router-link>
        <p>{{formData.reason}} </p>
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

