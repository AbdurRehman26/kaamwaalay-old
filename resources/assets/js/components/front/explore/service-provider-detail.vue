<template>
    <div class="category-detail detail-page" v-if="record">
        <div class="content">
            <div class="next-project grey-bg elementary-banner section-padd md border-bottom">
                <div class="container element-index text-center md">
                    <div class="content-sec">
                        <div class="category-image" v-bind:style="{'background-image': 'url('+ getUserImage(record.user_detail) +')',}"></div>

                        <div class="category-content">
                            <h2>{{record.business_name}}</h2>
                            <div class="jobs-completed">
                                <star-rating :increment="0.5" :star-size="20" read-only :rating="parseInt(record.avg_rating)" active-color="#8200ff"></star-rating>	
                                <span class="review-job">{{record.total_feedback_count}} Feedback reviews</span>	
                                <span class="review-job" v-if="!record.finished_jobs">No Jobs performed</span>
                                <span class="review-job" v-else>{{ record.finished_jobs }} Jobs performed</span>	
                            </div>
                            <div class="service-detail">

                                <a :href="postJobRoute+'&service_provider_user_id='+((record.user_detail && record.user_detail.id)? record.user_detail.id : '')" v-if="!inBiddingJobsCount" class="btn btn-primary post-bid">Post Job &amp; Invite to Bid</a>

                                <a href="#" v-if="inBiddingJobsCount" @click.prevent="invitePopup = true; userToSendInvite=record.user_detail" :class="['btn' , 'btn-primary'  ]">
                                    Invite to Bid
                                </a>
                                <!-- <a @click="categorylisting" href="javascript:void(0);" class="btn btn-link go-back">Go back</a> -->
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
                                    <h3>About</h3>
                                </div>

                                <div class="member-details">
                                    <p class="location">
                                        <i class="icon-location"></i> 
                                        Location <strong>{{ getCity }}</strong>
                                    </p>
                                    <p class="member-since">										
                                        Member since <strong>{{ record.formatted_created_at }}</strong>
                                    </p>
                                </div>

                                <div class="post-job-description">
                                    <p>{{ record.business_details }}</p>
                                </div>

                                <div class="chat-feedback">
                                    <div class="text-notifer">
                                        <h3>Feedback & Reviews</h3>	
                                    </div>
                                    <div class="chat-feedback-column" v-for="reviewer in reviewerRecords" v-if="!noRecordFound">
                                        <div class="chat-feedback-image" v-bind:style="{'background-image': 'url('+ getUserImage(reviewer.user_detail) +')',}"></div>
                                        <div class="chat-feedback-message white-msg">
                                            <p>{{reviewer.message}}</p>
                                            <div class="feeback-detail">
                                                <p class="feedback-personal-info">
                                                    <a href="javascript:void(0);">{{reviewer.user_detail.first_name + " " +reviewer.user_detail.last_name}}</a>
                                                    posted on 
                                                    <strong>{{reviewer.formatted_created_at}}</strong>
                                                </p>
                                                <div class="ratings">
                                                    <star-rating :increment="0.5" :star-size="20" read-only :rating="parseInt(reviewer.rating)" active-color="#8200ff"></star-rating>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <no-record-found v-if="noRecordFound"></no-record-found>
                                    
                                    <vue-common-methods :url="reviewUrl" :infiniteLoad="true" @get-records="getReviewerRecords"></vue-common-methods>
                                </div>						

                            </div>
                        </div>




                        <div class="col-md-3 p-l-0 p-r-0">

                            <div class="service-avaliable" v-if="record.all_services_offered">
                                <h3 class="m-b-20">Services offered</h3>
                                <ul>
                                    <li v-for="service in record.all_services_offered">
                                        {{ service.title }}
                                    </li>
                                </ul>
                            </div>						

                        </div>
                    </div>
                </div>			
            </div>

        </div>


        <invite-bid-popup :type="'job'" :jobs="jobs" :user="userToSendInvite" :showModalProp="invitePopup" @HideModalValue="invitePopup = false;"></invite-bid-popup>

    </div>
</template>


<script>
    import StarRating from 'vue-star-rating';

    export default {
        props: ['id'],
        data () {
            return {
                reviewUrl: null,
                categoryimage: '/images/front/explore/mds.png',
                reviewerRecords: [],
                jobimage: '/images/front/profile-images/logoimage1.png',
                reviewerimage: '/images/front/profile-images/personimage1.png',
                record: [],
                noRecordFound: false,
                userToSendInvite : false,
                invitePopup : false,
                jobs : '',
                inBiddingJobsCount : 0,
            }
        },
        computed: {
            getCity() {
                var city = this.record.user_detail? this.record.user_detail.city : '';
                city += (this.record.user_detail && this.record.user_detail.state)? ', ' + this.record.user_detail.state : "";
                return city;
            },
            inBiddingJobs(){
                let user = JSON.parse(this.$store.getters.getAuthUser);
                return user ? user.total_inbidding_jobs : false;
            },
            postJobRoute(){
                let zipCode = '';
                let serviceName = '';
                var query = Object.keys(this.$route.query);

                zipCode = this.$route.query.zip;
                serviceName = this.$route.query.service_name;


                return '/job-post?service_name='+serviceName+'&zip='+zipCode;
            }

        },
        methods: {
            getReviewerRecords(response){
                let self = this;
                self.loading = false;
                let len = response.data.length;
                for (var i = 0 ; i < len; i++) {
                    self.reviewerRecords.push( response.data[i] ) ;
                }
                self.noRecordFound = response.noRecordFound;
                self.pagination = response.pagination;
            },
            getUserImage(user) {
                return user? (user.profileImage? user.profileImage : 'images/dummy/image-placeholder.jpg') : 'images/dummy/image-placeholder.jpg';
            },
            AddCustomer() {
                this.customer = true;
            },

            changestatuspopup() {
                this.changestatus = true;
            },
            HideModal(){
                this.customer = false;
                this.viewcustomer = false;
                this.changestatus = false;
            },
            categorylisting(){
                window.scrollTo(0,0);
                this.$router.push({name: 'Explore'});	
            },
            getServiceProvider() {
                window.scrollTo(0,0);
                let self = this;
                let serviceProviderUrl = 'api/service-provider-profile/' + this.id;
                this.$http.get(serviceProviderUrl).then(response => {
                    response = response.data;
                    self.record = response.data;
                    self.userToSendInvite = self.record.user_detail;
                    self.reviewUrl = 'api/user-rating?pagination=true&user_id=' + self.record.user_id;
                }).catch(error=>{
                    self.pagination = false;
                    self.btnLoading = false;
                });
            },
            getInBiddingJobs() {
                let self = this;
                let url = 'api/job-invite-to-bid';
                self.$http.get(url).then(response=>{

                    response = response.data;
                    this.jobs = response.data;
                    self.inBiddingJobsCount = response.data.length;

                }).catch(error=>{


                });
            },
        },
        components: {
            StarRating
        },

        mounted(){
            this.getServiceProvider();
            this.getInBiddingJobs();
            window.scrollTo(0, 0);
        }

    }
</script>
