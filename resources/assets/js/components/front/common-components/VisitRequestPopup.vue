<template> 
    <div class="popup categories-popup">
        <b-modal id="visit-request" centered hide-footer @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Visit Request Approval/Rejection">
            <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>        
            <div class="category-selected">
                <div class="category-image-block" :style="'background-image:url('+jobImage+');'">
                </div>
                <div class="category-content-block">

                    <h6 v-if="typeof(bid) !== 'undefined'">{{ bid ? bid.service_provider.business_name : ''}} Requested to visit your address to evaluate work before bidding.</h6>

                </div>
            </div>
            <div class="category-search-field">
                <h6>Are you sure you want to accept visit request?</h6>
                <p>If you accept, your contact details and address will be shared with the service provider.</p>
                <button :disabled="disableButtons" @click.prevent="disableButtons = true; loadingAccept = true; submit = true; submitFormData.status='visit_allowed'" type="submit" :class="['btn', 'btn-primary',  loadingAccept ? 'show-spinner' : '']">
                    Yes, allow visit
                    <loader></loader>
                </button>
                <button :disabled="disableButtons" @click.prevent="disableButtons = true; loadingReject = true; submit = true; submitFormData.status='rejected'" type="submit" :class="['btn', 'btn-primary',  loadingReject ? 'show-spinner' : '']">
                    No, decline request
                    <loader></loader>
                </button>
                <button :disabled="disableButtons" @click.prevent="showSuggestDateTime = !showSuggestDateTime;" type="submit" :class="['mt-2 btn', 'btn-primary btn-block',  loadingReject ? 'show-spinner' : '']">
                    Suggest Another Time
                    <loader></loader>
                </button>
            </div>
            <hr v-if="showSuggestDateTime">
            <div class="row mt-3" v-if="showSuggestDateTime">
                <div class="col-md-6">
                    <div :class="[errorBag.first('preferred date') ? 'is-invalid' : '' , 'form-group', 'custom-datepicker']">
                        <label>Sugested date and time of visit</label>
                        <datepicker name="preferred date" :disabledDates="disabledDates" v-validate="'required'" v-model="submitFormData.suggested_date" placeholder="Select Date"></datepicker>
                    </div>
                </div>
                <div class="col-md-6">
                    <div :class="[errorBag.first('preferred time') ? 'is-invalid' : '' , 'form-group', 'custom-datepicker']">
                        <label class="nolabel">&nbsp;</label>
                        <date-picker :editable="false" v-validate="'required'" v-model="submitFormData.suggested_time" lang="en" type="time" :time-picker-options="{ start: '00:00', step: '00:15', end: '23:30' }" format="hh:mm" placeholder="Select Time" name="preferred time"></date-picker>
                    </div>
                </div>
                <div class="col-md-6">
                    <button @click.prevent="validateBeforeSubmit" type="button" :class="['btn', 'btn-primary',  loadSubmitDateTimeSuggestion ? 'show-spinner' : '']">
                        Submit
                        <loader></loader>
                    </button>
                </div>
            </div>
        </b-modal>
        <vue-common-methods :updateForm="true" @form-error="formError" @form-submitted="formSubmitted" :submitUrl="submitUrl" :formData="submitFormData" :submit="submit">
        </vue-common-methods>
    </div>
</template>

<script>

    import DatePicker from 'vue2-datepicker'
    import Datepicker from 'vuejs-datepicker';

    export default {
        components: { DatePicker, Datepicker },
        data () {
            return {
                disabledDates: {
                    to: new Date(new Date().getTime() - (1 * 24 * 60 * 60 * 1000)), 
                },
                submit : false,
                loadingAccept : false,
                loadingReject : false,
                loadSubmitDateTimeSuggestion : false,
                errorMessage : false,
                successMessage : false,
                url : '',
                submitFormData : '',
                disableButtons : false,
                showSuggestDateTime: false,
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
            validateBeforeSubmit() {
                let self = this;

                this.errorMessage = '';

                this.$validator.validateAll().then((result) => {
                    if (result) {
                        this.disableButtons = true;
                        this.submitFormData.status = 'suggested_time';
                        this.loadSubmitDateTimeSuggestion = true;
                        this.submit = true;
                        this.errorMessage = ''
                        return;
                    }
                    this.errorMessage = this.errorBag.all()[0];
                });
            },
            formError(error){
                this.errorMessage = 'You have already posted a bid for this job';
                this.loadingAccept = false;
                this.loadingReject = false;
                this.loadSubmitDateTimeSuggestion = false;
                this.submit = false;
            },
            formSubmitted(response){
                this.disableButtons = false;
                this.loadingAccept = false;
                this.loadingReject = false;
                this.loadSubmitDateTimeSuggestion = false;
                this.submit = false;

                this.$router.push({ name : 'job.details' , params : { id : this.job.id}});
                this.hideModal();
                this.$emit('bid-updated');

                
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