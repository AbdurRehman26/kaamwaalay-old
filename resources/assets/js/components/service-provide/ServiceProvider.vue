<template>
	<div class="panel-inner">
		<div class="row">
            <div class="col-md-12">
                <div class="page-title-strip">
                    <div class="float-left">
                       <h2 class="page-title">Service Provider</h2>
                    </div>
                    <div class="float-right">
                        <a href="javascript:;" class="btn btn-primary" @click="AddService">Add Service Provider</a>
                    </div>
                </div>
            </div>
				<div class="col-md-12">
					<div class="table-area">
                        <div class="table-responsive">
                            <table class="table service-provider-table first-last-col-fix" style="width:2850px;">
                              <thead>
                                <tr>
                                  <th>Id</th>
                                  <th>Image</th>
                                  <th>Business or Individual?</th>
                                  <th>Business Name</th>
                                  <th>DUNS Number</th>
                                  <th>First Name</th>
                                  <th>Last Name</th>
                                  <th>Email Address</th>
                                  <th>Services Offered</th>
                                  <th>Address</th>
                                  <th>City</th>
                                  <th>State</th>
                                  <th>Zip Code</th>
                                  <th>Country</th>
                                  <th>Contact Number</th>
                                  <th>Avg. Rating</th>
                                  <th>Join Date</th>
                                  <th>Approval Date</th>
                                  <th>Status</th>
                                  <th class="text-center">Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <tr v-for="list in listing">
                                    <td> {{list.id}} </td>
                                    <td>
                                        <span class="user-img radius-0">
                                            <img  :src="list.imagepath" >
                                        </span>
                                    </td>
                                    <td> {{ list.business }} </td>
                                    <td> {{ list.businessName }} </td>
                                    <td> {{ list.DUNSnum }} </td>
                                    <td> {{ list.first_name }} </td>
                                    <td> {{ list.last_name }} </td>
                                    <td> {{ list.email_address }} </td>
                                    <td> {{ list.services_offered }} </td>
                                    <td> {{ list.address }} </td>
                                    <td> {{ list.city }} </td>
                                    <td> {{ list.state }} </td>
                                    <td> {{ list.zip_code }} </td>
                                    <td> {{ list.country }} </td>
                                    <td> {{ list.contact_number }} </td>
                                    <td> {{ list.avg_rating }} </td>
                                    <td> {{ list.join_date }} </td>
                                    <td> {{ list.approval_date }} </td>
                                    <td class="status-color approved"> {{ list.status }} </td>
                                    <td class="text-center">
                                      <div class="action-icons">
                                        <i class="icon-eye"></i>
                                          <!--  <i class="icon-pencil"></i> -->
                                      </div>
                                    </td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
		    		</div>
		  		</div>
		    </div>
        <change-status-user @HideModalValue="HideModal" :showModalProp="changeProviderStatus"></change-status-user>
        <add-service @HideModalValue="HideModal" :showModalProp="service"></add-service>
        <view-details @HideModalValue="HideModal" :showModalProp="viewdetails"></view-details>
	</div>
</template>

<script>

export default {
  data () {
    return {
    	service: false,
        viewdetails: false,
        changeProviderStatus: false,

            listing: [
                {
                    id : 1,
                    imagepath:'images/dummy/user-pic.jpg',
                    business: 'Electrician',
                    businessName: 'ABC',
                    DUNSnum: '123456789',
                    first_name: 'James',
                    last_name: 'Methew',
                    email_address: 'psm@test.com',
                    services_offered: '12',
                    address: 'Amsterdam Street 25',
                    city: 'Amsterdam',
                    state: 'Netherlands',
                    zip_code: '543351',
                    country: 'Netherlands',
                    contact_number: '126421315',
                    avg_rating: '5',
                    status: 'Active',
                    join_date: 'May 25 2018',
                    approval_date: 'May 30 2018',

                },
            ],
    	}
  	},

    methods: {
        ShowModalUser(){
            this.changeProviderStatus = true;
        },
        AddService(){
            this.service = true;
        },
        ViewDetails() {
            this.viewdetails = true;
        },
        HideModal(){
            this.service = false;
            this.viewdetails = false;
        },
    }
}
</script>
