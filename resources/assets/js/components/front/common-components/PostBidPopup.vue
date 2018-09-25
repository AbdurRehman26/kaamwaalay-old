<template>  
    <div>
        <b-modal id="post-bid" class="post-bid-form" centered @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Bid on job" hide-footer>
            <form>
                <div class="model-content">
                    <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>        
                    <p>Post a bid on <strong>{{job.title}}</strong> job posted by <strong> {{ job.user | fullName }} </strong></a></p>
                    <b-row class="justify-content-md-center">
                        <b-col md="1">
                            <label>&nbsp;</label>
                            <div class="custom-circle-radio">
                                <input type="radio" id="bid_amount" name="radio-group">
                                <label for="bid_amount" class="m-t-5 m-b-5">&nbsp;</label>                                    
                            </div>
                        </b-col>
                        <b-col md="6">
                            <div class="form-group">                                                            
                                <label for="bid_amount">Bid Amount</label>
                                <input type="number" name="" class="form-control"  for="bid_amount"/>
                            </div>
                        </b-col> 
                        <b-col md="5">
                            <div class="form-group">
                                <label class="nolabel">&nbsp;</label>
                                <select class="form-control">
                                    <option :value="amountType.key" v-for="amountType in amountTypes">
                                        {{amountType.value}}
                                    </option>
                                </select>
                            </div>
                        </b-col>

                        <b-col md="12">
                            <div class="form-group">
                                <div class="custom-circle-radio">
                                    <input type="radio" id="further_discussion" name="radio-group" checked>
                                    <label for="further_discussion">Further discussion (chat) required to quote</label>   
                                </div>
                            </div>
                        </b-col>
                        <b-col md="12">
                            <div class="form-group">
                                <div class="custom-circle-radio">
                                    <input type="radio" id="visit_required" name="radio-group">
                                    <label for="visit_required">Visit required to quote (request for visit)</label>  
                                </div>                            </div>
                            </b-col>
                            <b-col md="6">
                                <div class="form-group custom-datepicker">
                                    <label>Preferred date and time of visit</label>
                                    <date-picker v-model="value" type="date" format="DD-MM-YYYY" lang="en"></date-picker>
                                </div>
                            </b-col>
                            <b-col md="6">
                                <div class="form-group custom-datepicker custom-timepicker">
                                    <label class="nolabel">&nbsp;</label>
                                    <date-picker v-model="value12" lang="en" type="time" format="HH:mm:ss" placeholder="Select Time"></date-picker>
                                </div>
                            </b-col>
                            <b-col md="12">
                               <label>Proposal Statement</label>
                               <div class="form-group">
                                <textarea class="form-control" placeholder="Start typing your proposal statement" name="" rows="5"></textarea>
                            </div>           
                        </b-col>
                    </b-row>

                </div>
                <footer id="post-bid___BV_modal_footer_" class="modal-footer">
                    <button type="button" class="btn btn-primary">
                        Submit 
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
                    user_details : {

                    }
                },
                submit : false,
                url : 'api/job-bid',
                loading : false,

                value: '', 
                value12:'',
                value_month:'',
                value_year:'',
                time1: '',
                time2: '',
                time3: '',
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
            }
        },
        methods: {
            formError(error){
                this.loading = false;
                this.submit = false;
            },
            formSubmitted(response){
                this.$router.push({ name : 'my.bids'});
            },
            showModal() {
                this.$refs.myModalRef.show()
            },
            hideModal() {
                this.$refs.myModalRef.hide()
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