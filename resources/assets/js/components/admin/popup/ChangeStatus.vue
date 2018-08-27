<template>
	<div>
		<b-modal id="status-user-change" centered @hidden="onHidden"  title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Change User Status" ok-only ok-title="Submit">
        <alert></alert>
		    <div>
		        <label>Account Status</label>
		        <b-form-select v-model="selected" :options="options"/>
		    </div>
	    </b-modal>
	</div>
</template>

<script>

export default {
	data () {
    return {
	    selected: null,
		    options: [
		        { value: null, text: 'Active' },
		        { value: 'b', text: 'Deactive' },
      		]
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
