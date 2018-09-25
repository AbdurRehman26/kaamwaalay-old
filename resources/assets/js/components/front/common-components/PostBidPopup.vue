<template>  
    <div>

        <b-modal id="post-bid" class="post-bid-form" centered @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Bid on job" hide-footer>
            <form @submit.prevent="validateBeforeSubmit">
                <div class="model-content">
                    <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>        
                    <p>Post a bid on <strong>{{job.title}}</strong> job posted by <strong> {{ job.user | fullName }} </strong></a></p>
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
                                <input v-validate="rules" v-model="submitFormData.amount" placeholder="Bid amount in $" type="number" :class="['form-control', 'form-group' , errorBag.first('amount') ? 'is-invalid' : '']" name="amount"  for="bid_amount"/>
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
                                    <input  value="visit_required" v-model="bidType" type="radio" id="visit_required" name="radio-group">
                                    <label for="visit_required">Visit required to quote (request for visit)</label>  
                                </div>                            </div>
                            </b-col>
                            <b-col v-if="bidType == 'visit_required'" md="6">
                                <div :class="[errorBag.first('preferred date') ? 'is-invalid' : '' , 'form-group', 'custom-datepicker']">
                                    <label>Preferred date and time of visit</label>
                                    <date-picker :not-before="Date.now()" v-validate="'required'" v-model="submitFormData.preferred_date" type="date" format="DD-MM-YYYY" lang="en" name="preferred date"></date-picker>
                                </div>
                            </b-col>
                            <b-col v-if="bidType == 'visit_required'" md="6">
                                <div :class="[errorBag.first('preferred time') ? 'is-invalid' : '' , 'form-group', 'custom-datepicker']">
                                    <label class="nolabel">&nbsp;</label>
                                    <date-picker v-validate="'required'" v-model="submitFormData.preferred_time" lang="en" type="time" format="HH:mm:ss" placeholder="Select Time" name="preferred time"></date-picker>
                                </div>
                            </b-col>
                            <b-col md="12">
                                <label>Proposal Statement</label>
                                <div class="form-group">
                                    <textarea name="description" v-validate="'required|max:500'" :class="[errorBag.first('description') ? 'is-invalid' : '']" v-model="submitFormData.description" class="form-control" placeholder="Start typing your proposal statement"  rows="5"></textarea>
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
            <vue-common-methods @form-error="formError" @form-submitted="formSubmitted" :submitUrl="submitUrl" :formData="submitFormData" :submit="submit"></vue-common-methods>

        </div>
    </template>

    <script>
        import DatePicker from 'vue2-datepicker'

        export default {
            components: { DatePicker },
            props : [
            'showModalProp',
            'job'
            ],

            data() {
                return {
                    bidType : 'visit_required',
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
                rules() {
                    return this.bidType == 'amount_value' ? 'required|max:5' : '';
                }
            },
            methods: {
                validateBeforeSubmit() {
                    let self = this;

                    this.errorMessage = '';

                    this.$validator.validateAll().then((result) => {
                        if (result) {

                            this.submitFormData.job_id = this.job.id;

                            if(this.bidType == 'is_tbd'){
                                this.submitFormData.is_tbd = 1;
                            }

                            if(this.bidType == 'visit_required'){
                                this.submitFormData.is_visit_required = 1;
                            }


                            this.loading = true;
                            this.submit = true;
                            this.errorMessage = ''
                            return;
                        }
                        console.log(this.errorBag.all());
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

                        this.$router.push({ name : 'job.details' , params : { id : this.job.id}});

                    }

                },
                showModal() {
                    this.$refs.myModalRef.show()
                },
                hideModal() {
                    this.$refs.myModalRef.hide()
                },
                onHidden(){
                    this.clearFields();
                    this.errorBag.clear();
                    this.errorMessage = '';
                    this.$emit('HideModalValue');
                },
                clearFields (){
                    this.submitFormData.description = '';
                    this.submitFormData.amount = '';
                    this.submitFormData.amount_type = 'min';
                    this.submitFormData.is_tbd = 0;
                    this.submitFormData.job_id = '';
                    this.submitFormData.preferred_date = '';
                    this.submitFormData.preferred_time = '';
                    this.submitFormData.is_visit_required = 0;                    
                    }
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