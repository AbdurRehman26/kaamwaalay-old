<template> 
    <div class="popup categories-popup">
        <b-modal id="visit-request" centered hide-footer @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Parent Service Detail">
            <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>        
            <div class="category-selected">
                <i @click="onHidden" class="icon-close2"></i>
                <div class="category-image-block" :style="'background-image:url('+jobImage+');'">
                </div>
                <div class="category-content-block">

                    <h6 v-if="typeof(bid) !== 'undefined'">{{ bid ? bid.service_provider.business_name : ''}} Requested to visit your address to evaluate work before bidding.</h6>

                </div>
            </div>
            <div class="category-search-field">
                <h6>Are you sure you want to accept visit request?</h6>
                <p>If you accept, your contact details and address will be shared with the service provider.</p>
                <button @click.prevent="loadingAccept = true; submit = true; submitFormData.status='visit_allowed'" type="submit" :class="['btn', 'btn-primary',  loadingAccept ? 'show-spinner' : '']">
                    Yes, allow visit
                    <loader></loader>
                </button>
                <button @click.prevent="loadingReject = true; submit = true; submitFormData.status='rejected'" type="submit" :class="['btn', 'btn-primary',  loadingReject ? 'show-spinner' : '']">
                    No, decline request
                    <loader></loader>
                </button>
            </div>

        </b-modal>
        <vue-common-methods :updateForm="true" @form-error="formError" @form-submitted="formSubmitted" :submitUrl="submitUrl" :formData="submitFormData" :submit="submit">
        </vue-common-methods>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                submit : false,
                loadingAccept : false,
                loadingReject : false,
                errorMessage : false,
                successMessage : false,
                url : '',
                submitFormData : ''
            }
        },

        props: [
        'showModalProp',
        'job',
        'bid'
        ],
        mounted () {


        },
        methods: {
            formError(error){
                this.errorMessage = 'You have already posted a bid for this job';
                this.loadingAccept = false;
                this.loadingReject = false;
                this.submit = false;
            },
            formSubmitted(response){
                if(response.data){

                    this.loadingAccept = false;
                    this.loadingReject = false;
                    this.submit = false;

                    this.$router.push({ name : 'job.details' , params : { id : this.job.id}});
                    this.hideModal();
                    this.$emit('bid-updated');

                }

            },
            showModal () {
                this.$refs.myModalRef.show()
            },
            hideModal () {
                this.$refs.myModalRef.hide()
            },
            onHidden() {
                this.$emit('HideModalValue');
            },
            categorydetail(){
                this.$router.push({name: 'Explore_Detail'});
            }
        },
        computed : {
            submitUrl(){
                if(this.bid){
                    return  this.url  = 'api/job-bid/'+ this.bid.id;
                }

            },
            jobImage(){
                if(this.job){
                    return this.job.jobImages.length ? this.job.jobImages[0] : 'images/dummy/image-placeholder.jpg'; 
                }
            }
        },
        watch: {
            bid(value){
                this.submitFormData = JSON.parse(JSON.stringify(value));
            },

            showModalProp(value) {
                if(value) {
                    this.showModal();
                }
                if(!value) {
                    this.hideModal();
                }
            }
        },
    }
</script>