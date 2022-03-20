<template>
	<div class="content-area">
		<div class="main-banner elementary-banner explore-banner">
			<div class="main-img">
				<img  :src="bannerimage">
			</div>
			<div class="content">
				<div class="verticle-align">
					<div class="inner">
						<div class="element-column-image">
							<img :src="contentimage">
						</div>

						<div class="container element-index" style="left: 20% !important;">
							<div class="content-inner md">
								<h1 class="heading-large">Find best skilled House Help.</h1>
								<div class="search-filter">
									<div class="custom-multi" :class="{ 'invalid': isInvalid }">

									<multiselect  v-model="searchServiceValue" :options="servicesList"  placeholder="What service do you need?" track-by="id" label="title"  open-direction="bottom" :searchable="true" :options-limit="500" :limit="8" :max-height="700" name="search" :internal-search="true" :showNoResults="true">
											<span slot="noResult">No service found.</span>
									</multiselect>

									</div>
									<div class="container-zip-code">
										<multiselect  v-model="searchAreaValue" :options="areasList"  placeholder="Where do you need?" track-by="id" label="name"  open-direction="bottom" :searchable="true" :options-limit="500" :limit="8" :max-height="700" name="search" :internal-search="true" :showNoResults="true">
												<span slot="noResult">No service found.</span>
										</multiselect>
									</div>
								</div>
								<button :class="[btnLoading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' , 'apply-primary-color' ]" @click="validateBeforeSubmit" :disabled="loading">
									<span>Search</span>
								</button>
							</div>
						</div>


						<span class="splash-design md d-1 top-left"></span>
						<span class="splash-design d-4 bottom-right lg"></span>
						<span class="splash-design d-6 bottom-left sm"></span>
					</div>
				</div>
			</div>
		</div>

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
			allCityAreas: [],
			searchServiceValue: '',
			isLoading: false,
			loadingService: true,
			searchUrl: 'api/service',
			options: [],
			zipCode: '',
			searchServiceValue : '',
			searchAreaValue: '',
			errorMessage: '',
			isTouched: false,
			invalidSearch: true,
			bannerimage: '/images/front/explore/banner-bg/banner.jpg',
			contentimage: '/images/front/explore/banner-bg/maid-banner.png',
			categoryPopup: false,
			loading: false,
			showCollapse: true,
			authUser: '',
			routeName: '',
		}
	},
	methods: {

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
		ServiceProviderPage() {

			this.btnLoading = true;
			this.isTouched = false;
			if(!this.searchServiceValue) {
				this.btnLoading = false;
				this.isTouched = true;
				return;
			}

			if(this.searchServiceValue.parent) {
                localStorage.setItem("parentService", this.searchServiceValue.parent.url_suffix);
                localStorage.setItem("childService", this.searchServiceValue.url_suffix);
   							this.$router.push({ name: this.routeName, params: { serviceName: this.searchServiceValue.parent.url_suffix, childServiceName: this.searchServiceValue.url_suffix, cityArea : this.searchAreaValue?.slug }});
			}else {
                localStorage.setItem("parentService", "");
                localStorage.setItem("childService", this.searchServiceValue.url_suffix);
								this.$router.push({ name: this.routeName, params: { serviceName: this.searchServiceValue.url_suffix, cityArea : this.searchAreaValue?.slug }});
			}

		},

		getList(data , page , successCallback) {
			let self = this;
			self.loadingService = true;
			let url = 'api/service';

			if(typeof(page) == 'undefined' || !page){
				self.allServices = [];
			}

				self.$http.get(url).then(response => {
					response = response.data;
					self.allServices = response.data;
					if(!self.allServices.length) {
						self.showNoRecordFound = true;
					}

				self.loadingService = false;
					successCallback(true);

				}).catch(error=>{
					if(error.status == 403) {
						self.pagination = false;
					}
				self.loadingService = false;

				});
		},

		getCityAreaList(data , page , successCallback) {
			let self = this;
			self.loadingAreas = true;
			let url = 'api/city-area';

			if(typeof(page) == 'undefined' || !page){
				self.records = [];
			}

				self.$http.get(url).then(response => {
					response = response.data;
					self.allCityAreas = response.data;
					if(!self.allCityAreas.length) {
						self.showNoRecordFound = true;
					}

				self.loadingAreas = false;
					successCallback(true);

				}).catch(error=>{
					if(error.status == 403) {
						self.pagination = false;
					}
				self.loadingAreas = false;

				});
		},
},
mounted(){
	this.authUser = JSON.parse(this.$store.getters.getAuthUser);
	this.routeName = 'Explore_Detail';
	this.getCityAreaList({},false);
	this.getList({}, false);
},
watch: {
	searchServiceValue(val) {
		if(val == null) {
			this.loading = false;
		}
	}
},

computed: {
	servicesList(){
			return this.allServices;
	},
	areasList(){
		return this.allCityAreas;
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
	isInvalid () {
		return this.isTouched && !this.searchServiceValue
	}
},
}
</script>
