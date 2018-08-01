<template>
	<div class="panel-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-strip">
                    <div class="float-left">
                       <h2 class="page-title">Admin Users</h2>
                    </div>
                    <div class="float-right">
                        <a href="javascript:;" class="btn btn-primary" @click="ShowModalUser">Add User</a>
                    </div>
                </div>
            </div>
        </div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-area">
		    			<b-table :bordered="bordered"  hover :items="items" :fields="fields">
		    				<template slot="actions" slot-scope="data">
						        <div class="action-status">
                                    <span @click="StatusChange" class="icon-cog"></span>
						        	<span @click="ActionDelete" class="icon-delete"></span>
                                </div>     
						    </template>
		    			</b-table>
		    		</div>
		  		</div>
		    </div>

		 <add-new-user @HideModalValue="HideModal" :showModalProp="showModalValue"></add-new-user>
         <change-status-user @HideModalValue="HideModal" :showModalProp="changestatus"></change-status-user>
		 <delete-popup @HideModalValue="HideModal" :showModalProp="actiondelete"></delete-popup>
	</div>
</template>
<script>
export default {
  data () {
    return {
    	showModalValue: false,
        changestatus: false,
        actiondelete: false,

      	fields: [ 'first_name', 'last_name', 'email_address', 'access_Level' , 'join_date', 'status',
      	'actions' ],

      	items: [
		        { isActive: true, first_name: 'Dickerson', last_name: 'Macdonald', email_address: 'psm@admin.com', access_Level: 'Full', join_date: '22-01-2018', status: 'Active',
		        actions: 'Change Status',_cellVariants: { status: 'success-color' } },
		        { isActive: false, first_name: 'Larsen', last_name: 'Shaw', email_address: 'psm@admin.com', access_Level: 'Review', join_date: '24-02-2018', status: 'Deactive', actions: 'Change Status', _cellVariants: { status: 'error' }, _cellVariants: { actions: 'text-center' } },
		        { isActive: false, first_name: 'Geneva', last_name: 'Wilson', email_address: 'psm@admin.com', access_Level: 'Full', join_date: '29-04-2018', status: 'Active', actions: 'Change Status',_cellVariants: { status: 'success-color' } },
		        { isActive: true, first_name: 'Jami', last_name: 'Carney', email_address: 'psm@admin.com', access_Level: 'Review', join_date: '25-08-2018', status: 'Deactive', actions: 'Change Status', _cellVariants: { status: 'error' } }
	        ]

    	}
  	},
    methods: {
        ShowModalUser(){
            this.showModalValue = true;
        },
        StatusChange(){
            this.changestatus = true;
        },
        ActionDelete() {
            this.actiondelete = true;
        },
        HideModal(){
            this.showModalValue = false;
            this.changestatus = false;
            this.actiondelete = false;
        }
    }
}
</script>
