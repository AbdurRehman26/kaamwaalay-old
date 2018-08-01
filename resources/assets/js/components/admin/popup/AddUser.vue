 <template>
	<div>
		<b-modal id="add-new-user" centered @hidden="onHidden" title-tag="h4" ok-variant="secondary" ref="myModalRef" size="sm" title="Add new User" ok-only ok-title="Submit">
            <alert></alert>
		    	<div>
                    <div class="form-group">
                    	<label>First Name</label>
                        <input type="text" class="form-control" placeholder="Enter first name" name="">
                    </div>

                    <div class="form-group">
                		<label>Last Name</label>
                        <input type="text" class="form-control" placeholder="Enter last name" name="">
                    </div>

                    <div class="form-group">
                		<label>Email Address</label>
                        <input type="text" class="form-control" placeholder="Enter email address" name="">
                    </div>

                    <div class="form-group">
                		<label>Access Level</label>
                		<select class="form-control">
                			<option value="" selected="" disabled="">Select Access Level</option>
                			<option value="">Full Access</option>
                			<option value="">Review Process Only</option>
                		</select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control">
                            <option value="" selected="" disabled="">Select Status</option>
                            <option value="">Active</option>
                            <option value="">Deactive</option>
                        </select>
                    </div>
		    	</div>
	    </b-modal>
	</div>
</template>

<script>

export default {
	data () {

    return {
		    selected: null,
    	}
  	},

	props : ['showModalProp'],
	    methods: {
        showModal() {
            this.$refs.myModalRef.show()
        },
        hideModal() {
            this.$refs.myModalRef.hide()
        },
        onHidden(){
            this.$emit('HideModalValue');
        },
    },

    watch: {
        showModalProp(value){

            if(value){
                this.showModal();
            }
            if(!value){
                this.hideModal();
            }

        }
    },

}

</script>
