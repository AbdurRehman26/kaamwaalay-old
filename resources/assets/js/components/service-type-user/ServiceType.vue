<template>
	<div class="panel">
		<div class="row">
				<div class="col-md-10">
					<div class="table-area">
		    			<b-table :bordered="bordered"  hover :items="items" :fields="fields"></b-table>
		    		</div>
		  		</div>
		  		<div class="col-md-2">
		  			<a href="javascript:;" class="btn btn-primary" @click="ShowModal">Add Service</a>
		  		</div>
		    </div>
		
		 <!-- <add-new-user @HideModalValue="HideModal" :showModalProp="showModalValue"></add-new-user> -->
	</div>
</template>
<script>
export default {
  data () {
    return {
    	showModalValue: false,

      	fields: [ 'parent_service', 'service_name', 'is_featured', 'hero_navigation' , 'description', 
      	'photo', 'URL' ],

      	items: [
		        { isActive: true, parent_service: 'Vehicles', service_name: 'Car', is_featured: 'yes', hero_navigation: 'No', description: 'On Sale', photo: '', URL: 'www.psm.com'},
		        { isActive: false, parent_service: 'Electronics', service_name: 'Computer', is_featured: 'No', hero_navigation: 'Yes', description: 'Repair', photo: '', URL: 'www.psm.com' },
		        { isActive: false, parent_service: 'Vehicles', service_name: 'Car', is_featured: 'yes', hero_navigation: 'No', description: 'On Sale', photo: '', URL: 'www.psm.com' },
		        { isActive: false, parent_service: 'Vehicles', service_name: 'Car', is_featured: 'yes', hero_navigation: 'No', description: 'On Sale', photo: '', URL: 'www.psm.com' }
	        ]
    	}
  	},
    methods: {
        ShowModal(){
            this.showModalValue = true;
        },
        HideModal(){
            this.showModalValue = false;
        }
    }
}
</script>