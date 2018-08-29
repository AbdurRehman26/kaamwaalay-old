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
									<div :class="{ 'invalid': isInvalid }">
										<multiselect v-model="searchValue" :options="options"  placeholder="What service do you need?" track-by="id" label="title" :loading="isLoading"  id="ajax" open-direction="bottom" :searchable="true" :options-limit="300" :limit="3" :limit-text="limitText" :max-height="600" :show-no-results="false"  @search-change="asyncFind" name="search" ></multiselect>
									</div>
									<div class="container-zip-code">
										<i class="icon-location"></i>
										<input type="number" placeholder="Zip code" class="form-control lg zip-code" v-model="zipCode" name="zip" :class="[errorBag.first('zip') ? 'is-invalid' : '']" v-validate="'required'">
									</div>
								</div>
								<button class="btn btn-primary" @click="validateBeforeSubmit">
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

				<div class="category-section" v-for="service in getFiveServices">
					<div class="category-title">
						<h2>{{service.title}}</h2>
					</div>
					<div class="category-items">

						<div class="items" v-for="subservice in service.subservices.data">
							<a @click="changecategorypopup" href="javascript:void(0);">
								<div class="item-image" v-bind:style="{'background-image': 'url('+ subservice.images[0].upload_url +')',}"></div>
								<h4>{{subservice.title}}</h4>
							</a>
						</div>
						<div class="showmore showmore-link clearfix"><a href="/explore/service_provider">View all services related to electricians <i class="icon-keyboard_arrow_right"></i></a></div>

					</div>
				</div>


			</div>
		</div>


		<div class="other-categories section-grey section elementary-banner" v-if="getRemaining4Services.length">
			<div class="container element-index">
				<div class="category-section"  v-for="othercategory in getRemaining4Services">
					<div class="category-title">
						<h2>{{othercategory.title}}</h2>
					</div>
					<div class="category-items">
						<ul class="item-list-container">
							<li class="items-list" v-for="othercategorySubservice in othercategory.subservices.data">
								<a href="javascript:void(0);">
									<p>{{othercategorySubservice.title}}</p>
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

		<category-popup @HideModalValue="HideModal" :showModalProp="categoryval"></category-popup>

	</div>
</template>

<script>

