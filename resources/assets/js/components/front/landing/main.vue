<template>
    <div>
        <div class="main-banner home-banner">
            <div class="main-img">
                <img  :src="headerBanner">
            </div>
            <div class="content">
                <div class="verticle-align">
                    <div class="inner">
                        <div class="container">
                            <div class="content-inner">
                                <h1>Find the right service provider for the job!</h1>
                                <h5 class="banner-hd-sub">Get expert help to get done almost anything.</h5>
                                <div class="search-filter">
                                    <div class="custom-multi" :class="{ 'invalid': isInvalid }">
                                        <multiselect  v-model="searchValue" :options="options"  placeholder="What service do you need?" track-by="id" label="title" :loading="isLoading"  id="ajax" open-direction="bottom" :searchable="true" :options-limit="300" :limit="8" :limit-text="limitText" :max-height="600"  @search-change="asyncFind" name="search" :internal-search="false" :showNoResults="false" @select="dispatchAction" @close="dispatchCloseAction" @keyup.enter="validateBeforeSubmit">
                                        </multiselect>
                                    </div>
                                    <div class="container-zip-code">
                                        <i class="icon-location"></i>
                                        <input type="number" placeholder="Zip code" class="form-control lg zip-code" v-model="zipCode" name="zip" :class="[errorBag.first('zip') ? 'is-invalid' : '']" v-validate="'required|numeric'" @keyup.enter="validateBeforeSubmit">
                                    </div>
                                </div>
                                <button :class="[btnLoading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' , 'apply-primary-color' ]" @click="validateBeforeSubmit" :disabled="loading">
                                    <span>Get Started</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--featured categories -->
        <featuredCategories></featuredCategories>
        <!--popular sevice-->
        <popularservices></popularservices>

        <!--how its works-->
        <div class="section section-grey how-it-work elementary-banner">
            <div class="container element-index">
                <div class="section-title">
                    <h2>How it works</h2>
                </div>
                <div class="how-it-work-list">
                    <b-row>
                        <b-col sm="12" md="3" class="text-center">
                            <div class="icon">
                                <img src="/images/front/svg/find.svg">
                            </div>
                            <div class="list-description">
                                <h4>Find</h4>
                                <p>Post a job to tell us about your assignment or task. We'll quickly match you with the right service provider.</p>
                            </div>
                        </b-col>
                        <b-col sm="12" md="3" class="text-center">
                            <div class="icon">
                                <img src="/images/front/svg/bidding.svg">
                            </div>
                            <div class="list-description">
                                <h4>Bidding Process</h4>
                                <p>Professional service providers will post a bid on your job after evaluating your task and give you estimate.</p>
                            </div>
                        </b-col>
                        <b-col sm="12" md="3" class="text-center">
                            <div class="icon">
                                <img src="/images/front/svg/communicate.svg">
                            </div>
                            <div class="list-description">
                                <h4>Communicate &amp; Hire</h4>
                                <p>You can communicate with service provider before hiring and after that award the job to right service provider.</p>
                            </div>
                        </b-col>
                        <b-col sm="12" md="3" class="text-center">
                            <div class="icon">
                                <img src="/images/front/svg/like.svg">
                            </div>
                            <div class="list-description">
                                <h4>Work &amp; Pay</h4>
                                <p>The service provider work on your assignment and once you satisfied with the work you pay to service provider.</p>
                            </div>
                        </b-col>
                    </b-row>
                </div>
            </div>
            <!-- splash elements -->
            <span class="splash-design lg d-2 top-right"></span>
            <span class="splash-design d-3 bottom-left md"></span>
            <span class="splash-design d-6 bottom-right sm sp-rt"></span>
        </div>
        <!-- app store section -->
        <div class="section ready-to-meet">
            <div class="container">
                <div class="two-column">
                    <div class="content-sec">
                        <h2 >When you need someone to get the job done, whether it's an electrician, a plumber, a carpenter, or someone else - we find them for you, for free!</h2>
                        <p>See cost estimates, read reviews and chat with service providers, all in the app. Available on both iOS and Android.</p>
                        <appstore></appstore>
                    </div>
                    <div class="image-sec">
                        <img src="/images/front/home/job-search.jpg">
                    </div>
                </div>
            </div>
        </div>

        <!--testimonial-section-->
        <div class="section section-grey" v-show="isSuccessStory">
            <div class="container">
                <div class="section-title">
                    <h2 class="btm-space">What our customers are saying</h2>
                    <p>Professional service marketplace has helped tens of thousands of people around US to get the job done.</p>
                </div>
                <testmonial-sec @onExist="onSuccessStoryExist" :byRole="3"></testmonial-sec>
            </div>
        </div>
        <!-- -->
        <div class="section ready-to-meet">
            <div class="container">
                <div class="two-column">
                    <div class="content-sec">
                        <h2>Proud of your work? Join us.</h2>
                        <p>We keep it simple and straight forward. Demonstrate your skills and experience to customers with a winning profile, receive email alert and push notifications for jobs posted near you within your service area. If you are business or service provider you can sign up today by creating a service provider account. </p>
                        <button class="btn btn-primary" @click="JoinUsPro">
                            <span>Join Us</span>
                        </button>
                    </div>
                    <div class="image-sec">
                        <img src="/images/front/home/join-us.jpg">
                    </div>
                </div>
            </div>
        </div>

        <!--get started-->
        <div class="section section-grey get-started-section next-project  elementary-banner">
         <explorenow></explorenow>
     </div>
 </div>
