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
						<li @click="bid_selection = 'cancelled'" :class="{ active: bid_selection === 'cancelled' }">
							<p>CANCELLED <span>{{cancelledCount? "(" + cancelledCount + ")" : ""}}</span></p>							
						</li>
						<li @click="bid_selection = 'archivedbid'" :class="{ active: bid_selection === 'archivedbid' }">
							<p>ARCHIVED <span>{{archivedCount? "(" + archivedCount + ")" : ""}}</span></p>					
						</li>
					</ul>
				</div>
			</div>

			<div class="job-post-container section-padd sm">
				<bid-invitation @changebid="ChangeBid" @showinformation="showinfo()" @chatmessage="showchatpanel" v-show="bid_selection == 'invitebid'" @recordCount="setInvitationCount" :show="(bid_selection == 'invitebid')"></bid-invitation>
				<bid-completed @changebid="ChangeBid" @showinformation="showinfo()" @chatmessage="showchatpanel" v-show="bid_selection == 'completedbid'" @recordCount="setCompletedCount" :show="(bid_selection == 'completedbid')" :count="completedCount"></bid-completed>
				<bid-awarded @changebid="ChangeBid" @showinformation="showinfo()" @chatmessage="showchatpanel" v-show="bid_selection == 'awardedbid'" @recordCount="setAwardedCount" :show="(bid_selection == 'awardedbid')" :count="awardedCount"></bid-awarded>
				<bid-archived @changebid="ChangeBid" @showinformation="showinfo()" @chatmessage="showchatpanel" v-show="bid_selection == 'archivedbid'" @recordCount="setArchivedCount" :show="(bid_selection == 'archivedbid')" :count="archivedCount"></bid-archived>
				<bid-active @changebid="ChangeBid" @showinformation="showinfo()" @chatmessage="showchatpanel" v-show="bid_selection == 'activebid'" @recordCount="setActiveBidCount" :show="(bid_selection == 'activebid')" :count="activeBidCount"></bid-active>
                <bid-cancelled @changebid="ChangeBid" @showinformation="showinfo()" @chatmessage="showchatpanel" v-show="bid_selection == 'cancelled'" @recordCount="setCancelledBidCount" :show="(bid_selection == 'cancelled')" :count="cancelledCount"></bid-cancelled>
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
         bid_selection: '',
         bidpopup: false,
         isShowing:false,
         infoval:false,
         invitationCount: 0,    
         activeBidCount: 0,    
         archivedCount: 0,    
         awardedCount: 0,    
         completedCount: 0,    
         cancelledCount: 0,    
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
    setCancelledBidCount(count) {
        this.cancelledCount = count;
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
    },
    getActiveBidsCount() {
        var activeBidUrl = 'api/job-bid?filter_by_job_detail=true&filter_by_invitation=1&filter_by_archived=0&filter_by_awarded=0&filter_by_active_bids=true&count_only=true';
        this.getListCount(activeBidUrl, false, (record) => {
            this.activeBidCount = record.count;
        });
    },
    getAwardedBidsCount() {
        var awardedBidUrl = 'api/job-bid?filter_by_job_detail=true&filter_by_invitation=1&filter_by_archived=0&filter_by_awarded=1&count_only=true';
        this.getListCount(awardedBidUrl, false, (record) => {
            this.awardedCount = record.count;
        });
    },
    getCompletedBidsCount() {
        var completedBidUrl = 'api/job-bid?filter_by_job_detail=true&filter_by_invitation=1&filter_by_archived=0&filter_by_status=completed&filter_by_awarded=1&count_only=true';
        this.getListCount(completedBidUrl, false, (record) => {
            this.completedCount = record.count;
        });
    },
    getArchivedBidsCount() {
        var archivedBidUrl = 'api/job-bid?&filter_by_job_detail=true&filter_by_invitation=1&filter_by_archived=1&count_only=true';
        this.getListCount(archivedBidUrl, false, (record) => {
            this.archivedCount = record.count;
        });
    },
    getCancelledBidsCount() {
        var cancelledBidUrl = 'api/job-bid?filter_by_job_detail=true&filter_by_invitation=1&filter_by_status=cancelled&count_only=true';
        this.getListCount(cancelledBidUrl, false, (record) => {
            this.cancelledCount = record.count;
        });
    },
    getListCount(url, page, successCallback){

        let self = this;

        let result = {
            count : 0,
            noRecordFound : false
        };


        if(typeof(page) !== 'undefined' && page){
            url += '&page='+page;   
        }

        self.$http.get(url).then(response=>{

            response = response.data.response;
            
            let result = {
                count : response.data,
                noRecordFound : false,
                pagination : response.pagination

            };


            if(!response.data.length){
                result.noRecordFound = true;
            }

            self.pagination = response.pagination;

            if(typeof successCallback !== 'undefined'){
                successCallback(result);
            }

        }).catch(error=>{
            console.log(error , 'error');
        });

    },


},
components: {
    StarRating
},

mounted(){
    this.getActiveBidsCount();
    this.getAwardedBidsCount();
    this.getCompletedBidsCount();
    this.getArchivedBidsCount();
    this.getCancelledBidsCount();
    this.bid_selection = 'invitebid';
},
watch:{
    bid_selection: function (val){
    return this.val
},
}

}
/*
filter_by_job_detail=true
filter_by_invitation=1
filter_by_archived=0
is_status=invited
filter_by_awarded=0
filter_by_active_bids=true
*/
</script>
