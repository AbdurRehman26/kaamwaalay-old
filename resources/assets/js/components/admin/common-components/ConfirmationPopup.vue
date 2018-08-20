<template>
    <div>
        <b-modal id="delete-popup" centered @hidden="onHidden"  title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="" ok-only ok-title="Submit" no-close-on-backdrop no-close-on-esc>
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
                url : '',
                data : {}
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
            },submit(){
                let self = this
                self.loading = true
                self.$http.put(self.url,self.data)
                    .then(response => {
                            self.successMessage= response.data.message
                            self.$parent.currentRecord.status = self.data.status
                            setTimeout(function(){
                                self.successMessage=''
                                self.loading = false
                                self.$parent.currentRecord.status = self.data.status
                                self.$parent.actionConfirmation = false
                                self.hideModal()
                            }, 5000);
                    })
                    .catch(error => {
                        self.loading = false
                        self.errorMessage =error.response.data.message[0];
                        setTimeout(function(){
                            self.errorMessage=''
                        }, 5000);
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
            this.url = value
        },
        data(value){
            this.data = value
        }
    },
}

</script>
