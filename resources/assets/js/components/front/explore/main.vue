<template>
	<div class="content-area">
		<div class="main-banner elementary-banner explore-banner">
			<div class="main-img">
				<img  :src="bannerimage">
			</div>
			<div class="content">
				<div class="verticle-align">
					<div class="inner">
						<div class="container element-index">
							<div class="content-inner md">
								<h1 class="heading-large">Find best skilled service professionals near you.</h1>
								<div class="search-filter">
									<div class="custom-multi" :class="{ 'invalid': isInvalid }">
										<multiselect  v-model="searchValue" :options="options"  placeholder="What service do you need?" track-by="id" label="title" :loading="isLoading"  class="ajax" open-direction="bottom" :searchable="true" :options-limit="300" :limit="8" :limit-text="limitText" :max-height="600"  @search-change="asyncFind" name="search" :internal-search="false" :showNoResults="true" @select="dispatchAction" @close="dispatchCloseAction" @keyup.enter="validateBeforeSubmit">
											<span slot="noResult">No service found.</span>
										</multiselect>
									</div>
									<div class="container-zip-code">
										<i class="icon-location"></i>
										<input type="number" placeholder="Zip code" class="form-control lg zip-code" v-model="zipCode" name="zip" :class="[errorBag.first('zip') ? 'is-invalid' : '']" v-validate="'required|numeric'" @keyup.enter="validateBeforeSubmit">
									</div>
								</div>
								<button :class="[btnLoading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' , 'apply-primary-color' ]" @click="validateBeforeSubmit" :disabled="loading">
									<span>Search</span>
								</button>
							</div>
						</div>
						<div class="element-column-image">
							<img :src="contentimage">
						</div>
						<span class="splash-design md d-1 top-left"></span>
						<span class="splash-design d-4 bottom-right lg"></span>
						<span class="splash-design d-6 bottom-left sm"></span>
					</div>
				</div>
			</div>
		</div>

		<div class="featured-categories section">
			<div class="container">

				<div
					class="block-loader bg-transparent" v-if="loadingService">
					<loader></loader>
				</div>
				<div class="category-section" v-for="service in getExploreServices">
					<div class="category-title">
						<h2>{{service.title}}</h2>
					</div>
					<div class="category-items">
						<div class="items" v-for="subservice in getSubServices(service.subservices)">
							<a @click="changecategorypopup(subservice)" href="javascript:void(0);">
								<div class="item-image" v-bind:style="{'background-image': 'url('+ getImage(subservice.images) +')',}"></div>
								<h4>{{subservice.title}}</h4>
							</a>
						</div>
						<div class="showmore showmore-link clearfix">
							<div>
							  <!-- element to collapse -->
							  <a v-b-toggle="service.title" href="javascript:void(0);" :class="showCollapse" v-if="getRemainingSubServices(service.subservices).length">View all services related to {{service.title}}<i class="icon-angle-right"></i></a>
							  <b-collapse :id="service.title">
							    <b-card>
							      <div class="items service-remain-category" v-for="remainingSubServices in getRemainingSubServices(service.subservices)">
									<a @click="changecategorypopup(remainingSubServices)" href="javascript:void(0);">
										<p>{{remainingSubServices.title}}</p>
									</a>
								</div>
							    </b-card>
							  </b-collapse>
							</div>
						</div>

					</div>
				</div>



			</div>
		</div>
		<div class="other-categories section-grey section elementary-banner">
			<div class="container element-index">
				<div v-if="loadingService"
					class="block-loader bg-transparent">
					<loader></loader>
				</div>				
				<div class="category-section"  v-for="isnotexplorecategory in getRemainingWithServices">
					<div class="category-title">
						<h2>{{isnotexplorecategory.title}}</h2>
					</div>
					<div class="category-items">
						<ul class="item-list-container">
							<li class="items-list" v-for="othercategorySubservice in isnotexplorecategory.subservices">
								<a href="javascript:void(0);" @click.prevent="changecategorypopup(othercategorySubservice)">
									<p>{{othercategorySubservice.title}}</p>
								</a>
							</li>
						</ul>

					</div>
				</div>
				<div class="category-section" v-if="getOtherServices.length">
					<div class="category-title">
						<h2>Others</h2>
					</div>
					<div class="category-items">
						<ul class="item-list-container">
							<li class="items-list" v-for="othercategory in getOtherServices">
								<a @click.prevent="changecategorypopup(othercategory)" href="javascript:void(0);">
									<p>{{othercategory.title}}</p>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="elements">
				<img class="top-left" src="/images/front/banner-bg/bg-3-top.png">
				<img class="bottom-right width-max" src="/images/front/banner-bg/bg-8.png">
			</div>
		</div>

		<category-popup @HideModalValue="hideModal" :showModalProp="categoryPopup" :selectedValue="selectedService" @onSubmit="onSelectCategory"></category-popup>

	</div>
