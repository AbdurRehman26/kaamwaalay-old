    <template>
    	<div class="my-job-lising-content">
            <div class="search-fixture">
                <div class="grey-bg section-padd xs border-top-bottom search-fix">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2 p-r-0">
                                <h3 class="labelheading">Select Service Category</h3>
                            </div>
                            <div class="col-md-8 p-r-0">
                                <div class="search-filter m-b-0">
                                    <input type="text" placeholder="What service do you need?" class="form-control lg search-service" name="">
                                    <div class="container-zip-code">
                                        <i class="icon-location"></i>
                                        <input type="number" placeholder="Zip code" class="form-control lg zip-code" name="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 p-r-0">
                                <a href="javscript:void(0);" class="btn btn-primary width-100">Search</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
               <div class="category-section-search">
                <h1 class="m-b-0">General Carpentry Jobs in New York, NY</h1>
            </div>

            <div class="job-post-container section-padd sm">
                <div class="container md">

                    <div class="job-post-list" v-for="listing in joblisting">
                        <div class="job-post-details">
                            <div class="job-image pointer" @click="servicedetail" v-bind:style="{'background-image': 'url('+ listing.job_title_image +')',}"></div>

                            <div class="job-common-description job-perform">
                                <div class="col-md-6 p-l-0">
                                    <div class="job-main-title">
                                        <h3 class="pointer" @click="servicedetail">{{listing.job_title}}</h3> <span><i class="icon-checked"></i><i class="icon-info pointer" @click="showinfo"><img src="/images/front/svg/info.svg"></i></span>
                                    </div>
                                    <div class="job-notification">
                                        <div class="jobs-done">
                                            <span class="job-poster">Posted By <a href="javascript:void(0);" @click="showProfile">{{ listing.job_poster }}</a></span>
                                            <span class="job-category noborder">{{ listing.job_category }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 job-bid-btn p-r-0">
                                    <a href="javascript:void(0);" v-if="listing.job_bidding == true" @click="ChangeBid" class="btn btn-primary post-bid m-r-10">Bid Now</a>
                                    <a @click="showchatpanel()" href="javascript:void(0);" v-else class="chat-message"><i class="icon-message"></i></a> <a href="javascript:void(0);" @click="servicedetail" class="btn btn-primary post-bid">View Details</a>
                                </div>
                            </div>

                            <div class="member-details">
                                <p class="location">
                                    <i class="icon-location"></i>
                                    Location <strong>{{ listing.job_location }}</strong>
                                </p>
                                <p class="offer">
                                    <i class="icon-work-briefcase"></i>
                                    Offer: <strong>{{ listing.job_offer }}</strong> - <a @click="ChangeBid" href="javascript:void(0);">Change Bid</a>
                                </p>

                                <p class="member-since">
                                    <i class="icon-calendar-daily"></i>
                                    Post Date <strong>{{ listing.job_post_date }}</strong>
                                </p>
                            </div>

                            <div class="post-job-description">
                                <p>{{ listing.job_description }}</p>
                            </div>


                            <div class="job-details">
                                <p class="customer-rating">
                                    <strong>Customer rating:</strong>
                                    <star-rating :star-size="20" read-only :rating="[listing.list_ratings]" active-color="#8200ff"></star-rating>
                                </p>
                                <p class="service-requirment">
                                    <i class="icon-brightness-down"></i>
                                    Service required
                                    <strong v-if="listing.job_service == 'urgent'" class="urgent">{{ listing.job_service }}</strong>
                                    <strong v-else>{{ listing.job_service }}</strong>
                                </p>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <post-bid-popup @HideModalValue="HideModal" :showModalProp="bidpopup"></post-bid-popup>
        </div>
        <chat-panel v-show="isShowing" @CloseDiscussion='CloseDiscussion()'></chat-panel>
        <info-popup @HideModalValue="HideModal" :showModalProp="infoval"></info-popup>
    </div>
</template>

<script>
    import StarRating from 'vue-star-rating';

    export default {
      data () {
        return {
         bid_selection: 'activebid',
         bidpopup: false,
         isShowing:false,
         infoval:false,
         joblisting:[

         {
            job_title_image: '/images/front/profile-images/bidimage1.png',
            job_title: 'Concrete Floor Building',
            job_poster: 'Nathan Alvarez',
            job_category: 'Construction - Concrete Flooring',
            job_status: 'Active',
            job_perform: 270,
            job_service: 'within a week',
            job_location: 'New York, NY',
            chat_message: false,
            job_offer: '$250',
            job_post_date: '24 Jan, 2018',
            job_description: 'Room size is approx. 12 x 8 Ft with one side having a roller door. On two sides it is a sandstone wall and the other two it is breeze block wall, floor is currently a brick flooring. I would like someone to concrete over this up to the height of the roller door and then provide a slight ramp up to the roller door height.',
            list_ratings: 5,
        },

        {
            job_title_image: '/images/front/profile-images/bidimage2.png',
            job_title: 'Leaking water pipe',
            job_category: 'Construction - Concrete Flooring',
            job_poster: 'Lisa Burns',
            job_status: 'Active',
            job_perform: 270,
            job_service: 'urgent',
            job_location: 'New York, NY',
            chat_message: true,
            job_bidding: true,
            job_offer: 'TBH',
            job_post_date: '24 Jan, 2018',
            job_description: 'Old water pipe to garden tap leaking so we have an unwanted water feature. The leak is underground from Old steel pipes. This was a branch of the previous main supply to the house. Job capping off old supply to house and repairing/capping off the leaking supply to garden tap.',
            list_ratings: 4,

        },

        {
            job_title_image: '/images/front/profile-images/bidimage1.png',
            job_title: 'Leaking water pipe',
            job_category: 'Construction - Concrete Flooring',
            job_poster: 'Lisa Burns',
            job_status: 'Active',
            job_perform: 270,
            job_service: 'urgent',
            job_location: 'New York, NY',
            chat_message: true,
            job_bidding: true,
            job_offer: 'TBH',
            job_post_date: '24 Jan, 2018',
            job_description: 'Old water pipe to garden tap leaking so we have an unwanted water feature. The leak is underground from Old steel pipes. This was a branch of the previous main supply to the house. Job capping off old supply to house and repairing/capping off the leaking supply to garden tap.',
            list_ratings: 2,

        },

        {
            job_title_image: '/images/front/profile-images/bidimage2.png',
            job_title: 'Leaking water pipe',
            job_category: 'Construction - Concrete Flooring',
            job_poster: 'Lisa Burns',
            job_status: 'Active',
            job_perform: 270,
            job_service: 'urgent',
            job_location: 'New York, NY',
            chat_message: true,
            job_offer: 'TBH',
            job_post_date: '24 Jan, 2018',
            job_description: 'Old water pipe to garden tap leaking so we have an unwanted water feature. The leak is underground from Old steel pipes. This was a branch of the previous main supply to the house. Job capping off old supply to house and repairing/capping off the leaking supply to garden tap.',
            list_ratings: 3,

        },

        {
            job_title_image: '/images/front/profile-images/bidimage2.png',
            job_title: 'Leaking water pipe',
            job_category: 'Construction - Concrete Flooring',
            job_poster: 'Lisa Burns',
            job_status: 'Active',
            job_perform: 270,
            job_service: 'urgent',
            job_location: 'New York, NY',
            chat_message: true,
            job_bidding: true,
            job_offer: 'TBH',
            job_post_date: '24 Jan, 2018',
            job_description: 'Old water pipe to garden tap leaking so we have an unwanted water feature. The leak is underground from Old steel pipes. This was a branch of the previous main supply to the house. Job capping off old supply to house and repairing/capping off the leaking supply to garden tap.',
            list_ratings: 4,

        },


        ],
    }
},

methods: {

     AddCustomer() {
      this.customer = true;
    },
    ViewCustomerDetail() {
        /*this.viewcustomer = true;*/
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
        this.$router.push('/job-details/serviceprovider');
    },
    showchatpanel(){
        this.isShowing=true;
    },
    CloseDiscussion(){
        this.isShowing=false;
    },
    showProfile(){
        this.$router.push({name: 'Explore_Detail'});
    },  

},
components: {
    StarRating
},

mounted(){

},
watch:{
 bid_selection: function (val){
  return this.val
},
}

}
</script>
