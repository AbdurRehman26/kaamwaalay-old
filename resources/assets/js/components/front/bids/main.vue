<template>
    <div class="my-job-lising-content">
        <div v-if="profileApproved && loadingCompleted" class="container">
            <div  class="bidding-sec">
                <h2>My Bids</h2>
                <div class="bidding-navigation">
                    <ul>
                        <li @click.prevent="onChangeTab('invitebid')" :class="{ active: bid_selection === 'invitebid', disabled: disableList }">
                            <p>INVITATIONS <span>{{invitationCount? "(" + invitationCount + ")" : ""}}</span></p>						
                        </li>
                        <li @click.prevent="onChangeTab('activebid')" :class="{ active: bid_selection === 'activebid', disabled: disableList }">
                            <p>ACTIVE BIDS <span>{{activeBidCount? "(" + activeBidCount + ")" : ""}}</span></p>							
                        </li>
                        <li @click.prevent="onChangeTab('awardedbid')" :class="{ active: bid_selection === 'awardedbid', disabled: disableList }">
                            <p>AWARDED <span>{{awardedCount? "(" + awardedCount + ")" : ""}}</span></p>						
                        </li>
                        <li @click.prevent="onChangeTab('completedbid')" :class="{ active: bid_selection === 'completedbid', disabled: disableList }">
                            <p>COMPLETED <span>{{completedCount? "(" + completedCount + ")" : ""}}</span></p>                           
                        </li>
                        <li @click.prevent="onChangeTab('cancelled')" :class="{ active: bid_selection === 'cancelled', disabled: disableList }">
                            <p>CANCELLED <span>{{cancelledCount? "(" + cancelledCount + ")" : ""}}</span></p>							
                        </li>
                        <li @click.prevent="onChangeTab('archivedbid')" :class="{ active: bid_selection === 'archivedbid', disabled: disableList }">
                            <p>ARCHIVED <span>{{archivedCount? "(" + archivedCount + ")" : ""}}</span></p>					
                        </li>
                    </ul>
                </div>
            </div>

            <div class="job-post-container section-padd sm">
                <div class="container md" v-if="!noRecordFound">
                    <jobs-list :records="records" @chatMessage="showChatBox" :tabType="tab"></jobs-list>
                </div>
                <no-record-found v-if="noRecordFound"></no-record-found>
                <vue-common-methods :url="bidUrl" :infiniteLoad="true" @get-records="getProviderRecords"></vue-common-methods>
            </div>

            <post-bid-popup @HideModalValue="hideModal" :showModalProp="bidpopup"></post-bid-popup>
            <!-- <info-popup @HideModalValue="HideModal" :showModalProp="infoval"></info-popup> -->
            <chat-panel v-show="showChat" @closeChat="closeChatBox" :messageData="jobMessageData" :show="showChat" :strict="strict" :disabled="disabledChat"></chat-panel>  

        </div>
        <profile-not-approved v-if="!profileRejected && !profileInComplete && !profileApproved && loadingCompleted"></profile-not-approved>
        <profile-not-completed v-if="!profileRejected && profileInComplete && loadingCompleted"></profile-not-completed>
        <profile-rejection :formData="profileValue" v-if="profileRejected"></profile-rejection>

        <vue-common-methods :url="url" @get-records="getRecords"></vue-common-methods>

    </div>
</template>

