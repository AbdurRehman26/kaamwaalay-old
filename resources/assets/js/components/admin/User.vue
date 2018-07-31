<template>
	<div class="panel-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-strip">
                    <div class="float-left">
                       <h2 class="page-title">Admin Users</h2>
                    </div>
                    <div class="float-right">
                        <a href="javascript:;" class="btn btn-primary" @click="ShowModal">Add User</a>
                    </div>
                </div>
            </div>
        </div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-area">
		    			<b-table :bordered="bordered"  hover :items="items" :fields="fields"></b-table>
		    		</div>
		  		</div>
		    </div>

		 <add-new-user @HideModalValue="HideModal" :showModalProp="showModalValue"></add-new-user>
	</div>
</template>
<script>
export default {
  data () {
    return {
    	showModalValue: false,

      	fields: [ 'first_name', 'last_name', 'email_address', 'access_Level' , 'join_date', 'status', 'actions' ],

      	items: [
		        { isActive: true, first_name: 'Dickerson', last_name: 'Macdonald', email_address: 'psm@admin.com', access_Level: 'Full', join_date: '22-01-2018', status: 'Active', actions: 'Change status'},
		        { isActive: false, first_name: 'Larsen', last_name: 'Shaw', email_address: 'psm@admin.com', access_Level: 'Review', join_date: '24-02-2018', status: 'Active', actions: 'Change status' },
		        { isActive: false, first_name: 'Geneva', last_name: 'Wilson', email_address: 'psm@admin.com', access_Level: 'Full', join_date: '29-04-2018', status: 'Active', actions: 'Change status' },
		        { isActive: true, first_name: 'Jami', last_name: 'Carney', email_address: 'psm@admin.com', access_Level: 'Review', join_date: '25-08-2018', status: 'Active', actions: 'Change status' }
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
