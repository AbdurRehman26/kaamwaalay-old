<template>
    <div class="my-job-lising-content">
        <div class="container">
            <div class="my-job-indication">
                <h2>My Jobs</h2>
                <p>You have total <span class="primary-color text-bold">{{jobStats.active}} active</span> 
                    job and <span class="primary-color text-bold">{{jobStats.completed}} completed</span> jobs.</p>
                </div>

                <div class="job-post-container section-padd sm">
                    <div class="container md">

                        <div class="job-post-list" v-for="record in records">
                            <div class="job-post-details">
                                <div v-if="record.service.images[0].upload_url" style="pointer-events: none;" class="job-image pointer" v-bind:style="{'background-image': 'url('+ record.service.images[0].upload_url +')'}">
                                </div>

                                <div v-if="!record.service.images[0].upload_url" style="pointer-events: none;" class="job-image pointer" v-bind:style="{'background-image': 'url('+ 'images/dummy/image-placeholder.jpg' +')'}">
                                </div>

                                <div class="job-common-description job-perform">
                                    <div class="col-md-8 p-l-0">

                                        <li @click.prevent="viewDetails(record.id)">
                                            <h3 class="pointer">{{record.title}}</h3>
                                        </li> 

                                        <div class="job-notification">									
                                            <div class="jobs-done">
                                                <span class="job-category">{{ record.service | mainServiceOrChildService('-') }}</span>		
                                                <div class="job-status">

                                                    <span v-if="record.status != 'cancelled' && record.awardedBid && record.status != 'completed' && record.awardedBid.status == 'completed'" class="tags"
                                                    :class="['completed']">
                                                    Marked Done
                                                </span>
                                                
                                                <span v-else-if="!record.is_archived" class="tags" 
                                                :class="[record.status.replace(/\s\_/g, '').replace('_' , '').replace('cancelled' , 'canceled')]">
                                                {{ record | jobStatus }}
                                            </span> 

                                            <span v-else class="tags" :class="['archived']">
                                                {{ record | jobStatus }}
                                            </span>	

                                        </div>
                                    </div>	
                                </div>
                            </div>
                            <div class="col-md-4 job-bid-btn p-r-0">

                                <button class="btn btn-primary" @click.prevent="viewDetails(record.id)">View Details </button>
                                <a href="javascript:void(0);" @click="WriteReview" class="btn btn-primary post-bid" v-if="record.job_bid == true">
                                Write Review</a>
                            </div>
                        </div>

                        <div class="member-details">
                            <p class="location">
                                <i class="icon-location"></i> 
                                Location <strong>{{ record.city  }}, {{ record.state}}</strong>
                            </p>
                            <p class="member-since">
                                <i class="icon-calendar-daily"></i>
                                Post Date <strong>{{ record.formatted_created_at }}</strong>
                            </p>
                        </div>

                        <div class="post-job-description">
                            <p>{{ record.description }}</p>
                        </div>


                        <div class="job-details">
                            <p class="bid">
                                <i class="icon-flag"></i> 
                                <strong>
                                    {{ record.bids_count  + ' bids received '}} 
                                    <router-link v-if="record.bids_count" :to="{name: 'job.details' , params : { id : record.id+'#viewBid' }}">View Bids</router-link></strong>
                                </p>
                                <p class="awarded" v-if="record.awarded_to">
                                    <i class="icon-checkmark2"></i> 
                                    Awarded to <router-link :to="{name: 'service-provider-detail.view' , params : { id : record.awarded_to.business_details.id}}">
                                        {{  record.awarded_to.business_details  ? record.awarded_to.business_details.business_name : '' }}
                                    </router-link>
                                </p>								
                                <p class="service-requirment">
                                    <i class="icon-brightness-down"></i>
                                    Service required 
                                    <strong v-if="record.job_type == 'urgent'" class="urgent">{{ record.job_type }}</strong>
                                    <strong v-else-if="record.preference == 'choose_date'">{{ record.formatted_schedule_at }}</strong>
                                    <strong v-else>{{ record.preference | jobPreference }}</strong>
                                </p>
                            </div>

                            <div class="chat-feedback" v-if="record.service_provider_review">
                                <div class="text-notifer">
                                    <p>Service Provider feedback & review</p>	
                                </div>
                                <div class="chat-feedback-column">
                                    <div class="chat-feedback-image" v-bind:style="{'background-image': 'url('+ getImagePath(getCurrentUser()) +')',}"></div>
                                    <div class="chat-feedback-message">
                                        <p>{{record.service_provider_review.message}}</p>
                                        <div class="feeback-detail">
                                            <p class="feedback-personal-info">
                                                <a href="javascript:void(0);">{{record.service_provider_review.rated_by_name}}</a>
                                                posted on 
                                                <strong>{{record.formatted_created_at}}</strong>
                                            </p>
                                            <div class="ratings">
                                                <star-rating :star-size="20" :increment="0.5" read-only :rating="record.service_provider_review.rating ? parseFloat(record.service_provider_review.rating) : 0" active-color="#8200ff"></star-rating>

                                            </div>
                                        </div>
                                    </div>

                                </div>						

                            </div>
                        </div>

                    </div>			
                </div>
            </div>
        </div>

        <write-review-popup @HideModalValue="HideModal" :showModalProp="writereview"></write-review-popup>
        <vue-common-methods :infiniteLoad="true" :url="requestUrl" @get-records="getResponse"></vue-common-methods>
        <vue-common-methods :hideLoader="true" :url="requestJobUrl" @get-records="getJobResponse"></vue-common-methods>


    </div>
</template>

<script>
    import StarRating from 'vue-star-rating';

    export default {
        data () {
            return {
                categoryimage: '/images/front/explore/carpenter1.jpg',
                writereview: false,
                jobimage: '/images/front/profile-images/logoimage1.png',
                reviewerimage: '/images/front/profile-images/personimage1.png',
                requestUrl : 'api/job?filter_by_me=true&pagination=true&details["profile_data"]=true',
                requestJobUrl : 'api/job/stats',
                records : [],
                jobStats : [],
                loading : false
            }
        },

        methods: {
            viewDetails(id){

                let routeData = this.$router.resolve({ name: 'job.details', params: { id: id }});
                window.open(routeData.href, '_blank');

            },

            getCurrentUser() {
                let user = JSON.parse(this.$store.getters.getAuthUser);
                return user;

            },
            getImagePath(user){
                return user.profileImage ? user.profileImage : 'images/dummy/image-placeholder.jpg';
            },

            AddCustomer() {
                this.customer = true;
            },
            WriteReview(){
                this.writereview = true;
            },
            HideModal(){
                this.writereview = false;
            },
            getResponse(response){
                let self = this;
                self.loading = false;
                for (var i = 0 ; i < response.data.length; i++) {
                    self.records.push( response.data[i] ) ;

                }

            },
            getJobResponse(response){
                this.jobStats = response.data;
            }

        },
        components: {
            StarRating
        },

        mounted(){
        }


    }
</script>
