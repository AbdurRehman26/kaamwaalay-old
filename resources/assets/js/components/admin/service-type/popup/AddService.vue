 <template>
     <div>
      <b-modal id="add-new-service" centered  @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="md" :title="isUpdate? 'Update Service': 'Add new Service'" no-close-on-backdrop no-close-on-esc>                        
        <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>        
        <div>
            <form action="" method="">
                <div class="form-group">
                 <label>Parent Service</label>
                 <select class="form-control" v-model="formData.parent_id" @change="onChangeParentService">
                    <option value="" selected="">None</option>
                    <option :value="service.id" v-for="service in services">{{service.title}}</option>
                </select>
            </div>

            <div class="form-group">
              <label>Service Name</label>
              <input type="text" name="service name" placeholder="Enter service name" :class="['form-control' , errorBag.first('service name') ? 'is-invalid' : '']" v-model="formData.title" v-validate="'required'" >
          </div>
          <div class="row">
            <!--<div class="col-xs-12 col-sm-6 col-md-12">
              <div class="form-group radio-group-row">
                <label class="label-with-200">Is Featured?</label>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="radioFeature" id="inlineRadio3" value="1" v-model="formData.is_featured">
                  <label class="form-check-label" for="inlineRadio3">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                  <input checked=""  class="form-check-input" type="radio" name="radioFeature" id="inlineRadio7" value="0" v-model="formData.is_featured">
                  <label class="form-check-label" for="inlineRadio7">No</label>
                </div>
              </div>
            </div>-->
            <div class="col-xs-12 col-sm-6 col-md-12" v-if="showRadios">
              <div class="form-group radio-group-row">
                <label class="label-with-200">Home Page Banner</label>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="radioBanner" id="inlineRadio4" value="1" v-model="formData.is_display_banner">
                  <label class="form-check-label" for="inlineRadio4">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                  <input checked=""  class="form-check-input" type="radio" name="radioBanner" id="inlineRadio8" value="0" v-model="formData.is_display_banner">
                  <label class="form-check-label" for="inlineRadio8">No</label>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-12" v-if="showRadios">
                <div class="form-group radio-group-row">
                    <label class="label-with-200">Explore Banner</label>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="radioServname" id="inlineRadio1" value="1" v-model="formData.is_display_service_nav">
                      <label class="form-check-label" for="inlineRadio1">Yes</label>
                  </div>
                  <div class="form-check form-check-inline">
                      <input checked=""  class="form-check-input" type="radio" name="radioServname" id="inlineRadio5" value="0" v-model="formData.is_display_service_nav">
                      <label class="form-check-label" for="inlineRadio5">No</label>
                  </div>
              </div>
          </div>
          <!--<div class="col-xs-12 col-sm-6 col-md-12">
            <div class="form-group radio-group-row">
                <label class="label-with-200">Display Footer Navigation</label>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="radioFootnav" id="inlineRadio2" value="1" v-model="formData.is_display_footer_nav">
                  <label class="form-check-label" for="inlineRadio2">Yes</label>
              </div>
              <div class="form-check form-check-inline">
                  <input checked=""  class="form-check-input" type="radio" name="radioFootnav" id="inlineRadio6" value="0" v-model="formData.is_display_footer_nav">
                  <label class="form-check-label" for="inlineRadio6">No</label>
              </div>
          </div>
      </div>-->

</div>

<div class="form-group">
    <label>Description</label>
    <textarea class="form-control" rows="5" placeholder="Enter description" v-model="formData.description" name="description" v-validate="'required'" :class="['form-group' , errorBag.first('description') ? 'is-invalid' : '']"></textarea>
</div>

<div class="form-group">
    <label>Upload Image</label>
    <b-form-file @change="onFileChange" :state="isFileUpload" ref="fileinput" v-model="file" accept="image/jpeg, image/png, image/jpg" :placeholder="imageText" name="upload image" v-validate="'required'" :class="['form-group' , errorBag.first('upload image') ? 'is-invalid' : '']" ></b-form-file>
    <div class="uploded-picture">
        <img :src="imageValue" />
    </div>
</div>

<div class="form-group">
    <label>URL</label>
    <input type="text" placeholder="Enter url" name="" v-model="formData.url_prefix" name="url" v-validate="'required|url'" :class="['form-control' , errorBag.first('url') ? 'is-invalid' : '']">
</div>
</form>

</div>
<div slot="modal-footer" class="">
    <b-col class="float-right" cols="12">
        <button :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' , 'apply-primary-color' ]" @click.prevant="validateBeforeSubmit">
            <span>{{isUpdate? 'Update' : 'Submit'}}</span> 
            <loader></loader>
        </button>
    </b-col>
</div>
</b-modal>
</div>
</template>

