 <template>
	<div>
		<b-modal id="add-new-service" centered  @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="md" title="Add new Service" ok-only ok-title="Submit">
                        <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>        
		    	<div>
                    <form action="" method="">
                    <div class="form-group">
                    	<label>Parent Service</label>
                        <select class="form-control">
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
                        <input type="text" name="" class="form-control" placeholder="Enter service name">
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group radio-group-row">
                                <label>Is Featured?</label>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                      <label class="form-check-label" for="inlineRadio1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input checked=""  class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                      <label class="form-check-label" for="inlineRadio1">No</label>
                                    </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group radio-group-row">
                                <label>Hero Navigation?</label>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio2" value="option1">
                                      <label class="form-check-label" for="inlineRadio2">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input checked=""  class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio2" value="option1">
                                      <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="5" placeholder="Enter description"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Upload Image</label>
                         <b-form-file @change="onFileChange" v-model="file" accept=".jpg, .png" placeholder="Click here to upload image"></b-form-file>
                        <div class="uploded-picture">
                            <img :src="image" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label>URL</label>
                        <input type="text" class="form-control" placeholder="Enter url" name="">
                    </div>
                    </form>

		    	</div>
	    </b-modal>
	</div>
</template>

<script>
export default {
    data () {
        return {
            errorMessage : '',
            successMessage : '',
            emailaddress: 'arsalan@cygnismedia.com',
            fullname: 'Arsalan Akhtar',
            image: 'images/dummy/user-pic.jpg',
            file: null,
        }
    },

    props: ['showModalProp'],

    methods: {
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
