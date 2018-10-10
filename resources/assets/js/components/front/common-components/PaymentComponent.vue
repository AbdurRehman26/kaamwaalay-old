<template>

    <div>
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
            pageLoad: false,
            stripeKey: window.stripeKey,
            stripeOptions: {
            },
            errorMessage: '',
            successMessage: '',
        }
    },

    components: { 
        Card,
        CardNumber, 
        CardExpiry, 
        CardCvc
    },

    methods: { 
        verifyCard () {
           this.$parent.loading = true   
        // createToken returns a Promise which resolves in a result object with
        // either a token or an error key.
        // See https://stripe.com/docs/api#tokens for the token object.
        // See https://stripe.com/docs/api#errors for the error object.
        // More general https://stripe.com/docs/stripe.js#stripe-create-token.
        createToken().then(data => {
            let self = this
            let record = {}
            let user = JSON.parse(this.$store.getters.getAuthUser)
            record.stripe_token = data.token.id
            record.first_name = user.first_name
            record.last_name = user.last_name
            record.email = user.email
                //customerNav.data().user.stripe_token = data.token.id
                let update = {
                    user_details : record
                };
                let url = 'api/user/'+user.id;
                self.$http.put(url, update).then(response => {
                    response = response.data.response;
                    self.$store.commit('setAuthUser', response.data);
                    self.$parent.onSubmit();
                    self.$parent.submit = true;
                }).catch(error => {
                });
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
    // no focus magic for the CVC field as it gets complete with three
    // numbers, but can also have four
}
},
watch:{
    number () { this.update() },
    expiry () { this.update() },
    cvc () { this.update() },
    submit(value){
        this.pageLoad = true
        if(value){
           if(this.complete){
            this.$parent.errorMessage = ''
            this.verifyCard();
        }else{
           this.$parent.errorMessage = 'Please fill out credit card information'
       }
       
   }
}
},
}
</script>