<script>
    export default {
        props: ['showModalProp', 'isUpdate', 'list'],
        data () {
            return {
                showRadios: true,
                errorMessage : '',
                successMessage : '',
                services: [],
                errorMessage: '',
                successMessage: '',
                imageText: 'Click here to upload image',
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
                    url_prefix: '',
                    status: 1,
                    is_display_banner: 0,
                    is_display_service_nav: 0,
                    is_display_footer_nav: 0,

                },
                emailaddress: 'arsalan@cygnismedia.com',
                fullname: 'Arsalan Akhtar',
                image: 'images/dummy/image-placeholder.jpg',
                file: null,
                url: 'api/service',
                loading: false,
                isFileUpload: null,
            }
        },
        methods: {
            onChangeParentService() {
                if(this.formData.parent_id) {
                    this.showRadios = false;
                }else {
                    this.showRadios = true;
                }
            },
            resetFormFields() {
                let self = this;
                this.image = 'images/dummy/image-placeholder.jpg';
                this.file = null;
                this.$refs.fileinput.reset();
                this.isFileUpload = null;
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
                    url_prefix: '',
                    status: 1,
                    is_display_banner: 0,
                    is_display_service_nav: 0,
                    is_display_footer_nav: 0,

                };
                this.onChangeParentService();
                setTimeout(function () {
                    Vue.nextTick(() => {
                        self.errorMessage = '';
                        self.successMessage = '';
                        self.errorBag.clear()
                    })

                }, 100);
            },
            validateBeforeSubmit() {
                var self = this;
                this.$validator.validateAll().then((result) => {

                    if(!self.file) {
                        self.isFileUpload = false;
                    }
                    if (result && !this.errorBag.all().length) {
                        if(this.isUpdate) {
                            this.onUpdate();
                        }else {
                            this.onSubmit();
                        }
                        this.errorMessage = '';
                        self.isFileUpload = null;
                        return;
                    }
                    this.errorMessage = this.errorBag.all()[0];
                });
            },  
            showModal () {

                this.imageText = 'Click here to upload image';
                this.$refs.myModalRef.show();
                var allServices = this.$store.getters.getAllServices;
                // filter only services
                this.services = _.filter(allServices, { parent_id: null});
                this.errorBag.clear();
            },
            hideModal () {
                var self = this;
                this.resetFormFields();
                this.$refs.myModalRef.hide();
            },
            onHidden() {
                this.$emit('HideModalValue');
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
                data.append('key', 'service');
                data.append('file', file);

                this.$http.post(url, data).then(response => {
                    response = response.data;
                    self.formData.images[0].name = response.name;
                    self.formData.images[0].original_name = response.original_name;

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
            onSubmit() {
                var self = this;
                this.loading = true;
                let url = this.url;

                var data = this.formData;

                this.$http.post(url, data).then(response => {
                    response = response.data.response;
                    self.successMessage = response.message;//'Updated Successfully';

                    setTimeout(function () {
                        self.successMessage = '';
                        self.loading = false; 
                        self.hideModal();  
                        self.resetFormFields(); 
                        self.$emit('call-list');         
                    } , 3000);

                    setTimeout(function () {
                        Vue.nextTick(() => {
                            self.errorBag.clear()
                        })
                    }, 10);


                }).catch(error => {
                    error = error.response.data;
                    let errors = error.errors;
                    _.forEach(errors, function(value, key) {
                        if(key == "title") {
                            self.errorMessage =  "The Service Name has alreary been taken.";    
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

                var data = this.formData;
                this.$http.put(url, data).then(response => {
                    response = response.data.response;
                    self.successMessage = response.message;//'Updated Successfully';
                    
                    setTimeout(function () {
                        self.successMessage = '';
                        self.hideModal();  
                        self.resetFormFields(); 
                        self.$emit('call-list');
                        self.loading = false; 
                    } , 3000);

                    setTimeout(function () {
                        Vue.nextTick(() => {
                            self.errorBag.clear()
                        })
                    }, 10);


                }).catch(error => {
                    error = error.response.data;
                    let errors = error.errors;
                    _.forEach(errors, function(value, key) {
                        if(key == "title") {
                            self.errorMessage =  "The Service Name has alreary been taken.";    
                            return false;
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
                if(this.isUpdate) {
                    this.formData = {
                        parent_id: this.list.parent_id? this.list.parent_id : "",
                        title: this.list.title,
                        description: this.list.description,
                        is_featured: this.list.is_featured,
                        images: [
                        {
                            name: img[0].name, 
                            original_name: img[0].original_name
                        }
                        ],
                        url_prefix: this.list.url_prefix,
                        status: this.list.status,
                        is_display_banner: this.list.is_display_banner,
                        is_display_service_nav: this.list.is_display_service_nav,
                        is_display_footer_nav: this.list.is_display_footer_nav
                    };
                    this.image = img[0].upload_url;
                    this.file = img[0].original_name;
                    this.imageText = this.file;
                    this.onChangeParentService();
                }
            }
        },
        computed : {
            imageValue(){
                return this.image;
            }
        }
    }
</script>