<script>
    import StarRating from 'vue-star-rating';

    export default {

        data () {
            return {
                disableList: true,
                tab: 'invitebid',
                bidUrl: null,
                records : [],
                chat_message: true,
                noRecordFound: false,   
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
                url : 'api/service-provider-profile-request/approved-profile',
                profileApproved : false,
                profileInComplete : false,
                loadingCompleted : false,
                profileRejected : false,
                profileValue : '',
                showChat : false,
                jobMessageData: {},
                strict: false,
                disabledChat: false,  
            }
        },

        methods: {
            onChangeTab(val) {
                this.bid_selection = val;
                this.tab = val;
                switch(val) {
                    case 'invitebid':
                        this.bidUrl = 'api/job-bid?pagination=true&filter_by_job_detail=true&filter_by_invitation=1&filter_by_archived=0&is_status=invited&filter_by_awarded=0&filter_by_tbd=0';
                    break;
                    case 'activebid':
                        this.bidUrl = 'api/job-bid?pagination=true&filter_by_job_detail=true&filter_by_archived=0&filter_by_awarded=0&filter_by_active_bids=true';
                    break;
                    case 'awardedbid':
                        this.bidUrl = 'api/job-bid?pagination=true&filter_by_job_detail=true&filter_by_archived=0&filter_by_awarded=1&filter_by_awarded_status=true';
                    break;
                    case 'completedbid':
                        this.bidUrl = 'api/job-bid?pagination=true&filter_by_job_detail=true&filter_by_archived=0&filter_by_status=completed&filter_by_awarded=1';
                    break;
                    case 'cancelled':
                        this.bidUrl = 'api/job-bid?pagination=true&filter_by_job_detail=true&filter_by_status=cancelled&filter_by_archived=0';
                    break;
                    case 'archivedbid':
                        this.bidUrl = 'api/job-bid?pagination=true&filter_by_job_detail=true&filter_by_archived=1';
                    break;
                }
            },
            initializeAllBidCalls(){
                this.getCount('invitedBid');
                this.getCount('activeBid');
                this.getCount('awardedBid');
                this.getCount('completedBid');
                this.getCount('archivedBid');
                this.getCount('cancelledBid');
            },
            closeChatBox() {
                this.showChat = false;
            },

            getProviderRecords(response){
                this.loading = false;
                let len = response.data.length;
                if(len || response.noRecordFound) {
                    this.disableList = false;
                }
                for (var i = 0 ; i < len; i++) {
                    this.records.push( response.data[i] ) ;
                    
                }
                this.noRecordFound = response.noRecordFound;
                this.pagination = response.pagination;
            },
            showChatBox(record, strictChat = false, disabled = false) {
                this.closeChatBox();
                if(record.status == 'in_bidding') {
                     this.strict = true;
                     this.disabledChat = false;
                }else if(record.status == 'cancelled' || record.status == 'archived' || record.status == 'completed'){
                     this.strict = true;
                     this.disabledChat = true;
                }else {
                    this.strict = false;
                    this.disabledChat = false;
                }
                this.jobMessageData = {
                    text: '',
                    job_id: record.id,
                    reciever_id: record.user_id,
                    job_bid_id: record.my_bid.id,
                    sender_detail: record.user,
                    business_name: record.title,
                };
                this.showChat = false;
                this.showChat = true;
                /*this.strict = strictChat;
                this.disabledChat = disabled;*/
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
            hideModal(){
                this.bidpopup = false;
                this.infoval = false;
            },
            servicedetail(){
                window.scrollTo(0,0);
                this.$router.push({name: 'job-details'});
            },
            getCount(type) {
                switch(type) {
                    case 'invitedBid':
                        var invitationBidUrl = 'api/job-bid?filter_by_job_detail=true&filter_by_invitation=1&filter_by_archived=0&is_status=invited&filter_by_awarded=0&filter_by_tbd=0&count_only=true';
                        this.getListCount(invitationBidUrl, false, (record) => {
                            this.invitationCount = record.count;
                        });
                    break;

                    case 'activeBid':
                        var activeBidUrl = 'api/job-bid?filter_by_job_detail=true&filter_by_archived=0&filter_by_awarded=0&filter_by_active_bids=true&count_only=true';
                        this.getListCount(activeBidUrl, false, (record) => {
                            this.activeBidCount = record.count;
                        });
                    break;

                    case 'awardedBid':
                        var awardedBidUrl = 'api/job-bid?filter_by_job_detail=true&filter_by_archived=0&filter_by_awarded=1&count_only=true&filter_by_awarded_status=true';
                        this.getListCount(awardedBidUrl, false, (record) => {
                            this.awardedCount = record.count;
                        });
                    break;

                    case 'completedBid':
                        var completedBidUrl = 'api/job-bid?filter_by_job_detail=true&filter_by_archived=0&filter_by_status=completed&filter_by_awarded=1&count_only=true';
                        this.getListCount(completedBidUrl, false, (record) => {
                            this.completedCount = record.count;
                        });
                    break;

                    case 'archivedBid':
                        var archivedBidUrl = 'api/job-bid?&filter_by_job_detail=true&filter_by_archived=1&count_only=true';
                        this.getListCount(archivedBidUrl, false, (record) => {
                            this.archivedCount = record.count;
                        });
                    break;

                    case 'cancelledBid':
                        var cancelledBidUrl = 'api/job-bid?filter_by_job_detail=true&filter_by_status=cancelled&count_only=true';
                        this.getListCount(cancelledBidUrl, false, (record) => {
                            this.cancelledCount = record.count;
                        });
                    break;
                }
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

                    response = response.data;

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
            getRecords(response){

                this.profileApproved = false;

                if(response.noRecordFound){
                    this.profileInComplete = true;
                    this.loadingCompleted = true;     
                }

                if(Object.keys(response.data).length){
                    let profileStatus = response.data.status;
                    this.profileInComplete = false;
                    if(profileStatus == 'approved'){
                        this.initializeAllBidCalls();
                        this.profileApproved = true;
                    }else if(profileStatus == 'rejected'){
                        this.profileValue = response.data;
                        this.profileRejected = true;
                    }else{

                    }
                    this.loadingCompleted = true;
                }
            },
            checkStatus(bid) {
                if(bid.status == 'in_bidding') {
                    this.showChatBox(bid, true, false);
                }else if(bid.status == 'cancelled' || bid.status == 'archived' || bid.status == 'completed'){
                    this.showChatBox(bid, true, true);
                }else {
                    this.showChatBox(bid, false, false);
                }
            },
        },
        components: {
            StarRating
        },

        mounted(){
            this.onChangeTab('invitebid');
        },
        watch:{
            bid_selection(val){
                return this.val
            },
            tab(val) {
                this.records = [];
                this.disableList = true;
            }
        }

    }
</script>
