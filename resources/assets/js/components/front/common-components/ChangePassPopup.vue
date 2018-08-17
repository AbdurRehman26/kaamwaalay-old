<template>	
	<div>
		<b-modal id="change-pass" centered @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Change Password" ok-only ok-title="Submit">
        <alert></alert>
		    <div>

                <b-row class="justify-content-md-center">
                    <b-col cols="1" md="12">
                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" class="form-control" placeholder="Enter old password" name="">
                        </div>
                    </b-col> 
                    <b-col cols="2" md="6">
                        <div class="form-group">
                             <label>New Password</label>
                            <input type="password" class="form-control" placeholder="Create new password" name="">
                        </div>
                    </b-col> 
                    <b-col cols="2" md="6">
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Re-type new password" name="">
                        </div> 
                    </b-col> 
                </b-row>           
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