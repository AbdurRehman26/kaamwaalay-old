<template>
	<div>
		<b-modal id="delete-popup" centered @hidden="onHidden"  title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Warning" ok-only ok-title="Submit" no-close-on-backdrop no-close-on-esc>
		    <div>
		        <p>Are you sure you want to delete this item?</p>
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
