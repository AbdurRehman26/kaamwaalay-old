<template>
    <div>
        <b-modal id="status-user-confirm" centered @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Confirmation" ok-title="Yes" ok-only>
           <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>  
           <div>
            <p>Please make sure you have paid the <strong>{{($parent.record.awardedBid && $parent.record.awardedBid.service_provider) ?  $parent.record.awardedBid.service_provider.business_name : 'Service Provider'}}</strong></p>
        </div>
        <div slot="modal-footer" class="w-100 frontfix">
            <div class="row">
                <button @click.prevent="onSubmit" :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' , 'apply-primary-color' ,'col-sm-3', ]">Confirm
                    <loader></loader>
                </button>
            </div>
        </div>        
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
            onSubmit(){
                let self = this
                let data = {
                    status : 'completed',
                    id : self.$parent.record ? self.$parent.record.id : '',
                };

                self.loading = true
                self.$http.put('api/job/'+ data.id,data)
                .then(response => {
                    self.successMessage= response.data.message
                    //self.$parent.currentRecord.status = self.requestData.status
                    this.$parent.record.status = data.status;
                    setTimeout(function(){
                        self.successMessage=''
                        self.loading = false
                        // self.$parent.currentRecord.status = self.requestData.status
                        // self.$parent.actionConfirmation = false
                        self.hideModal()
                        self.$parent.showReviewForm = true;
                        //self.$router.push({name: 'job.details' , params : { id : data.job_id }});
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
