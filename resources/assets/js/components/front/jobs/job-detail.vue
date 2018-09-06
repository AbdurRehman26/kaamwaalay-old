<template>
	<div class="job-main-details detail-page">
		<div class="content">
			<div class="job-main-heading grey-bg elementary-banner section-padd xs border-bottom">
				<div class="container element-index text-center md">
					<div class="content-sec">
						<div class="job-image" 
                        v-bind:style="{'background-image': 'url('+ jobImage +')'}">
                    </div>

                    <div class="job-content">
                     <h2>{{record.title}}</h2>
                     <div class="job-notification flexable">	
                       <div class="col-md-8  p-l-0">
                          <div class="jobs-done"  v-if="job_detail_right_panel == 'service-provider-customer-end' || job_detail_right_panel == 'serviceprovidercustomerend' || job_detail_right_panel == 'awarded' || job_detail_right_panel == 'serviceprovider'">
                             <div class="job-status job-poster">
                                <span>Posted by <a href="javascript:void(0);" @click="showProfile()">Nathan Alvarez</a></span>	
                                <star-rating :star-size="20" read-only :rating="4" active-color="#8200ff"></star-rating>												
                            </div>												
                            <span class="job-category job-post-category">{{ record.service ? record.service.title : '' }}</span>									
                        </div>											
                        <div class="jobs-done" v-else>
                            <span class="job-category">{{ record.service | mainServiceOrChildService('-')  }}</span>		
                            <div class="job-status">
                                <span class="tags" :class="[record.status ?  record.status.replace(/\s/g, '').replace('_', '').toLowerCase().trim() : '']">
                                {{ record | jobStatus }}
                            </span>	
                            </div>											
                        </div>	
                    </div>		
                    <div class="col-md-6 p-r-0">
                       <div class="job-details" v-if="job_detail_right_panel == 'service-provider-customer-end' || job_detail_right_panel == 'serviceprovidercustomerend' || job_detail_right_panel == 'awarded' || job_detail_right_panel == 'serviceprovider'">

                        <p class="service-requirment">
                         <i class="icon-brightness-down"></i>
                         Service required 
                         <strong v-if="record.job_type == 'urgent'" class="urgent">{{ record.job_type }}</strong>
                         <strong v-else-if="record.preference == 'choose_date'">{{ record.formatted_schedule_at }}</strong>
                         <strong v-else>{{ record.preference | jobPreference }}</strong>
                     </p>
                 </div>
                 <div class="job-details" v-else>
                     <p class="awarded">
                        <i class="icon-checkmark2"></i> 
                        {{ record.awarded_to ? 'job awarded to : ' : 'job not awarded yet'}}
                        {{ record.awarded_to ? record.awarded_to.first_name : ''}}
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

      <div class="jobs-post-files" v-if="job_detail_right_panel == 'service-provider-customer-end' || job_detail_right_panel == 'serviceprovidercustomerend' || job_detail_right_panel == 'awarded'">
          <h3>Customer Information</h3>
          <div class="coustomer-info-line">
             <i class="icon-phone_in_talk"></i>
             <p>Phone number: <strong>+1-541-754-3010</strong></p>
         </div>
         <div class="coustomer-info-line">
             <i class="icon-pin"></i>
             <p>Address: 
                <strong>
                   1429 Netus Rd. Reedsport NY 48247
               </strong>
               <a href="javascript:void(0);">
                  Get driving directions
              </a>
          </p>
      </div>						
      <div class="coustomer-info-line">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d187.3521292068258!2d-124.0968600187008!3d43.70235783020168!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54c3c3b9ac656e47%3A0x7b79c93b5e4b888!2sReedsport%2C+OR+97467!5e0!3m2!1sen!2s!4v1534485973398" width="600" height="130" frameborder="0" style="border:0" allowfullscreen></iframe>
     </div>				
 </div>


 <div class="chat-feedback" v-if="job_detail_right_panel == 'service-provider-customer-end' || job_detail_right_panel == 'serviceprovidercustomerend' || job_detail_right_panel == 'awarded' || job_detail_right_panel == 'serviceprovider'">
  <div class="text-notifer">
     <h3>My Bid</h3>	
 </div>
 <div class="chat-feedback-column job-bidding" v-for="reviewer in record.my_bid">
     <div class="chat-feedback-image" v-bind:style="{'background-image': 'url('+ reviewer.latest_review_image +')',}"></div>
     <div class="job-common-description">
        <h3 class="pointer">{{record.job_title}}</h3>							
    </div>										
    <div class="job-proposal">
        <div class="bit-offered">
           <span><i class="icon-work-briefcase"></i> Offer: 
              <strong>
                 {{reviewer.job_bid_amount}}		
             </strong>
         </span>
         <span class="pull-right"><i class="icon-calendar-daily"></i> Date:
          <strong>
             {{reviewer.job_bid_data}}
         </strong>
     </span>
 </div>
 <div class="proposal-message">
   <p>{{reviewer.latest_review_description}}</p>
</div>
</div>
</div>

</div>


