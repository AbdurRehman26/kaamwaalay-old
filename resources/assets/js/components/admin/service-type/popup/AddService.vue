 <template>
     <div>
      <b-modal id="add-new-service" centered  @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="md" title="Add new Service" >
        <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>
        <div>
            <form action="" method="">
                <div class="form-group">
                 <label>Parent Service</label>
                 <select class="form-control" v-model="formData.parentId">
                    <option value="" selected="">None</option>
                    <option :value="service.id" v-for="service in services">{{service.title}}</option>
                </select>
            </div>

            <div class="form-group">
              <label>Service Name</label>
              <input type="text" name="service name" v-validate="'required'" class="form-control" placeholder="Enter service name" v-model="formData.serviceName" :class="['form-group' , errorBag.first('service name') ? 'is-invalid' : '']" >
          </div>

          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group radio-group-row">
                    <label>Is Featured?</label>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1" v-model="formData.isFeatured">
                      <label class="form-check-label" for="inlineRadio1">Yes</label>
                  </div>
                  <div class="form-check form-check-inline">
                      <input checked=""  class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="0" v-model="formData.isFeatured">
                      <label class="form-check-label" for="inlineRadio1">No</label>
                  </div>
              </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group radio-group-row">
                <label>Hero Navigation?</label>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio4" value="1" v-model="formData.isHeroNavigation">
                  <label class="form-check-label" for="inlineRadio2">Yes</label>
              </div>
              <div class="form-check form-check-inline">
                  <input checked=""  class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio3" value="0" v-model="formData.isHeroNavigation">
                  <label class="form-check-label" for="inlineRadio2">No</label>
              </div>
          </div>
      </div>
  </div>

  <div class="form-group">
    <label>Description</label>
    <textarea class="form-control" rows="5" placeholder="Enter description" v-model="formData.serviceDescription" name="description" v-validate="'required'" :class="['form-group' , errorBag.first('description') ? 'is-invalid' : '']"></textarea>
</div>

<div class="form-group">
    <label>Upload Image</label>
    <b-form-file @change="onFileChange" v-model="file" accept="image/jpeg, image/png, image/jpg" placeholder="Click here to upload image" name="upload image" v-validate="'required'"  :class="['form-group' , errorBag.first('upload image') ? 'is-invalid' : '']"></b-form-file>
    <div class="uploded-picture">
        <img :src="image" />
    </div>
</div>

<div class="form-group">
    <label>URL</label>
    <input type="text" class="form-control" placeholder="Enter url" name="" v-model="formData.urlPrefix" name="url" v-validate="'required|url'" :class="['form-group' , errorBag.first('url') ? 'is-invalid' : '']">
</div>
</form>

</div>
<div slot="modal-footer" class="">
    <b-col class="float-right" cols="12">
       <button :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' , 'apply-primary-color' ]" @click.prevant="validateBeforeSubmit">
        <span>Submit</span> 
        <loader></loader>
    </button>
</button>
</b-col>
</div>
</b-modal>
</div>
</template>

<script>
    export default {
        data () {
            return {
                services: [],
                errorMessage: '',
                successMessage: '',
                formData: {
                    parentId: '',
                    serviceName: '',
                    serviceDescription: '',
                    isFeatured: 0,
                    isHeroNavigation: 0,
                    images: [
                    {
                        'name': '', 
                        'original_name': ''
                    }
                    ],
                    urlPrefix: '',
                    status: 1,
                    isDisplayBanner: 1,
                    isDisplayServiceNav: 1,
                    isDisplayFooterNav: 1,

                },
                emailaddress: 'arsalan@cygnismedia.com',
                fullname: 'Arsalan Akhtar',
                image: 'images/dummy/user-pic.jpg',
                file: null,
                url: 'api/service',
                loading: false,
            }
        },

        props: ['showModalProp'],

        methods: {
            resetFormFields() {
                var self = this;
                this.formData = {
                    parentId: '',
                    serviceName: '',
                    serviceDescription: '',
                    isFeatured: 0,
                    isHeroNavigation: 0,
                    images: [
                    {
                        'name': '', 
                        'original_name': ''
                    }
                    ],
                    urlPrefix: '',
                    status: 1,
                    isDisplayBanner: 1,
                    isDisplayServiceNav: 1,
                    isDisplayFooterNav: 1,

                };
                setTimeout(function () {
                    Vue.nextTick(() => {
                        self.errorBag.clear()
                    })

                }, 10);
            },
            validateBeforeSubmit() {
                var self = this;
                this.$validator.validateAll().then((result) => {
                    if (result && !this.errorBag.all().length) {
                        this.onSubmit();
                        this.errorMessage = '';
                        return;
                    }
                    this.errorMessage = this.errorBag.all()[0];
                });
            },  
            showModal () {
                this.$refs.myModalRef.show();
                var allServices = this.$store.getters.getAllServices;
                // filter only services
                this.services = _.filter(allServices, { parent_id: null});
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
                   return;
                }
                this.errorBag.clear();

                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                  var self = this;    
                  var image = new Image();
                  var reader = new FileReader();
                  self.formData.images[0].original_name = file.name;
                  reader.onload = (e) => {
                    self.formData.images[0].name = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            onSubmit() {
                var self = this;
                this.loading = true;
                let url = this.url;

                var data = new FormData();
                data.append('title', self.formData.serviceName);
                data.append('description', self.formData.serviceDescription);
                data.append('is_display_banner', self.formData.isDisplayBanner);
                data.append('is_display_service_nav', self.formData.isDisplayServiceNav);
                data.append('is_display_footer_nav', self.formData.isDisplayFooterNav);
                data.append('is_featured', self.formData.isFeatured);
                data.append('is_hero_nav', self.formData.isHeroNavigation);
                data.append('url_prefix', self.formData.urlPrefix);
                data.append('parent_id', self.formData.parentId);
                data.append('status', self.formData.status);
                data.append('images', JSON.stringify(self.formData.images));

                this.$http.post(url, data).then(response => {
                    response = response.data.response;
                    self.successMessage = response.message;//'Updated Successfully';
                    
                    self.loading = false;
                    
                    setTimeout(function () {
                        self.successMessage = '';
                        self.hideModal();  
                        self.resetFormFields();              
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
    }
},
}
</script>
