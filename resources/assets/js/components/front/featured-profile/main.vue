<template>
	<div class="container md">
		<div class="profile-head">
			<h1>Featured Profile</h1>
			<p>Attract more of the right customers by highlighting your specialties and profile on the service provider listing page.</p>
		</div>

		<div class="featured-profile">
			<div class="row">
                <div class="col-md-6">
                <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>
					<div class="profile-budget">
						<h2>Please select your featured profile budget.</h2>
						<div class="row">  
                         <spinner-loader v-if="loading" ></spinner-loader>      
                            <div class="col-md-12" v-for="plan in plans">
								<div :class="[ errorBag.first('plan')  ? 'is-invalid' : '']" class="payment-charges custom-circle-radio">
									<p>
                                       <input type="radio" :id="'plan' + plan.id"  v-model="selectedPlan" :value="plan.id" name="plan" v-validate="'required'"  data-vv-name="plan" >
                                       <label :for="'plan' + plan.id">${{plan.amount}} one time</label>
                                       <p class="patment-detail">{{plan.quantity}} featured profile listing views</p>
                                   </p>	
                               </div>
                           </div>
                  <div class="col-md-3">
                    <button  @click.prevent="validateBeforeSubmit();" :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' , 'payment-continue' ]">
                       Continue
                       <loader></loader>
                   </button>
               </div>
           </div>

       </div>
   </div>
   <div class="col-md-6">
       <div class="featured-profile-section">
          <h3>Your featured profile may appear on a variety of places, including:</h3>
          <div class="featured-places">
             <div><i class="icon-list"></i>
                <span>Service Pages</span>
                <p class="featured-detail">Your featured profile will appear almost at the top of service pages related to the services you are offering.</p>
            </div>
        </div>

        <div class="featured-places">
         <div><i class="icon-search22"></i>
            <span>Search result pages</span>
            <p class="featured-detail">When someone search specific service which you are offering, your profile may appear at the top of the search results.</p>
        </div>
    </div>

    <div class="featured-places">
     <div class="ios-andriod-feature"><i class="ios-andriod-app"></i>
        <span>Inside iOS &amp; Android Apps</span>
        <p class="featured-detail">Your featured profile appear on PSM’s iPhone and Android apps, on search result and service pages.</p>
    </div>
</div>

</div>

</div>
</div>
</div>

<div class="campaigns">
 <h3>MY CAMPAIGNS</h3>
 <spinner-loader v-if="loading" ></spinner-loader>      
 <div class="camp-views" v-for="campaign in campaigns">

    <div class="view-status"><span>{{(campaign.plan)?campaign.plan.quantity:''}} VIEWS</span></div>

    <div class="view-status-detail">
       <span>Paid ${{(campaign.plan)?campaign.plan.amount:''}} one time</span>
       <span class="float-right calender-date">
          <i class="icon-calendar-daily"></i> Date: <strong>{{campaign.created_at.date | formatDate}}</strong></span>
          <ul class="views-percentage">
              <li>Actual views: <span>{{campaign.views}}</span></li>
              <li>Clicks: <span>{{campaign.clicks}}</span></li>
              <li>CTR: <span>{{((campaign.clicks/campaign.views)*100)}}%</span></li>
          </ul>
      </div>
  </div>	
</div>
<!-- <feature-job @HideModalValue="HideModal" :showModalProp="categoryval"></feature-job> -->
<card-element @HideModalValue="HideModal" :showModalProp="categoryval"></card-element>


</div>
</template>

<script>
import DatePicker from 'vue2-datepicker'

export default {
  components: { DatePicker },
  data() {
    return {
        value: '',
        value_month:'',
        value_year:'',
        categoryval: false,
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
    },
    plans : [],
    campaigns : [],
    selectedPlan : "",
    loading: false,
    errorMessage: '',
    successMessage: '',
    user: {},
}
},
methods:{
 job(){
    window.scrollTo(0,0);
    this.$router.push({name: 'My Jobs'});
},
featurejob() {
    this.categoryval = true;
},
HideModal(){
    this.categoryval = false;
},
getPlansList (){
    let self = this;
    self.showNoRecordFound = false;
    self.loading = true;
    let url = 'api/plan';
    let params = {
                pagination: false,
                type: 'service',
            };
    self.$http.get(url, {params: params}).then(response=>{
        self.plans = response.data.response.data;
         if (!self.plans.length) {
            self.showNoRecordFound = true;
        }
        self.loading = false;
    }).catch(error=>{
    });
},
getCampaignList (){
    let self = this;
    self.showNoRecordFound = false;
    self.user = JSON.parse(self.$store.getters.getAuthUser)
    self.loading = true;
    let url = 'api/campaign';
    let params = {
                pagination: false,
                user_id: self.user.id,
            };
    self.$http.get(url, {params: params}).then(response=>{
        self.campaigns = response.data.response.data;
         if (!self.campaigns.length) {
            self.showNoRecordFound = true;
        }
        self.loading = false;
    }).catch(error=>{
    });
},
validateBeforeSubmit() {
                // Prevent modal from closing
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        this.save();
                        return;
                    }
                    this.errorMessage = this.errorBag.all()[0];
                    return false;
                });
            },
  save () {
                let self = this;
                //self.loading = true
                //this.checkout();
                this.featurejob();
             /*   this.$http.post('/api/plan', self.add_form_info)
                .then(response => {
                    self.successMessage =  response.data.message
                    self.$parent.url = "";
                    setTimeout(function(){
                    self.$parent.url = 'api/user?filter_by_roles[]=1&filter_by_roles[]=4&pagination=true';
                        self.loading = false
                        self.successMessage='';
                         self.resetModal();
                    }, 5000);
                })
                .catch(error => {
                        self.loading = false
                        self.errorMessage = error.response.data.message[0]
                        setTimeout(function(){
                            self.errorMessage=''
                        }, 5000);
                })*/
            },
       /*   checkout() {
          // this.$checkout.close() 
          // is also available.
          this.$checkout.open({
            name: 'Feature Profile',
            currency: 'USD',
            amount: '',
            token: (token) => {
                alert(token)
              // Send the token to your server
              // for payment or subscription handling,
              // or do whatever you want with it
              // I don't really care. 
          } 
      });
      }*/
},  
mounted() {
    this.getPlansList()
    this.getCampaignList()
},
}
</script>