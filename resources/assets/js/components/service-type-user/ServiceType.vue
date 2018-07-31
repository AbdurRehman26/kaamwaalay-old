<template>
	<div>
		<template>
			<div class="row">
				<div class="col-md-8">
					<div class="table-area">
		    			<b-table :bordered="bordered"  hover :items="items" :fields="fields"></b-table>
		    		</div>
		  		</div>
		  		<div class="col-md-3">
		  			<a href="javascript:;" class="btn btn-primary" @click="ShowModal">Add Service</a>
		  		</div>
		    </div>
		</template>
		 <!-- <add-new-user @HideModalValue="HideModal" :showModalProp="showModalValue"></add-new-user> -->
	</div>
</template>
<script>
export default {
  data () {
    return {
    	showModalValue: false,

      	fields: [ 'first_name', 'last_name', 'email_address', 'access_Level' , 'join_date' ],

      	items: [
		        { isActive: true, first_name: 'Dickerson', last_name: 'Macdonald', email_address: 'psm@admin.com', access_Level: 'Full', join_date: '22-01-2018'},
		        { isActive: false, first_name: 'Larsen', last_name: 'Shaw', email_address: 'psm@admin.com', access_Level: 'Review', join_date: '24-02-2018' },
		        { isActive: false, first_name: 'Geneva', last_name: 'Wilson', email_address: 'psm@admin.com', access_Level: 'Full', join_date: '29-04-2018' },
		        { isActive: true, first_name: 'Jami', last_name: 'Carney', email_address: 'psm@admin.com', access_Level: 'Review', join_date: '25-08-2018' }
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