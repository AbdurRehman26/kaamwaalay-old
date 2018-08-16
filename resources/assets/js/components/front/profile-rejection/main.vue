<template>
	<div class="my-job-lising-content">
		<div class="container">
			<div class="my-job-indication">
				<h2>My Bids</h2>
				<p>You have total <span class="primary-color text-bold">0 active</span> job and <span class="primary-color text-bold">0 completed</span> jobs.</p>
			</div>

			<div class="profile-rejection-content">
				<profile-rejection></profile-rejection>
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
        }

    },
    components: {
        StarRating
    },

    mounted(){

    }

}
</script>
