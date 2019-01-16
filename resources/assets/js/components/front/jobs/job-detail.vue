<template>
    <div class="job-main-details detail-page">
        <div class="content" v-if="Object.keys(record).length">
            <div class="job-main-heading grey-bg elementary-banner section-padd xs border-bottom">
                <div class="container element-index text-center md">
                    <div class="content-sec">
                        <div class="job-image" 
                        v-bind:style="{'background-image': 'url('+ jobImage +')'}">
                    </div>

                    <div class="job-content">
                        <h2>{{record.title}}</h2>
                        <div class="job-notification flexable direction-column">	
                            <div class="col-md-12 p-l-0 p-r-0">
                                <div class="jobs-done">
                                    <span class="job-category">{{ record.service | mainServiceOrChildService('-')  }}</span>		
                                    <div class="job-status">
                                        <span v-if="canMarkJobComplete && !jobCompleted && !jobArchived" class="tags"
                                        :class="['completed']">
                                        Marked Done
                                    </span>
                                    <span v-else-if="record.is_archived" class="tags"
                                    :class="['archived']">
                                    {{ record | jobStatus }}
                                </span>

                                <span v-else class="tags"
                                :class="[ record.status ?  record.status.replace(/\s/g, '').replace('_', '').replace('cancelled' , 'rejected').toLowerCase().trim() : '']">
                                {{ record | jobStatus }}
                            </span>	
                        </div>											
                    </div>	
                </div>		
                <div class="col-md-12 p-r-0 p-l-0">

                    <div class="job-details">
                        <div class="awarded alignawd">
                            <p class="awarded_to">
                                <i class="icon-checkmark2"></i> 
                                {{ jobAwarded ? 'job awarded to : ' : 'job not awarded yet'}}
                                <strong>
                                {{ jobAwarded && jobAwarded.business_details ? jobAwarded.business_details.business_name : ''}}</strong>
                            </p>
                            <p class="service_required">
                                <i class="icon-brightness-down"></i>
                                Service required 
                                <strong v-if="record.job_type == 'urgent'" class="urgent">{{ record.job_type }}</strong>
                                <strong v-else-if="record.preference == 'choose_date'">{{ record.formatted_schedule_at }}</strong>
                                <strong v-else>{{ record.preference | jobPreference }}</strong>
                            </p>
                        </div>
                    </div>																				
                </div>					

            </div>	
        </div>
    </div>
</div> 
<div class="elements">
    <img src="/images/front/banner-bg/bg-5.png" class="top-left"> 
    <img src="/images/front/banner-bg/bg-2.png" class="bottom-right">
</div>
</div>



