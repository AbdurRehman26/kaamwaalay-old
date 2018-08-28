<template>
	<div class="section padding-sm profile-form wrapper-sm">
		<div class="profile-head">
			<h1>Complete your profile</h1>
            <p>To build safety on PSM, it's critical that all customers complete this step. All information provided below will be kept secure.</p>
        </div>

        <div class="profile-form-section">

         <div class="form-signup">
            <form>
               <div class="personal-detail">
                  <div class="row">
                     <div class="browse-btn">
                        <div class="form-group">
                           <label class="file-upload-label">Browse Photo</label>
                           <input class="form-control file-upload-input" type="file">
                       </div>
                   </div>
               </div>

               <!-- Alert Tag -->
               <alert :successMessage="successMessage" :errorMessage="errorMessage"></alert>
               <!-- Alert Tag -->

               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="">First Name</label>
                        <input type="text" class="form-control" name="first_name" v-model="record.first_name" value="Arsalan" placeholder="Enter your first name">
                    </div>
                </div>
                <div class="col-md-6">
                 <div class="form-group">
                    <label for="">Last Name</label>
                    <input type="text" class="form-control" name="last_name" v-model="record.last_name" value="Akhtar" placeholder="Enter your last name">
                </div>
            </div>
        </div>

        <div class="row">
          <div class="col-md-6">
             <div class="form-group">
                <label for="">Email Address</label>
                <input type="text" class="form-control" name="email" v-model="record.email" value="arsalan@cygnismedia.com" placeholder="Enter your first email address">
            </div>
        </div>
        <div class="col-md-6">
         <div class="form-group">
            <label for="">Contact Number</label>
            <input type="password" class="form-control" name="phone_number" v-model="record.phone_number" placeholder="Enter your mobile or landline number">
        </div>
    </div>
</div>
</div>
<div class="home-detail">
   <div class="row">
      <div class="col-md-6">
         <div class="form-group">
            <label for="">Address</label>
            <input type="text" class="form-control" name="address" v-model="record.address" placeholder="Enter your street address">
        </div>
    </div>
    <div class="col-md-6">
     <div class="form-group">
        <label for="">Apartment, suite, unit</label>
        <input type="text" class="form-control" name="apartment" v-model="record.apartment" placeholder="Enter your last name">
    </div>
</div>
</div>

<div class="row">
  <div class="col-md-6">
     <div class="form-group">
        <label for="">City</label>
        <input type="password" class="form-control" name="city" v-model="record.city" placeholder="Enter your city name">
    </div>
</div>
<div class="col-md-6">
 <div class="form-group">
    <label for="">State</label>
    <select class="form-control" name="state" v-model="record.state">
      <option value="">Select State</option>
      <option v-for="state in states" :value="state.id">{{state.name}}</option>
  </select>
</div>
</div>
</div>

<div class="row">

  <div class="col-md-6">
     <div class="form-group">
        <label for="">Zip Code</label>
        <input type="password" class="form-control" name="zip_code" v-model="record.zip_code" placeholder="Enter your zip code">
    </div>
</div>
</div>
</div>

<div class="create-account-btn">
  <button class="btn btn-primary">Update Profile
     <loader></loader>
 </button>
</div>

<div class="form-detail">
  <p>Please make sure all the information you entered is accuate before submitting.</p>
</div>
</form>
</div>

</div>
<vue-common-methods :url="requestUrl" @get-records="getResponse"></vue-common-methods>
<vue-common-methods :url="stateUrl" @get-records="getStateResponse"></vue-common-methods>

</div>
</template>
<script>
    export default{
        data(){
            return{
                successMessage : '',
                errorMessage : '',
                record : [],
                url : 'api/user/me',
                showNoRecordFound : false,
                search : '',
                stateUrl : 'api/state',
                states : []
            }
        },
        mounted(){
            this.getList();
        },
        computed : {
            requestUrl(){
                return this.url;
            },
        },
        methods: {
            getResponse(response){
                let self = this;
                self.loading = false;
                self.record = response.data;
            },
            getStateResponse(response){
                let self = this;
                self.loading = false;
                self.states = response.data;
            },
            validateBeforeSubmit() {
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        this.onSubmit();
                        this.$emit('error-message', '');
                        return;
                    }
                    this.$emit('error-message', this.errorBag.all()[0]);
                });
            },
            onSubmit() {
                let self = this;
                let data = self.loginForm;
                self.loading = true;
                let url = self.url;
                self.$http.post(url, data).then(response => {
                    response = response.body;
                    self.$auth.setToken(response.access_token, response.expires_in + Date.now());

                    self.$emit('success-message', "You are successfully logged in. Please wait");
                    setTimeout(function () {
                        self.$emit('success-message', "");
                        self.$store.commit('setIsAuthenticated', true);
                        self.loading = false;
                        self.$router.push('/dashboard');

                    }, 2000);

                }).catch(error => {
                    var message = error.body.message;
                    var error = error.body.error;

                    if (error == 'invalid_credentials') {
                        message = 'Invalid email address or password';
                    }

                    setTimeout(function () {
                        self.$emit('error-message', "");
                    }, 2000);


                    this.$emit('error-message', message);
                    this.loading = false;
                });

            },
        }        
    }
</script>
