 <template>	
	<div>
		<b-modal id="add-customer-detail" centered  @hidden="onHidden" title-tag="h4" ok-variant="secondary" ref="myModalRef" size="md" title="Parent Service Detail" ok-only ok-title="Submit">
            <alert></alert>
		    	<div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            	<label>First Name</label>
                                    <input class="form-control" type="" name="" placeholder="Enter your First Name">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                        		<label>Last Name</label>
                                    <input class="form-control" type="" name="" placeholder="Enter your Last Name">
                            </div>
                        </div>
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

                                      
		    	</div>
	    </b-modal>
	</div>
</template>

<script>
export default {

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