<div class="job-post-container section-padd sm">
    <div class="container md">


        <div class="row">
            <div class="col-md-9">
                <div class="provider-information">

                    <div class="service-detail">
                        <h3>Job Details</h3>
                    </div>

                    <div class="member-details">
                        <p class="location">
                            <i class="icon-location"></i> 
                            Location <strong>{{ record.city  }}, {{ record.state}}</strong>
                        </p>
                        <p class="member-since">										
                            Date posted: <strong>{{record.created_at.date | formatDate}}</strong>
                        </p>
                    </div>

                    <div class="post-job-description">
                        <p>{{ record.description }}</p>
                    </div>

                    <div v-if="record.jobImages" class="jobs-post-files">
                        <h3>Related Photos</h3>
                        <div class="no-photos" v-if="!record.jobImages.length"> 
                            <p>Photo(s) Not Available</p>
                        </div>

                        <div class="imagegallery">
                            <img class="image" v-for="(image, i) in imageLists" :src="image" @click="onClick(i)">                        
                            <vue-gallery-slideshow 
                            v-if="imageLists.length"
                            :images="record.jobImages" :index="index" @close="index = null"></vue-gallery-slideshow>
                        </div>


                    </div>

                    <div class="jobs-post-files" v-if="record.videos">
                        <h3>Related Videos</h3>
                        <iframe width="1280" height="365" :src="record.videos | appendYoutubeUrl" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>

                    <div v-if="canViewMap" class="jobs-post-files">
                        <h3>Customer Information</h3>
                        <div class="coustomer-info-line">
                            <div class="left-ico">
                                <i class="icon-phone_in_talk"></i>
                            </div>
                            <p>Phone number: <strong>{{record.user.phone_number}}</strong></p>
                        </div>
                        <div class="coustomer-info-line">
                            <div class="left-ico">
                                <i class="icon-pin"></i>
                            </div>
                            <p>Address: 
                                <strong>
                                    {{record.address + ' , '}} {{ record.apartment ? record.apartment + ' , ' : '' }} {{ record.city + ' ,'}} {{ record.state }}
                                </strong>
                            </p>
                        </div>                        
                        
                        <div class="coustomer-info-line">
                            <div class="left-ico">
                                <img class="icon-wth" src="/images/front/svg/capitol.svg">
                            </div>
                            <p>City: 
                                <strong>
                                    {{ record.city}}
                                </strong>
                            </p>
                        </div>                        
                        
                        <div class="coustomer-info-line">
                            <div class="left-ico">
                                <img class="icon-wth" src="/images/front/svg/state.svg">
                            </div>
                            <p>State: 
                                <strong>
                                    {{ record.state }}
                                </strong>
                            </p>
                        </div>                        
                        
                        <div class="coustomer-info-line m-t-20">
                            <iframe :src="mapUrl | googleMapEmbeded" width="600" height="130" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>                
                    </div>

                    <div id="bid-review" class="chat-feedback">

                        <div class="text-notifer">
                            <h3 v-if="isMyJob && jobBids.pagination">Bids Received ({{ jobBids.pagination ? jobBids.pagination.total : '' }})</h3>    
                            <h3 v-if="myBidValue && !isMyJob">My Bid</h3>

                            <div class="no-photos" v-if="isMyJob && jobBids.pagination && !jobBids.pagination.total"> 
                                No bid(s) available
                                <router-link v-if="record.status !== 'cancelled'" href="javascript:void(0);" class="pull-right" 
                                :to="{name: 'Explore_Detail' ,  params : { serviceName: record.service.url_suffix , zip : zipCode }}">Invite service providers</router-link>

                            </div>

                        </div>

                        <div class="chat-feedback-column job-bidding" v-for="bid in jobBids.data">
                            <div class="chat-feedback-image"  v-bind:style="{'background-image': 'url('+ getImage(bid.user.profileImage) +')',}" ></div>
                            <div class="job-common-description">
                                <h3 class="pointer">{{bid.service_provider ? bid.service_provider.business_name : ''}}</h3>

                                <strong v-if="record.awarded_to && record.awarded_to.id == bid.user_id">{{'( Job Awarded )'}}<i class="icon-trophy"></i></strong>

                                <div v-if="isMyJob" class="jobs-rating">
                                    <star-rating :star-size="20" read-only  :increment="0.5" :rating="bid.user ? bid.user.average_rating : 0" active-color="#8200ff"></star-rating>
                                    <div class="jobs-done">
                                        <span class="review-job">{{ bid.user && bid.user.total_feedback_count ? bid.user.total_feedback_count : 0 }} Feedback review(s)</span>				

                                        <span class="review-job" v-if="!bid.user && !bid.user.total_finished_jobs">No Jobs performed</span>
                                        <span class="review-job" v-else>{{ bid.user.total_finished_jobs }} Job(s) performed</span>
                                    </div>	
                                </div>											
                            </div>
                            <div class="job-proposal">
                                <div class="bit-offered">
                                    <span v-if="bid.status == 'suggested_time'"><i class="icon-work-briefcase"></i> Offer: 
                                        <strong>
                                            {{ bid | bidStatus }} {{user.role_id != 3? "-" : ""}} <a href="javascript:void(0);" @click.prevent="showVisitApprovalPopup = true;" v-if="user.role_id != 3">View Details</a>
                                        </strong>
                                    </span>
                                    <span v-else-if="bid.status == 'on_the_way'"><i class="icon-work-briefcase"></i> Offer: 
                                        <strong>
                                            {{ bid | bidStatus }} <a href="javascript:void(0);" @click.prevent="showVisitDetailsPopup = true; bVal = bid;" v-if="user.role_id != 2">- Visit Details</a>
                                        </strong>
                                    </span>
                                    <span v-else><i class="icon-work-briefcase"></i> Offer: 
                                        <strong>
                                            {{ bid | bidStatus }}
                                        </strong>

                                    </span>
                                    <span class="pull-right"><i class="icon-calendar-daily"></i> Date:
                                        <strong>
                                            {{bid.formatted_created_at}}
                                        </strong>
                                    </span>
                                </div>
                                <div class="proposal-message">
                                    <p>{{bid.description}}</p>
                                </div>

                                <div class="provider-bidding-btn">

                                    <a v-if="!jobArchived && !jobCancelled && !bid.is_tbd && canAwardJob && isMyJob && bid.amount && Math.ceil(bid.amount)" href="javascript:void(0);" 
                                    @click.prevent="bidder = bid; showAwardJob  = true;" class="btn btn-primary">Award Job</a>

                                    <a v-if="isMyJob" href="javascript:void(0);" @click="showProfile(bid.service_provider.id)" class="btn btn-primary">View Profile</a>
                                    <a v-if="showChatButton && (isMyJob || canChat) && JSON.parse($store.getters.getAuthUser).role_id == 3" @click.prevent="checkStatus(bid)" href="javascript:void(0);" class="btn btn-primary">Chat</a>
                                    <a v-if="!jobArchived && !jobCancelled && !jobAwarded && isMyJob && bid.is_visit_required && bid.status == 'pending'" href="javascript:void(0);" @click="showVisitJob = true; bidValue = bid" class="btn btn-primary">Visit Approval</a>

                                    <a v-if="isMyJob  && !jobCancelled && record.status == 'completed'  && !record.review_details && jobAwarded && (jobAwarded.id == bid.user_id)" @click.prevent="showReviewForm = true" href="javascript:void(0);" class="btn btn-primary m-t-0">
                                        Write Review
                                    </a>

                                </div>
                            </div>
                        </div>

                    </div>						

                </div>
            </div>

            <div class="col-md-3 p-l-0 p-r-0">

                <div class="service-provider">

                    <div v-if="isMyJob && canInvite && jobBids.showInvite" class="service-providers-invite mb-4" v-bind:style="{'background-image': 'url('+ jobImage +')',}">
                        <h3>Find &amp; invite service providers to bid on your job.</h3>
                        <p>{{record.service_provider_count}} service providers available around you related to {{record.service.title}}.</p>
                        <router-link href="javascript:void(0);" class="btn btn-primary m-b-20 m-t-0" 
                        :to="{name: 'Explore_Detail' ,  params : { serviceName: record.service.url_suffix , zip : record.zip_code }}">Find &amp; Invite</router-link>				
                    </div>

                    <a style="pointer-events: none;" v-if="awardedToMe" class="btn btn-primary btn-outline margin-bottom-20px m-t-0">
                        <i class="icon-trophy"></i> Job Awarded
                    </a>

                    <button v-if="isMyJob && canMarkJobComplete" @click="markCompletedByCustomer" class="m-b-20 m-t-0" :class="[markJobCompleteLoading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' , 'apply-primary-color' , disabledMarkJobComplete ? 'disabled' : '' ]">
                        <span>Mark Job Complete</span> <loader></loader>
                    </button>

                    <button v-if="isMyJob && canArchiveJob" class="m-b-20 m-t-0" @click.prevent="markJobArchive(); confirmPopupShow = true;" :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-cancel-job', 'archiving' , jobArchived ? 'disabled' : '' ]">
                        <i class="icon-folder"></i><span>Mark Job Archive</span> <loader></loader>
                    </button>

                    <a href="javascript:void(0);" v-if="isMyJob && canModifyJob && !jobArchived" @click="Modify" class="btn btn-primary m-b-20 m-t-0"><i class="icon-edit-pencil"></i> Modify Details</a>					

                    <a href="javascript:void(0);" class="m-b-20 m-t-0" v-if="isMyJob && canCancelJob && !jobArchived" @click.prevent="markJobCancel(); confirmPopupShow = true" :class="['btn', 'btn-cancel-job', disabledCancelJob ? 'disabled' : '']"><i class="icon-close2"></i> Cancel Job</a>

                    <button v-canBid v-if="!isMyJob && canMarkJobDone" @click="markDoneBySp" class="m-b-20 m-t-0" :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' , 'apply-primary-color', disabledMarkJobDone ? 'disabled' : '' ]">
                        <span><i class="icon-checkmark2" style="margin-left: -40px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mark Job Done</span> <loader></loader>
                    </button>

                    <button v-canBid v-if="(record.status != 'completed') && (!isMyJob && canInitiateJob)" @click="markInitiateJobByCustomer" class="m-b-20 m-t-0" :class="[initiateJobLoading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' , 'apply-primary-color' , disableInitiateBid ? 'disabled' : '']">                        
                        <span><i class="icon-checkmark2" style="margin-left: -64px;margin-right: 36px;"></i>Initiate Job</span> <loader></loader>
                    </button>

                    <a v-canBid v-if="!isMyJob && !myBidValue && !jobAwarded && !jobArchived" @click.prevent="showBidPopup = true;" href="javascript:void(0);" class="btn btn-primary m-b-20 m-t-0">Bid Now</a>                                                  

                    <a v-canBid v-if="!isMyJob && myBidValue && !jobAwarded && canModifyBid && !jobArchived" @HideModalValue="showBidPopup = false;" @click.prevent="showBidPopup = true; bidValue = myBidValue" href="javascript:void(0);" class="btn btn-primary m-b-20 m-t-0">
                        <i class="icon-edit-pencil"></i>
                        Modify Bid
                    </a>   

                    <a v-if="showChatButton && !isMyJob && canChat" @click.prevent="checkStatus(record)" href="javascript:void(0);" class="btn btn-primary m-b-20 m-t-0">Chat</a>

                    <a v-if="!jobAwarded && myBidValue && !jobArchived &&  visitAllowed" href="javascript:void(0);" class="btn btn-primary m-b-20 m-t-0" @click.prevent="bidder = record.my_bid; VisitPopup();"><i class="icon-front-car"></i> Go to visit</a>    

                    <!-- <a v-if="!isMyJob && canChat && !jobCancelled && !jobArchived && (jobAwarded && jobAwarded.user_id == $store.getters.getAuthUser.id)" @click.prevent="showChat = true;" href="javascript:void(0);" class="btn btn-primary">Chat</a> -->
                    
                    <a v-canBid href="#" class="m-t-0 m-b-20" v-if="(myBidValue && myBidValue.status != 'suggested_time') && ((!isMyJob && canArchiveBid && myBidValue) 
                        || (record.status == 'completed'))" @click.prevent="markArchiveBySp" :class="['btn', 'btn-cancel-job', disableArchiveBid ? 'disabled' : '']"><i class="icon-folder"></i> 
                        Archive
                    </a>

                    <a v-canBid v-if="!jobCancelled && jobAwarded && canRateReviewSp" @click.prevent="showReviewForm = true" href="javascript:void(0);" class="btn btn-primary m-t-0">
                        Write Review
                    </a>


                </div>

            </div>
        </div>

    </div>			
