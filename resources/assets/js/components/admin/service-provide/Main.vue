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
                                   <label>By Business/Individual</label>
                                   <select class="form-control">
                                     <option>Select</option>
                                     <option>Business</option>
                                     <option>Individual</option>
                                   </select>
                              </div>
                            </div>
                            <div class="col-xs-12 col-md-3 datepicker-field">
                              <div class="form-group">
                                   <label>By Type</label>
                                   <select class="form-control">
                                     <option>Select Service Type</option>
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
                            <table class="table service-provider-table first-last-col-fix">
                              <thead>
                                <tr>
                                  <th></th>
                                  <th>Full Name</th>
                                  <th>Type</th>
                                  <th>Business</th>
                                  <!-- <th>DUNS</th>
                                  <th>Email Address</th> -->
                                  <th>Contact</th>
                                  <th>Status</th>
                                  <th>Avg. Rating</th>
                                  <th class="text-center">Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <tr v-for="list in listing">
                                    <td>
                                        <span class="user-img radius-0">
                                            <img  :src="list.imagepath" >
                                        </span>
                                    </td>
                                    <td> <a href="javascript:void(0);" @click="profileimage">{{ list.fullname }}</a> </td>
                                    <td> {{ list.business }} </td>
                                    <td> {{ list.businessName }} </td>
                                    <!-- <td> {{ list.DUNSnum }} </td>
                                    <td> {{ list.email_address }} </td> -->
                                    <td> {{ list.contact_number }} </td>
                                    <td ><span class="tags" :class="[list.status.replace(/\s/g, '').toLowerCase().trim()]">{{list.status}}</span></td>
                                    <td><star-rating :star-size="20" read-only :rating="3" active-color="#8200ff"></star-rating></td>
                                    <td class="text-center">
                                      <div class="action-icons">
                                        <i @click="providerdetailclick" v-b-tooltip.hover title="View Details" class="icon-eye"></i>
                                        <i @click="changestatuspopup" v-b-tooltip.hover title="Change Status" class="icon-cog2"></i>

                                        <i @click="ConfirmationPopup" v-if="list.check == true" v-b-tooltip.hover title="Confirm Verification" class="icon-check"></i>

                                        <i @click="ConfirmationPopup" v-else v-b-tooltip.hover title="Disconfirm Verification" class="icon-close2"></i>

                                      </div>
                                    </td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
		    		</div>
		  		</div>
                
          <div class="clearfix"></div>

          <div class="col-xs-12 col-md-12">
            
            <div class="total-record float-left">
                <p><strong>Total records: <span>9</span></strong></p>
            </div>

            <div class="pagination-wrapper float-right">
                <b-pagination size="md" :total-rows="100" v-model="currentPage" :per-page="10"></b-pagination>
            </div>
          </div>
		    </div>
        <service-provider-detail @HideModalValue="HideModal" :showModalProp="providerdetailpopup"></service-provider-detail>
        <change-status-provider @HideModalValue="HideModal" :showModalProp="changestatus"></change-status-provider>
        <add-service @HideModalValue="HideModal" :showModalProp="service"></add-service>
        <view-details @HideModalValue="HideModal" :showModalProp="viewdetails"></view-details>
        <confirmation-popup @HideModalValue="HideModal" :showModalProp="confirmationpopup"></confirmation-popup>
	</div>
</template>

<script>
import StarRating from 'vue-star-rating';

