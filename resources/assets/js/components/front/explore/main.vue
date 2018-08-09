<template>

    <div class="content-area">
        <div class="main-banner elementary-banner">
            <div class="main-img">
                <img  :src="bannerimage">
            </div>
            <div class="content">
                <div class="verticle-align">
                    <div class="inner">
                        <div class="container element-index">
                            <div class="content-inner md">
                                <h2 class="heading-large">Find best skilled service professionals near you.</h2>
                                <div class="search-filter">
                                     <input type="text" placeholder="What service do you need?" class="form-control search-service" name="">
                                     <div class="container-zip-code">
                                     	<i class="icon-location"></i>
                                     	<input type="number" placeholder="Zip code" class="form-control zip-code" name="">
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
						<div class="elements">
							<img class="top-left width-max" src="/images/front/banner-bg/bg-5.png">				
							<img class="bottom-center" src="/images/front/banner-bg/bg-2.png">
							<img class="bottom-right width-max" src="/images/front/banner-bg/bg-9.png">
						</div>                                                             
                    </div>
                </div>
            </div>
        </div>

        <div class="featured-categories section">
        	<div class="container">
	        	<div class="category-section">
	        		<div class="category-title">
	        			<h2>Electricians</h2>
	        		</div>
	        		<div class="category-items">
	        			<div class="items" v-for="category in electricancategoryitems">
	        				<a href="javascript:void(0);">
		        			<div class="item-image" v-bind:style="{'background-image': 'url('+ category.itemimage +')',}"></div>
		        				<h4>{{category.itemtitle}}</h4>
		        			</a>
		        		</div>
		        		<div class="showmore"><a href="javascript:void(0);">View all services related to electricians <i class="icon-keyboard_arrow_right"></i></a></div>
	        				
	        		</div>        		
	        	</div>




<!-- 	        	<div class="category-section" v-for="maincategory in category">
	        		<div class="category-title">
	        			<h2>{{ maincategory }}</h2>
	        		</div>
	        		<div class="category-items">
	        			<div class="items" v-for="categoryabc in maincategory">
	        				<a href="javascript:void(0);">
		        			<div class="item-image" v-bind:style="{'background-image': 'url('+ categoryabc.itemimage +')',}"></div>
		        				<h4>{{categoryabc.itemtitle}}</h4>
		        			</a>
		        		</div>
		        		<div class="showmore"><a href="javascript:void(0);">View all services related to electricians <i class="icon-keyboard_arrow_right"></i></a></div>
	        				
	        		</div>        		
	        	</div> -->




        	</div>
        </div>

    </div>	
</template>

<script>
export default {
  data () {
    return {
		bannerimage: '/images/front/explore/banner-bg/banner.jpg',
		contentimage: '/images/front/explore/banner-bg/explore-banner.png',

		electricancategoryitems:[
		{
			itemimage: '/images/front/explore/electrician1.jpg',
			itemtitle: 'Electrical and Wiring Repair',
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


		category:[
				 ['Electricians',
		{
			itemimage: '/images/front/explore/electrician1.jpg',
			itemtitle: 'Electrical and Wiring Repair',
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

			 ['Carpenters',
		{
			itemimage: '/images/front/explore/carpenter1.jpg',
			itemtitle: 'Electrical and Wiring Repair',
		},
		{
			itemimage: '/images/front/explore/carpenter2.jpg',
			itemtitle: 'Air conditioning repair',
		},
		{
			itemimage: '/images/front/explore/carpenter3.jpg',
			itemtitle: 'Heating system repair',
		},				
			],
	
		],



    	}
  	},
    methods: {

    }
}
</script>