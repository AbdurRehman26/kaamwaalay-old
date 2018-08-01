 <template>	
	<div>
		<b-modal id="view-service-detail" centered  @hidden="onHidden" title-tag="h4" ok-variant="secondary" ref="myModalRef" size="sm" title="View Service Detail" ok-only ok-title="Submit">
            <alert></alert>
		    	<div>
                    <div class="form-group">
                    	<label>Featured Service</label>
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