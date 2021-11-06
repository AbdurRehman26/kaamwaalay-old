+<template>
    <div>

        <b-modal id="post-bid" class="post-bid-form" centered @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Apply on job" hide-footer>
            <form @submit.prevent="validateBeforeSubmit">
                <div class="model-content">
                    <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>
                    <p>Apply on <strong>{{ job ? job.title : ''}}</strong> job posted by <strong> {{  job ? job.user : ''  | fullName }} </strong></a></p>
                    <b-row class="justify-content-md-center">
                            <b-col md="12">
                                <label>Short introduction of yourself</label>
                                <div class="form-group">
                                    <textarea name="introduction" v-validate="'required|max:500'" :class="['form-control' , errorBag.first('introduction') ? 'is-invalid' : '']" v-model="submitFormData.description" placeholder="Start typing your proposal statement"  rows="5"></textarea>
                                </div>
                            </b-col>
                        </b-row>

                    </div>
                    <footer id="post-bid___BV_modal_footer_" class="modal-footer">
                        <button type="submit" :class="['btn', 'btn-primary',  loading ? 'show-spinner' : '']">
                            Confirm
                            <loader></loader>
                        </button>
                    </footer>
                </form>
            </b-modal>
            <vue-common-methods :updateForm="updateForm" @form-error="formError" @form-submitted="formSubmitted" :submitUrl="submitUrl" :formData="submitFormData" :submit="submit"></vue-common-methods>

        </div>
    </template>

    <script>
        import DatePicker from 'vue2-datepicker'
        import Datepicker from 'vuejs-datepicker';

        export default {
            components: { DatePicker, Datepicker },
            props : [
            'showModalProp',
            'job',
            'bid',
            ],
            mounted () {
                if(this.bid){

                    this.setBidData();

                }
            },
            data() {
                return {

                    disabledDates: {
                        to: this.getPrevDate(),
                    },
                    updateForm : false,
                    bidType : 'amount_value',
                    date:'',
                    amountTypes : [
                    {
                        key : 'min',
                        value : 'Minimum'
                    },
                    {
                        key : 'max',
                        value : 'Maximum'
                    }
                    ],
                    successMessage : '',
                    errorMessage : '',
                    submitFormData : {
                        description : '',
                        amount : '',
                        amount_type : 'min',
                        is_tbd : 0,
                        job_id : '',
                        preferred_date : '',
                        preferred_time : '',
                        is_visit_required : 0
                    },
                    submit : false,
                    url : 'api/job-bid',
                    loading : false,
                    shortcuts: [
                    {
                        text: 'Today',
                        onClick: () => {
                            this.time3 = [ new Date(), new Date() ]
                        }
                    }
                    ],
                    timePickerOptions:{
                        start: '00:00',
                        step: '00:30',
                        end: '23:30'
                    }
                }
            },
            computed : {

                submitUrl(){
                    return this.url;
                },
                valueRequired (){
                    let self = this;
                    self.errorMessage = '';
                    setTimeout(function () {
                        Vue.nextTick(() => {
                            self.errorBag.clear()
                        })

                    }, 100);

                    return this.bidType == 'amount_value';
                },

                isVisitRequired() {
                    if(typeof(this.job) != "undefined") {
                        var isVisit = this.job.my_bid? this.job.my_bid.is_visit_required : false;
                        return isVisit? (this.job.my_bid.is_visit_required == 1? true:false) : false;
                    }
                    return false;
                },
            },
            methods: {
                getPrevDate() {
                    var h = new Date().getHours();
                    h = (h+1) > 24? 24 : (h+1);
                    var prevDate = (h * 60 * 60 * 1000);
                    return new Date(new Date().getTime() - prevDate);
                },
                setBidData (){
                    this.updateForm = true;

                    this.submitFormData = JSON.parse(JSON.stringify(this.bid));

                    this.url = 'api/job-bid/'+ this.bid.id;
                    if(this.bid.is_tbd){
                        this.submitFormData.amount = '';
                        this.bidType = 'is_tbd';
                    }else if(this.bid.is_visit_required){
                        this.submitFormData.amount = '';
                        this.bidType = 'visit_required';
                    }else{
                        this.bidType = 'amount_value';
                    }



                },
                validateBeforeSubmit() {
                    let self = this;

                    this.errorMessage = '';

                    this.$validator.validateAll().then((result) => {
                        if (result) {
                            this.submitFormData.is_tbd = 0;
                            this.submitFormData.is_visit_required = 0;

                            this.submitFormData.job_id = this.job.id;

                            if(this.bidType == 'is_tbd'){
                                this.submitFormData.is_tbd = 1;
                            }

                            if(this.bidType == 'visit_required'){


                                this.submitFormData.is_visit_required = 1;
                            }

                            if(this.bidType != 'visit_required'){
                                this.submitFormData.preferred_time = null;
                                this.submitFormData.preferred_date = null;
                            }


                            this.loading = true;
                            this.submit = true;
                            this.errorMessage = ''
                            return;
                        }
                        this.errorMessage = this.errorBag.all()[0];
                    });
                },
                formError(error){
                    this.errorMessage = 'You have already posted a bid for this job';
                    this.loading = false;
                    this.submit = false;
                },
                formSubmitted(response){
                    if(response.data){

                        this.loading = false;
                        this.submit = false;

                        this.$router.push({ name : 'job.details' , params : { id : this.job.id}});
                        this.hideModal();
                        this.$emit('bid-created');
                    }

                },
                showModal() {
                    this.$refs.myModalRef.show()
                },
                hideModal() {
                    this.loading = false;
                    this.submit = false;

                    this.$refs.myModalRef.hide()
                },
                onHidden(){
                    this.clearFields();
                    this.errorBag.clear();
                    this.errorMessage = '';
                    this.$emit('HideModalValue');
                },
                clearFields (){
                    let self = this;
                    this.submitFormData.description = '';
                    this.submitFormData.amount = '';
                    this.submitFormData.amount_type = 'min';
                    this.submitFormData.is_tbd = 0;
                    this.submitFormData.job_id = '';
                    this.submitFormData.preferred_date = '';
                    this.submitFormData.preferred_time = '';
                    this.submitFormData.is_visit_required = 0;
                    this.bidType = 'amount_value';

                    setTimeout(function () {
                        Vue.nextTick(() => {
                            self.errorBag.clear()
                        })

                    }, 100);

                }
            },
            watch:{
                bid (value){
                    if(value){
                        this.setBidData();
                    }
                },
                showModalProp(value){
                    if(value){
                        this.showModal();
                    }
                    if(!value){
                        this.hideModal();
                    }

                },
                submitFormData: {
                  handler: function(val, oldVal) {
                    if(val.preferred_time) {
                        this.submitFormData.preferred_time =  moment(val.preferred_time).format();
                    }
                },
                deep: true
            }
            },
        }

    </script>