<div class="chat-feedback" v-else>
  <div class="text-notifer">
     <h3>Bids Received ({{ jobBids.pagination ? jobBids.pagination.total : '' }})</h3>	
 </div>
 <div class="chat-feedback-column job-bidding" v-for="bid in jobBids.data">

     <div class="chat-feedback-image" v-bind:style="{'background-image': 'url('+ bid.user.profileImage +')'}"></div>
     <div class="job-common-description">
        <h3 class="pointer">{{bid.service_provider ? bid.service_provider.business_name : ''}}</h3>
        <div class="jobs-rating">
           <star-rating :star-size="20" read-only :rating="bid.user ? bid.user.average_rating : 0" active-color="#8200ff"></star-rating>
           <div class="jobs-done">
              <span class="review-job">{{ bid.total_feedback_count ? bid.total_feedback_count : 0 }} Feedback review(s)</span>				

              <span class="review-job" v-if="!bid.finished_jobs">No Jobs performed</span>
              <span class="review-job" v-else>{{ bid.finished_jobs }} Job(s) performed</span>
          </div>	
      </div>											
  </div>
  <div class="job-proposal">
    <div class="bit-offered">
       <span><i class="icon-work-briefcase"></i> Offer: 
          <strong v-if="!bid.is_tbd">
             {{bid.amount}}     
         </strong>
         <strong v-if="bid.is_tbd">
             To be decided		
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

   <a href="javascript:void(0);" @click="showProfile(bid.service_provider.id)" class="btn btn-primary">View Profile</a>
   <a href="javascript:void(0);" @click="showchatpanel()" class="btn btn-primary">Chat {{ awardJob  }}</a>													
   <a v-if="!jobAwarded && !bid.is_tbd" href="javascript:void(0);" @click.prevent="awardJob = true;" class="btn btn-primary">Award Job</a>
   <a v-if="!jobAwarded && bid.is_visit_required" href="javascript:void(0);" @click="VisitApproval" v-else class="btn btn-primary">Visit Approval</a>

</div>
</div>
</div>

</div>						

</div>
</div>

<div class="col-md-3 p-l-0 p-r-0">

 <div class="service-provider" v-if="job_detail_right_panel == 'awarded'">
    <a href="javascript:void(0);" class="btn btn-primary btn-outline"><i class="icon-trophy"></i> Job Awarded</a>					
    <a href="javascript:void(0);" class="btn btn-primary"><i class="icon-checkmark2"></i> Mark Done</a>					
    <a href="javascript:void(0);" @click="showchatpanel()" class="btn btn-primary"><i class="icon-message"></i> Chat</a>					
    <a href="javascript:void(0);" class="btn btn-cancel-job disable"><i class="icon-folder"></i> Archive</a>								
</div>


<div class="service-provider" v-if="false">

    <a href="javascript:void(0);" class="btn btn-primary" @click="BidModify" ><i class="icon-edit-pencil"></i> Modify Bid</a>	
    <a href="javascript:void(0);" @click="showchatpanel()" class="btn btn-primary"><i class="icon-message"></i> Chat</a>	
		<a href="job-details/serviceprovidercustomerend" class="btn btn-cancel-job"><i class="icon-folder"></i> Archive</a>								
</div>


<div class="service-provider" v-if="false">

    <a href="javascript:void(0);" class="btn btn-primary" @click="VisitPopup"><i class="icon-front-car"></i> Go to visit</a>	
    <a href="javascript:void(0);" @click="showchatpanel()" class="btn btn-primary"><i class="icon-message"></i> Chat</a>	
		<a href="/job-details/awarded" class="btn btn-cancel-job"><i class="icon-folder"></i> Archive</a>								
</div>							


<div class="service-provider">
    <div v-if="canInvite" class="service-providers-invite" v-bind:style="{'background-image': 'url('+ jobimage +')',}">
       <h3>Find &amp; invite service providers to bid on your job.</h3>
       <p>14 service providers available around you related to concrete flooring.</p>
       <a href="javascript:void(0);" @click="FindInvite" class="btn btn-primary">Find &amp; Invite</a>				
   </div>						
   <a href="javascript:void(0);" @click="Modify" class="btn btn-primary"><i class="icon-edit-pencil"></i> Modify Details</a>					
   <a href="javascript:void(0);" class="btn btn-cancel-job"><i class="icon-close2"></i> Cancel Job</a>								
</div>


</div>
</div>

</div>			
</div>
<award-job-popup @HideModalValue="HideModal" :showModalProp="awardJob"></award-job-popup>
<visit-request-popup @HideModalValue="HideModal" :showModalProp="visitjob"></visit-request-popup>
<go-to-visit-popup @HideModalValue="HideModal" :showModalProp="visitpopup"></go-to-visit-popup>
<post-bid-popup @HideModalValue="HideModal" :showModalProp="bidpopup"></post-bid-popup>
<chat-panel v-show="isShowing" @CloseDiscussion='CloseDiscussion()'></chat-panel>			
</div>

<vue-common-methods :url="requestUrl" @get-records="getResponse"></vue-common-methods>
<vue-common-methods :infiniteLoad="true" :url="requestBidUrl" @get-records="getBidsResponse"></vue-common-methods>

</div>
</template>


<script>
    import StarRating from 'vue-star-rating';
    import fancyBox from 'vue-fancybox';
    export default {
      data () {
        return {
            record : [],
            jobBids : '',
            awardJob: false,
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
            requestBidUrl : 'api/job-bid?pagination=true&filter_by_job_id='+this.$route.params.id
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

            if(this.jobBids){
                return !this.record.awarded_to  && !this.jobBids.data.length;
            }

        }
    },
    methods: {
        getResponse(response){
            this.record = response.data;
        },
        getBidsResponse(response){
            this.jobBids = response;
        },
        open (e) {            
            fancyBox(e.target, this.record.jobImages);
        },
        FindInvite(){
           this.$router.push({name: 'Explore_Detail'});
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
},
showchatpanel(){
  this.isShowing=true;
},
CloseDiscussion(){
  this.isShowing=false;
},
showProfile(id){
 this.$router.push({ name : 'service-provider-detail.view' , params : { id : id}});
}                

},
components: {
    StarRating
},

mounted(){
},

}
</script>
