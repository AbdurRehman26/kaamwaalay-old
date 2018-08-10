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
                                     <input type="text" placeholder="What service do you need?" class="form-control lg search-service" name="">
                                     <div class="container-zip-code">
                                     	<i class="icon-location"></i>
                                     	<input type="number" placeholder="Zip code" class="form-control lg zip-code" name="">
                                     </div>
                                </div>
                                <button class="btn btn-primary">
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
		        		<div class="showmore"><a href="javascript:void(0);">View all services related to electricians <i class="icon-keyboard_arrow_right"></i></a></div>

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

        changecategorypopup() {
            this.categoryval = true;
        },
        HideModal(){
            this.categoryval = false;
        },

    },
}
</script>
