 <template>
     <div>
      <b-modal id="add-new-service" centered  @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef"  hide-footer size="md" :title="isUpdate? 'Update Service': 'Add new Service'" no-close-on-backdrop no-close-on-esc>                        
        <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>        
        <form action="" method="" @submit.prevent="validateBeforeSubmit">
        <div>
            <div class="form-group">
             <label>Parent Service</label>
             <select class="form-control" v-model="formData.parent_id" @change="onChangeParentService">
                <option value="" selected="">None</option>
                <option :value="service" v-for="service in services">{{service.title}}</option>
            </select>
            </div>
            <div class="form-group">
              <label>Service Name</label>
              <input type="text" name="service name" placeholder="Enter service name" :class="['form-control' , errorBag.first('service name') ? 'is-invalid' : '']" v-model="formData.title" v-validate="'required|max:50'" >
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-12" v-if="showRadios">
              <div class="form-group radio-group-row">
                <label class="label-with-200">Home Page Banner</label>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="radioHomePageBanner" id="radioHomePageBannerYes" value="1" v-model="formData.is_display_banner">
                  <label class="form-check-label" for="radioHomePageBannerYes">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                  <input checked=""  class="form-check-input" type="radio" name="radioHomePageBanner" id="radioHomePageBannerNo" value="0" v-model="formData.is_display_banner">
                  <label class="form-check-label" for="radioHomePageBannerNo">No</label>
                </div>
              </div>
                <div class="form-group" v-if="showBannerIcon">
                    <label>Home Banner Icon</label>
                    <b-form-file  @change="onFileChange($event, 'icon')" ref="iconinput" v-model="icon" accept="image/jpeg, image/png, image/jpg" :placeholder="iconText" name="Home Banner Icon" v-validate="'required'" :class="['form-group' , errorBag.first('Home Banner Icon') ? 'invalid-file' : '']"></b-form-file>
                    <div class="uploded-picture" v-bind:style="{'background-image': 'url('+ iconValue +')',}">
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-12" v-if="showRadios">
                <div class="form-group radio-group-row">
                    <label class="label-with-200">Explore Banner</label>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="radioExploreBanner" id="radioExploreBannerYes" value="1" v-model="formData.is_display_service_nav">
                      <label class="form-check-label" for="radioExploreBannerYes">Yes</label>
                  </div>
                  <div class="form-check form-check-inline">
                      <input checked=""  class="form-check-input" type="radio" name="radioExploreBanner" id="radioExploreBannerNo" value="0" v-model="formData.is_display_service_nav">
                      <label class="form-check-label" for="radioExploreBannerNo">No</label>
                  </div>
              </div>
          </div>
        </div>

    <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" rows="5" placeholder="Enter description" v-model="formData.description" name="description" v-validate="'required'" :class="['form-group' , errorBag.first('description') ? 'is-invalid' : '']"></textarea>
    </div>

    <div class="form-group">
        <label>Upload Image</label>
        <b-form-file @change="onFileChange($event, 'image')" ref="fileinput" v-model="file" accept="image/jpeg, image/png, image/jpg" :placeholder="imageText" name="upload image"></b-form-file>
        <div class="uploded-picture" v-bind:style="{'background-image': 'url('+ imageValue +')',}">
            <!-- <img :src="imageValue" /> -->
        </div>
    </div>

    <div class="form-group float-left width-100">
        <div class="row">
            <div class="col-md-12">
                <label>URL Suffix</label>
            </div>        
            <div class="url-suffix">
                <p>{{url_prefix}}</p>
            </div>
            <div class="url-area">
                  <input type="text" placeholder="Enter url suffix" name="" v-model="formData.url_suffix" name="URL Suffix" v-validate="{ required: true, regex: /^[0-9a-z\-]+$/, max:50 }" :class="['form-control' , (errorBag.first('URL Suffix')) ? 'is-invalid' : '']">
            </div>
        </div>


      
    </div>
</div>

<div slot="modal-footer" class="">
    <div class="float-left">
        <button type="submit" :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' , 'apply-primary-color' ]" >
            <span>{{isUpdate? 'Update' : 'Submit'}}</span> 
            <loader></loader>
        </button>
    </div>
</div>

</form>
</b-modal>
</div>
</template>

