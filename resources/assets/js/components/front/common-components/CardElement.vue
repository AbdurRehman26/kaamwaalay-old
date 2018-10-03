<template>
  <div>
      <b-modal  v-show='isPopup' v-if='isPopup' id="urgent-job" centered @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" :title="cardTitle" ok-only ok-title="Submit"  no-close-on-backdrop no-close-on-esc>
       <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>      
       <div>
        <div class="verify-account nobar" id="pay-card">
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
   <button @click='pay' :disabled='!complete' :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' , 'col-sm-4' ]">Submit
      <loader></loader>
  </button>
</div>
</b-modal>

<div v-show='onlyVerify' v-if='onlyVerify'>
    <div class="verify-account nobar" id="verify-card">
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
    import { Card , createToken , CardNumber, CardExpiry, CardCvc, StripeElement } from 'vue-stripe-elements-plus'

    export default {
      render (h) {
          const tag = this.isPopup ? 'b-modal' : 'div'
          console.log(h(tag),'asd');
          return h(tag);
      },
      props : [
      'showModalProp',
      'stripe',
      'options',
      'planId',
      'fromFeaturedProfile',
      'cardTitle',
      'submit',
      'isPopup',
      'onlyVerify',
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
    Card,
    CardNumber, 
    CardExpiry, 
    CardCvc
},

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
        this.loading = true
        createToken().then(data => {
            let params =  {
                'stripe_token': data.token.id,
                'plan_id': this.planId
            }
            self.$http.post('/api/payment',params)
            .then(response => {
                self.successMessage =  response.data.message
                setTimeout(function(){
                    self.loading = false
                    self.successMessage='';
                    if(self.fromFeaturedProfile == 'true'){
                      self.$parent.getCampaignList()
                  }else{
                      self.$parent.formData.subscription_id = response.data.data.id
                  }
                  self.$parent.onSubmit()
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
    verifyCard () {
     this.$parent.loading = true   
     createToken().then(data => {
        let self = this
        let record = {}
        let user = JSON.parse(this.$store.getters.getAuthUser)
        record.stripe_token = data.token.id
        record.first_name = user.first_name
        record.last_name = user.last_name
        record.email = user.email
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
}
},
mounted(){
    alert()
    console.log(StripeElement,111);
   StripeElement.beforeDestroy()
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
        console.log('submitCard',value)
        this.pageLoad = true
        if(value){
         if(this.complete){
            this.$parent.errorMessage = ''
            this.verifyCard();
        }else{
         this.$parent.errorMessage = 'Please fill out credit card information'
     }

 }
},
      isPopup(val){
          alert(val)
      },
},
}
</script>
