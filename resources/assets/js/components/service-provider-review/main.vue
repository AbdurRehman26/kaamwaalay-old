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
                                     <option>Both</option>
                                     <option>Business</option>
                                     <option>Individual</option>
                                   </select>
                              </div>
                            </div>
                            <div class="col-xs-12 col-md-3 datepicker-field">
                              <div class="form-group">
                                   <label>By Type</label>
                                   <select class="form-control">
                                     <option>Select All</option>
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
                            <table class="table service-provider-table first-last-col-fix" style="min-width: 1270px;">
                              <thead>
                                <tr>
                                  <th width="40"></th>
                                  <th>Full Name</th>
                                  <th>Email Address</th>
                                  <th>Services</th>                                  
                                  <th>Contact Number</th>
                                  <th>Type</th>
                                  <th>Status</th>
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
                                    <td> <a href="javascript:void(0);" @click="profileimage">{{ list.full_name }}</a> </td>
                                    <td> {{ list.email_address }} </td>
                                    <td> {{ list.services }} </td>
                                    <td> {{ list.contact_number }} </td>
                                    <td> {{ list.business }} </td>
                                    <td>
                                        <span class="tags" :class="[list.status]">
                                            {{ list.status }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                      <div class="action-icons">
                                        <i @click="detailreview" v-b-tooltip.hover title="View Details" class="icon-eye"></i><i @click="ChangeProviderStatus" v-b-tooltip.hover title="Change Status" class="icon-pencil"></i>
                                          <!--  <i class="icon-pencil"></i> -->
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
                        <p><strong>Total records: <span>6</span></strong></p>
                    </div>

                    <div class="pagination-wrapper float-right">
                        <b-pagination size="md" :total-rows="100" v-model="currentPage" :per-page="10"></b-pagination>
                    </div>
            </div>
        </div>
        <change-status-user @HideModalValue="HideModal" :showModalProp="changeProviderStatus"></change-status-user>
        <add-service @HideModalValue="HideModal" :showModalProp="service"></add-service>
        <view-details @HideModalValue="HideModal" :showModalProp="viewdetails"></view-details>
        <service-provider-review @HideModalValue="HideModal" :showModalProp="changeservicestatus"></service-provider-review>
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
        changeservicestatus: false,

            listing: [
                {
                    id : 1,
                    imagepath:'',
                    business: 'Individual',
                    businessName: 'Abc',
                    DUNSnum: '543351',
                    full_name: 'James Methew',
                    email_address: 'psm@test.com',
                    services: 'Electrician',
                    services_offered: '45',
                    address: 'Amsterdam Street 25',
                    city: 'Amsterdam',
                    status: 'rejected',
                    state: 'Netherlands',
                    zip_code: '543351',
                    country: 'Netherlands',
                    contact_number: '45668756',
                    status: 'rejected',
                    join_date: 'May 25 2018',
                    approval_date: 'May 30 2018',

                },
                {
                    id : 2,
                    imagepath:'',
                    business: 'Business',
                    businessName: 'Abc Business',
                    DUNSnum: '452634',
                    full_name: 'John Enderson',
                    email_address: 'psm@test.com',
                    services_offered: '67',
                    services: 'Electrician > AC',
                    address: 'Amsterdam Street 25',
                    city: 'Amsterdam',
                    state: 'Netherlands',
                    zip_code: '543351',
                    country: 'Netherlands',
                    contact_number: '126421315',
                    status: 'pending',
                    join_date: 'May 25 2018',
                    approval_date: 'May 30 2018',

                },
                {
                    id : 3,
                    imagepath:'',
                    business: 'Individual',
                    businessName: 'Abc Business',
                    DUNSnum: '452445',
                    full_name: 'Harry John',
                    email_address: 'psm@test.com',
                    services_offered: '74',
                    services: 'Carpenter',
                    address: 'Amsterdam Street 25',
                    city: 'Amsterdam',
                    state: 'Netherlands',
                    zip_code: '543351',
                    country: 'Netherlands',
                    contact_number: '126421315',
                    status: 'approved',
                    join_date: 'May 25 2018',
                    approval_date: 'May 30 2018',

                },
                {
                    id : 4,
                    imagepath:'',
                    business: 'Business',
                    businessName: 'Abc Business',
                    DUNSnum: '445533',
                    full_name: 'Petter Mick',
                    email_address: 'psm@test.com',
                    services_offered: '52',
                    services: 'Carpenter',
                    address: 'Amsterdam Street 25',
                    city: 'Amsterdam',
                    state: 'Netherlands',
                    zip_code: '543351',
                    country: 'Netherlands',
                    contact_number: '126421315',
                    status: 'pending',
                    join_date: 'May 25 2018',
                    approval_date: 'May 30 2018',

                },
                {
                    id : 5,
                    imagepath:'',
                    business: 'Individual',
                    businessName: 'Abc Business',
                    DUNSnum: '875441',
                    full_name: 'John Petter',
                    email_address: 'psm@test.com',
                    services_offered: '25',
                    services: 'Plumber',
                    address: 'Amsterdam Street 25',
                    city: 'Amsterdam',
                    state: 'Netherlands',
                    zip_code: '543351',
                    country: 'Netherlands',
                    contact_number: '126421315',
                    status: 'approved',
                    join_date: 'May 25 2018',
                    approval_date: 'May 30 2018',

                },
                {
                    id : 6,
                    imagepath:'',
                    business: 'Business',
                    businessName: 'Abc Business',
                    DUNSnum: '954354',
                    full_name: 'Danial John',
                    email_address: 'psm@test.com',
                    services_offered: '14',
                    address: 'Amsterdam Street 25',
                    services: 'Painter',
                    city: 'Amsterdam',
                    state: 'Netherlands',
                    zip_code: '543351',
                    country: 'Netherlands',
                    contact_number: '126421315',
                    avg_rating: '2',
                    status: 'rejected',
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
        ChangeProviderStatus() {
            this.changeservicestatus = true;
        },
        HideModal(){
            this.service = false;
            this.viewdetails = false;
            this.changeservicestatus = false;   
        },
        detailreview(){
            this.$router.push('/service-provider-review/detail-review');
        },
        profileimage(){
          this.$router.push('/service-provider/service-provider-detail');  
        },

    },
    components: {
        StarRating
    },
}
</script>
