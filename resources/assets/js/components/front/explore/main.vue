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
									<multiselect v-model="value" :options="options"  placeholder="What service do you need?" name="" track-by="name" label="title" :loading="isLoading"  id="ajax" open-direction="bottom" :searchable="true" :options-limit="300" :limit="3" :limit-text="limitText" :max-height="600" :show-no-results="false"  @search-change="asyncFind"></multiselect>
									<div class="container-zip-code">
										<i class="icon-location"></i>
										<input type="number" placeholder="Zip code" class="form-control lg zip-code" v-mode="zipCode" name="">
									</div>
								</div>
								<button class="btn btn-primary" @click="ServiceProviderPage">
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

				<div class="category-section" v-for="maincategory in category">
					<div class="category-title">
						<h2>{{ maincategory.title }}</h2>
					</div>
					<div class="category-items">

						<div class="items" v-for="categoryabc in maincategory.categoryitems">
							<a @click="changecategorypopup" href="javascript:void(0);">
								<div class="item-image" v-bind:style="{'background-image': 'url('+ categoryabc.itemimage +')',}"></div>
								<h4>{{categoryabc.itemtitle}}</h4>
							</a>
						</div>
		        		<div class="showmore showmore-link clearfix"><a v-b-toggle="maincategory.title" href="javascript:void(0);">View all services related to {{ maincategory.title }} <i class="icon-keyboard_arrow_right"></i></a></div>
						<b-card no-body class="related-service-category">

							<b-collapse :id="maincategory.title" accordion="my-accordion" role="tabpanel">
								<b-card-body>
					        		<div class="category-items">
					        			<ul class="item-list-container">
						        			<li class="items-list" v-for="category in maincategory.relatedcategory">
						        				<a href="javascript:void(0);">
							        				<p>{{category.relatedcategorytitle}}</p>
							        			</a>
							        		</li>
										</ul>
					        		</div>					        											
								</b-card-body>
							</b-collapse>
						</b-card>


					</div>
				</div>


			</div>
		</div>


		<div class="other-categories section-grey section elementary-banner">
			<div class="container element-index">
				<div class="category-section"  v-for="othercategory in othercategory">
					<div class="category-title">
						<h2>{{othercategory.title}}</h2>
					</div>
					<div class="category-items">
						<ul class="item-list-container">
							<li class="items-list" v-for="categorypresent in othercategory.categoryitems">
								<a href="javascript:void(0);">
									<p>{{categorypresent.name}}</p>
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
	export default {
		data () {
			return {
				value: '',
				isLoading: false,
				searchUrl: 'api/service',
				options: [],
				zipCode: '',
				bannerimage: '/images/front/explore/banner-bg/banner.jpg',
				contentimage: '/images/front/explore/banner-bg/explore-banner.png',
				categoryval: false,
				category:[

				{

					title:'Electricians',
					categoryitems:[
					{
						itemimage: '/images/front/explore/electrician1.jpg',
						itemtitle: 'Electrical and Wiring Repair'
					},

					{
						itemimage: '/images/front/explore/electrician2.jpg',
						itemtitle: 'Air conditioning repair',
					},

					{
						itemimage: '/images/front/explore/electrician3.jpg',
						itemtitle: 'Heating system repair',
					},

					],
			relatedcategory:[
				{					
					relatedcategorytitle: 'Electrical and Wiring Repair'
				},

				{
					relatedcategorytitle: 'Air conditioning repair',
				},

				{
					relatedcategorytitle: 'Heating system repair',
				},
				{
					relatedcategorytitle: 'Wiring',
				},

				{
					relatedcategorytitle: 'Mobile Repairing',
				},
				{
					relatedcategorytitle: 'Home Wiring',
				},

				{
					relatedcategorytitle: 'Industrial Electrician',
				},											
			],

				},

				{

					title:'Carpenters',
					categoryitems:[
					{
						itemimage: '/images/front/explore/carpenter1.jpg',
						itemtitle: 'General carpentry',
					},

					{
						itemimage: '/images/front/explore/carpenter2.jpg',
						itemtitle: 'Furniture repair & Installation',
					},

					{
						itemimage: '/images/front/explore/carpenter3.jpg',
						itemtitle: 'Wooden deck building & repair',
					},
					],
			relatedcategory:[
				{					
					relatedcategorytitle: 'Electrical and Wiring Repair'
				},

				{
					relatedcategorytitle: 'Air conditioning repair',
				},

				{
					relatedcategorytitle: 'Heating system repair',
				},
				{
					relatedcategorytitle: 'Wiring',
				},

				{
					relatedcategorytitle: 'Mobile Repairing',
				},
				{
					relatedcategorytitle: 'Home Wiring',
				},

				{
					relatedcategorytitle: 'Industrial Electrician',
				},											
			],			


				},

				{

					title:'Cleaning Services',
					categoryitems:[
					{
						itemimage: '/images/front/explore/cleaning1.jpg',
						itemtitle: 'House Cleaners',
					},

					{
						itemimage: '/images/front/explore/cleaning2.jpg',
						itemtitle: 'Carpet Cleaners',
					},

					{
						itemimage: '/images/front/explore/cleaning3.jpg',
						itemtitle: 'Exterior Cleaners',
					},
					],
			relatedcategory:[
				{					
					relatedcategorytitle: 'Electrical and Wiring Repair'
				},

				{
					relatedcategorytitle: 'Air conditioning repair',
				},

				{
					relatedcategorytitle: 'Heating system repair',
				},
				{
					relatedcategorytitle: 'Wiring',
				},

				{
					relatedcategorytitle: 'Mobile Repairing',
				},
				{
					relatedcategorytitle: 'Home Wiring',
				},

				{
					relatedcategorytitle: 'Industrial Electrician',
				},											
			],			


				},


				{

					title:'Painters',
					categoryitems:[
					{
						itemimage: '/images/front/explore/painter1.jpg',
						itemtitle: 'Interior Painting',
					},

					{
						itemimage: '/images/front/explore/painter2.jpg',
						itemtitle: 'Wallpaper Installation',
					},

					{
						itemimage: '/images/front/explore/painter3.jpg',
						itemtitle: 'Deck Staining',
					},
					],
			relatedcategory:[
				{					
					relatedcategorytitle: 'Electrical and Wiring Repair'
				},

				{
					relatedcategorytitle: 'Air conditioning repair',
				},

				{
					relatedcategorytitle: 'Heating system repair',
				},
				{
					relatedcategorytitle: 'Wiring',
				},

				{
					relatedcategorytitle: 'Mobile Repairing',
				},
				{
					relatedcategorytitle: 'Home Wiring',
				},

				{
					relatedcategorytitle: 'Industrial Electrician',
				},											
			],			

				},

				{

					title:'Movers',
					categoryitems:[
					{
						itemimage: '/images/front/explore/mover1.jpg',
						itemtitle: 'Local Moving (under 50 miles)',
					},

					{
						itemimage: '/images/front/explore/mover2.jpg',
						itemtitle: 'Long Distance Moving',
					},

					{
						itemimage: '/images/front/explore/mover3.jpg',
						itemtitle: 'Furniture Moving & Heavy Lifting',
					},
					],
			relatedcategory:[
				{					
					relatedcategorytitle: 'Electrical and Wiring Repair'
				},

				{
					relatedcategorytitle: 'Air conditioning repair',
				},

				{
					relatedcategorytitle: 'Heating system repair',
				},
				{
					relatedcategorytitle: 'Wiring',
				},

				{
					relatedcategorytitle: 'Mobile Repairing',
				},
				{
					relatedcategorytitle: 'Home Wiring',
				},

				{
					relatedcategorytitle: 'Industrial Electrician',
				},											
			],			

				},


				],


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

		    limitText (count) {
		      return `and ${count} other services`
		    },
			asyncFind (query) {
				let self = this;
				console.log(query);
		        this.searchUrl  = 'api/service?keyword='+query;
				this.isLoading = true;
				this.$http.get(this.searchUrl).then(response => {
					response = response.data.response;
					console.log(response, 889898);
					self.options = response.data;
					self.isLoading = false;

				}).catch(error=>{
				});
			},
			changecategorypopup() {
				this.categoryval = true;
			},

			HideModal(){
				this.categoryval = false;
			},
			ServiceProviderPage() {
				console.log(this.value, 5555);
				//this.$router.push('/explore/service_provider');
			}

		},
	}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>