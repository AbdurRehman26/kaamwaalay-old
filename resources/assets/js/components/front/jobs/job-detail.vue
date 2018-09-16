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
                                <div class="jobs-done"  v-if="job_detail_right_panel == 'service-provider-customer-end' || job_detail_right_panel == 'serviceprovidercustomerend' || job_detail_right_panel == 'awarded' || job_detail_right_panel == 'serviceprovider'">
                                    <div class="job-status job-poster">
                                        <span>Posted by <a href="javascript:void(0);" @click="showProfile()">Nathan Alvarez</a></span>	
                                        <!-- <star-rating :star-size="20" read-only :rating="4" active-color="#8200ff"></star-rating>												 -->
                                    </div>												
                                    <span class="job-category job-post-category">{{ record.service ? record.service.title : '' }}</span>									
                                </div>											
                                <div class="jobs-done">
                                    <span class="job-category">{{ record.service | mainServiceOrChildService('-')  }}</span>		
                                    <div class="job-status">
                                        <span v-if="canMarkJobComplete" class="tags"
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
                    <div class="job-details" v-if="job_detail_right_panel == 'service-provider-customer-end' || job_detail_right_panel == 'serviceprovidercustomerend' || job_detail_right_panel == 'awarded' || job_detail_right_panel == 'serviceprovider'">

                        <p class="service-requirment">
                            <i class="icon-brightness-down"></i>
                            Service required 
                            <strong v-if="record.job_type == 'urgent' | record.job_type == 'normal'" :class="[record.job_type]">
                                {{ record.job_type }}
                            </strong>
                            <strong v-else-if="record.preference == 'choose_date'">{{ record.formatted_schedule_at }}</strong>
                            <strong v-else>{{ record.preference | jobPreference }}</strong>
                        </p>
                    </div>
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
                            Member since <strong>{{ record.user ? record.user.formatted_created_at : '' }}</strong>
                        </p>
                    </div>

                    <div class="post-job-description">
                        <p>{{ record.description }}</p>
                    </div>

                    <div v-if="record.jobImages" class="jobs-post-files">
                        <h3>Related Photos</h3>
                        <div class="gallery-item" v-for="(image, index) in record.jobImages" :data-index="index" v-bind:style="{'background-image':'url('+image+')'}">
                            <img @click="open($event)" :src="image" />
                        </div>
                    </div>

                    <div class="jobs-post-files" v-if="record.videos">
                        <h3>Related Videos</h3>
                        <iframe width="1280" height="365" :src="record.videos[0] | appendYoutubeUrl" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>


                    <div class="chat-feedback">

                        <div class="text-notifer">
                            <h3 v-if="isMyJob">Bids Received ({{ jobBids.pagination ? jobBids.pagination.total : '' }})</h3>    
                            <h3 v-if="myBidValue && !isMyJob">My Bid</h3>	
                        </div>

                        <div class="chat-feedback-column job-bidding" v-for="bid in jobBids.data">

                            <div class="chat-feedback-image" v-bind:style="{'background-image': 'url('+ bid.user.profileImage +')'}"></div>
                            <div class="job-common-description">
                                <h3 class="pointer">{{bid.service_provider ? bid.service_provider.business_name : ''}}</h3>
                                
                                <strong v-if="record.awarded_to && record.awarded_to.id == bid.user_id">{{'( Job Awarded )'}}<i class="icon-checkmark2"></i></strong>
                                
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
                                    <span><i class="icon-work-briefcase"></i> Offer: 
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

                                    <a v-if="isMyJob" href="javascript:void(0);" @click="showProfile(bid.service_provider.id)" class="btn btn-primary">View Profile</a>

                                    <a v-if="!bid.is_tbd && canAwardJob && isMyJob && bid.amount && parseInt(bid.amount)" href="javascript:void(0);" 
                                    @click.prevent="bidder = bid; showAwardJob  = true;" class="btn btn-primary">Award Job</a>

                                    <a v-if="!jobCancelled && !jobAwarded && isMyJob && bid.is_visit_required && bid.status == 'pending'" href="javascript:void(0);" @click="VisitApproval" class="btn btn-primary">Visit Approval</a>

                                    <a v-if="!isMyJob && myBidValue && !jobAwarded && canModifyBid" @click.prevent="showBidPopup = true;" href="javascript:void(0);" class="btn btn-primary" @click="BidModify" >Modify Bid</a>   

                                    <a v-if="record.status == 'completed' && !record.review_details && jobAwarded && (jobAwarded.id == bid.user_id)" @click.prevent="showReviewForm = true" href="javascript:void(0);" class="btn btn-primary">
                                        Write Review
                                    </a>

                                    <a v-if="(isMyJob || canChat) && !jobCancelled" @click.prevent="showChatBox(bid)" href="javascript:void(0);" class="btn btn-primary">Chat</a>

                                </div>
                            </div>
                        </div>

                    </div>						

                </div>
            </div>

            <div class="col-md-3 p-l-0 p-r-0">

                <div class="service-provider">
                    <div v-if="isMyJob && canInvite && jobBids.showInvite" class="service-providers-invite" v-bind:style="{'background-image': 'url('+ jobimage +')',}">
                        <h3>Find &amp; invite service providers to bid on your job.</h3>
                        <p>14 service providers available around you related to concrete flooring.</p>
                        <router-link href="javascript:void(0);" class="btn btn-primary" :to="{name: 'Explore_Detail'}">Find &amp; Invite</router-link>				
                    </div>

                    <button v-if="isMyJob && canMarkJobComplete" @click="markCompletedByCustomer" :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' , 'apply-primary-color' ]">
                        <span>Mark Job Complete</span> <loader></loader>
                    </button>

                    <button v-if="isMyJob && canArchiveJob" @click="markJobArchive" :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' , 'apply-primary-color' ]">
                        <span>Mark Job Archive</span> <loader></loader>
                    </button>

                    <a href="javascript:void(0);" v-if="isMyJob && canModifyJob" @click="Modify" class="btn btn-primary"><i class="icon-edit-pencil"></i> Modify Details</a>					
                    <a href="javascript:void(0);" v-if="isMyJob && canCancelJob" @click.prevent="confirmPopupShow = true;" class="btn btn-cancel-job"><i class="icon-close2"></i> Cancel Job</a>

                    <a v-if="!isMyJob && !myBidValue && !jobAwarded" @click.prevent="showBidPopup = true;" href="javascript:void(0);" class="btn btn-primary">Bid Now</a>                                                  

                    <a v-if="!isMyJob && myBidValue && !jobAwarded && canModifyBid" @click.prevent="showBidPopup = true;" href="javascript:void(0);" class="btn btn-primary" @click="BidModify" ><i class="icon-edit-pencil"></i> Modify Bid</a>   

                    <a v-if="awardedToMe" class="btn btn-primary btn-outline">
                        <i class="icon-trophy"></i> Job Awarded
                    </a>

                    <a v-if="!isMyJob && canChat && !jobCancelled && (jobAwarded && jobAwarded.user_id == $store.getters.getAuthUser.id)" @click.prevent="showChat = true;" href="javascript:void(0);" class="btn btn-primary">Chat</a>

                    <a v-if="!jobAwarded && myBidValue && visitAllowed" href="javascript:void(0);" class="btn btn-primary" @click="VisitPopup"><i class="icon-front-car"></i> Go to visit</a>    

                </div>

            </div>
        </div>

    </div>			
