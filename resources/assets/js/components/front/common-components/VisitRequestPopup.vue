<template> 
    <div class="popup categories-popup">
        <b-modal id="visit-request" centered hide-footer @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Visit Request Approval/Rejection">
            <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>        
            <div class="category-selected">
                <div class="category-image-block" :style="'background-image:url('+jobImage+');'">
                </div>
                <div class="category-content-block">

                    <h6 v-if="typeof(bid) !== 'undefined'">
                        {{ bid ? bid.service_provider.business_name : ''}} Requested to visit your address to evaluate work before bidding on Date: {{getDate()}} on Time: {{getTime()}}
                    </h6>

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
                        <select class="form-control" id="sel1" v-validate="'required'" v-model="submitFormData.suggested_time" name="preferred time">
                            <option value="" disabled="">Select Time</option>
                            <option v-for="h in timeHr" :value="h">{{h}}</option>
                        </select>
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
                timeHr: [
                '01:00 AM', '01:15 AM', '01:30 AM', '01:45 AM',
                '02:00 AM', '02:15 AM', '02:30 AM', '02:45 AM',
                '03:00 AM', '03:15 AM', '03:30 AM', '03:45 AM',
                '04:00 AM', '04:15 AM', '04:30 AM', '04:45 AM',
                '05:00 AM', '05:15 AM', '05:30 AM', '05:45 AM',
                '06:00 AM', '06:15 AM', '06:30 AM', '06:45 AM',
                '07:00 AM', '07:15 AM', '07:30 AM', '07:45 AM',
                '08:00 AM', '08:15 AM', '08:30 AM', '08:45 AM',
                '09:00 AM', '09:15 AM', '09:30 AM', '09:45 AM',
                '10:00 AM', '10:15 AM', '10:30 AM', '10:45 AM',
                '11:00 AM', '11:15 AM', '11:30 AM', '11:45 AM',
                '12:00 AM', '12:15 AM', '12:30 AM', '12:45 AM', 

                '01:00 PM', '01:15 PM', '01:30 PM', '01:45 PM',
                '02:00 PM', '02:15 PM', '02:30 PM', '02:45 PM',
                '03:00 PM', '03:15 PM', '03:30 PM', '03:45 PM',
                '04:00 PM', '04:15 PM', '04:30 PM', '04:45 PM',
                '05:00 PM', '05:15 PM', '05:30 PM', '05:45 PM',
                '06:00 PM', '06:15 PM', '06:30 PM', '06:45 PM',
                '07:00 PM', '07:15 PM', '07:30 PM', '07:45 PM',
                '08:00 PM', '08:15 PM', '08:30 PM', '08:45 PM',
                '09:00 PM', '09:15 PM', '09:30 PM', '09:45 PM',
                '10:00 PM', '10:15 PM', '10:30 PM', '10:45 PM',
                '11:00 PM', '11:15 PM', '11:30 PM', '11:45 PM',
                '12:00 PM', '12:15 PM', '12:30 PM', '12:45 PM'
                ],
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
            getDate() {
                if(this.bid) {
                    return moment(this.bid.preferred_date).format('MMM Do, YYYY');
                }
            },
            getTime() {
                if(this.bid) {
                    return moment(this.bid.preferred_time, 'HH:mm:ss').format('h:mm A');
                }
            },
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