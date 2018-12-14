+<template>  
    <div>

        <b-modal id="post-bid" class="post-bid-form" centered @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Bid on job" hide-footer>
            <form @submit.prevent="validateBeforeSubmit">
                <div class="model-content">
                    <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>        
                    <p>Post a bid on <strong>{{ job ? job.title : ''}}</strong> job posted by <strong> {{  job ? job.user : ''  | fullName }} </strong></a></p>
                    <b-row class="justify-content-md-center">
                        <b-col md="1">
                            <label>&nbsp;</label>
                            <div class="custom-circle-radio">
                                <input  value="amount_value" v-model="bidType" type="radio" id="bid_amount" name="radio-group">
                                <label for="bid_amount" class="m-t-5 m-b-5">&nbsp;</label>                                    
                            </div>
                        </b-col>
                        <b-col md="6">
                            <div class="form-group">                                                            
                                <label for="bid_amount">Bid Amount</label>
                                <input  v-validate="{ min_value : 0.1 ,  required: valueRequired , regex: /^([1-9]\d{0,6}|[0-9])(\.\d{1,2})?$/ }" v-model="submitFormData.amount" placeholder="Bid amount in $" :class="['form-control', 'form-group' , errorBag.first('amount') ? 'is-invalid' : '']" name="amount"  for="bid_amount"/>
                                
                            </div>
                        </b-col> 
                        <b-col md="5">
                            <div class="form-group">
                                <label class="nolabel">&nbsp;</label>
                                <select v-model="submitFormData.amount_type" class="form-control">
                                    <option :value="amountType.key" v-for="amountType in amountTypes">
                                        {{amountType.value}}
                                    </option>
                                </select>
                            </div>
                        </b-col>

                        <b-col md="12">
                            <div class="form-group">
                                <div class="custom-circle-radio">
                                    <input value="is_tbd" v-model="bidType" type="radio" id="further_discussion" name="radio-group" checked>
                                    <label for="further_discussion">Further discussion (chat) required to quote</label>   
                                </div>
                            </div>
                        </b-col>
                        <b-col md="12">
                            <div class="form-group">
                                <div class="custom-circle-radio">
                                    <input value="visit_required" v-model="bidType" type="radio" id="visit_required" name="radio-group">
                                    <label for="visit_required">Visit required to quote (request for visit)</label>  
                                </div>                            </div>
                            </b-col>
                            <b-col v-if="bidType == 'visit_required'" md="6">
                                <div :class="[errorBag.first('preferred date') ? 'is-invalid' : '' , 'form-group', 'custom-datepicker']">
                                    <label>Preferred date and time of visit</label>
                                    <datepicker name="preferred date" :disabledDates="disabledDates" v-validate="'required'" v-model="submitFormData.preferred_date" placeholder="Select Date"></datepicker>
                                </div>
                            </b-col>
                            <b-col v-if="bidType == 'visit_required'" md="6">
                                <div :class="[errorBag.first('preferred time') ? 'is-invalid' : '' , 'form-group', 'custom-datepicker']">
                                    <label class="nolabel">&nbsp;</label>
                                    <date-picker :editable="false" v-validate="'required'" v-model="submitFormData.preferred_time" lang="en" type="time" :time-picker-options="{ start: '00:00', step: '00:15', end: '23:30' }" format="hh:mm" placeholder="Select Time" name="preferred time"></date-picker>
                                </div>
                            </b-col>
                            <b-col md="12">
                                <label>Proposal Statement</label>
                                <div class="form-group">
                                    <textarea name="description" v-validate="'required|max:500'" :class="['form-control' , errorBag.first('description') ? 'is-invalid' : '']" v-model="submitFormData.description" placeholder="Start typing your proposal statement"  rows="5"></textarea>
                                </div>           
                            </b-col>
                        </b-row>

                    </div>
                    <footer id="post-bid___BV_modal_footer_" class="modal-footer">
                        <button type="submit" :class="['btn', 'btn-primary',  loading ? 'show-spinner' : '']">
                            Submit
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
                        to: new Date(new Date().getTime() - (1 * 24 * 60 * 60 * 1000)), 
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
                }
            },
            methods: {
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

                }
            },
        }

    </script>