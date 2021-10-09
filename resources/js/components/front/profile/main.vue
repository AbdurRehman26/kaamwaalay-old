<template>
    <div class="section padding-sm profile-form wrapper-sm">
        <div class="profile-head">
            <h1>Complete your profile</h1>

            <p>To build safety on PSM, it's critical that all customers complete this step. All information provided below will be kept secure.</p>
        </div>

        <div class="profile-form-section">

            <div class="form-signup">
                <form @submit.prevent="validateBeforeSubmit" novalidate="" autocomplete="nope">
                    <div class="personal-detail">
                        <div v-if="!imageValue" class="profile-image-placeholder onlyplaceholder">
                        </div>

                        <div class="profile-image-placeholder" v-if="imageValue" v-bind:style="{'background-image':'url('+imageValue+')'}">
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
                                <label for="">First Name *</label>
                                <input type="text" v-validate="'required|max:25'" class="form-control"
                                name="first name" :class="['form-control' , errorBag.first('first name') ? 'is-invalid' : '']" v-model="record.first_name"
                                placeholder="Enter your first name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Last Name *</label>
                                <input type="text" v-validate="'required|max:25'" class="form-control"
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
                                <input v-validate="{ regex:/^([+]||\d)([\d-]{10,15})$/ }" :class="['form-control', 'form-group' , errorBag.first('phone number') ? 'is-invalid' : '']" type="text"
                                name="phone number" v-model="record.phone_number" placeholder="Enter your mobile or landline number">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="home-detail">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" v-validate="'max:250'"  :class="['form-control' , errorBag.first('address') ? 'is-invalid' : '']" name="address" v-model="record.address" placeholder="Enter your street address">
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
<vue-common-methods :hideLoader="true" :url="stateUrl" @get-records="getStateResponse"></vue-common-methods>
<vue-common-methods :hideLoader="true" v-if="record.state_id" :url="requestCityUrl" @get-records="getCityResponse"></vue-common-methods>

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
                profileImage : '',
                invalidZip: false,
                currentCity: null,
            }
        },
        mounted(){
        },
        watch: {
            'record.zip_code' (val) {
                if(!val) {
                    //this.invalidZip = true;
                }
            },
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
            setZipCode(val) {
                let self = this;
                this.record.zip_code = val.zip_code;
                this.setCity(val)
                this.invalidZip = false;
                if(!val.zip_code) {
                    this.invalidZip = true;
                }
            },
            setCity(object){
                if(object.state_id){
                  this.record.state_id = object.state_id;
              }
              this.currentCity = object.city_id;
              this.onStateChange();
          },
          onStateChange(select){
            let self = this;
            var select = select|false;
            if(select){
             this.record.city_id = null;
         }
         this.cityUrl = 'api/city?state_id=' + this.record.state_id;
         if(this.currentCity){
           this.record.city_id = this.currentCity;
           this.currentCity = null;


           setTimeout(function () {
            Vue.nextTick(() => {
                self.errorBag.clear()
            })
            console.log(112321);
        }, 500);



       }




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
    if(this.currentCity){
       this.record.city_id = this.currentCity;
       this.currentCity = null;
   }
},
validateBeforeSubmit() {
    this.$validator.validateAll().then((result) => {
        this.invalidZip = false;
        if(!this.record.zip_code) {
            this.invalidZip = true;
            this.errorMessage = 'Please enter zip code.';
            return false;
        }
        if (result && !this.invalidZip) {
            this.onSubmit();
            this.errorMessage = '';
            return;
        }
        this.errorMessage = this.errorBag.all()[0];
    });
},
onSubmit() {
    let self = this;

    this.record.is_profile_completed = 1;

    let data = {
        user_details : this.record
    };

    self.loading = true;
    let url = 'api/user/'+this.record.id;
    self.$http.put(url, data).then(response => {
        response = response.data;

        this.$store.commit('setAuthUser', response.data);
        self.successMessage = response.message;
        let redirectUrl = self.$store.getters.getRedirectUrl;

        setTimeout(function () {
            if(redirectUrl == "job.create"){
                if(localStorage['parentService'] && localStorage.getItem('parentService')) {
                    self.$router.push({ name: 'Explore_Detail', params: { serviceName: localStorage.getItem('parentService'), childServiceName: localStorage.getItem('childService'), zip : localStorage.getItem('zip') }});
                }else {

                    self.$router.push({ name: 'Explore_Detail', params: { serviceName: localStorage.getItem('childService'), zip : localStorage.getItem('zip') }});
                }
            }else {
                self.$router.push({ name : 'my.jobs'});
            }

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
