<template>	
	<div>
		<b-modal id="delete-popup" centered @hidden="onHidden"  title-tag="h4" ok-variant="secondary" ref="myModalRef" size="sm" title="Delete" ok-only ok-title="Submit">
        <alert></alert>
		    <div>
		        <p>Your account has been deleted</p>
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