<template>
	<div class="panel-inner">
		<div class="row">

			<div class="col-md-12">
				<div class="general-setting">
					<!-- Featured Row -->

					<div class="featured-row">
						<div class="row">
							<div class="col-md-12">
								<div class="featured-detail-title">
									<h2 class="page-title">Featured Profile</h2>
								</div>
							</div>
						</div>
						<form>
							<div class="row featured-setting featured-row" >
								<div class="col-xs-12 col-md-12">
									<div class="row">
										<div class="col-xs-12 col-md-5">
											<div class="form-group">
												<label>Amount</label>
											</div>
										</div>
										<div class="col-xs-12 col-md-5">
											<div class="form-group">
												<label>Quantity</label>	
											</div>
										</div>
									</div>
								</div>	
								<div class="col-xs-12 col-md-12 featured-setting-row" v-if="!data.remove && data.type=='service' && data.product=='featured_profile'" v-for="(data, index) in list">
									<div class="row">
                                      	<div class="col-md-5">
											<div class="form-group">
												<input class="form-control form-group" data-vv-scope="featured" placeholder="Enter featured amount" name="amount" v-model="data.amount" v-validate="'required|decimal|min_value:0.1'" :disabled="data.disabled">
											</div>
										</div>

										<div class="col-md-5">
											<div class="form-group">
												<input class="form-control form-group" data-vv-scope="featured" placeholder="Enter featured quantity" name="quantity" v-model="data.quantity" v-validate="'required|numeric|min_value:1'" :disabled="data.disabled">
											</div>
										</div>
										<div class="col-md-2 feature-remove">
											<a href="javascript:;" @click="remove(index)" v-if="showRemove">- remove</a>		
										</div>										
									</div>
								</div>

								<div class="col-md-2 col-md-2 filter-btn-top-space add-more-featured">
									<a href="javascript:;" @click="validateBeforeSubmit('featured', 'add-more')">+ Add</a>
								</div>

							</div>
                     <!-- Urgent Row -->
                        <div class="urgent-section-row featured-row">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="urgent-detail-title">
                                        <h2 class="page-title">Urgent Job</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row urgent-setting">    
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Amount ($)</label>
                                        <div class="display-flex" v-if="urgent_job_disable && !data.remove && data.type=='job' && data.product=='urgent_job'" v-for="(data, index) in list">
                                            <input  data-vv-scope="urgent" class="form-control" placeholder="Enter urgent amount" name="urgent amount" v-model="urgent_amount" v-validate="'required|decimal|min_value:0.1'" :class="[ 'form-group' , errorBag.has('urgent.urgent_amount')  ? 'is-invalid' : '']" :disabled="data.disabled">
                                            <a v-if="urgent_job_disable" href="javascript:void(0);" class="btn btn-primary" @click='editUrgentJob(data)'><i class="icon-edit field-edit"></i> Edit</a>
                                        </div>
                                            <input v-if="!urgent_job_disable" class="form-control" placeholder="Enter urgent amount" name="urgent amount" data-vv-scope="urgent" v-model="urgent_amount" v-validate="'required|decimal|min_value:0.1'" :class="[ 'form-group' , errorBag.has('urgent.urgent_amount')  ? 'is-invalid' : '']" >
                                    </div>
                                </div>
                            </div>
                        </div>
                          <!-- Account creation Row -->
                       <div class="urgent-section-row featured-row">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="urgent-detail-title">
                                        <h2 class="page-title">Account Creation</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="row urgent-setting">    
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Fee</label>
                                        <div class="display-flex" v-if="account_creation_disable && !data.remove && data.type=='service' && data.product=='account_creation'" v-for="(data, index) in list">
                                            <input  data-vv-scope="account_creation" class="form-control" placeholder="Enter account creation amount" name="account creation fee" v-model="account_creation_amount" v-validate="'required|decimal|min_value:0.1'" :class="[ 'form-group' , errorBag.has('account_creation.account_creation_amount')  ? 'is-invalid' : '']" :disabled="data.disabled">
                                            <a  href="javascript:void(0);" class="btn btn-primary" @click='editAccountCreation(data)'><i class="icon-edit field-edit"></i> Edit</a>
                                        </div>
                                            <input v-if="!account_creation_disable"  class="form-control" placeholder="Enter account creation amount" name="account creation fee"  data-vv-scope="account_creation" v-model="account_creation_amount" v-validate="'required|decimal|min_value:0.1'" :class="[ 'form-group' , errorBag.has('account_creation.account_creation_amount')  ? 'is-invalid' : '']" >
                                    </div>
                                </div>

                            </div>
                        </div>
							<alert v-if="featuredErrorMessage || featuredSuccessMessage" :errorMessage="featuredErrorMessage" :successMessage="featuredSuccessMessage"></alert>
							<div class="row">
								<div class="col-xs-12 col-md-3">
									<button v-show="list.length != 0" @click.prevent="validateBeforeSubmit('featured', 'featured-update')" :class="['btn btn-primary', isFeaturedUpdating ?'show-spinner' : '']">
										<span>Apply</span>
										<loader></loader>
									</button>
								</div>
							</div>
						</form>
					</div>`
				</div>

			</div>
		</div>

	</div>
</template>

<script>

export default {
	data () {
		return {
			url:'api/plan',
			featuredSuccessMessage:'',
			featuredErrorMessage:'',
			list:[],
			isFeaturedUpdating:false,
			isUrgentUpdating:false,
			isAccountCreationUpdating:false,
			urgentSuccessMessage:'',
			urgentErrorMessage:'',
			accountCreationSuccessMessage:'',
			accountCreationErrorMessage:'',
            urgent_amount:0,
            urgent_job_disable:false,
            account_creation_amount:0,
            account_creation_disable:false,
			showRemove:true,
		}
	},
    watch: {
        account_creation_amount(value) {
            if(value != 0 && !this.account_creation_disable){
               let accountCreationObject = _.find(this.list, (o) => o.product == 'account_creation');
               if(accountCreationObject){
                   _.remove(this.list, function(n) {
                      return n.product == 'account_creation'
                  }) 
               }
                this.list.push({
                    'id': (accountCreationObject)?accountCreationObject.id:null,
                    'amount': value,
                    'quantity': null,
                    'type': 'service',
                    'product': 'account_creation',
                    'disabled': false,
                    'remove': false,
                });
            }
        },
        urgent_amount(value) {
            if(value != 0 && !this.urgent_job_disable){
                   let urgentJobObject = _.find(this.list, (o) => o.product == 'urgent_job');
                   if(urgentJobObject){
                     _.remove(this.list, function(n) {
                      return n.product == 'urgent_job'
                  }) 
                 }
                this.list.push({
                    'id': (urgentJobObject)?urgentJobObject.id:null,
                    'amount': value,
                    'quantity': null,
                    'type': 'job',
                    'product': 'urgent_job',
                    'disabled': false,
                    'remove': false,
                });
            }
        },
        list: {
          handler: function (newValue, oldValue) {
            if(newValue){
                let featuredProfileObject = _.filter(newValue,{ 'product': 'featured_profile', remove: false });
               if(featuredProfileObject.length > 1){
                 this.showRemove = true
               }else{
                 this.showRemove = false
               }
            }
        },
        deep: true
       }
    },
    mounted() {
        this.getlist();
    },

	methods: {
        editAccountCreation(data){
           this.account_creation_disable = false
           data.disable = false
        },
        editUrgentJob(data){
           this.urgent_job_disable = false
           data.disable = false
        },
        validateBeforeSubmit(scope, where){
            this.$validator.validateAll(scope).then((result) => {
                if (result) {
                    this.featuredErrorMessage =  '';
                    this.urgentErrorMessage =  '';
                    this.accountCreationErrorMessage =  '';
                    if(scope == 'featured' && where == 'featured-update'){
                        this.updatelist();
                    }else if(scope == 'featured' && where == 'add-more'){
                        this.addMore();
                    }
                    return;
                }
                if(scope=='featured'){
                	this.featuredErrorMessage =  this.errorBag.all(scope)[0];
                }else if(scope=='urgent'){
                	this.urgentErrorMessage =  this.errorBag.all(scope)[0];
                }else if(scope=='account_creation'){
                	this.accountCreationErrorMessage =  this.errorBag.all(scope)[0];
                }

                if(where == 'add-more'){
                    this.featuredErrorMessage = '';
                }
            });
        },
        addMore() {
            this.list.push({
            	'id': null,
            	'amount': '',
                'quantity': '',
                'type': 'service',
                'product': 'featured_profile',
                'disabled': false,
            	'remove': false,
            });
        },
        remove(index) {
            let currentPlan = this.list[index]
            currentPlan.remove = true
            //this.list.splice(index,1);
        },
        getlist (){
            let self = this;
            var params = {
            	pagination: false,
            };
            self.$http.get(self.url, {params: params}).then(response=>{
                response = response.data;
                //self.list = response.data;
                if(response.data.length){
                	_.forEach(response.data, function(value, key) {
                        if(value.type == 'service' && value.product == 'account_creation'){
                            self.account_creation_amount = value.amount
                            self.account_creation_disable = true
                        } 
                         if(value.type == 'job' && value.product == 'urgent_job'){
                            self.urgent_amount = value.amount
                            self.urgent_job_disable = true
                        }
                		self.list.push({
                			'id': value.id,
                			'amount': value.amount,
                			'quantity': value.quantity,
                            'type': value.type,
                            'product': value.product,
                            'disabled': true,
                            'remove': false,

                		});
                	});

                }else{
			        self.list.push({
			            'id': null,
			            'amount': '',
			            'quantity': '',
                        'type': 'service',
                        'product': 'featured_profile',
                        'disabled': false,
                        'remove': false,

			        });
                }
            }).catch(error=>{
            });
        },
        updatelist(){
            let self = this;
            self.isFeaturedUpdating = true;
             _.forEach(self.list, function(value, key) {
                if(value.remove){
                 if(value.id){
                    self.$http.delete(self.url+'/'+value.id).then(response => {
                    self.featuredSuccessMessage = response.data.message;
                    setTimeout(function () {
                        self.featuredSuccessMessage = '';
                    } , 3000);
                    self.account_creation_disable = true
                    self.urgent_job_disable = true

                }).catch(error=>{
                    let errors = error.response.data.errors;
                    _.forEach(errors, function(value, key) {
                        self.featuredErrorMessage =  errors[key][0];
                        return false;
                    });
                    self.account_creation_disable = true
                    self.urgent_job_disable = true

                }); 
                } else{
                    self.featuredSuccessMessage = 'Record has been updated';
                   setTimeout(function () {
                        self.featuredSuccessMessage = '';
                    } , 3000); 
                    self.account_creation_disable = true
                    self.urgent_job_disable = true
                }
                }else{
                if(!value.disabled){
                 self.$http.post(self.url, value).then(response => {
                    self.featuredSuccessMessage = response.data.message;
                    setTimeout(function () {
                        self.featuredSuccessMessage = '';
                    } , 3000);
                    self.list[key].disabled = true
                    self.list[key].remove = false
                    self.list[key].id = response.data.data.id
                    self.account_creation_disable = true
                    self.urgent_job_disable = true

                }).catch(error=>{
                    let errors = error.response.data.errors;
                    _.forEach(errors, function(value, key) {
                        self.featuredErrorMessage =  errors[key][0];
                        return false;
                    });
                    self.account_creation_disable = true
                    self.urgent_job_disable = true
                }); 
                }  else{
                    self.featuredSuccessMessage = 'Record has been updated';
                   setTimeout(function () {
                        self.featuredSuccessMessage = '';
                    } , 3000); 
                    self.account_creation_disable = true
                    self.urgent_job_disable = true
                }
            }
            if (key === (self.list.length -1)) {
                setTimeout(function () {
                        self.isFeaturedUpdating = false;
                    } , 2000); 
                
            }
        });
        },
	}
}
</script>
