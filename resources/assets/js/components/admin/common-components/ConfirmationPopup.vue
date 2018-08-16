<template>
    <div>
        <b-modal id="delete-popup" centered @hidden="onHidden"  title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Warning" ok-only ok-title="Submit" @ok.prevent="submit" no-close-on-backdrop no-close-on-esc>
            <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>  
            <div>
                <p>Are you sure you want to perform this action?</p>
            </div>
        </b-modal>
    </div>
</template>

<script>

export default {

    props : ['showModalProp'],
        data () {
            return {
                records : [],
                pagination : '',
                errorMessage: '',
                successMessage: '',
            }  
        },
        methods: {
            showModal() {
                this.$refs.myModalRef.show()
            },
            hideModal() {
                this.$refs.myModalRef.hide()
            },
            onHidden(){
                this.$emit('HideModalValue');
            },submit(){
                let self = this
                self.$parent.update()
                self.errorMessage = self.$parent.errorMessage
                self.successMessage = self.$parent.successMessage
                setTimeout(function(){
                    self.successMessage='';
                    self.errorMessage='';
                    self.$parent.actionConfirmation = false;
                    self.hideModal()
                }, 5000);
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
