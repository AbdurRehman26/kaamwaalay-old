<template>	
	<div>
		<b-modal id="change-pass" centered @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Change Password" ok-only ok-title="Submit">
        <alert></alert>
		    <div>
		        <label>Old Password</label>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Enter old password" name="">
                    </div>
                <label>New Password</label>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Create new password" name="">
                    </div>
                <label>Confirm Password</label>
                    <div class="form-group mb-0">
                        <input type="password" class="form-control" placeholder="Re-type new password" name="">
                    </div>            
		    </div>
	    </b-modal>
	</div>
</template>

<script>

export default {

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
   watch:{
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