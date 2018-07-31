 <template>	
	<div>
		<b-modal id="add-new-service" centered  @hidden="onHidden" title-tag="h4" ok-variant="secondary" ref="myModalRef" size="md" title="Add new Service" ok-only ok-title="Submit">
            <alert></alert>
		    	<div>
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
                        <select class="form-control">
                            <option value="" selected="" disabled="">Select Service Name</option>
                            <option value="">Full Access</option>
                            <option value="">Review Process Only</option>
                        </select>
                    </div>

                    <div class="form-group">
                		<label>Is Featured</label>
                        <select class="form-control">
                            <option value="" selected="" disabled="">Is Featured?</option>
                            <option value="">Yes</option>
                            <option value="">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                		<label>Hero Navigation</label>
                		<select class="form-control">
                			<option value="" selected="" disabled="">Select Hero Navigation</option>
                			<option value="">Yes</option>
                			<option value="">No</option>
                		</select>
                    </div> 

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="5"></textarea>
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

                                   
		    	</div>
	    </b-modal>
	</div>
</template>

<script>
export default {
    data () {
        return {
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