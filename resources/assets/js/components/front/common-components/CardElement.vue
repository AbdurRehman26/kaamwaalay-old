<template>
  <b-modal id="urgent-job" centered @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Feature Profile" ok-only ok-title="Submit"  no-close-on-backdrop no-close-on-esc hide-header-close>
     <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>      
     <div>
<!--       <card class='stripe-card'
      :class='{ complete }'
      stripe='pk_test_ix9VLy3CYcuwWxz1UkMipKun'
      :options='stripeOptions'
      @change='complete = $event.complete'
      /> -->
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
      </div>
    </div>
    <div slot="modal-footer" class="w-100">
     <button @click='pay' :disabled='!complete' :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' , 'col-sm-4' ]">Submit
      <loader></loader>
    </button>
  </div>
</b-modal>
</template>

<script>
import { Card, createToken , CardNumber, CardExpiry, CardCvc } from 'vue-stripe-elements-plus'

export default {
  props : ['showModalProp','stripe', 'options','planId' ,'fromFeaturedProfile'],
  data () {
    return {
      complete: false,
      number: false,
      expiry: false,
      cvc: false,
      loading: false,
      stripeKey: process.env.MIX_STRIPE_KEY,
      stripeOptions: {
        // see https://stripe.com/docs/stripe.js#element-options for details
      },
      errorMessage: '',
      successMessage: '',
    }
  },

  components: { Card  ,CardNumber, CardExpiry, CardCvc},

  methods: {
   showModal() {
    this.$refs.myModalRef.show()
  },
  hideModal() {
    this.$refs.myModalRef.hide()
  },
  onHidden(){
    this.$emit('HideModalValue');
  },   
  pay () {
    self = this
      // createToken returns a Promise which resolves in a result object with
      // either a token or an error key.
      // See https://stripe.com/docs/api#tokens for the token object.
      // See https://stripe.com/docs/api#errors for the error object.
      // More general https://stripe.com/docs/stripe.js#stripe-create-token.
      this.loading = true
      createToken().then(data => {
      let params =  {
            'stripe_token': data.token.id,
            'plan_id': this.planId
        }
      self.$http.post('/api/payment',params)
                .then(response => {
                    self.successMessage =  response.data.message
                    //self.$parent.url = "";
                    setTimeout(function(){
                        self.loading = false
                        self.successMessage='';
                        if(self.fromFeaturedProfile == 'true'){
                          self.$parent.getCampaignList()
                        }else{
                          self.$parent.formData.subscription_id = response.data.data.id
                          self.$parent.onSubmit()
                        }
                        self.hideModal()
                    }, 2000);
                })
                .catch(error => {
                        self.loading = false
                        self.errorMessage = error.response.data.message
                        setTimeout(function(){
                            self.errorMessage=''
                        }, 2000);
                })
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
    cvc () { this.update() }
  },
}
</script>
