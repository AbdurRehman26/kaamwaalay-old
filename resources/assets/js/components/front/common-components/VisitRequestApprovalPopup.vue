<template> 
    <div class="popup categories-popup">
        <b-modal id="visit-request" centered hide-footer @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Suggested date & time Accept/Decline">
            <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>
            <div class="category-search-field">
                <h6>Are you sure you want to accept the suggested date & time: {{getDateTime()}} provided by the customer?</h6>
                <p>If you accept, you may visit the location of the customer to understand about the {{job.title}} that has been posted.</p>
                <button :disabled="disableButtons" @click.prevent="disableButtons = true; loadingAccept = true; submit = true; submitFormData.status='visit_allowed'" type="submit" :class="['btn', 'btn-primary',  loadingAccept ? 'show-spinner' : '']">
                    Accept
                    <loader></loader>
                </button>
                <button :disabled="disableButtons" @click.prevent="disableButtons = true; loadingReject = true; submit = true; submitFormData.status='rejected'" type="submit" :class="['btn', 'btn-primary',  loadingReject ? 'show-spinner' : '']">
                    Decline
                    <loader></loader>
                </button>
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
            getDateTime() {
                return moment(this.submitFormData.suggested_date).format('MMM Do, YYYY') +" "+ moment(this.submitFormData.suggested_time, 'HH:mm:ss').format('h:mm A');
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
        },
        watch: {
            bid(value){
                this.submitFormData = JSON.parse(JSON.stringify(value));
            },

            showModalProp(value) {
                this.submitFormData = JSON.parse(JSON.stringify(this.bid));
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