</div>

<award-job-popup @bid-updated="reSendCall(); requestUserUrl='api/user/me'" :job="record" :bidder="bidder" 
:record="record" @HideModalValue="showAwardJob  = false" :showModalProp="showAwardJob "></award-job-popup>

<visit-request-popup @bid-updated="reSendCall();" :bid="bidValue" :job="record" @HideModalValue="HideModal" :showModalProp="showVisitJob"></visit-request-popup>

<visit-request-approval-popup @bid-updated="reSendCall();" :bid="bidValue" :job="record" @HideModalValue="HideModal" :showModalProp="showVisitApprovalPopup"></visit-request-approval-popup>

<visit-request-detials-popup :bid="bVal" @HideModalValue="HideModal" :showModalProp="showVisitDetailsPopup"></visit-request-detials-popup>

<go-to-visit-popup @bid-updated="reSendCall();" :bid="bidValue" :job="record" @HideModalValue="HideModal" :showModalProp="visitpopup"></go-to-visit-popup>

<post-bid-popup :bid="bidValue" @bid-created="reSendCall" :job="record" @HideModalValue="showBidPopup = false; bidValue = ''" :showModalProp="showBidPopup"></post-bid-popup>
<mark-job-done-popup @HideModalValue="showMarkJobDonePopup = false;" :showModalProp="showMarkJobDonePopup"></mark-job-done-popup>
<chat-panel v-show="showChat" @closeChat="closeChatBox" :messageData="jobMessageData" :show="showChat"  :strict="strict" :disabled="disabledChat"></chat-panel>           

