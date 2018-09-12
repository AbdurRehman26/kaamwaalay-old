<template>

    <div>
        <div class="verify-account nobar">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Credit Card Number</label>
                        <card-number class='stripe-element card-number  form-control'
                        ref='cardNumber'
                        stripe='pk_test_ix9VLy3CYcuwWxz1UkMipKun'
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
                        stripe='pk_test_ix9VLy3CYcuwWxz1UkMipKun'
                        :options='options'
                        @change='expiry = $event.complete'
                        />
                    </div>                                                  
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Security Code (CVV)</label>
                        <card-cvc class='stripe-element card-cvc form-control'
                        ref='cardCvc'
                        stripe='pk_test_ix9VLy3CYcuwWxz1UkMipKun'
                        :options='options'
                        placeholder="Enter your cvv number"
                        @change='cvc = $event.complete'
                        />
                    </div>
                </div>
            </div>
        </div>
<!--      <button @click='pay' :disabled='!complete' :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' , 'col-sm-4' ]">Submit
<loader></loader>
</button> -->
</div>
</template>

<script>
    import { Card, createToken , CardNumber, CardExpiry, CardCvc } from 'vue-stripe-elements-plus'

    export default {
             props : ['submit'],
            data () {
                return {
                    complete: false,
                    number: false,
                    expiry: false,
                    cvc: false,
                    loading: false,
                    stripeOptions: {
    // see https://stripe.com/docs/stripe.js#element-options for details
    },
    errorMessage: '',
    successMessage: '',
    }
    },

    components: { Card  ,CardNumber, CardExpiry, CardCvc},

    methods: { 
        verifyCard () {
        // createToken returns a Promise which resolves in a result object with
        // either a token or an error key.
        // See https://stripe.com/docs/api#tokens for the token object.
        // See https://stripe.com/docs/api#errors for the error object.
        // More general https://stripe.com/docs/stripe.js#stripe-create-token.
        createToken().then(data => {
            //this.$parent.userDetails.stripe_token = data.token.id
            this.$parent.onSubmit()
        }).catch(error=>{
        });
    },
    update () {
        this.complete = this.number && this.expiry && this.cvc
    // field completed, find field to focus next
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
    if(this.complete){
        this.$parent.errorMessage = ''
    }else{
         this.$parent.errorMessage = 'Please fill out credit card information'
    }
    // no focus magic for the CVC field as it gets complete with three
    // numbers, but can also have four
    }
    },
    watch:{
        number () { this.update() },
        expiry () { this.update() },
        cvc () { this.update() },
        submit(value){
                console.log('submitCard',value)
                if(value){
                    this.verifyCard();
                }
            }
    },
    }
</script>