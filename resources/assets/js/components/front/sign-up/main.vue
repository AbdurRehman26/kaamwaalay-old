<template>

    <div class="section padding-sm sign-up-info wrapper-sm">
        <h1>Sign Up</h1>
        <alert v-if="showFacebookAlert" :errorMessage="showFacebookAlertMessage"></alert>  
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-6">
                <div class="custom-radio boxed">
                    <input  v-model="type" value="customer" type="radio" name="accountType" id="type_hire_provider">
                    <label for="type_hire_provider" @click="signuptext = 'CUSTOMER SIGN UP'">
                        <div class="verticle-align">
                            <div class="inner">
                                I want to hire a service provider
                                <span>Get introduced to the right professional for your jobs</span>
                                <i class="icon-checkmark2"></i>
                            </div>
                        </div>
                    </label>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-sm-6">
                <div class="custom-radio boxed">
                    <input  v-model="type" value="provider" type="radio" name="accountType" id="type_service_provider" >
                    <label for="type_service_provider" @click="signuptext = 'SERVICE PROVIDER SIGN UP'">
                        <div class="verticle-align">
                            <div class="inner">
                                I want to grow my business
                                <span>Respond to customer requests and get hired</span>
                                <i class="icon-checkmark2"></i>
                            </div>
                        </div>
                    </label>
                </div>
            </div>
        </div>
        <!-- Tab panes -->
        <div class="tab-content m-t-30" v-show="val != 'facebook'">
            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="sign-up-form service-provider-form">
                    <p class="custom-text">{{signuptext}}</p>
                    <facebook-component :text = "'Sign up with Facebook'" :fromSignUp="'true'" :showDialog="showDialog"></facebook-component>
                    <div class="form-signup">
                        <form  @submit.prevent="validateBeforeSubmit"  novalidate="">
                            <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>
                            <div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6" :class="[errorBag.first('first_name') ? 'is-invalid' : '']">
                                        <div class="form-group">
                                           <label for="register_first_name">First Name</label>
                                           <input id="register_first_name" type="text" v-model="register_info.first_name" v-validate="'required'"  name="first_name" data-vv-name="first_name" data-vv-as="First Name" class="form-control" placeholder="Enter your First Name" :class="[errorBag.first('first_name') ? 'is-invalid' : '']">
                                       </div> 
                                   </div> 
                                   <div class="col-xs-12 col-md-6" :class="[errorBag.first('last_name') ? 'is-invalid' : '']">
                                    <div class="form-group">
                                       <label for="register_last_name">Last Name</label>
                                       <input id="register_last_name" type="text" v-model="register_info.last_name" v-validate="'required'"  name="last_name" data-vv-name="last_name" data-vv-as="Last Name" class="form-control" placeholder="Enter your Last Name" :class="[errorBag.first('last_name') ? 'is-invalid' : '']">
                                   </div>
                               </div>
                           </div>

                           <div class="row">
                            <div class="col-xs-12 col-md-6" :class="[errorBag.first('register_email') ? 'is-invalid' : '']">
                                <div class="form-group">
                                   <label for="register_email">Email Address</label>
                                   <input id="register_email" type="email" v-model="register_info.email" v-validate="{ required: true,email: true, regex: /\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}\b/ }"  name="register_email" class="form-control"  data-vv-name="register_email" data-vv-as="Email" placeholder="Enter your email address" :class="[errorBag.first('register_email') ? 'is-invalid' : '']">
                               </div>
                           </div>
                           <div class="col-xs-12 col-md-6" :class="[errorBag.first('password') ? 'is-invalid' : '']" novalidate="">
                            <div class="form-group">
                               <label>Password</label>
                               <input type="password" v-model="register_info.password" v-validate="'required|min:8'" data-vv-as="Password" name="password" class="form-control"  data-vv-name="password" placeholder="Create your account password" :class="[errorBag.first('password') ? 'is-invalid' : '']">
                           </div>
                       </div>
                   </div>
                   <div class="form-detail form-group">
                    <div class="custcheckbox custom-control custom-checkbox custom-control-inline">
                        <input  type="checkbox" value="accepted" unchecked-value="not_accepted" class="custom-control-input" v-validate="'required'" data-vv-name="agree"  name="agree" v-model="agree">
                        <label for="checkbox1" class="custom-control-label"> <p>I agree to the <router-link to="/terms-condition">Terms of Use</router-link> and <router-link to="/privacy-policy">Privacy Policy</router-link>.</p>	</label>								
                    </div>
                </div>
                <div class="create-account-btn">
                    <button class="btn btn-primary account-type-btn" :class="[loading  ? 'show-spinner' : '']"><span>Create Account</span><loader></loader></button>
                </div>
            </div>
        </form>
    </div>