<script>
    export default {
        props: ['showModalProp', 'isUpdate', 'list'],
        data () {
            return {
                isInalidSuffix: false,
                showRadios: true,
                showBannerIcon: false,
                errorMessage : '',
                successMessage : '',
                services: [],
                errorMessage: '',
                successMessage: '',
                imageText: 'Click here to upload image',
                iconText: 'Click here to upload image',
                formData: {
                    parent_id: '',
                    title: '',
                    description: '',
                    is_featured: 0,
                    images: [
                    {
                        name: '', 
                        original_name: ''
                    }
                    ],
                    icon: [{
                        name: '', 
                        original_name: ''
                    }],
                    url_suffix: '',
                    status: 1,
                    is_display_banner: 0,
                    is_display_service_nav: 0,
                    is_display_footer_nav: 0,
                },
                image: 'images/dummy/image-placeholder.jpg',
                imageIcon: 'images/dummy/image-placeholder.jpg',
                file: null,
                icon: null,
                url: 'api/service',
                loading: false,
                url_prefix: '',
            }
        },
        mounted() {
        },
        methods: {
            getAllServices() {
                let self = this;
                let url = 'api/service?order_by=title';
                self.$http.get(url).then(response=>{
                    response = response.data;
                    self.$store.commit('setAllServices' , response.data);
                    self.$store.commit('setServiceUrlPrefix' , response.url_prefix);
                }).catch(error=>{
                });
            },
            onChangeParentService() {
                if(this.formData.parent_id) {
                    this.formData.is_display_banner = 0;
                    this.formData.is_display_service_nav = 0;
                    this.formData.is_display_footer_nav = 0;
                    this.showRadios = false;
                    this.url_prefix  = this.formData.parent_id.url + "/";
                }else {
                    this.showRadios = true;
                    this.url_prefix  = this.$store.getters.getServiceUrlPrefix;
                }
            },
            resetFormFields() {
                let self = this;
                this.image = 'images/dummy/image-placeholder.jpg';
                this.imageIcon = 'images/dummy/image-placeholder.jpg';
                this.file = null;
                this.icon = null;
                if(typeof(self.$refs.iconinput) != "undefined") {
                    self.$refs.iconinput.reset();
                }
                if(typeof(self.$refs.fileinput) != "undefined") {
                    self.$refs.fileinput.reset();
                }
                this.showRadios = true;
                this.formData = {
                    parent_id: '',
                    title: '',
                    description: '',
                    is_featured: 0,
                    images: [
                    {
                        name: '', 
                        original_name: ''
                    }
                    ],
                    icon: [
                    {
                        name: '', 
                        original_name: ''
                    }
                    ],
                    url_suffix: '',
                    status: 1,
                    is_display_banner: 0,
                    is_display_service_nav: 0,
                    is_display_footer_nav: 0,

                };
                setTimeout(function () {
                    Vue.nextTick(() => {
                        self.errorMessage = '';
                        self.successMessage = '';
                        self.errorBag.clear();
                    })
                }, 100);
            },
            validateBeforeSubmit() {
                var self = this;
                var str = this.formData.url_suffix;
                var regex = /^[0-9a-z\-]+$/;
                this.errorBag.clear();
                this.$validator.validateAll().then((result) => {
                    if (result && !this.errorBag.all().length) {
                        if(str.length == 0) {
                            this.errorBag.add({
                                field: 'URL Suffix',
                                msg: 'The url suffix is required.',
                                rule: 'required',
                                id: 7,
                            });
                            this.errorMessage = this.errorBag.all()[0];
                            return;
                        } if(!regex.test(str)) {
                            this.errorBag.add({
                                field: 'URL Suffix',
                                msg: 'The url suffix is invalid. Please use only lower case letters, numbers & hyphens.',
                                id: 7,
                            });
                            this.errorMessage = this.errorBag.all()[0];
                            return;
                        }else {
                            this.errorBag.clear();
                            this.errorMessage = "";
                        }
                        if(this.isUpdate) {
                            this.onUpdate();
                        }else {
                            this.onSubmit();
                        }
                        this.errorMessage = '';
                        return;
                    }
                    this.errorMessage = this.errorBag.all()[0];
                });

            },  
            showModal () {
                this.imageText = 'Click here to upload image';
                var allServices = this.$store.getters.getAllServices;
                this.url_prefix =  this.$store.getters.getServiceUrlPrefix;
                this.services = _.filter(allServices, { parent_id: null});
                this.errorBag.clear();
                this.$refs.myModalRef.show();
            },
            hideModal () {
                var self = this;
                this.resetFormFields();
                this.$refs.myModalRef.hide();
            },
            onHidden() {
                this.$emit('HideModalValue');
            },
            onFileChange(e, type) {
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
                    return;
                }
                //this.errorBag.clear();
                if (!files.length)
                    return;
                this.createImage(files[0], type);
                
            },
            createImage(file, type) {
                var self = this;    
                var image = new Image();
                var reader = new FileReader();
                reader.onload = (e) => {
                    if(type == "icon") {
                        self.imageIcon = e.target.result;
                    }else {
                        self.image = e.target.result;
                    }
                };
                reader.readAsDataURL(file);
                this.onUpload(file, type);
            },
            onUpload(file, type) {
                var self = this;
                let url = "api/file/upload";

                var data = new FormData;
                data.append('key', 'service');
                data.append('file', file);

                this.$http.post(url, data).then(response => {
                    response = response.data;
                    if(type == "icon") {
                        self.formData.icon[0].name = response.name;
                        self.formData.icon[0].original_name = response.original_name;
                    }else {
                        self.formData.images[0].name = response.name;
                        self.formData.images[0].original_name = response.original_name;
                    }
                    
                }).catch(error => {
                    error = error.response.data;
                    let errors = error.errors;
                    _.forEach(errors, function(value, key) {
                        self.errorMessage =  errors[key][0];
                        return false;
                    });
                });
            },
            onSubmit() {
                var self = this;
                this.loading = true;
                let url = this.url;

                var data = Object.assign({}, this.formData);
                data.parent_id = this.formData.parent_id? this.formData.parent_id.id : "";
                this.$http.post(url, data).then(response => {
                    response = response.data;
                    self.successMessage = response.message;
                    setTimeout(function () {
                        self.successMessage = '';
                        self.loading = false; 
                        self.hideModal();  
                        self.resetFormFields(); 
                        self.$emit('call-list');         
                    } , 2000);

                    setTimeout(function () {
                        Vue.nextTick(() => {
                            self.errorBag.clear()
                        })
                    }, 10);
                    self.getAllServices();

                }).catch(error => {
                    error = error.response.data;
                    let errors = error.errors;
                    _.forEach(errors, function(value, key) {
                        var reg = /marked 6 services/g;
                        if(!reg.test(value[0])) {
                            self.errorMessage =  "The Service Name has already been taken.";    
                            return false;
                        }
                        self.errorMessage =  errors[key][0];
                        return false;
                    });
                    this.loading = false;
                });
            },
            onUpdate() {
                var self = this;
                this.loading = true;
                let url = this.url+"/"+this.list.id;
                var data = Object.assign({}, this.formData);
                data.parent_id = this.formData.parent_id? this.formData.parent_id.id : "";
                self.$http.put(url, data).then(response => {
                    response = response.data;
                    self.successMessage = response.message;
                    setTimeout(function () {
                        self.successMessage = '';
                        self.hideModal();  
                        self.resetFormFields(); 
                        self.$emit('call-list');
                        self.loading = false; 
                    } , 2000);

                    setTimeout(function () {
                        Vue.nextTick(() => {
                            self.errorBag.clear()
                        })
                    }, 10);
                    self.getAllServices();
                }).catch(error => {
                    error = error.response.data;
                    let errors = error.errors;
                    _.forEach(errors, function(value, key) {
                        if(key == "title") {
                            var reg = /marked 6 services/g;
                            if(!reg.test(value[0])) {
                                self.errorMessage =  "The Service Name has alreary been taken.";    
                                return false;
                            }
                        }
                        if(key == "parent_id") {
                            self.errorMessage =  "This service is already a parent service.";    
                            return false;
                        }
                        self.errorMessage =  errors[key][0];
                        return false;
                    });
                    this.loading = false;
                });
            }
        },

        watch: {
            'formData.is_display_banner'(val) {
                this.showBannerIcon = val == "1"? true: false;
            },
        //     'formData.url_suffix' (val) {
        //         var regex = /^[0-9a-z\-]+$/;
        //         if(val.length == 0 || !regex.test(val)) {
        //             this.isInalidSuffix = true;
        //             return;
        //         } 
        //         this.isInalidSuffix = false;
        //     },
            showModalProp(value) {
                if(value) {
                    this.showModal();
                }
                if(!value) {
                    this.hideModal();
                }
            },
            isUpdate(value) {
                this.isUpdate = value;
                var img = this.list.images;
                var icon = this.list.icon;
                if(this.isUpdate) {
                    this.formData = {
                        parent_id: this.list.parent? this.list.parent : "",
                        title: this.list.title,
                        description: this.list.description,
                        is_featured: this.list.is_featured,
                        images: [
                        {
                            name: img? img[0].name : '', 
                            original_name: img? img[0].original_name :''
                        }
                        ],
                        icon: [
                        {
                            name: icon? icon[0].name : '', 
                            original_name: icon? icon[0].original_name :''
                        }
                        ],
                        url_suffix: this.list.url_suffix,
                        status: this.list.status,
                        is_display_banner: this.list.is_display_banner,
                        is_display_service_nav: this.list.is_display_service_nav,
                        is_display_footer_nav: this.list.is_display_footer_nav
                    };

                    this.showRadios = this.formData.parent_id? false : true;
                    this.image = img? (img[0].upload_url? img[0].upload_url : this.image) : this.image;
                    this.file = img? img[0].original_name : '';
                    this.imageText = this.file? this.file : 'Click here to upload image.';
                    this.imageIcon = icon? (icon[0].upload_url? icon[0].upload_url : this.imageIcon) : this.imageIcon;
                    this.icon = icon? icon[0].original_name : '';
                    this.iconText = this.icon? this.icon : 'Click here to upload image.';
                    if(this.formData.parent_id) {
                        this.url_prefix  = this.formData.parent_id.url + "/";
                    }else {
                        this.url_prefix  = this.$store.getters.getServiceUrlPrefix;
                    }
                    this.errorBag.clear();
                }
            }
        },
        computed : {
            imageValue(){
                return this.image;
            },
            iconValue(){
                return this.imageIcon;
            },
        }
    }
</script>
