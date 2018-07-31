<template>
	<div class="panel-inner">
		<div class="row">
            <div class="col-md-12">
                <div class="page-title-strip">
                    <div class="float-left">
                       <h2 class="page-title">Service Type</h2>
                    </div>
                    <div class="float-right">
                        <a href="javascript:;" class="btn btn-primary" @click="ShowModal">Add Service</a>
                    </div>
                </div>
            </div>
				<div class="col-md-12">
					<div class="table-area">
		    			<b-table :bordered="bordered"  hover :items="items" :fields="fields">
		    				<template slot="URL" slot-scope="data">
						        <a class="action-link" :href="`javascript:void(0);`" target="_blank">
						        	{{data.value}}
						        </a>
						    </template>
						    <template slot="photo" slot-scope="data">
						         <b-img src="images/dummy/user-pic.jpg" class="user-img" fluid alt="Responsive image" />
						    </template>
		    			</b-table>
		    		</div>
		  		</div>
		    </div>
		    <add-service @HideModalValue="HideModal" :showModalProp="service"></add-service>
	</div>
</template>
<script>
export default {
  data () {
    return {
    	service: false,

      	fields: ['photo', 'parent_service', 'service_name', 'is_featured', 'hero_navigation' , 'description',
      	 'URL' ],

      	items: [
		        { isActive: true, parent_service: 'Vehicles', service_name: 'Car', is_featured: 'yes', hero_navigation: 'No', description: 'On Sale', photo: '', URL: 'www.psm.com'},
		        { isActive: false, parent_service: 'Electronics', service_name: 'Computer', is_featured: 'No', hero_navigation: 'Yes', description: 'Repair', photo: '', URL: 'www.psm.com' },
		        { isActive: false, parent_service: 'Vehicles', service_name: 'Car', is_featured: 'yes', hero_navigation: 'No', description: 'On Sale', photo: '', URL: 'www.psm.com' },
		        { isActive: false, parent_service: 'Vehicles', service_name: 'Car', is_featured: 'yes', hero_navigation: 'No', description: 'On Sale', photo: '', URL: 'www.psm.com' }
	        ]
    	}
  	},
    methods: {
        AddService(){
            this.service = true;
        },
        HideModal(){
            this.service = false;
        }
    }
}
</script>
