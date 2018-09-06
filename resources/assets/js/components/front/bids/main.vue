<template>
	<div class="my-job-lising-content">
		<div class="container">
			<div class="bidding-sec">
				<h2>My Bids</h2>
				<div class="bidding-navigation">
					<ul>
						<li @click="bid_selection = 'invitebid'" :class="{ active: bid_selection === 'invitebid' }">
							<p>INVITATIONS <span>{{invitationCount? "(" + invitationCount + ")" : ""}}</span></p>						
						</li>
						<li @click="bid_selection = 'activebid'" :class="{ active: bid_selection === 'activebid' }">
							<p>ACTIVE BIDS <span>{{activeBidCount? "(" + activeBidCount + ")" : ""}}</span></p>							
						</li>
						<li @click="bid_selection = 'awardedbid'" :class="{ active: bid_selection === 'awardedbid' }">
							<p>AWARDED <span>{{awardedCount? "(" + awardedCount + ")" : ""}}</span></p>						
						</li>
						<li @click="bid_selection = 'completedbid'" :class="{ active: bid_selection === 'completedbid' }">
							<p>COMPLETED <span>{{completedCount? "(" + completedCount + ")" : ""}}</span></p>							
						</li>
						<li @click="bid_selection = 'archivedbid'" :class="{ active: bid_selection === 'archivedbid' }">
							<p>ARCHIVED <span>{{archivedCount? "(" + archivedCount + ")" : ""}}</span></p>							
						</li>
					</ul>
				</div>
			</div>

			<div class="job-post-container section-padd sm">
				<bid-invitation @changebid="ChangeBid" @showinformation="showinfo()" @chatmessage="showchatpanel" v-show="bid_selection == 'invitebid'" @recordCount="setInvitationCount" :show="(bid_selection == 'invitebid')"></bid-invitation>
				<bid-completed @changebid="ChangeBid" @showinformation="showinfo()" @chatmessage="showchatpanel" v-show="bid_selection == 'completedbid'" @recordCount="setCompletedCount"></bid-completed>
				<bid-awarded @changebid="ChangeBid" @showinformation="showinfo()" @chatmessage="showchatpanel" v-show="bid_selection == 'awardedbid'" @recordCount="setAwardedCount"></bid-awarded>
				<bid-archived @changebid="ChangeBid" @showinformation="showinfo()" @chatmessage="showchatpanel" v-show="bid_selection == 'archivedbid'" @recordCount="setArchivedCount"></bid-archived>
				<bid-active @changebid="ChangeBid" @showinformation="showinfo()" @chatmessage="showchatpanel" v-show="bid_selection == 'activebid'" @recordCount="setActiveBidCount" ></bid-active>
			</div>

            <post-bid-popup @HideModalValue="HideModal" :showModalProp="bidpopup"></post-bid-popup>
            <chat-panel v-show="isShowing" @CloseDiscussion='CloseDiscussion()'></chat-panel>
            <info-popup @HideModalValue="HideModal" :showModalProp="infoval"></info-popup>

        </div>

    </div>
</template>

<script>
    import StarRating from 'vue-star-rating';

    export default {
      data () {
        return {
         bid_selection: 'invitebid',
         bidpopup: false,
         isShowing:false,
         infoval:false,
         invitationCount: 0,    
         activeBidCount: 0,    
         archivedCount: 0,    
         awardedCount: 0,    
         completedCount: 0,    
     }
 },

 methods: {
    setInvitationCount(count) {
        this.invitationCount = count;
    },
    setActiveBidCount(count) {
        this.activeBidCount = count;
    },
    setArchivedCount(count) {
        this.archivedCount = count;
    },
    setAwardedCount(count) {
        this.awardedCount = count;
    },
    setCompletedCount(count) {
        this.completedCount = count;
    },
    AddCustomer() {
        this.customer = true;
    },
    ViewCustomerDetail() {
    /*this.viewcustomer = true;*/
        window.scrollTo(0,0);
        this.$router.push({name: 'customerdetail'});
    },
    changestatuspopup() {
        this.changestatus = true;
    },
    ChangeBid(){
        this.bidpopup = true;
    },
    showinfo() {
        this.infoval = true;
    },    
    HideModal(){
        this.bidpopup = false;
        this.infoval = false;
    },
    servicedetail(){
        window.scrollTo(0,0);
        this.$router.push({name: 'job-details'});
    },
    showchatpanel(){
        this.isShowing=true;
    },
    CloseDiscussion(){
        this.isShowing=false;
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