</div>

<award-job-popup @bid-updated="reSendCall" :job="record" :bidder="bidder" @HideModalValue="showAwardJob  = false" :showModalProp="showAwardJob "></award-job-popup>

<visit-request-popup @HideModalValue="HideModal" :showModalProp="visitjob"></visit-request-popup>
<go-to-visit-popup @HideModalValue="HideModal" :showModalProp="visitpopup"></go-to-visit-popup>
<post-bid-popup @HideModalValue="showBidPopup = false;" :showModalProp="showBidPopup"></post-bid-popup>
<chat-panel v-show="showChat" @closeChat="showChat = false;" :jobMessageData="jobMessageData" :show="showChat"></chat-panel>           


</div>

<write-review-popup @review-sent="reSendCall" :job="record" @HideModalValue="HideModal" :showModalProp="showReviewForm"></write-review-popup>

<vue-common-methods :updateForm="true" @form-submitted="formSubmitted" :submitUrl="requestUrl" :formData="submitFormData" :force="forceValue" :url="requestUrl" @get-records="getResponse" :submit="submit"></vue-common-methods>
<vue-common-methods v-if="isMyJob" :hideLoader="true" :force="forceValue" :infiniteLoad="true" :url="requestBidUrl" @get-records="getBidsResponse"></vue-common-methods>

<confirmation-popup @form-updated="formUpdated" :submitFormData="formData" :requestUrl="submitUrl" @HideModalValue="confirmPopupShow = false;" :showModalProp="confirmPopupShow"></confirmation-popup>


</div>
</template>


