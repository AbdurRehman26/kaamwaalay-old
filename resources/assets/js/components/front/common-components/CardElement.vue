<template>
    <div>
        <b-modal  v-show='isPopup' v-if='isPopup' id="urgent-job" centered @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" :title="cardTitle" ok-only ok-title="Submit"  no-close-on-backdrop no-close-on-esc>
            <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>      
            <div>
                <div class="verify-account nobar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Credit Card Number</label>
                                <card-number class='stripe-element card-number  form-control'
                                ref='cardNumber'
                                :stripe='stripeKey'
                                :options='options'
                                placeholder="Enter your credit card number"
                                @change='number = $event.complete'
                                />
                            </div>
                        </div>
                        <div class="col-md-6">                          
                            <div class="form-group custom-datepicker">
                                <label for="">Expiry Date</label>
                                <card-expiry class='stripe-element card-expiry form-control'
                                ref='cardExpiry'
                                :stripe='stripeKey'
                                :options='options'
                                @change='expiry = $event.complete'
                                />
                            </div>                                                  
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Security Code (CVC)</label>
                                <card-cvc class='stripe-element card-cvc form-control'
                                ref='cardCvc'
                                :stripe='stripeKey'
                                :options='options'
                                placeholder="Enter your cvv number"
                                @change='cvc = $event.complete'
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div slot="modal-footer" class="w-100">
                <button @click='createToken()' :disabled='!complete' :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' , 'col-sm-4' ]">Submit
                    <loader></loader>
                </button>
            </div>
        </b-modal>

        <div v-show='!isPopup && showCardInfo' v-if='!isPopup && showCardInfo'>
            <div class="verify-account nobar">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Credit Card Number</label>
                            <card-number :class="['form-control' , (!number && pageLoad) ? 'is-invalid' : '']" class='stripe-element card-number  form-control'
                            ref='cardNumber'
                            :stripe='stripeKey'
                            placeholder="Enter your credit card number"
                            @change='number = $event.complete'
                            />
                        </div>
                    </div>
                    <div class="col-md-6">                          
                        <div class="form-group custom-datepicker expirychanges">
                            <label for="">Expiry Date</label>
                            <card-expiry :class="['form-control' , (!expiry && pageLoad) ? 'is-invalid' : '']" class='stripe-element card-expiry'
                            ref='cardExpiry'
                            :stripe='stripeKey'
                            @change='expiry = $event.complete'
                            />
                        </div>                                                  
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Security Code (CVC)</label>
                            <card-cvc :class="['form-control' , (!cvc && pageLoad) ? 'is-invalid' : '']" class='stripe-element card-cvc form-control'
                            ref='cardCvc'
                            :stripe='stripeKey'
                            placeholder="Enter your cvv number"
                            @change='cvc = $event.complete'
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { Card , createToken , CardNumber, CardExpiry, CardCvc} from 'vue-stripe-elements-plus'

    export default {
        props : [
        'showModalProp',
        'stripe',
        'options',
        'planId',
        'fromFeaturedProfile',
        'cardTitle',
        'submit',
        'isPopup',
        'profileReview',
        'urgentJob',
        'showCardInfo',
        ],
        data () {
            return {
                complete: false,
                number: false,
                expiry: false,
                cvc: false,
                loading: false,
                pageLoad: false,
                stripeKey: window.stripeKey,
                stripeOptions: {
                },
                errorMessage: '',
                successMessage: '',
            }
        },
        components: { 
            // Card,
            CardNumber, 
            CardExpiry, 
            CardCvc
        },

        methods: {
            showModal() {
                this.$refs.myModalRef.show()
            },
            hideModal() {
                this.clearCard()
                this.$refs.myModalRef.hide()
            },
            onHidden(){
                this.$emit('HideModalValue');
            },   
            createToken () {
                self = this
                this.loading = true
                if(this.profileReview || !this.isPopup){
                   this.$parent.loading = true  
                }
                if(this.isPopup){
                   this.$refs.myModalRef.hideHeaderClose  = true
                }
                createToken().then(data => {
                    if (self.$parent.formData) {
                        self.$parent.formData.stripe_token = data.token.id
                        self.$parent.onSubmit()
                    } else if (self.$parent.submitFormData) {
                        self.$parent.submitFormData.stripe_token = data.token.id
                        self.$parent.submit = true
                    } else if (self.isPopup) {

                        let params =  {
                            'stripe_token': data.token.id,
                            'plan_id': this.planId
                        }
                        self.$http.post('/api/payment',params)
                            .then(response => {
                                self.successMessage = response.data.message
                                setTimeout(function(){
                                    self.loading = false
                                    self.successMessage='';
                                    self.$parent.getCampaignList()
                                    self.$refs.myModalRef.hideHeaderClose = false
                                    self.hideModal()
                                }, 2000);
                            })
                            .catch(error => {
                                self.loading = false
                                self.errorMessage = error.response.data.errors.message[0]
                                self.$refs.myModalRef.hideHeaderClose = false
                                self.clearCard()
                                setTimeout(function(){
                                    self.errorMessage = ''
                                }, 2000);
                            })
                    }
                }).catch(error=>{
                    self.$parent.loading = false
                    self.errorMessage = error.response.data.error.message
                    if(self.isPopup){
                       self.$refs.myModalRef.hideHeaderClose  = false
                       self.clearCard()
                    }else{
                       self.$parent.errorMessage = self.errorMessage 
                    }
                    setTimeout(function(){
                        self.errorMessage = ''
                        self.$parent.errorMessage = ''
                    }, 2000);
                });
            },
            update () {
                this.complete = this.number && this.expiry && this.cvc
                if (this.number) {
                    if (!this.expiry) {
                        this.$refs.cardExpiry.focus()
                    } else if (!this.cvc) {
                        this.$refs.cardCvc.focus()
                    }
                } else if (this.expiry) {
                    if (!this.cvc) {
                        this.$refs.cardCvc.focus()
                    } else if (!this.number) {
                        this.$refs.cardNumber.focus()
                    }
                }
            },
            clearCard () {
              this.$refs.cardCvc.clear() 
              this.$refs.cardNumber.clear() 
              this.$refs.cardExpiry.clear() 
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

            },
            number () { this.update() },
            expiry () { this.update() },
            cvc () { this.update() },
            submit(value){
                this.pageLoad = true
                if(value){
                    if(this.complete){
                        this.$parent.errorMessage = ''
                        this.createToken()
                        // if(this.profileReview){
                        //     this.pay();
                        // }else if(this.urgentJob){
                        //     this.pay();
                        // }else{
                        //     this.verifyCard();
                        // }
                    }else{
                        this.$parent.errorMessage = 'Please fill out credit card information'
                    }

                }
            },
        },
    }
</script>