</div>


<write-review-popup :type="reviewType" @review-sent="reSendCall" :job="record" @HideModalValue="HideModal" :showModalProp="showReviewForm"></write-review-popup>
<confirmation-popup @form-submitted="formUpdated" :submitFormData="formData" :requestUrl="submitUrl" @HideModalValue="confirmPopupShow = false;" :showModalProp="confirmPopupShow"></confirmation-popup>

<!--  Job list  -->
<vue-common-methods :updateForm="true" @form-submitted="formSubmitted" :submitUrl="requestUrl" :formData="submitFormData" :force="forceValue" :url="requestUrl" @get-records="getResponse" :submit="submit"></vue-common-methods>

<!--  Bids list  -->
<vue-common-methods v-if="isMyJob" :hideLoader="true" :force="forceValue" :infiniteLoad="true" :url="requestBidUrl" @get-records="getBidsResponse"></vue-common-methods>

<!--  Submit bid list  -->
<vue-common-methods :updateForm="true" :submit="submitBidForm" @form-submitted="formUpdated" :formData="submitFormData" :submitUrl="submitBidUrl" v-if="!isMyJob"></vue-common-methods>

<!--  Get Use response to update bidding jobs  -->
<vue-common-methods :force="forceUserValue" :url="requestUserUrl" @get-records="getUserResponse"></vue-common-methods>