import _ from 'lodash';
export default {
	data () {
		return {
			allServices: [],
			searchValue: '',
			isLoading: false,
			searchUrl: 'api/service',
			options: [],
			zipCode: '',
			errorMessage: '',
			isTouched: false,
			invalidSearch: true,
			bannerimage: '/images/front/explore/banner-bg/banner.jpg',
			contentimage: '/images/front/explore/banner-bg/explore-banner.png',
			categoryval: false,

			othercategory:[

			{
				title:'Crafts',
				categoryitems:[

				{
					name: 'Custom Airbrushing',
				},
				{
					name: 'Illustrating',
				},

				{
					name: 'Scrapbooking',
				},
				{
					name: 'Embroidery',
				},
				{
					name: 'Portrait Artistry',
				},
				{
					name: 'Songwriting',
				},
				{
					name: 'Engraving',
				},
				{
					name: 'Powder Coating',
				},

				],
			},
			{
				title:'Legal',
				categoryitems:[

				{
					name: 'Consumer Attorney',
				},
				{
					name: 'Contracts Attorney',
				},

				{
					name: 'Corporate Law Attorney',
				},
				{
					name: 'Court Interpreting',
				},
				{
					name: 'Disability Attorney',
				},
				{
					name: 'Estate Attorney',
				},
				{
					name: 'Immigration Attorney',
				},
				{
					name: 'Intellectual Property Attorney',
				},
				{
					name: 'International Law Attorney',
				},
				{
					name: 'Labor and Employment Attorney',
				},
				{
					name: 'Legal Document Preparation',
				},
				{
					name: 'Mediation',
				},
				{
					name: 'Personal Injury Attorney',
				},
				{
					name: 'Process Serving',
				},
				{
					name: 'Tax Attorney',
				},


				],
			},

			{
				title:'Photography',
				categoryitems:[

				{
					name: 'Aerial Photography',
				},
				{
					name: 'Boudoir Photography',
				},

				{
					name: 'Commercial Photography',
				},
				{
					name: 'Engagement Photography',
				},
				{
					name: 'Nature Photography',
				},
				{
					name: 'Pet Photography',
				},
				{
					name: 'Portrait Photography',
				},
				{
					name: 'Sports Photography',
				},
				{
					name: 'Video Editing',
				},

				],
			},

			{
				title:'Business',
				categoryitems:[

				{
					name: 'Accounting',
				},
				{
					name: 'Business Consulting',
				},

				{
					name: 'Data Recovery Service',
				},
				{
					name: 'Individual Tax Preparation',
				},
				{
					name: 'Marketing',
				},
				{
					name: 'Payroll Services',
				},
				{
					name: 'Personal Financial Planning',
				},
				{
					name: 'Real Estate Agent Services',
				},

				],
			},

			{
				title:'Others',
				categoryitems:[

				{
					name: 'Translation',
				},
				{
					name: 'UI Design',
				},

				{
					name: 'Public Relations',
				},
				{
					name: 'Grass cutting',
				},
				{
					name: 'Yard Work',
				},
				{
					name: 'Replant Seedlings',
				},
				{
					name: 'Pick Up & Delivery',
				},
				{
					name: 'Pet Care',
				},

				],

			},

			],



		}
	},
	methods: {
		onTouch () {
			this.isTouched = true
		},
		validateBeforeSubmit() {
			this.$validator.validateAll().then((result) => {
				if (result) {
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
			if(!query || query.length < 3) return;
			this.searchUrl  = 'api/service?keyword='+query;
			this.isLoading = true;
			this.$http.get(this.searchUrl).then(response => {
				response = response.data.response;
				self.options = response.data;
				self.isLoading = false;

			}).catch(error=>{
			});
		}, 1000),
		changecategorypopup() {
			this.categoryval = true;
		},

		HideModal(){
			this.categoryval = false;
		},
		ServiceProviderPage() {
			this.isTouched = false;
			if(!this.searchValue) {
				this.isTouched = true;
				return;
			}
			this.$router.push({ name: 'Explore_Detail', params: { serviceId: this.searchValue.id, zip : this.zipCode }})
			//this.$router.push('/explore/service_provider');
		},
		getList(data , page , successCallback) {
			let self = this;
			self.showNoRecordFound = false;
			let url = 'api/service';

			if(typeof(page) == 'undefined' || !page){                        
				self.records = [];
			}

			if((typeof(data) !== 'undefined' && data)){
				var query  = '?pagination=true';
				if(data.service_category) {
					var query  = query + '&service_category='+data.service_category;
				}
		        //var query  = '?pagination=true&keyword='+this.search+'&filter_by_featured='+this.search.filter_by_featured;
		        url = url+query;
		    }else{
		    	var query  = '?pagination=true';
		    	url = url+query;
		    }

		    if(typeof(page) !== 'undefined' && page){
		    	url += '&page='+page;   
		    }

		    self.$http.get(url).then(response => {
		    	response = response.data.response;
		    	self.allServices = response.data;
		    	console.log(self.allServices, 3333333);

		    	if(!self.allServices.length) {
		    		self.showNoRecordFound = true;
		    	}
		    	var serviceArray = _.filter(self.allServices, {parent_id: null});
		    	self.totalServicesCount = response.service_count;

		    	self.pagination = response.pagination;

		    	successCallback(true);

		    }).catch(error=>{
		    	if(error.status == 403) {
		    		self.pagination = false;
		    	}

		    });
	},
},
mounted(){
	this.getList({service_category: 'All'},false);
},
watch: {

},

computed: {
	getFiveServices () {
		var result = _.map(this.allServices, function(value, key) {
			  		if(value.subservices.data.length) {
				  		return value;
			  		}
				});
		result = _.without(result, undefined);
		if(result.length > 2) {
			result = result.slice(0,2);
		}
		return result;
	},
	getRemaining4Services () {
		var result = _.map(this.allServices, function(value, key) {
			  		if(value.subservices.data.length) {
				  		return value;
			  		}
				});
		result = _.without(result, undefined);

		if(result.length > 3) {
			result = result.slice(3,5);
		}else {
			result = result.slice(3);
		}
		return result;
	},
	isInvalid () {
		return this.isTouched && !this.searchValue
	}
},
}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>