</template>


<script>
    import _ from 'lodash';
    export default {
        data() {
            return{
                headerBanner: 'images/front/banners/home.jpg',
                searchValue: '',
                isLoading: false,
                btnLoading: false,
                loading: false,
                options: [],
                zipCode: '',
                errorMessage: '',
                isSuccessStory: false,
            }
        },
        mounted(){
            this.authUser = JSON.parse(this.$store.getters.getAuthUser);
            this.routeName = 'Explore_Detail';
            if(this.authUser) {
                this.zipCode = this.authUser.zip_code;
                localStorage.setItem("zip", this.zipCode);
            }else {
                if(localStorage['zip']) {
                    this.zipCode = localStorage.getItem('zip');
                }
            }
        },
        watch: {
            zipCode(val) {
                if(val.length > 5) {
                    val = val.substr(0, 5);
                }
                this.zipCode = val; 
            },
            searchValue(val) {
                if(val == null) {
                    this.loading = false;
                }
            }
        },
        computed: {
            isInvalid () {
                return this.isTouched && !this.searchValue
            }
        },
        methods: {
            onSuccessStoryExist(val) {
                this.isSuccessStory = val;
            },
            onTouch () {
                this.isTouched = true
            },
            validateBeforeSubmit() {
                this.$validator.validateAll().then((result) => {
                    if (result && !this.loading) {
                        this.ServiceProviderPage();
                        this.errorMessage = "";
                        return;
                    }
                    this.errorMessage = this.errorBag.all()[0];
                });
            }, 
            ServiceProviderPage() {

                this.btnLoading = true;
                this.isTouched = false;
                if(!this.searchValue) {
                    this.btnLoading = false;
                    this.isTouched = true;
                    return;
                }
                localStorage.setItem('zip', this.zipCode);
                this.$router.push({ name: this.routeName, params: { serviceName: this.searchValue.url_suffix, zip : this.zipCode }});
            },
            dispatchAction (actionName) {
                this.searchValue = '';
                this.options = [];
                this.loading = false;
            },
            dispatchCloseAction (actionName) {
                this.options = [];
                this.loading = false;
                this.onTouch();
            },
            asyncFind: _.debounce(function(query) {
                let self = this;
                this.loading = true;
                if(!query) {
                    this.loading = false;
                }
                if(!query || query.length < 3) {
                    return;
                };
                this.searchUrl  = 'api/service?keyword=' + query + '&filter_by_status=1';
                this.isLoading = true;
                this.$http.get(this.searchUrl).then(response => {
                    response = response.data.response;
                    self.options = response.data;
                    self.isLoading = false;

                }).catch(error=>{
                });
            }, 1000),
            limitText (count) {
                return `and ${count} other services`
            },
            SignUp() {
                this.$router.push('explore/service_provider');
            },
            JoinUsPro() {
                this.$router.push('/join-as-pro');
            },
        }
    }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>