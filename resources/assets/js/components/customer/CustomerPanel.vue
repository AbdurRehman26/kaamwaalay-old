<template>
	<div class="panel-inner">
		<div class="row">
            <div class="col-md-12">
                <div class="page-title-strip">
                    <div class="float-left">
                       <h2 class="page-title">Customer</h2>
                    </div>
                    <div class="float-right">
                        <a href="javascript:;" class="btn btn-primary" @click="AddCustomer">Add Customer</a>
                    </div>
                </div>
            </div>
				<div class="col-md-12">
					<div class="table-area customer-table">
		    			<b-table :bordered="bordered" responsive  hover :items="items" :fields="fields">
						    <template slot="photo" slot-scope="data">
						         <b-img src="images/dummy/user-pic.jpg" class="user-img" fluid alt="Responsive image" />
						    </template>
		    			</b-table>
		    		</div>
		  		</div>
		    </div>
	</div>
</template>

<script>
export default {
  data () {
    return {
    	service: false,

      	fields: ['photo', 'first_name', 'last_name', 'email_address', 'contact_number' , 'avg_rating',
      	 'status', 'join_date', 'address', 'country', 'city', 'state', 'zipcode'  ],

      	items: [
		        { isActive: true, first_name: 'ELif', last_name: 'Methew', email_address: 'www.psm.com', contact_number: '000 252 5524 2521', avg_rating: '4', photo: '', status: 'Pending', join_date: '2-2-2015', address: 'Los Angles 25 Street' ,country: 'America', city: 'Los Angles', state: 'USA', zipcode: '54125', _cellVariants: { status: 'error' } }
	        ]
    	}
  	},
    
    methods: {

        HideModal(){
            this.service = false;
            this.parentservice = false;
            this.servicedetail = false;
            this.featuredservice = false;
        },
    }
}
</script>
