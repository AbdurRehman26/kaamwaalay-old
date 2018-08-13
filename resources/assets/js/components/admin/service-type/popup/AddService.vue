 <template>
   <div>
      <b-modal id="add-new-service" centered  @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="md" title="Add new Service" >
        <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>
        <div>
            <form action="" method="">
                <div class="form-group">
                   <label>Parent Service</label>
                   <select class="form-control" v-model="formData.parentService">
                    <option value="" selected="" disabled="">Select Parent Service</option>
                    <option value="">None</option>
                    <option value="">Electrician</option>
                    <option value="">Carpenter</option>
                    <option value="">Plumber</option>
                    <option value="">Painter</option>
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
                      <input checked=""  class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="0" v-model="formData.isFeatured">
                      <label class="form-check-label" for="inlineRadio1">No</label>
                  </div>
              </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group radio-group-row">
                <label>Hero Navigation?</label>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio2" value="1" v-model="formData.isHeroNavigation">
                  <label class="form-check-label" for="inlineRadio2">Yes</label>
              </div>
              <div class="form-check form-check-inline">
                  <input checked=""  class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio2" value="0" v-model="formData.isHeroNavigation">
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
    <b-form-file @change="onFileChange" v-model="file" accept=".jpg, .png" placeholder="Click here to upload image" name="upload image" v-validate="'required'"  :class="['form-group' , errorBag.first('upload image') ? 'is-invalid' : '']"></b-form-file>
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

                errorMessage: '',
                successMessage: '',
                formData: {
                    parentService: '',
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
            }
        },

        props: ['showModalProp'],

        methods: {
            validateBeforeSubmit() {
                console.log(this.formData);
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        this.onSubmit();
                        this.errorMessage = '';
                        return;
                    }
                    this.errorMessage = this.errorBag.all()[0];
                });
            },  
            showModal () {
                this.$refs.myModalRef.show()
            },
            hideModal () {
                this.$refs.myModalRef.hide()
            },
            onHidden() {
                this.$emit('HideModalValue');
            },
            onFileChange(e) {
              var files = e.target.files || e.dataTransfer.files;
              if (!files.length)
                return;
            this.createImage(files[0]);
        },
        createImage(file) {
          var image = new Image();
          var reader = new FileReader();
          var vm = this;

          reader.onload = (e) => {
            vm.image = e.target.result;
        };
        reader.readAsDataURL(file);
    },
    onSubmit() {
        console.log(this.formData);
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
