<template>
    <div class="section padding-sm profile-form wrapper-sm">
        <div class="profile-head">
            <h1>Complete your profile</h1>
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

                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Area</label>

                            <div class="custom-multi multiselect-z-index">
                                <multiselect  v-model="record.city_area" :options="cityAreas"  placeholder="Select area" track-by="id" label="name"  open-direction="bottom" :options-limit="500" :limit="8" :max-height="700" name="search" :internal-search="true">
                                </multiselect>
                            </div>


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
<vue-common-methods :hideLoader="true" :url="requestCityAreaUrl" @get-records="getCityAreaResponse"></vue-common-methods>

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
                cityAreas : [],
                cityAreaUrl : 'api/city-area',
                file: null,
                profileImage : '',
            }
        },
        computed : {
            requestUrl(){
                return this.url;
            },
            requestCityAreaUrl(){
                return this.cityAreaUrl;
            },
            imageValue(){
                return this.profileImage;
            }
        },
        methods: {
            setCity(object){
              this.currentCity = object.city_id;
              this.onStateChange();
          },
   getResponse(response){
    let self = this;
    self.loading = false;
    self.record = response.data;

    self.profileImage = self.record.profileImage;

},
getCityAreaResponse(response){

    this.cityAreas = response.data;
},
validateBeforeSubmit() {
    this.$validator.validateAll().then((result) => {
        this.errorMessage = this.errorBag.all()[0];
        this.onSubmit();
    });
},
onSubmit() {
    let self = this;

    this.record.is_profile_completed = 1;

    let data = {
        user_details : this.record
    };

    if (!this.record.phone_number){
      this.errorMessage = 'Please enter a phone number.';
      return false;
    }

    data.user_details.city_area_id = this.record?.city_area?.id;

    if (!data.user_details.city_area_id){
      this.errorMessage = 'Please select an area.';
      return false;
    }

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
