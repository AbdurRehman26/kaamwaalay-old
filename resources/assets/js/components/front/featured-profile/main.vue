<template>
    <div class="container md">
        <div class="profile-head">
            <h1>Featured Profile</h1>
            <p>Attract more of the right customers by highlighting your specialties and profile on the service provider listing page.</p>
        </div>

        <div class="featured-profile">
            <div class="row">
                <div class="col-md-6">
                    <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>
                    <div class="profile-budget">
                        <h2>Please select your featured profile budget.</h2>
                        <div class="row">  
                            <spinner-loader v-if="loading" ></spinner-loader>      
                            <div class="col-md-12" v-for="plan in plans">
                                <div :class="[ errorBag.first('plan')  ? 'is-invalid' : '']" class="payment-charges custom-circle-radio">
                                    <p>
                                        <input type="radio" :id="'plan' + plan.id"  v-model="selectedPlan" :value="plan.id" name="plan" v-validate="'required'"  data-vv-name="plan" >
                                        <label :for="'plan' + plan.id">${{plan.amount}} one time</label>
                                        <p class="patment-detail">{{plan.quantity}} featured profile listing views</p>
                                    </p>	
                                </div>
                            </div>
                            <no-record-found v-if="showPlanFound"></no-record-found>
                            <div v-if="!showPlanFound" class="col-md-3">
                                <button  @click.prevent="validateBeforeSubmit();" :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' , 'payment-continue' ]">
                                    Continue
                                    <loader></loader>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="featured-profile-section">
                        <h3>Your featured profile may appear on a variety of places, including:</h3>
                        <div class="featured-places">
                            <div><i class="icon-list"></i>
                                <span>Service Pages</span>
                                <p class="featured-detail">Your featured profile will appear almost at the top of service pages related to the services you are offering.</p>
                            </div>
                        </div>

                        <div class="featured-places">
                            <div><i class="icon-search22"></i>
                                <span>Search result pages</span>
                                <p class="featured-detail">When someone search specific service which you are offering, your profile may appear at the top of the search results.</p>
                            </div>
                        </div>

                        <div class="featured-places">
                            <div class="ios-andriod-feature"><i class="ios-andriod-app"></i>
                                <span>Inside iOS &amp; Android Apps</span>
                                <p class="featured-detail">Your featured profile appear on PSM’s iPhone and Android apps, on search result and service pages.</p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="campaigns">
            <h3>MY CAMPAIGNS</h3>
            <spinner-loader v-if="loading" ></spinner-loader>      
            <div class="camp-views" v-for="campaign in campaigns">

                <div class="view-status"><span>{{(campaign.plan)?campaign.plan.quantity:''}} VIEWS</span></div>

                <div class="view-status-detail">
                    <span>Paid ${{(campaign.plan)?campaign.plan.amount:''}} one time</span>
                    <span class="float-right calender-date">
                        <i class="icon-calendar-daily"></i> Date: <strong>{{campaign.created_at.date | formatDate}}</strong></span>
                        <ul class="views-percentage">
                            <li>Actual views: <span>{{campaign.views}}</span></li>
                            <li>Clicks: <span>{{campaign.clicks}}</span></li>
                            <li>CTR: <span>{{(campaign.clicks != 0)?((campaign.clicks/campaign.views)*100|roundOff):0}}%</span></li>
                        </ul>
                        <div v-if="campaign.status=='expired'" class="tags rejected p-r-align">
                            Expired
                        </div>
                    </div>
                </div>	
                <no-record-found v-if="showCampaignFound"></no-record-found>
            </div>
            <card-element :isPopup='true' :cardTitle="'Featured profile'" @HideModalValue="HideModal" :showModalProp="showCardPopup" :planId='selectedPlan' :fromFeaturedProfile="'true'"></card-element>
        </div>
    </template>

    <script>
        import DatePicker from 'vue2-datepicker'

        export default {
            components: { DatePicker },
            data() {
                return {
                    showCardPopup: false,
                    time1: '',
                    time2: '',
                    time3: '',
                    plans : [],
                    campaigns : [],
                    selectedPlan : "",
                    loading: false,
                    errorMessage: '',
                    successMessage: '',
                    showCampaignFound: '',
                    showPlanFound: '',
                    user: {},
                    paymentSuccess: true,
                }
            },
            methods:{
                job(){
                    window.scrollTo(0,0);
                    this.$router.push({name: 'My Jobs'});
                },
                featurejob() {
                    this.showCardPopup = true;
                },
                HideModal(){
                    this.showCardPopup = false;
                },
                getPlansList (){
                    let self = this;
                    self.showPlanFound = false;
                    self.loading = true;
                    let url = 'api/plan';
                    let params = {
                        pagination: false,
                        type: 'service',
                        product: 'featured_profile',
                    };
                    self.$http.get(url, {params: params}).then(response=>{
                        self.plans = response.data.data;
                        if (!self.plans.length) {
                            self.showPlanFound = true;
                        }
                        self.loading = false;
                    }).catch(error=>{
                    });
                },
                getCampaignList (){
                    let self = this;
                    self.showCampaignFound = false;
                    self.user = JSON.parse(self.$store.getters.getAuthUser)
                    self.loading = true;
                    let url = 'api/campaign';
                    let params = {
                        pagination: false,
                        user_id: self.user.id,
                    };
                    self.$http.get(url, {params: params}).then(response=>{
                        self.campaigns = response.data.data;
                        if (!self.campaigns.length) {
                            self.showCampaignFound = true;
                        }
                        self.loading = false;
                    }).catch(error=>{
                    });
                },
                validateBeforeSubmit() {
                    this.$validator.validateAll().then((result) => {
                        if (result) {
                            this.errorMessage = ''
                            this.featurejob();
                            return;
                        }
                        this.errorMessage = this.errorBag.all()[0];
                        return false;
                    });
                },
                onSubmit() {
                    let self = this;
                    let user = JSON.parse(self.$store.getters.getAuthUser);
                    let businessDetails = {'is_featured': 1}
                    let userDetails = {
                           'email': user.email,
                           'first_name': user.first_name,
                           'last_name': user.last_name

                           }
                    let params = {
                        user_details : userDetails,
                        business_details : businessDetails
                    };
                    let url = 'api/user/'+user.id;
                    let urlRequest = self.$http.put(url,params)
                    urlRequest.then(response => {

                    }).catch(error => {

                    });
                }
            },  
            mounted() {
                this.getPlansList()
                this.getCampaignList()
            },
        }
    </script>