export default {
  data () {
    return {
    	service: false,
        viewdetails: false,
        changeProviderStatus: false,
        changestatus:false,
        providerdetailpopup:false,
        confirmationpopup: false,
            listing: [
                {
                    imagepath:'',
                    business: 'I',
                    businessName: '',
                    DUNSnum: '543351',
                    fullname: this.$faker().name.findName(),
                    email_address: this.$faker().internet.email(),
                    contact_number: this.$faker().phone.phoneNumber(),
                    status: 'Active',
                    check: true,
                },
                {
                    imagepath:'',
                    business: 'B',
                    businessName:this.$faker().company.companyName(),
                    DUNSnum: '543351',
                    fullname: this.$faker().name.findName(),
                    email_address: this.$faker().internet.email(),
                    contact_number: this.$faker().phone.phoneNumber(),
                    status: 'Pending',
                    check: true,
                },
                {
                    imagepath:'',
                    business: 'B',
                    businessName:this.$faker().company.companyName(),
                    DUNSnum: '543351',
                    fullname: this.$faker().name.findName(),
                    email_address: this.$faker().internet.email(),
                    contact_number: this.$faker().phone.phoneNumber(),
                    status: 'In-Review',
                },
                {
                    imagepath:'',
                    business: 'I',
                    businessName: '',
                    DUNSnum: '543351',
                    fullname: this.$faker().name.findName(),
                    email_address: this.$faker().internet.email(),
                    contact_number: this.$faker().phone.phoneNumber(),
                    status: 'Rejected',
                },
                {
                    imagepath:'',
                    business: 'I',
                    businessName: '',
                    DUNSnum: '543351',
                    fullname: this.$faker().name.findName(),
                    email_address: this.$faker().internet.email(),
                    contact_number: this.$faker().phone.phoneNumber(),
                    status: 'Active',
                    check: true,
                },
                {
                    imagepath:'',
                    business: 'B',
                    businessName:this.$faker().company.companyName(),
                    DUNSnum: '543351',
                    fullname: this.$faker().name.findName(),
                    email_address: this.$faker().internet.email(),
                    contact_number: this.$faker().phone.phoneNumber(),
                    status: 'Pending',
                },
                {
                    imagepath:'',
                    business: 'B',
                    businessName:this.$faker().company.companyName(),
                    DUNSnum: '543351',
                    fullname: this.$faker().name.findName(),
                    email_address: this.$faker().internet.email(),
                    contact_number: this.$faker().phone.phoneNumber(),
                    status: 'Approved',
                },
                {
                    imagepath:'',
                    business: 'B',
                    businessName: this.$faker().company.companyName(),
                    DUNSnum: '543351',
                    fullname: this.$faker().name.findName(),
                    email_address: this.$faker().internet.email(),
                    contact_number: this.$faker().phone.phoneNumber(),
                    status: 'Rejected',
                    check: true,
                },
                {
                    imagepath:'',
                    business: 'I',
                    businessName: '',
                    DUNSnum: '543351',
                    fullname: this.$faker().name.findName(),
                    email_address: this.$faker().internet.email(),
                    contact_number: this.$faker().phone.phoneNumber(),
                    status: 'Rejected',
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
        changestatuspopup() {
            this.changestatus = true;
        },
        providerdetailclick() {
            /*this.providerdetailpopup = true;*/
            this.$router.push({name: 'Service_Provider_Detail'});
        },
        ConfirmationPopup() {
            this.confirmationpopup = true;
        },
        HideModal(){
            this.service = false;
            this.viewdetails = false;
            this.changestatus = false;
            this.providerdetailpopup = false;
            this.confirmationpopup = false;
        },
        profileimage(){
          this.$router.push({name: 'Service_Provider_Detail'});  
        },
        
    },

    components: {
        StarRating
    },
    mounted(){
/*        for (var i = 1; i <= 50; i++) {
            var loopperson =  {
                        id : i,
                        imagepath:'',
                        business: 'Individual',
                        businessName: 'ABC',
                        DUNSnum: '543351',
                        fullname: this.$faker().name.findName(),
                        email_address: this.$faker().internet.email(),
                        services_offered: '45',
                        address: this.$faker().address.streetAddress(),
                        city: this.$faker().address.city(),
                        state: this.$faker().address.state(),
                        zip_code: this.$faker().address.zipCode(),
                        country: this.$faker().address.country(),
                        contact_number: this.$faker().phone.phoneNumber(),
                        status: 'Active',
                        join_date: 'May 25 2018',
                        approval_date: 'May 31 2018',
            };
            this.listing.push(loopperson);
        };*/
    }

}
</script>
