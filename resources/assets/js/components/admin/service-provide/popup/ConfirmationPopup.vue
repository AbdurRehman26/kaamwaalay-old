<template>
    <div>
        <b-modal id="status-user-confirm" centered @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Confirmation" ok-title="Yes" ok-only>
           <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>  
           <div>
            <p>Are you sure you want to confirm this action?</p>
        </div>
        <div slot="modal-footer" class="w-100 frontfix">
            <button @click.prevent="submitForm" :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' , 'apply-primary-color' ,'col-sm-3' ]">Submit
                <loader></loader>
            </button>
        </div>
        <vue-common-methods :updateForm="true" @form-error="formError" @form-submitted="formSubmitted" :submitUrl="requestUrl" :formData="submitFormData" :submit="submit">
        </vue-common-methods>
    </b-modal>
</div>
</template>

<script>

    export default {
        props : [
        'showModalProp',
        'requestUrl',
        'submitFormData'
        ],
        data () {
            return {
                submit : false,
                loading : false,
                errorMessage : false,
                successMessage : false,
            }  
        },
        methods: {
            submitForm(){
                this.submit = true;
                this.loading = true;
            },
            formSubmitted(response){
                let self = this;
                

                self.successMessage = response.message;
                self.$emit('form-updated')
                self.$emit('form-submitted')
                setTimeout(function () {
                    self.successMessage = '';
                    self.hideModal();
                    self.submit = false;
                    self.loading = false;
                }, 2000);
            },
            formError(error){
                this.errorMessage = error;
            },
            StatusChange(){
                this.changestatus = true;
            },
            showModal() {
                this.$refs.myModalRef.show()
            },
            hideModal() {
                this.$refs.myModalRef.hide();
                this.changestatus = false;
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
