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
						<form data-vv-scope="featured">
							<div class="row featured-setting" >
								<div class="col-xs-12 col-md-12">
									<div class="row">
										<div class="col-xs-12 col-md-5">
											<div class="form-group">
												<label>Featured Amount</label>
											</div>
										</div>
										<div class="col-xs-12 col-md-5">
											<div class="form-group">
												<label>Featured Quantity</label>	
											</div>
										</div>
									</div>
								</div>	
								<div class="col-xs-12 col-md-12 featured-setting-row" v-for="(data, index) in featuredList">
									<div class="row">
										<div class="col-md-5">
											<div class="form-group">
												<input class="form-control form-group" placeholder="Enter featured amount" name="amount" v-model="data.amount" v-validate="'required|decimal|min_value:0.1'" >
											</div>
										</div>

										<div class="col-md-5">
											<div class="form-group">
												<input class="form-control form-group" placeholder="Enter featured quantity" name="quantity" v-model="data.quantity" v-validate="'required|numeric|min_value:1'">
											</div>
										</div>
										<div class="col-md-2">
											<a href="javascript:;" @click="remove(index)" v-if="index">- remove</a>		
										</div>										
									</div>
								</div>

								<div class="col-md-2 col-md-2 filter-btn-top-space add-more-featured">
									<a href="javascript:;" @click="validateBeforeSubmit('featured', 'add-more')">+ Add more</a>
								</div>

							</div>
							<alert v-if="featuredErrorMessage || featuredSuccessMessage" :errorMessage="featuredErrorMessage" :successMessage="featuredSuccessMessage"></alert>
							<div class="row">
								<div class="col-xs-12 col-md-3">
									<button @click.prevent="validateBeforeSubmit('featured', 'featured-update')" :class="['btn btn-primary', isFeaturedUpdating ?'show-spinner' : '']">
										<span>Apply</span>
										<loader></loader>
									</button>
								</div>
							</div>
						</form>
					</div>
					<!-- Featured Row End -->

					<!-- Urgent Row -->
					<form data-vv-scope="urgent">
						<div class="urgent-section-row featured-row">
							<div class="row">
								<div class="col-md-12">
									<div class="urgent-detail-title">
										<h2 class="page-title">Urgent</h2>
									</div>
								</div>
							</div>

							<div class="row urgent-setting">	
								<div class="col-md-4">
									<div class="form-group">
										<label>Urgent Amount</label>
										<input class="form-control" placeholder="Enter urgent amount" name="urgent amount" v-model="urgent_amount" v-validate="'required|decimal|min_value:0.1'" :class="[ 'form-group' , errorBag.has('urgent.urgent_amount')  ? 'is-invalid' : '']" >
									</div>
								</div>

							</div>
							<alert v-if="urgentErrorMessage || urgentSuccessMessage" :errorMessage="urgentErrorMessage" :successMessage="urgentSuccessMessage"></alert>
							<div class="row">
								<div class="col-xs-12 col-md-3">
									<button @click.prevent="validateBeforeSubmit('urgent')" :class="['btn btn-primary', isUrgentUpdating ?'show-spinner' : '']">
										<span>Apply</span>
										<loader></loader>
									</button>
								</div>
							</div>
						</div>
					</form>

                    <!-- Account creation Row -->
                    <form data-vv-scope="account_creation">
                        <div class="urgent-section-row">
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
                                        <label>Account Creation Fee</label>
                                        <input class="form-control" placeholder="Enter account creation amount" name="account creation fee" v-model="account_creation_amount" v-validate="'required|decimal|min_value:0.1'" :class="[ 'form-group' , errorBag.has('account_creation.account_creation_amount')  ? 'is-invalid' : '']" >
                                    </div>
                                </div>

                            </div>
                            <alert v-if="accountCreationErrorMessage || accountCreationSuccessMessage" :errorMessage="accountCreationErrorMessage" :successMessage="accountCreationSuccessMessage"></alert>
                            <div class="row">
                                <div class="col-xs-12 col-md-3">
                                    <button @click.prevent="validateBeforeSubmit('account_creation')" :class="['btn btn-primary', isAccountCreationUpdating ?'show-spinner' : '']">
                                        <span>Apply</span>
                                        <loader></loader>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

				</div>

			</div>
		</div>

	</div>
</template>

<script>

