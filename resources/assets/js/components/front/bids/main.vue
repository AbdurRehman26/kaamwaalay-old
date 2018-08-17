<template>
	<div class="my-job-lising-content">
		<div class="container">
			<div class="bidding-sec">
				<h2>My Bids</h2>
				<div class="bidding-navigation">
					<ul>
						<li @click="bid_selection = 'invitebid'" :class="{ active: bid_selection === 'invitebid' }">
							<p>INVITATIONS <span>(1)</span></p>						
						</li>
						<li @click="bid_selection = 'activebid'" :class="{ active: bid_selection === 'activebid' }">
							<p>ACTIVE BIDS <span>(2)</span></p>							
						</li>
						<li @click="bid_selection = 'awardedbid'" :class="{ active: bid_selection === 'awardedbid' }">
							<p>AWARDED <span>(12)</span></p>						
						</li>
						<li @click="bid_selection = 'completedbid'" :class="{ active: bid_selection === 'completedbid' }">
							<p>COMPLETED <span>(10)</span></p>							
						</li>
						<li @click="bid_selection = 'archivedbid'" :class="{ active: bid_selection === 'archivedbid' }">
							<p>ARCHIVED <span>(3)</span></p>							
						</li>
					</ul>
				</div>
			</div>

			<div class="job-post-container section-padd sm">
				<bid-invitation @changebid="ChangeBid" @chatmessage="ChatMessage" v-show="bid_selection == 'invitebid'"></bid-invitation>
				<bid-completed @changebid="ChangeBid" @chatmessage="ChatMessage" v-show="bid_selection == 'completedbid'"></bid-completed>
				<bid-awarded @changebid="ChangeBid" @chatmessage="ChatMessage" v-show="bid_selection == 'awardedbid'"></bid-awarded>
				<bid-archived @changebid="ChangeBid" @chatmessage="ChatMessage" v-show="bid_selection == 'archivedbid'"></bid-archived>
				<bid-active @changebid="ChangeBid" @chatmessage="ChatMessage" v-show="bid_selection == 'activebid'"></bid-active>
			</div>

            <post-bid-popup @HideModalValue="HideModal" :showModalProp="bidpopup"></post-bid-popup>

		</div>

	</div>
</template>

<script>
import StarRating from 'vue-star-rating';

export default {
  data () {
    return {
    	bid_selection: 'activebid',
        bidpopup: false,
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
        ChangeBid(){
            this.bidpopup = true;
        },
        HideModal(){
            this.bidpopup = false;
        },
        servicedetail(){
        	this.$router.push({name: 'job-details'});
        }

    },
    components: {
        StarRating
    },

    mounted(){

    },
    watch:{
    	bid_selection: function (val){
    		return this.val
    	},
    }

}
</script>
