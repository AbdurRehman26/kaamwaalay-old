<template>

    <div>
        <div class="job-post-list" v-for="record in records">
            <div class="job-post-details">
                <div style="pointer-events: none;" class="job-image pointer" v-bind:style="{'background-image': 'url('+ record.user.profileImage +')'}"></div>

                <div class="job-common-description job-perform">
                    <div class="col-md-6 p-l-0">
                        <div class="job-main-title">
                            <router-link :to="{name: 'job.details' , params : { id : record.id }}">
                                <h3 class="pointer">{{record.title}}</h3>
                            </router-link> 
                        </div>
                        <div class="job-notification">
                            <div class="jobs-done">
                                <span class="job-poster">Posted By {{ record.user | fullName }}</span>
                                <span class="job-category noborder">{{ record.service | mainServiceOrChildService('-') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 job-bid-btn p-r-0">
                        <a href="javascript:void(0);" v-if="!record.my_bid && record.status != 'completed' &&  record.status != 'cancelled' && !record.awarded_to" @click="currentRecord = record; showBidPopup = true;" class="btn btn-primary post-bid m-r-10">Bid Now</a>

                        <a v-if="record.can_message && record.status !== 'cancelled'" @click="showchatpanel()" href="javascript:void(0);" v-else class="chat-message">
                            <i class="icon-message"></i>
                        </a>

                        <router-link class="btn btn-primary" :to="{name: 'job.details' , params : { id : record.id }}">View Details </router-link>
                    </div>
                </div>

                <div class="member-details">
                    <p class="location">
                        <i class="icon-location"></i>
                        Location <strong>{{ record.city  }}, {{ record.state}}</strong>
                    </p>
                    <p class="offer" v-if="record.my_bid">
                        <i class="icon-work-briefcase"></i>
                        Offer: <strong>
                            {{ record.my_bid.is_tbd ? 'TBD' : record.my_bid.amount }}
                        </strong> - <a v-if="!record.my_bid.is_awarded && !record.my_bid.is_visit_required" @click="showBidPopup = true; bidValue = record.my_bid; currentRecord = record;" href="javascript:void(0);">Change Bid</a>
                        <strong v-if="record.my_bid.is_visit_required">
                            {{ record.my_bid.status == 'visit_allowed' ? 'Visit allowed' : 'Visit required' }}
                        </strong>
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
                    <p class="customer-rating">
                        <strong>Customer rating:</strong>
                        <star-rating :increment="0.5" :star-size="20" read-only :rating="record.user ? parseFloat(record.user.average_rating) : 0" active-color="#8200ff"></star-rating>
                    </p>
                    <p class="service-requirment">
                        <i class="icon-brightness-down"></i>
                        Service required
                        <strong v-if="record.job_type == 'urgent'" class="urgent">{{ record.job_type }}</strong>
                        <strong v-else-if="record.preference == 'choose_date'">{{ record.formatted_schedule_at }}</strong>
                        <strong v-else>{{ record.preference | jobPreference }}</strong>
                    </p>
                </div>

            </div>
        </div>
        <post-bid-popup :bid="bidValue" :job="currentRecord" @HideModalValue="showBidPopup = false; bidValue = '';" :showModalProp="showBidPopup"></post-bid-popup>

    </div>

</template>

<script>
    import StarRating from 'vue-star-rating';

    export default{
        props : ['records'],
        components: {
            StarRating
        },
        data(){
            return { 
                bidValue : '',
                currentRecord : '',
                showBidPopup: false,
                
                
            }
        }

    }

</script>