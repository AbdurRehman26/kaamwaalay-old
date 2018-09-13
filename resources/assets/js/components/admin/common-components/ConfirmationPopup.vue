<template>
    <div>
        <b-modal id="delete-popup" centered @hidden="onHidden"  title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Confirmation" ok-only ok-title="Submit" no-close-on-backdrop no-close-on-esc>
            <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>  
            <div>
                <p>Are you sure you want to perform this action?</p>
            </div>
            <div slot="modal-footer" class="w-100">
                <button @click.prevent="submit" :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' , 'apply-primary-color' ,'col-sm-3' ]">Submit
                    <loader></loader>
                </button>
            </div>
        </b-modal>
    </div>
</template>

<script>

    export default {

        props : ['showModalProp','url','data'],
        data () {
            return {
                records : [],
                pagination : '',
                errorMessage: '',
                successMessage: '',
                loading: false,
                requestUrl : '',
                requestData : {}
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
                this.$parent.actionConfirmation = false
            },
            submit(){
                let self = this
                self.loading = true
                self.$http.put(self.requestUrl,self.requestData)
                .then(response => {
                    self.successMessage= response.data.message
                    self.$parent.currentRecord.status = self.requestData.status
                    setTimeout(function(){
                        self.successMessage=''
                        self.loading = false
                        self.$parent.currentRecord.status = self.requestData.status
                        self.$parent.actionConfirmation = false
                        self.hideModal()
                    }, 2000);
                })
                .catch(error => {
                    self.loading = false
                    self.errorMessage =error.response.data.message[0];
                    setTimeout(function(){
                        self.errorMessage=''
                    }, 2000);
                })
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

            },
            url(value){
                this.requestUrl = value
            },
            data(value){
                this.requestData = value
            }
        },
    }

</script>
