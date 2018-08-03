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
                                  <th width="10">Id</th>
                                  <th>Image</th>
                                  <th>Full Name</th>
                                  <th>Email</th>
                                  <th>Address</th>
                                  <th>Contact Number</th>
                                  <th>Avg. Rating</th>                                  
                                  <th>Join Date</th>
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
                                    <td> {{ list.fullname }}</td>
                                    <td> {{ list.email_address }} </td>
                                    <td> {{ list.address }}, {{ list.city }}, {{ list.state }}, {{ list.zip_code }}, {{ list.country }} </td>
                                    <td> {{ list.contact_number }} </td>
                                    <td><star-rating :star-size="20" read-only :rating="2"></star-rating></td>
                                    <td> {{ list.join_date }} </td>                                    
                                    <td class="status-color approved"> {{ list.status }} </td>
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
            listing: [],
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

    mounted(){
        for (var i = 1; i <= 50; i++) {
            var loopperson =  {
                        id : i,
                        imagepath:'',
                        fullname: this.$faker().name.findName(),
                        email_address: this.$faker().internet.email(),
                        address: this.$faker().address.streetAddress(),
                        city: this.$faker().address.city(),
                        state: this.$faker().address.state(),
                        zip_code: this.$faker().address.zipCode(),
                        country: this.$faker().address.country(),
                        contact_number: this.$faker().phone.phoneNumber(),
                        avg_rating: '5',
                        status: 'Active',
                        join_date: 'May 25 2018',
                        approval_date: this.$faker().date.past(),            
            };
            this.listing.push(loopperson);
        };
    }
  
}
</script>
