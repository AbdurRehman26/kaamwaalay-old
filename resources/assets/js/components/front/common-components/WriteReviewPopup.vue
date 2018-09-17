<template>  
    <div>
        <b-modal class="write-review-popup" id="write-review" centered @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Write Review">
            <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>
            <div>
                <p>Write review and provide your feedback on 
                    <strong>{{job ? job.title : ''}}</strong>  performed by 
                    <strong>{{job && job.awarded_to &&  job.awarded_to.business_details ? job.awarded_to.business_details.business_name : ''}}</strong>
                </p>
                
                <b-row class="justify-content-md-center">
                    <b-col md="12" sm="12">
                        <div class="form-group">
                            <label>Overall Service Rating</label>
                            <star-rating v-validate="'required'" v-model="submitFormData.rating" :star-size="20" :rating="submitFormData.rating" active-color="#8200ff"></star-rating>    
                        </div>

                        <div class="form-group">
                            <label>Review</label>
                            <textarea v-model="submitFormData.message" class="form-control" placeholder="Start typing your review" rows="5"></textarea>
                        </div>
                    </b-col>
                </b-row>
            </div>

            <div slot="modal-footer" class="w-100">
                <button @click.prevent="submitForm" 
                :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' , 'apply-primary-color']">Submit
                <loader></loader>
            </button>
        </div>


        <vue-common-methods @form-error="formError" @form-submitted="formSubmitted" :submitUrl="requestUrl" :formData="submitFormData" :submit="submit">
        </vue-common-methods>


    </b-modal>
</div>
</template>

<script>
    import StarRating from 'vue-star-rating';
    export default {

        props : ['showModalProp', 'job'],
        data(){
            return {
                submitFormData : {
                    rating : 0,
                    message : '',
                    status : 'approved'
                },
                submit : false,
                requestUrl : 'api/user-rating',
                loading : false,
                errorMessage : false,
                successMessage : false,

            }
        },
        methods: {
            submitForm(){
                this.errorMessage = '';
                if(!this.submitFormData.rating){
                    this.errorMessage = 'You need to rate in order to submit form';
                    return false;
                }

                this.submit = true;
                this.loading = true;
                this.submitFormData.job_id = this.job ? this.job.id : '';
                this.submitFormData.user_id = this.job && this.job.awarded_to ? this.job.awarded_to.id : '';
            },
            formSubmitted(response){
                let self = this;
                self.$emit('review-sent');
                self.successMessage = response.message;

                setTimeout(function () {
                    self.successMessage = '';
                    self.hideModal();
                    self.loading = false;
                }, 2000);
            },
            formError(error){
                let self = this;

                self.loading = false;
                self.submit = false;


                self.errorMessage =  'You have already provided the review';
                // let errors = error.response.data;
                // _.forEach(errors, function(value, key) {
                //     return false;
                // });

            },
            showModal() {
                this.$refs.myModalRef.show()
            },
            hideModal() {
                this.$refs.myModalRef.hide()
            },
            onHidden(){
                this.errorMessage = '';


                this.submitFormData.rating  = 0;
                this.submitFormData.message  = '';
                this.submitFormData.status  = 'approved';

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

            },
        },
        components: {
            StarRating
        },    
    }

</script>