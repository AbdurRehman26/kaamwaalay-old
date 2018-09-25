<template>
	<div class="my-job-lising-content">
		<div class="container">

			<div class="profile-rejection-content">
                <div class="profile-rejection-box">
                    <div class="rejectionicon">
                        <img class="building" src="images/front/svg/sp-default.svg">
                        <img class="cross" src="images/front/svg/cancel.svg">
                    </div>
                    <h2>Your profile has not been approved yet.</h2>
                    <p>It will take one to three days in profile approval. We will inform you once your profile is approved. In the mean time, please download our mobile apps. </p>
                    <div class="app-images custom-appicon">
                        <ul>
                            <li class="apple">
                                <a href="javascript:;" @click="profilenotcomplete()">
                                    <img src="images/front/common-images/app-store.jpg">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" @click="profileapprove()">
                                    <img src="images/front/common-images/google-play.jpg">
                                </a>
                            </li>
                        </ul>
                    </div>                    
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import StarRating from 'vue-star-rating';

    export default {
      data () {
        return {
         

        }
    },

    methods: {

    	AddCustomer() {
    		this.customer = true;
    	},
        ViewCustomerDetail() {
            /*this.viewcustomer = true;*/
            this.$router.push({name: 'customerdetail'});
        },
        changestatuspopup() {
            this.changestatus = true;
        },
        HideModal(){
            this.customer = false;
            this.viewcustomer = false;
            this.changestatus = false;
        },
        servicedetail(){
        	this.$router.push({name: 'job-details'});
        },
        profilenotcomplete(){
            this.$router.push({name: 'profile-rejection'});
        },
        profileapprove(){
            this.$router.push({name: 'not-review'});

        },

    },
    components: {
        StarRating
    },

    mounted(){

    }

}
</script>