</div>
<div class="already-signup login">
    <p>Already a member? <a href="/login">Log In</a></p>
</div>
</div>

</div>
    <signup-confirmation-popup :signupText="signupText" @hideModalValue="hideModal" :showModalProp="showModalValue" @onConfirm="onConfirm"></signup-confirmation-popup>
    <!-- <div class="m-b-30 text-center" v-if="val === 'facebook'">
        <div class="create-account-btn">
            <button class="btn btn-primary account-type-btn wth-190" :class="[loading  ? 'show-spinner' : '']"><span>Continue</span><loader></loader></button>
        </div>
    </div> -->



</div>
</template>
<script>
    export default {
        props: ['isPro'],
        data () {
            remind: null;
            return {
                showFacebookAlert: false,
                showFacebookAlertMessage: "Your email address is not registered. Please Sign Up.",
                signupText: "",
                showDialog: false,
                showModalValue : false,
                tabval: 'firstsec',
                tabval: 'firstsec',
                type:'customer',
                mainNav:'true',
                val: this.$route.params.isPro,
                loading:false,
                errorMessage: '',
                successMessage: '',
                register_info: {
                    'first_name': '',
                    'last_name': '',
                    'email': '',
                    'password': '',
                    'role': '',
                },
                status:  'not_accepted',
                signuptext: 'CUSTOMER SIGN UP',
                agree  : false,
                loading: false,
            }
        },
        mounted() {
            this.$auth.options.loginUrl = '/api/auth/login';
            if(typeof(this.isPro) != "undefined") {
                this.type = '';
            }
            if(this.isPro == 'customer'){
                    this.type= 'customer';
                    this.signuptext = 'CUSTOMER SIGN UP';
            }else if(this.isPro  == 'provider'){
                    this.type= 'provider';
                    this.signuptext = 'SERVICE PROVIDER SIGN UP';
            }
            if(this.isPro == "facebook") {
                    let self = this;
                    this.showFacebookAlert = true;
                    setTimeout(function() {
                        self.showFacebookAlert = false;
                    }, 3000);
                }
        },
        methods:{
            onConfirm() {
                this.showModalValue = false;
                this.showDialog = true;
            },
            showModal(val){
                this.signupText = val
                this.showModalValue = true;
            },
            hideModal(){
                this.showModalValue = false;
                this.showDialog = false;
            },
            switchType: function(type) {

                var result = [];
                if ((this.type) === 'customer') {
                    this.signuptext = 'CUSTOMER SIGN UP';
                    window.scrollTo(0,0);
                    this.$router.push('profile');
                }
                if ((this.type) === 'provider') {
                    this.signuptext = 'Service Provider Signup';
                    window.scrollTo(0,0);					
                    this.$router.push('apply-for-review');
                }
                return result;
            },
            register: function () {
                let self = this;
                this.loading = true
                if(self.type == 'customer'){
                    self.register_info.role_id = 3;
                }else{
                    self.register_info.role_id = 2;
                }
                this.$auth.register(this.register_info).then(function (response) {
                    self.loading = false
                    self.successMessage = response.data.message;
                    self.resetModal();
                    setTimeout(function(){
                        self.successMessage='';
                    }, 5000);
                }).catch(error => {
                    this.loading = false

                    let errors = error.response.data.errors;
                    _.forEach(errors, function(value, key) {
                        self.errorMessage =  errors[key][0];
                        return false;
                    });


                    setTimeout(function(){
                        self.errorMessage='';
                        this.loading = false
                    }, 5000);
                })
            },
            validateBeforeSubmit() {
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        this.register();
                        this.errorMessage = '';
                        return;
                    }
                    this.errorMessage = this.errorBag.all()[0];
                });
            },
            scrolltop(){
                window.scrollTo(0,0);
            },

            resetModal () {
                let self = this;
                self.register_info = {
                    'first_name': '',
                    'last_name': '',
                    'email': '',
                    'password': '',
                    'role': '',
                },
                self.agree = false,
                setTimeout(function () {
                    self.errorBag.items = [];
                }, 100);
            },
        },
        watch:{
            isPro(val){
                if(val == 'customer'){
                    this.type= val;
                    this.signuptext = 'CUSTOMER SIGN UP';
                }else if(val == 'provider'){
                    this.type= val;
                    this.signuptext = 'SERVICE PROVIDER SIGN UP';
                }
            },
            type(val) {
                if(this.isPro == "facebook" && val != "") {
                    var text = val == "customer"? val : "service provider";
                    this.showModal(text);
                }
            }
        }
    }
</script>
