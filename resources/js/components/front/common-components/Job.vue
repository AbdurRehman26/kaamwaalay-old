<template>
    <div class="job-post-details" v-if="typeof(job)">
        <div style="pointer-events: none;" class="job-image pointer" v-bind:style="{'background-image': 'url('+ getImagePath(job.user) +')'}"></div>

        <div class="job-common-description job-perform">
            <div class="col-md-6 p-l-0">
                <div class="job-main-title">
                    <li @click.prevent="viewDetails(job.id)">
                        <h3 class="pointer">{{job.title}}</h3>
                    </li> 
                </div>
                <div class="job-notification">
                    <div class="jobs-done">
                        <span class="job-poster">Posted By {{ job.user | fullName }}</span>
                        <span class="job-category noborder">{{ job.service | mainServiceOrChildService('-') }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 job-bid-btn p-r-0">
                <a v-canBid href="javascript:void(0);" v-if="!job.my_bid && job.status != 'completed' &&  job.status != 'cancelled' && !job.awarded_to" @click="showBidPopup('bidNow')" class="btn btn-primary post-bid m-r-10">Bid Now</a>
                <a href="javascript:void(0);" v-else @click="$emit('chatMessage', job)" class="chat-message" :class="{disable: job.can_message == null? true : false}"><i class="icon-message"></i></a>
                <button class="btn btn-primary" @click.prevent="viewDetails(job.id)">View Details </button>
            </div>
        </div>

        <div class="member-details">
            <p class="location">
                <i class="icon-location"></i>
                Location <strong>{{ getCountry}}</strong>
            </p>
            <p class="offer" v-if="job.my_bid">
                <i class="icon-work-briefcase"></i>
                Offer: <strong>
                    {{ job.my_bid | bidStatus}}
               </strong><span v-canBid v-if="job.my_bid.status != 'cancelled' && !job.my_bid.is_awarded && !hideChangeBid && (job.my_bid.status == 'on_the_way' || (job.my_bid.status == 'pending' && !job.my_bid.is_visit_required))">- <a @click="showBidPopup('changeBid')" href="javascript:void(0);">Change Bid</a></span>
            </p>

            <p class="member-since">
                <i class="icon-calendar-daily"></i>
                Post Date <strong>{{ job.formatted_created_at }}</strong>
            </p>
        </div>

        <div class="post-job-description">
            <p>{{ job.description }}</p>
        </div>


        <div class="job-details">
            <p class="customer-rating">
                <strong>Customer rating:</strong>
                <star-rating :increment="0.5" :star-size="20" read-only :rating="job.user ? parseFloat(job.user.average_rating) : 0" active-color="#8200ff"></star-rating>
            </p>
            <p class="service-requirment">
                <i class="icon-brightness-down"></i>
                Service required
                <strong v-if="job.job_type == 'urgent'" class="urgent">{{ job.job_type }}</strong>
                <strong v-else-if="job.preference == 'choose_date'">{{ job.formatted_schedule_at }}</strong>
                <strong v-else>{{ job.preference | jobPreference }}</strong>
            </p>
        </div>

        <div class="chat-feedback" v-if="job.status == 'completed' && job.review_details">
            <div class="chat-feedback-column">
                <div class="chat-feedback-image" v-bind:style="{'background-image': 'url('+ getImage(job.review_details.user_detail.profileImage) +')',}"></div>
                <div class="chat-feedback-message">
                    <p>{{job.review_details.message}}</p>
                    <div class="feeback-detail">
                        <p class="feedback-personal-info">
                            <a href="javascript:void(0);">{{job.review_details.user_detail.first_name + " " + job.review_details.user_detail.last_name}}</a>
                            posted on 
                            <strong>{{job.review_details.formatted_created_at}}</strong>
                        </p>
                        <i class="icon-quotes-right3"></i>
                    </div>
                </div>
            </div>

        </div> 

    </div>
</template>
<script>
    import StarRating from 'vue-star-rating';

    export default{
        props : ['job', 'tabType'],
        components: {
            StarRating
        },
        data(){
            return { 
                bidValue : '',
                currentrecord : '',
            }
        },
        methods: {
            getImagePath(user){
                return user.profileImage ? user.profileImage : 'images/dummy/image-placeholder.jpg';
            },
            showBidPopup(val) {
                if(val == 'bidNow') {
                    this.$emit('showBidPopup', this.job, val);
                }else {
                    this.$emit('showBidPopup', this.job, val);
                }
            },
            viewDetails(id){

                let routeData = this.$router.resolve({ name: 'job.details', params: { id: id }});
                window.open(routeData.href, '_blank');
            
            },
            getImage(img) {
                return img ? img : 'images/dummy/image-placeholder.jpg'
            },
        },
        computed: {
            getCountry() {
                return this.job.city? this.job.city + ", "+ this.job.state : this.job.state;
            },
            hideChangeBid() {
                if(typeof(this.tabType) != "undefined") {
                    return (this.tabType == "activebid" && this.job.status != 'in_bidding');
                }
                return false;
            }

        },
    }

</script>