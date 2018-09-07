<template>
	<div class="section padding-sm profile-form wrapper-sm">
		<div class="profile-head">
			<h1>Complete your profile</h1>

            <p>To build safety on PSM, it's critical that all customers complete this step. All information provided below will be kept secure.</p>
        </div>

        <div class="profile-form-section">

           <div class="form-signup">
            <form @submit.prevent="validateBeforeSubmit" novalidate="">
             <div class="personal-detail">
                <div class="profile-image-placeholder">
                    <img :src="imageValue">
                </div>
                <div class="row">
                   <div class="browse-btn">
                    <div class="form-group">
                     <label class="file-upload-label">Browse Photo</label>

                     <b-form-file @change="onFileChange" :state="isFileUpload" ref="fileinput" 
                     v-model="file" accept="image/jpeg, image/png, image/jpg" 
                     name="upload image" 
                     :class="['form-control','file-upload-input', 'form-group' , errorBag.first('upload image') ? 'is-invalid' : '']">
                 </b-form-file>

             </div>
         </div>
     </div>

     <!-- Alert Tag -->
     <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>        
     <!-- Alert Tag -->

     <div class="row">
      <div class="col-md-6">
       <div class="form-group">
        <label for="">First Name</label>
        <input type="text" v-validate="'required'" class="form-control"
        name="first name" :class="['form-control' , errorBag.first('first name') ? 'is-invalid' : '']" v-model="record.first_name" 
        placeholder="Enter your first name">
    </div>
</div>
<div class="col-md-6">
   <div class="form-group">
    <label for="">Last Name</label>
    <input type="text" v-validate="'required'" class="form-control"
    name="last name" :class="['form-control' , errorBag.first('last name') ? 'is-invalid' : '']" v-model="record.last_name" 
    placeholder="Enter your last name">
</div>
</div>
</div>

<div class="row">
  <div class="col-md-6">
   <div class="form-group">
    <label for="">Email Address</label>
    <input type="text" :disabled="true" class="form-control" name="email" v-model="record.email" placeholder="Enter your first email address">
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
        <label for="">State</label>
        <select @change="onStateChange" class="form-control" name="state" v-model="record.state_id">
          <option :value="null">Select State</option>
          <option v-for="state in states" :value="state.id">{{state.name}}</option>
      </select>
  </div>
</div>

<div class="col-md-6">
   <div class="form-group">
    <label for="">City</label>
    <select class="form-control" name="state" v-model="record.city_id">
      <option :value="null">Select City</option>
      <option v-for="city in cities" :value="city.id">{{city.name}}</option>
  </select>
</div>
</div>


</div>

<div class="row">

  <div class="col-md-6">
   <div class="form-group">
    <label for="">Zip Code</label>
    <input type="text" class="form-control" name="zip_code" v-model="record.zip_code" placeholder="Enter your zip code">
</div>
</div>
</div>
</div>


<div class="create-account-btn">
  <button :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' ]">Update Profile
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
<vue-common-methods v-if="record.state_id" :url="requestCityUrl" @get-records="getCityResponse"></vue-common-methods>

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
                loading : false,
                isFileUpload : false,
                cities : [],
                stateUrl : 'api/state',
                cityUrl : '',
                states : [],
                file: null,
                profileImage : ''
            }
        },
        mounted(){
            this.getList();
        },
        computed : {
            requestUrl(){
                return this.url;
            },
            requestCityUrl(){
                return this.cityUrl;
            },
            imageValue(){
                return this.profileImage;
            }
        },
        methods: {
            onStateChange(){
                this.cityUrl = 'api/city?state_id=' + this.record.state_id;
            },
            getResponse(response){
                let self = this;
                self.loading = false;
                self.record = response.data;

                if(self.record.state_id){  
                    this.cityUrl = 'api/city?state_id=' + this.record.state_id;
                }
                self.profileImage = self.record.profileImage;

            },
            getStateResponse(response){
                let self = this;
                self.loading = false;
                self.states = response.data;

            },
            getCityResponse(response){
                let self = this;
                self.cities = response.data;
            },
            validateBeforeSubmit() {
                this.$validator.validateAll().then((result) => {
                    
                    if (result) {
                        this.onSubmit();
                        this.errorMessage = '';
                        return;
                    }
                    console.log(result , this.errorBag.all());
                    this.errorMessage = this.errorBag.all()[0];
                });
            },
            onSubmit() {
                let self = this;
                let data = {
                    user_details : this.record
                };

                self.loading = true;
                let url = 'api/user/'+this.record.id;

                self.$http.put(url, data).then(response => {
                    response = response.data.response;

                    this.$store.commit('setAuthUser', response.data);
                    self.successMessage = response.message;

                    setTimeout(function () {
                        // self.$router.push({ name : 'my.jobs'});
                        self.successMessage = '';
                        self.loading = false;
                    }, 2000);

                }).catch(error => {
                    this.loading = false;
                });

            },
            onFileChange(e) {
                var supportedType = ['image/png', 'image/jpg', 'image/jpeg'];
                var files = e.target.files || e.dataTransfer.files;
                this.errorMessage = "";
                if(!supportedType.includes(files[0].type)) {
                    this.errorBag.add({
                      field: 'upload image',
                      msg: 'The file must be an image.',
                      rule: 'image',
                      id: 6,
                  });
                    this.errorMessage = this.errorBag.all()[0];
                    self.isFileUpload = false;
                    return;
                }
                this.errorBag.clear();
                this.isFileUpload = null;
                if (!files.length)
                    return;
                this.createImage(files[0]);
                
            },
            createImage(file) {
                var self = this;    
                var image = new Image();
                var reader = new FileReader();
                reader.onload = (e) => {
                    self.image = e.target.result;
                };
                reader.readAsDataURL(file);
                this.onUpload(file);
            },
            onUpload(file) {
                var self = this;
                let url = "api/file/upload";

                var data = new FormData;
                data.append('key', 'user');
                data.append('file', file);

                this.$http.post(url, data).then(response => {
                    response = response.data;
                    self.record.profile_image = response.name;
                    self.profileImage = response.upload_url;
                }).catch(error => {
                    error = error.response.data;
                    let errors = error.errors;
                    self.isFileUpload = false;
                    _.forEach(errors, function(value, key) {
                        self.errorMessage =  errors[key][0];
                        return false;
                    });
                });
            },
        }        
    }
</script>