<script>
    import StarRating from 'vue-star-rating';
    import fancyBox from 'vue-fancybox';
    export default {
        data () {
            return {
                forceValue : false,
                bidder : '',
                record : [],
                jobBids : {
                    pagination : false,
                    data : []
                },
                showAwardJob : false,
                visitjob: false,
                visitpopup: false,
                bidpopup: false,
                isShowing:false,
                jobimage: '/images/front/explore/concret.png',
                job_detail_right_panel: this.$route.params.id,
                reviewerimage: '/images/front/storage/personimage1.png',
                imageList: [
                { width: 900, height: 675, url: '/images/dummy/jobfileimage1.png' },
                { width: 900, height: 675, url: '/images/dummy/jobfileimage2.png' },
                { width: 900, height: 675, url: '/images/dummy/jobfileimage3.png' },
                ],
                requestUrl : 'api/job/'+this.$route.params.id,
                requestBidUrl : 'api/job-bid?pagination=true&filter_by_job_id='+this.$route.params.id,
                loading : false,
                submit : false,
                submitFormData : '',
                showReviewForm : false,
                errorMessage: '',
                successMessage: '',
                showBidPopup : false,
                showChat : false,
                confirmPopupShow : false,
                jobMessageData: {},
                formData : {

                }
            }
        },
        computed : {
            jobImage(){
                return this.record && this.record.user ? this.record.user.profileImage : '';
            },
            jobAwarded(){
                return this.record.awarded_to;
            },
            canInvite(){
                if(Object.keys(this.record).length){
                    return this.record.status != 'cancelled' && !this.record.awarded_to  && Object.keys(this.jobBids) && !this.jobBids.data.length;
                }
                return false;
            },
            canMarkJobComplete(){
                if(Object.keys(this.record).length){
                    return this.record.status != 'cancelled' && this.record.awardedBid && this.record.status != 'completed' && this.record.awardedBid.status == 'completed';
                }
                return false;
            },
            canCancelJob(){
                if(Object.keys(this.record).length){
                    return !this.record.awarded_to && this.record.status != 'completed' && this.record.status != 'cancelled';
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
                return this.record.status != 'cancelled' && !this.record.is_archived && (this.record.status == 'completed' || this.record.status == 'cancelled');  
            },
            canAwardJob(){
                return !this.record.awarded_to && this.record.status != 'cancelled';
            },
            isMyJob(){
                if(Object.keys(this.record).length){
                    let user = JSON.parse(this.$store.getters.getAuthUser);
                    return this.record.user_id == user.id;
                }
                return false;
            },
            myBidValue(){
                if(Object.keys(this.record).length){
                    return this.record.my_bid;
                }
            },
            awardedToMe(){
                if(Object.keys(this.record).length && this.record.my_bid && this.record.awarded_to){
                    return this.record.my_bid.id == this.record.awarded_to.id;
                }
            },
            visitAllowed(){
                if(Object.keys(this.record).length && this.record.my_bid){
                    return this.record.status != 'cancelled' && this.record.my_bid.status == "visit_allowed";
                }
            },
            canModifyBid(){
                if(Object.keys(this.record).length && this.record.my_bid){
                    return this.record.status != 'cancelled' && parseInt(this.record.my_bid.status == "visit_allowed" || this.record.my_bid.amount || this.record.my_bid.is_tbd);
                }
            },
            canChat(){
                if(Object.keys(this.record).length){
                    return this.record.can_message;
                }
            },
            submitUrl(){
                if(this.record){  
                    this.formData.status = 'cancelled';
                    this.formData.id = this.record.id;
                    return 'api/job/' +this.record.id;
                }
            },
            jobCancelled(){
               if(Object.keys(this.record).length){
                return this.record.status == 'cancelled'
            } 
        }
    },
    methods: {
        showChatBox(bid) {
            this.jobMessageData = {
                text: '',
                job_id: bid.job_id,
                reciever_id: bid.service_provider.user_id,
                job_bid_id: bid.id,
            };
            this.showChat = true;
        },
        formUpdated(){
            let newDate  = new Date().getMilliseconds();

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
        reSendCall(){
            let self = this;
            self.forceValue = true;
            self.jobBids = {
                data : [],
                pagination : false
            };
            setTimeout(function () {
                self.loading = false;
                self.forceValue = false;
            }, 3000);

        },
        getResponse(response){

            this.jobBids = {
                data : [],
                pagination : []
            };

            this.record = response.data;
            
            let user = JSON.parse(this.$store.getters.getAuthUser);

            if(this.record.user_id != user.id && this.record.my_bid){
                this.jobBids.data.push(this.record.my_bid);                    
            }

        },
        getBidsResponse(response){

            for (var i = 0; i < response.data.length; i++) {
                this.jobBids.data.push(response.data[i]);    
            }
            this.jobBids.pagination = response.pagination;
            this.jobBids.showInvite = true;
            console.log(this.jobBids);
        },
        open (e) {
            let jobImages = [];

            for (var i = 0 ; i < this.record.jobImages.length; i++) {
                let data = {
                    url : this.record.jobImages[i]
                };

                jobImages.push(data);
            }
            fancyBox(e.target, jobImages);       
        },
        Modify(){
            this.$router.push({name: 'job.view' , params : { id : this.record.id }});
        },        
        VisitPopup(){
            this.visitpopup = true;
        },
        VisitApproval(){
            this.visitjob = true;
        },
        BidModify(){
            this.bidpopup = true;
        },
        HideModal(){
            this.awardJob = false;
            this.visitjob = false;
            this.visitpopup = false;
            this.bidpopup = false;
            this.showReviewForm = false;
        },
        showchatpanel(){
            this.isShowing=true;
        },
        showProfile(id){
            this.$router.push({ name : 'service-provider-detail.view' , params : { id : id}});
        },
        markCompletedByCustomer(){
            this.loading = true;

            let data = {
                status : 'completed',
                id : this.record ? this.record.id : ''
            };
            this.submitFormData = data;

            this.submit = true;
        },
        markJobArchive(){
            this.loading = true;

            let data = {
                is_archived : 1,
                id : this.record ? this.record.id : ''
            };
            this.submitFormData = data;

            this.submit = true;

        },
    },
    components: {
        StarRating
    },

    mounted(){
    },

}
</script>
