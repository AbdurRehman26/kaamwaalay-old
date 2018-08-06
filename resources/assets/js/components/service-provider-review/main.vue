<template>
    <div class="panel-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-strip">
                </div>
            </div>
                <div class="col-md-12">
                    <div class="table-area">
                        <div class="table-responsive">
                            <table class="table service-provider-table first-last-col-fix" style="min-width: 1270px;">
                              <thead>
                                <tr>
                                  <th width="40">Image</th>
                                  <th>Full Name</th>
                                  <th>Email Address</th>
                                  <th>Contact Number</th>
                                  <th>Submited Date</th>
                                  <th>Updated Date</th>
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
                                    <td> {{ list.full_name }} </td>
                                    <td> {{ list.email_address }} </td>
                                    <td> {{ list.contact_number }} </td>
                                    <td> {{ list.join_date }} </td>
                                    <td> {{ list.approval_date }} </td>
                                    <td>
                                        <span class="tags" :class="[list.rating]">
                                            {{ list.status }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                      <div class="action-icons">
                                        <i @click="detailreview" v-b-tooltip.hover title="View Details" class="icon-eye"></i>
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
import StarRating from 'vue-star-rating';
export default {
  data () {
    return {
        service: false,
        viewdetails: false,
        changeProviderStatus: false,

            listing: [
                {
                    id : 1,
                    imagepath:'',
                    business: 'Individual',
                    businessName: 'Abc',
                    DUNSnum: '543351',
                    full_name: 'James Methew',
                    email_address: 'psm@test.com',
                    services_offered: '45',
                    address: 'Amsterdam Street 25',
                    city: 'Amsterdam',
                    state: 'Netherlands',
                    zip_code: '543351',
                    country: 'Netherlands',
                    contact_number: '45668756',
                    status: 'pending',
                    status: 'Active',
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
                    address: 'Amsterdam Street 25',
                    city: 'Amsterdam',
                    state: 'Netherlands',
                    zip_code: '543351',
                    country: 'Netherlands',
                    contact_number: '126421315',
                    rating: 'pending',
                    status: 'Active',
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
                    address: 'Amsterdam Street 25',
                    city: 'Amsterdam',
                    state: 'Netherlands',
                    zip_code: '543351',
                    country: 'Netherlands',
                    contact_number: '126421315',
                    rating: 'approved',
                    status: 'Active',
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
                    address: 'Amsterdam Street 25',
                    city: 'Amsterdam',
                    state: 'Netherlands',
                    zip_code: '543351',
                    country: 'Netherlands',
                    contact_number: '126421315',
                    rating: 'pending',
                    status: 'Active',
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
                    address: 'Amsterdam Street 25',
                    city: 'Amsterdam',
                    state: 'Netherlands',
                    zip_code: '543351',
                    country: 'Netherlands',
                    contact_number: '126421315',
                    rating: 'approved',
                    status: 'Active',
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
                    city: 'Amsterdam',
                    state: 'Netherlands',
                    zip_code: '543351',
                    country: 'Netherlands',
                    contact_number: '126421315',
                    avg_rating: '2',
                    rating: 'rejected',
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
        detailreview(){
            this.$router.push('/service-provider-review/detail-review');
        }
    },
    components: {
        StarRating
    },
}
</script>
