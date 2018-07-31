<template>
	<div class="panel">
		
			<div class="row">
				<div class="col-md-10">
					<div class="table-area">
		    			<b-table :bordered="bordered"  hover :items="items" :fields="fields">
		    				<template slot="actions" slot-scope="data">
						        <a class="action-link" @click="statuschange" :href="`javascript:void(0);`">
						        	{{data.value}}
						        </a>
						    </template>
		    			</b-table>
		    		</div>
		  		</div>
		  		<div class="col-md-2">
		  			<a href="javascript:;" class="btn btn-primary" @click="ShowModal">Add User</a>
		  		</div>
		    </div>
		
		 <add-new-user @HideModalValue="HideModal" :showModalProp="showModalValue"></add-new-user>
		 <change-status-user @HideModalValue="HideModal" :showModalProp="changestatus"></change-status-user>
	</div>
</template>
<script>
export default {
  data () {
    return {
    	showModalValue: false,
        changestatus: false,

      	fields: [ 'first_name', 'last_name', 'email_address', 'access_Level' , 'join_date', 'status', 
      	'actions' ],

      	items: [
		        { isActive: true, first_name: 'Dickerson', last_name: 'Macdonald', email_address: 'psm@admin.com', access_Level: 'Full', join_date: '22-01-2018', status: 'Active', 
		        actions: 'Change Status' },
		        { isActive: false, first_name: 'Larsen', last_name: 'Shaw', email_address: 'psm@admin.com', access_Level: 'Review', join_date: '24-02-2018', status: 'Deactive', actions: 'Change Status', _cellVariants: { status: 'error' } },
		        { isActive: false, first_name: 'Geneva', last_name: 'Wilson', email_address: 'psm@admin.com', access_Level: 'Full', join_date: '29-04-2018', status: 'Active', actions: 'Change Status' },
		        { isActive: true, first_name: 'Jami', last_name: 'Carney', email_address: 'psm@admin.com', access_Level: 'Review', join_date: '25-08-2018', status: 'Deactive', actions: 'Change Status', _cellVariants: { status: 'error' } }
	        ]
	   
    	}
  	},
    methods: {
        ShowModal(){
            this.showModalValue = true;
        },
        HideModal(){
            this.showModalValue = false;
            this.changestatus = false;

        },
        statuschange(){
            this.changestatus = true;
            // this.changestatus = true;
        }
    }
}
</script>