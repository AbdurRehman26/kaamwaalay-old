<template>
    <div class="job-post-details" v-if="typeof(job)">
        <div style="pointer-events: none;" class="job-image pointer" v-bind:style="{'background-image': 'url('+ job.user.profileImage +')'}"></div>

        <div class="job-common-description job-perform">
            <div class="col-md-6 p-l-0">
                <div class="job-main-title">
                    <router-link :to="{name: 'job.details' , params : { id : job.id }}">
                        <h3 class="pointer">{{job.title}}</h3>
                    </router-link> 
                </div>
                <div class="job-notification">
                    <div class="jobs-done">
                        <span class="job-poster">Posted By {{ job.user | fullName }}</span>
                        <span class="job-category noborder">{{ job.service | mainServiceOrChildService('-') }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 job-bid-btn p-r-0">
                <a href="javascript:void(0);" v-if="!job.my_bid && job.status != 'completed' &&  job.status != 'cancelled' && !job.awarded_to" @click="showBidPopup('bidNow')" class="btn btn-primary post-bid m-r-10">Bid Now</a>
                <a href="javascript:void(0);" v-else @click="$emit('chatMessage', job)" class="chat-message" :class="{disable: job.can_message == null? true : false}"><i class="icon-message"></i></a>
                <router-link class="btn btn-primary" :to="{name: 'job.details' , params : { id : job.id }}">View Details </router-link>
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
 
               </strong> <span v-if="job.my_bid.status != 'cancelled' && !job.my_bid.is_awarded && !job.my_bid.is_visit_required">- <a @click="showBidPopup('changeBid')" href="javascript:void(0);">Change Bid</a></span>
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
    </div>
</template>
<script>
    import StarRating from 'vue-star-rating';

    export default{
        props : ['job'],
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
            showBidPopup(val) {
                if(val == 'bidNow') {
                    this.$emit('showBidPopup', this.job, val);
                }else {
                    this.$emit('showBidPopup', this.job, val);
                }
            },
        },
        computed: {
            getCountry() {
                return this.job.city? this.job.city + ", "+ this.job.state : this.job.state;
            }
        }
    }

</script>