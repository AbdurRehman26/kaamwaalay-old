<template>
	<div class="panel-inner">
		<div class="row">
            <div class=" col-xs-12 col-md-12">
                    <div class="datepicker-row">
                        <div class="row">
                            <div class="col-xs-12 col-md-3 datepicker-field">
                              <div class="form-group">
                                   <SearchField></SearchField>
                              </div>
                            </div>
                            <div class="col-xs-12 col-md-3 datepicker-field">
                              <div class="form-group">
                                   <label>By Type</label>
                                   <select class="form-control">
                                     <option>Select Type</option>
                                     <option>Electrician</option>
                                     <option>Electrician >> Ac</option>
                                   </select>
                              </div>
                            </div>
                            <div class="col-xs-12 col-md-2">
                                <button class="btn btn-primary filter-btn-top-space">
                                    <span>Apply</span>
                                    <loader></loader>
                                </button>
                            </div>
                        </div>
                    </div>
            </div>
				<div class="col-md-12">

                    <div class="table-area">
                        <div class="table-responsive">
                            <table class="table first-last-col-fix" style="width:2090px;">
                              <thead>
                                <tr>
                                  <th>Id</th>
                                  <th>Image</th>
                                  <th>First Name</th>
                                  <th>Last Name</th>
                                  <th>Email Address</th>
                                  <th>Address</th>
                                  <th>City</th>
                                  <th>State</th>
                                  <th>Zipcode</th>
                                  <th>Country</th>
                                  <th>Contact Number</th>
                                  <th>Avg. Rating</th>
                                  <th>Status</th>
                                  <th>Join Date</th>
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
                                    <td> {{ list.first_name }} </td>
                                    <td> {{ list.last_name }} </td>
                                    <td> {{ list.email_address }} </td>
                                    <td> {{ list.address }} </td>
                                    <td> {{ list.city }} </td>
                                    <td> {{ list.state }} </td>
                                    <td> {{ list.zip_code }} </td>
                                    <td> {{ list.country }} </td>
                                    <td> {{ list.contact_number }} </td>
                                    <td><star-rating :star-size="20" read-only :rating="2"></star-rating></td>
                                    <td class="status-color approved"> {{ list.status }} </td>
                                    <td> {{ list.join_date }} </td>
                                    <td class="text-center">
                                      <div class="action-icons">
                                        <i @click="ViewCustomerDetail" v-b-tooltip.hover title="View Details" class="icon-eye"></i>
                                      </div>
                                    </td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
                    </div>
		  		</div>
		    </div>
        <customer-detail @HideModalValue="HideModal" :showModalProp="customer"></customer-detail>
        <view-customer-details @HideModalValue="HideModal" :showModalProp="viewcustomer"></view-customer-details>

	</div>
</template>

<script>
import StarRating from 'vue-star-rating';

export default {
  data () {
    return {
    	service: false,
    	customer: false,
        viewcustomer: false,

            listing: [
                {
                    id : 1,
                    imagepath:'images/dummy/user-pic.jpg',
                    first_name: 'James',
                    last_name: 'Methew',
                    email_address: 'psm@test.com',
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

    	AddCustomer() {
    		this.customer = true;
    	},
        ViewCustomerDetail() {
            this.viewcustomer = true;
        },
        HideModal(){
            this.customer = false;
            this.viewcustomer = false;
        },

    },
    components: {
        StarRating
    },
}
</script>