</template>

<script>

import _ from 'lodash';
export default {
	data () {
		return {
			selectedService: '',
			btnLoading: false,
			allServices: [],
			searchValue: '',
			isLoading: false,
			loadingService: true,
			searchUrl: 'api/service',
			options: [],
			zipCode: '',
			errorMessage: '',
			isTouched: false,
			invalidSearch: true,
			bannerimage: '/images/front/explore/banner-bg/banner.jpg',
			contentimage: '/images/front/explore/banner-bg/explore-banner.png',
			categoryPopup: false,
			loading: false,
			showCollapse: true,
			authUser: '',
			routeName: '',
		}
	},
	methods: {
		dispatchAction (actionName) {
			this.searchValue = '';
			this.options = [];
			this.loading = false;
		},
		dispatchCloseAction (actionName) {
			this.options = [];
			this.loading = false;
			this.onTouch();
		},
        getImage(img) {
        	return img? (img[0].upload_url? img[0].upload_url: 'images/dummy/image-placeholder.jpg') : 'images/dummy/image-placeholder.jpg';
        	
        },
		onTouch () {
			this.isTouched = true
		},
		onSelectCategory(val) {
			this.hideModal();
			localStorage.setItem("zip", val);
			if(this.selectedService.parent) {
                localStorage.setItem("parentService", this.selectedService.parent.url_suffix);
                localStorage.setItem("childService", this.selectedService.url_suffix);
   				this.$router.push({ name: this.routeName, params: { serviceName: this.selectedService.parent.url_suffix, childServiceName: this.selectedService.url_suffix, zip : val }});
			}else {
				localStorage.setItem("parentService", "");
                localStorage.setItem("childService", this.selectedService.url_suffix);
				this.$router.push({ name: this.routeName, params: { serviceName: this.selectedService.url_suffix, zip : val }});	
			}
		},
		validateBeforeSubmit() {
			this.$validator.validateAll().then((result) => {
				if (result && !this.loading) {
					this.ServiceProviderPage();
					this.errorMessage = "";
					return;
				}
				this.errorMessage = this.errorBag.all()[0];
			});
		},  
		limitText (count) {
			return `and ${count} other services`
		},
		asyncFind: _.debounce(function(query) {
			let self = this;
			this.loading = true;
			if(!query) {
				this.loading = false;
			}
			if(!query || query.length < 3) {
				return;
			};
			this.searchUrl  = 'api/service?keyword=' + query + '&filter_by_status=1&order_by=title';
			this.isLoading = true;
			this.$http.get(this.searchUrl).then(response => {
				response = response.data;
				self.options = response.data;
				self.isLoading = false;

			}).catch(error=>{
			});
		}, 1000),
		changecategorypopup(service) {
			this.selectedService = service;
			if(localStorage['zip']) {
				this.onSelectCategory(localStorage['zip']);
			}else {
				this.categoryPopup = true;	
			}
		},
		hideModal(){
			this.categoryPopup = false;
		},
		ServiceProviderPage() {

			this.btnLoading = true;
			this.isTouched = false;
			if(!this.searchValue) {
				this.btnLoading = false;
				this.isTouched = true;
				return;
			}
			localStorage.setItem('zip', this.zipCode);
			if(this.searchValue.parent) {
                localStorage.setItem("parentService", this.searchValue.parent.url_suffix);
                localStorage.setItem("childService", this.searchValue.url_suffix);
   				this.$router.push({ name: this.routeName, params: { serviceName: this.searchValue.parent.url_suffix, childServiceName: this.searchValue.url_suffix, zip : this.zipCode }});
			}else {
                localStorage.setItem("parentService", "");
                localStorage.setItem("childService", this.searchValue.url_suffix);
				this.$router.push({ name: this.routeName, params: { serviceName: this.searchValue.url_suffix, zip : this.zipCode }});	
			}
			
		},
		getList(data , page , successCallback) {
			let self = this;
			self.showNoRecordFound = false;
			self.loadingService = true;
			let url = 'api/service';

			if(typeof(page) == 'undefined' || !page){                        
				self.records = [];
			}

			if((typeof(data) !== 'undefined' && data)){
				var query  = '?pagination=true';
				if(data.service_category) {
					var query  = query + '&service_category='+data.service_category;
				}
		        url = url+query;
		    }else{
		    	var query  = '?pagination=true';
		    	url = url+query;
		    }

		    if(typeof(page) !== 'undefined' && page){
		    	url += '&page='+page;   
		    }
		    self.$http.get(url).then(response => {
		    	response = response.data;
		    	self.allServices = response.data;
		    	if(!self.allServices.length) {
		    		self.showNoRecordFound = true;
		    	}
		    	self.totalServicesCount = response.service_count;

		    	self.pagination = response.pagination;

				self.loadingService = false;
		    	successCallback(true);

		    }).catch(error=>{
		    	if(error.status == 403) {
		    		self.pagination = false;
		    	}
				self.loadingService = false;

		    });
	},

	getSubServices (subservices) {
		if(subservices.length > 3) {
			subservices = subservices.slice(0,3);
		}
		return subservices;
	},
	getRemainingSubServices (subservices) {
		if(subservices.length > 3) {
			subservices = subservices.slice(3);
			return subservices;
		}
		return [];
	},
},
mounted(){
	this.authUser = JSON.parse(this.$store.getters.getAuthUser);
	this.routeName = 'Explore_Detail';
		if(localStorage['zip']) {
			this.zipCode = localStorage.getItem('zip');
	}else if(this.authUser) {
		this.zipCode = this.authUser.zip_code? this.authUser.zip_code : null;
		localStorage.setItem("zip", this.zipCode);
	}
	this.getList({service_category: 'All'},false);
},
watch: {
	zipCode(val) {
		if(val.length > 5) {
			val = val.substr(0, 5);
		}
		this.zipCode = val; 
	},
	searchValue(val) {
		if(val == null) {
			this.loading = false;
		}
	}
},

computed: {
	getExploreServices () {
		var result = _.map(this.allServices, function(value, key) {
			  		if(value.subservices.length && value.is_display_service_nav) {
				  		return value;
			  		}
				});
		result = _.without(result, undefined);
		return result;
	},
	getRemainingWithServices () {
		var result = _.map(this.allServices, function(value, key) {
			  		if(value.subservices.length && !value.is_display_service_nav) {
				  		return value;
			  		}
				});
		result = _.without(result, undefined);
		return result;
	},
	getOtherServices () {
		var result = _.map(this.allServices, function(value, key) {
			  		if(!value.subservices.length && !value.parent_id) {
				  		return value;
			  		}
				});
		result = _.without(result, undefined);
		return result;
	},
	isInvalid () {
		return this.isTouched && !this.searchValue
	}
},
}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>