export default {
	data () {
		return {
			url:'api/plan/',
			featuredSuccessMessage:'',
			featuredErrorMessage:'',
			featuredList:[],
			isFeaturedUpdating:false,
			isUrgentUpdating:false,
			isAccountCreationUpdating:false,
			urgentSuccessMessage:'',
			urgentErrorMessage:'',
			accountCreationSuccessMessage:'',
			accountCreationErrorMessage:'',
            urgent_amount:'',
			account_creation_amount:'',
		}
	},

    mounted() {
        this.getFeaturedList();
        this.view('urgent');
        this.view('account_creation');
    },

	methods: {
        validateBeforeSubmit(scope, where){
            this.$validator.validateAll(scope).then((result) => {
                if (result) {
                    this.featuredErrorMessage =  '';
                    this.urgentErrorMessage =  '';
                    this.accountCreationErrorMessage =  '';
                    if(scope == 'featured' && where == 'featured-update'){
                        this.updateFeaturedList();
                    }else if(scope == 'featured' && where == 'add-more'){
                        this.addMore();
                    }else if(scope == 'urgent'){
                    	this.update(scope);
                    }else if(scope == 'account_creation'){
                    	this.update(scope);
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
            this.featuredList.push({
            	'id': null,
            	'amount': '',
            	'quantity': ''
            });
        },
        remove(index) {
            this.featuredList.splice(index,1);
        },
        getFeaturedList (){
            let self = this;
            var params = {
            	pagination: false,
                type: 'service',
            };
            self.$http.get(self.url, {params: params}).then(response=>{
                response = response.data.response;
                //self.featuredList = response.data;
                if(response.data.length){
                	_.forEach(response.data, function(value, key) {
                		self.featuredList.push({
                			'id': value.id,
                			'amount': value.amount,
                			'quantity': value.quantity
                		});
                	});

                }else{
			        self.featuredList.push({
			            'id': null,
			            'amount': '',
			            'quantity': ''
			        });
                }
            }).catch(error=>{
            });
        },
        updateFeaturedList(){
            let self = this;
            self.isFeaturedUpdating = true;
            self.$http.post(self.url+'update-or-add-plans', {'plans_data': self.featuredList}).then(response => {
                self.featuredSuccessMessage = 'Records have been updated successfully';
                setTimeout(function () {
                    self.featuredSuccessMessage = '';
                } , 3000);
                self.isFeaturedUpdating = false;

            }).catch(error=>{
                let errors = error.response.data.errors;
                self.isFeaturedUpdating = false;
                _.forEach(errors, function(value, key) {
                    self.featuredErrorMessage =  errors[key][0];
                    return false;
                });

            });
        },
        update(scope){
            let self = this;
            self.loading = true;
            let id = 0;
            let amount = 0;
            if(scope=='urgent'){
            	self.isUrgentUpdating = true;
            	id = 1;
            	amount= self.urgent_amount;
            }else{
            	self.isAccountCreationUpdating = true;
            	id = 2;
            	amount= self.account_creation_amount;
            }

            self.$http.put(self.url + id, {'amount':amount}).then(response => {
                self.loading = false;

                if(scope=='urgent'){
                	self.urgentSuccessMessage = 'Record has been updated successfully';
                	setTimeout(function () {
                		self.isUrgentUpdating = false;
                		self.urgentSuccessMessage = '';
                	} , 3000);
                }else{
                	self.accountCreationSuccessMessage = 'Record has been updated successfully';
                	setTimeout(function () {
                		self.isAccountCreationUpdating = false;
                		self.accountCreationSuccessMessage = '';
                	} , 3000);                
                }

            }).catch(error => {
                self.isUrgentUpdating = false;
                self.isAccountCreationUpdating = false;
                self.loading = false;
                let errors = error.response.data.errors;
                _.forEach(errors, function(value, key) {
                    if(scope=='urgent'){
						self.urgentErrorMessage =  errors[key][0];
                    }else{
						self.accountCreationErrorMessage =  errors[key][0];
                    }

                    return false;
                });
            });
        },
        view(scope){
            let self = this;
            self.loading = true;
            let id = 0;
            if(scope=='urgent'){
            	id = 1;
            	self.urgent_amount = 0;
            }else{
            	id = 2;
            	self.account_creation_amount = 0;
            }

            self.$http.get(self.url + id).then(response => {
            	response = response.data.response;
                self.loading = false;

                if(scope=='urgent'){
                	self.urgent_amount = response.data.amount;
                }else{
					self.account_creation_amount = response.data.amount;   
                }

            }).catch(error => {
                self.loading = false;
                let errors = error.response.data.errors;
                _.forEach(errors, function(value, key) {
                    if(scope=='urgent'){
						self.urgentErrorMessage =  errors[key][0];
                    }else{
						self.accountCreationErrorMessage =  errors[key][0];
                    }

                    return false;
                });
            });
        },
	}
}
</script>