</div>
</template>


<script async defer
src="https://maps.googleapis.com/maps/api/js?key="+window.mapKey>
</script>

<script>
    import StarRating from 'vue-star-rating';
    import fancyBox from 'vue-fancybox';
    import Lightbox from 'vue-simple-lightbox';
    import VueGallerySlideshow from 'vue-gallery-slideshow';
    export default {
        data () {
            return {
                reviewType : '',
                bidValue : '',
                forceValue : false,
                bidder : '',
                bVal : '',
                record : [],
                jobBids : {
                    pagination : false,
                    data : [],
                    showInvite : false
                },
                showAwardJob : false,
                showVisitJob: false,
                showVisitApprovalPopup: false,
                showVisitDetailsPopup: false,
                visitpopup: false,
                bidpopup: false,
                isShowing:false,
                imageList: [],
                loading : false,
                showReviewForm : false,
                errorMessage: '',
                successMessage: '',
                showBidPopup : false,
                showMarkJobDonePopup : false,
                showChat : false,
                confirmPopupShow : false,
                invitepopupdata: false,
                jobMessageData: {},
                formData : {
                },                  
                strict: false,
                disabledChat: false,
                requestUrl : 'api/job/'+this.$route.params.id,
                requestBidUrl : 'api/job-bid?pagination=true&filter_by_job_id='+this.$route.params.id,
                bidReview: this.$route.params.id,
                submit : false,
                submitBidForm : false,
                submitBidUrl : 'api/job-bid/',
                submitFormData : '',
                confirmPopupUrl : '',
                index: null,
                mapZoom : 10,
                mapKey : '',
                xAxis : 37.090240,
                yAxis : -95.712891,
                forceUserValue : false,
                requestUserUrl : '',
                showChatButton : true,
                axisPoints : null,
                initiateJobLoading : false,
                markJobCompleteLoading : false,
                user: ''
            }
        },
        computed : {
            jobImage(){
                return this.record && this.record.service && this.record.service.images[0] ? this.record.service.images[0].upload_url : 'images/dummy/image-placeholder.jpg';
            },
            jobAwarded(){
                return this.record.awarded_to;
            },
            jobArchived(){
                return this.record.is_archived;
            },
            showInvite (){
                return this.jobBids.showInvite;
            },
            canInvite(){
                if(Object.keys(this.record).length){
                    return this.record.status != 'cancelled' && !this.record.awarded_to  && Object.keys(this.jobBids) && !this.jobBids.data.length;
                }
                return false;
            },
            imageLists(){
                return this.record.jobThumbImages;
            },            
            canInitiateJob(){
                if(Object.keys(this.record).length && this.record.my_bid){
                    return this.record.status != 'cancelled' && this.record.awardedBid && (( this.record.my_bid.id == this.record.awardedBid.id) && (this.record.awardedBid.status == 'completed' || this.record.awardedBid.status == 'pending'  || this.record.awardedBid.status == 'on_the_way' || this.record.status == 'initiated'));
                }
                return false;
            },
            canArchiveBid(){
                if(Object.keys(this.record) && this.record.my_bid){
                    return (this.record.awardedBid && (this.record.my_bid.id != this.record.awardedBid.id)) || 
                    (
                        !this.record.awardedBid && (Math.ceil(this.record.my_bid.amount) || this.record.my_bid.is_tbd || (this.record.my_bid.is_visit_required && this.record.my_bid.status != 'pending' && this.record.my_bid.status !== 'visit_allowed'))
                    );
                }
                return false;
            },
            jobCompleted(){
                if(Object.keys(this.record).length){
                    return this.record.status == 'completed' && this.record.awardedBid.status == 'completed' && !this.record.is_archived;
                }
                
            },
            canMarkJobComplete(){
                if(Object.keys(this.record).length){
                    return this.record.status != 'cancelled' && this.record.awardedBid && this.record.awardedBid.status == 'completed';
                }
                return false;
            },
            canMarkJobDone(){
                if(Object.keys(this.record).length && this.record.my_bid){

                    return this.record.awardedBid && (this.record.my_bid.id == this.record.awardedBid.id) && (this.record.status == 'initiated' || this.record.status == 'completed');
                }
                return false;
            },
            canCancelJob(){
                if(Object.keys(this.record).length){
                    return !this.record.awarded_to && this.record.status != 'completed';
                }
                return false;
            },
            canModifyJob(){
                if(Object.keys(this.record).length){
                    return !this.record.awarded_to && this.record.status != 'cancelled';
                }
                return false;
            },
            canArchiveJob(){
                return this.record.status != 'cancelled' && (this.record.status == 'completed' || this.record.status == 'cancelled');  
            },
            canAwardJob(){
                return !this.record.awarded_to && this.record.status != 'cancelled';
            },
            isMyJob(){
                if(Object.keys(this.record).length){
                    let user = JSON.parse(this.$store.getters.getAuthUser);
                    if(this.record.user_id != user.id){                  
                        this.reviewType = 'review';
                    }

                    return this.record.user_id == user.id;
                }
                this.reviewType = false;
                return false;
            },
            myBidValue(){
                if(Object.keys(this.record).length){
                    this.bidValue = this.record.my_bid;
                    return this.record.my_bid;
                }
            },
            awardedToMe(){
                if(Object.keys(this.record).length && this.record.my_bid && this.record.awarded_to){
                    return this.record.my_bid.user_id == this.record.awarded_to.id;
                }
            },
            visitAllowed(){
                if(Object.keys(this.record).length && this.record.my_bid){
                    return this.record.status != 'cancelled' && this.record.my_bid.status == "visit_allowed";
                }
            },
            canModifyBid(){
                if(Object.keys(this.record).length && this.record.my_bid){                    
                    return this.record.status != 'cancelled' && (this.record.my_bid.status == "on_the_way" || Math.ceil(this.record.my_bid.amount) || this.record.my_bid.is_tbd);
                }
            },
            canChat(){
                if(Object.keys(this.record).length){
                    return this.record.can_message;
                }
            },
            submitUrl(){
                if(this.record){  
                    return this.confirmPopupUrl;
                }
            },
            jobCancelled(){
                if(Object.keys(this.record).length && this.record.my_bid){
                    return this.record.status == 'cancelled'
                }
            },
            canRateReviewSp(){
                if(Object.keys(this.record).length && this.record.my_bid){
                    return !this.record.service_provider_review && this.record.my_bid.status == 'completed' && this.record.status == 'completed';
                }
            },
            zipCode(){
                let user = JSON.parse(this.$store.getters.getAuthUser);
                return user ? user.zip_code : false;
            },
            mapUrl(){
                return this.axisPoints;
            },
            onTheWay(){
                if(Object.keys(this.record).length && this.record.my_bid){
                    return this.record.status != 'cancelled' && this.record.my_bid.status == "on_the_way";
                }
            },
            canViewMap(){
                return this.isMyJob || this.visitAllowed || this.onTheWay || this.awardedToMe;
            },
            disableArchiveBid(){
                return this.record.my_bid.is_archived || ( (this.record.status != 'completed') && (this.record.status == 'cancelled' || this.awardedToMe));
            },
            disableInitiateBid(){
                return this.record.status == 'initiated' || this.record.status == 'completed' || this.record.my_bid.is_archived;
            },
            disableMarkDoneBid(){
                return this.record.status == 'completed' || this.record.my_bid.is_archived;
            },
            disabledCancelJob(){
                return this.record.status == 'cancelled';
            },
            disabledMarkJobComplete(){
                if(this.record){  
                    return this.record.status == 'completed';
                }
            },
            disabledMarkJobDone(){
                if(this.record.my_bid){  
                    return this.record.my_bid.status != 'initiated';
                }
            } 


        },
        methods: {
            getDateTime(bid) {
                return "("+moment(bid.suggested_date).format('MMM Do, YYYY') +" "+ moment(bid.suggested_time, 'HH:mm:ss').format('h:mm A') + ")";
            },
            axistPointsValue(){
                let xAxis = parseInt(this.record.address_latitude) ? this.record.address_latitude : this.xAxis;
                let yAxis = parseInt(this.record.address_longitude) ? this.record.address_longitude : this.yAxis;

                this.mapKey = window.mapKey;

                this.axisPoints = xAxis +','+  yAxis;

                this.axisPoints = this.record.address;
                return this.axisPoints;

            },

            googleGetAddress(record){

                let self = this;            
                var addressObj = {
                    address_line_1: record.address,
                    address_line_2: '',
                    city:           record.city,
                    state:          record.state,               
                    zip_code:       '',            
                    country:        record.country
                }
                Vue.$geocoder.send(addressObj, response => {

                    self.axisPoints = response.results[0].formatted_address;

                });

            },
            getImage(img) {
                return img ? img : 'images/dummy/image-placeholder.jpg'
            },
            checkStatus(bid) {
                if(this.record.status == 'in_bidding') {
                    this.showChatBox(bid, true, false);
                }else if(this.record.status == 'cancelled' || this.record.status == 'archived' || this.record.status == 'completed'){
                    this.showChatBox(bid, true, true);
                }else {
                    this.showChatBox(bid, false, false);
                }
            },
            invite_to_job(){
                this.invitepopupdata = true;
            },
            closeChatBox() {
                this.showChat = false;
            },
            showChatBox(record, strictChat = false, disabled = false) {
                let user = JSON.parse(this.$store.getters.getAuthUser);
                if(user.role_id == 3) {
                    this.jobMessageData = {
                        text: '',
                        job_id: record.job_id,
                        reciever_id: record.user_id,
                        job_bid_id: record.id,
                        sender_detail: record.user,
                        business_name: record.service_provider.business_name,
                    };
                }else {
                    this.jobMessageData = {
                        text: '',
                        job_id: record.id,
                        reciever_id: record.user_id,
                        job_bid_id: record.my_bid.id,
                        sender_detail: record.user,
                        business_name: record.user.first_name +" "+ record.user.last_name,
                    };
                }

                this.strict = strictChat;
                this.disabledChat = disabled;
                this.showChat = true;
            },
            formUpdated(){
                let newDate  = new Date().getMilliseconds();

                this.submit = false;
                this.loading = false;
                this.submitBidForm = false;

                this.initiateJobLoading = false;
                this.markJobCompleteLoading = false;


                this.requestUserUrl='api/user/me?time='+newDate;
                this.requestUrl = 'api/job/'+this.$route.params.id+'?time='+newDate;
                this.requestBidUrl = 'api/job-bid?pagination=true&filter_by_job_id='+this.$route.params.id;
            },
            formSubmitted(response){
                this.reSendCall();         
                if(!response.data.is_archived && response.data.status == 'completed')
                {
                    this.showReviewForm = true;
                }

            },
            onClick(i) {
                this.index = i;
            },        
            reSendCall(){

                let self = this;

                self.forceValue = true;
                this.submitBidForm = false;

                self.jobBids = {
                    data : [],
                    pagination : false
                };
                setTimeout(function () {
                    self.loading = false;
                    self.forceValue = false;
                }, 2000);
            },
            getResponse(response){
                this.showBidPopup = false;

                this.jobBids = {
                    data : [],
                    pagination : []
                };
                this.submitBidForm = false;

                this.record = response.data;
                // this.axistPointsValue();
                this.initiateJobLoading = false;
                this.markJobCompleteLoading = false;



                this.googleGetAddress(this.record);

                let user = JSON.parse(this.$store.getters.getAuthUser);

                if(this.record.user_id != user.id && this.record.my_bid){
                    this.jobBids.data.push(this.record.my_bid);                    
                }
                if(this.jobBids.data.length == 0 && user.role_id == 2){
                    this.showChatButton = false
                }else{
                    this.showChatButton = true
                }

            },
            getBidsResponse(response){
                let self = this;
                this.initiateJobLoading = false;
                this.markJobCompleteLoading = false;



                if(response.data){
                    for (var i = 0; i < response.data.length; i++) {
                        self.jobBids.data.push(response.data[i]);    
                    }

                    self.jobBids.pagination = response.pagination;

                    setTimeout(function () {
                        self.jobBids.showInvite = true;
                        self.$forceUpdate();
                    }, 1000);

                }
            },
            Modify(){
                this.$router.push({name: 'job.view' , params : { id : this.record.id }});
            },        
            VisitPopup(){
                this.visitpopup = true;
            },
            VisitApproval(){
                this.showVisitJob = true;
            },
            BidModify(){
                this.bidpopup = true;
            },
            HideModal(){
                this.awardJob = false;
                this.showVisitJob = false;
                this.showVisitApprovalPopup = false;
                this.showVisitDetailsPopup = false;
                this.visitpopup = false;
                this.bidpopup = false;
                this.showReviewForm = false;
                this.invitepopupdata = false;
                this.showMarkJobDonePopup = false;
                this.showVisitJob = false;
            },
            showchatpanel(){
                this.isShowing=true;
            },
            showProfile(id){

                let routeData = this.$router.resolve({ name: 'service-provider-detail.view', params: { id: id }});
                window.open(routeData.href, '_blank');

            },
            markCompletedByCustomer(){
                this.markJobCompleteLoading = true;
                let data = {
                    status : 'completed',
                    id : this.record ? this.record.id : ''
                };
                this.submitFormData = data;

                this.submit = true;
            },
            markJobArchive(){
                this.formData.is_archived = 1;
                this.formData.id = this.record.id;
                this.confirmPopupUrl = 'api/job/' +this.record.id;
            },
            markJobCancel(){

                this.formData.status = 'cancelled';
                this.formData.id = this.record.id;
                this.confirmPopupUrl = 'api/job/' +this.record.id;

            },
            markInitiateJobByCustomer(){
                this.initiateJobLoading = true;
                this.submitBidUrl = 'api/job-bid/'+ this.myBidValue.id;

                let data = {
                    status : 'initiated',
                    id : this.myBidValue ? this.myBidValue.id : '',
                    job_id : this.myBidValue ? this.myBidValue.job_id : ''
                };
                this.submitFormData = data;
                this.submitBidForm = true;

            },
            markDoneBySp(){
                // this.showMarkJobDonePopup = true;
                alert(1222);
                // this.loading = true;
                // this.submitBidUrl = 'api/job-bid/'+ this.myBidValue.id;

                // let data = {
                //     status : 'completed',
                //     id : this.myBidValue ? this.myBidValue.id : '',
                //     job_id : this.myBidValue ? this.myBidValue.job_id : ''
                // };
                // this.submitFormData = data;
                // this.submitBidForm = true;

            },
            markArchiveBySp(){

                this.confirmPopupUrl = 'api/job-bid/'+ this.myBidValue.id;

                let data = {
                    is_archived : 1,
                    id : this.myBidValue ? this.myBidValue.id : '',
                    job_id : this.myBidValue ? this.myBidValue.job_id : ''
                };
                this.formData = data;
                this.confirmPopupShow = true;

            },
            getUserResponse(response){
                if(response.data){
                    this.$store.commit('setAuthUser', response.data);
                }
            },
            bidVal(){

                this.user = JSON.parse(this.$store.getters.getAuthUser);
                if (this.bidReview.match("#viewBid")) {
                    setTimeout(function(){
                        var elmnt = document.getElementById("bid-review");
                        elmnt.scrollIntoView();        
                    }, 1000);
                }
            }   
        },
        components: {
            StarRating,
            Lightbox,
            VueGallerySlideshow,
        },
        mounted(){
            this.bidVal();
        },

    }
</script>
