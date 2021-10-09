<template>
	<div class="my-job-lising-content">
		<div class="container">
			<div class="my-job-indication">
				<h2>My Bids</h2>
				<p>You have total <span class="primary-color text-bold">0 active</span> bids and <span class="primary-color text-bold">0 completed</span> bids.</p>
			</div>

			<div class="profile-rejection-content">
                <div class="profile-rejection-box">
                    <div class="rejectionicon">
                        <img class="building" src="images/front/svg/sp-default.svg">
                        <img class="cross" src="images/front/svg/cancel.svg">
                    </div>
                    <h2>You have not completed your profile yet.</h2>
                    <p>In order to get bidding access on jobs, you need to submit your profile and get approval.</p>
                    <router-link class="btn btn-primary" to="/apply-for-review">
                        Complete your profile
                    </router-link>

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

        },
        profileredirct(){
            this.$router.push({name: 'provider_profile'});
        }        

    },
    components: {
        StarRating
    },

    mounted(){

    }

}
</script>
