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
                                     <option>Select All</option>
                                     <option>Service Provider</option>
                                     <option>Customer</option>
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
                            <table class="table service-provider-table">
                              <thead>
                                <tr>
                                  <th>Full Name</th>
                                  <th>Email Address</th>
                                  <th>Type</th>
                                  <th class="text-center">Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <tr v-for="list in listing">

                                    <td> {{ list.full_name }} </td>
                                    <td> {{ list.email_address }} </td>
                                    <td> {{ list.type }} </td>
                                    <td class="text-center">
                                      <div class="action-icons">
                                        <i @click="SupportDetail" v-b-tooltip.hover title="View Details" class="icon-eye"></i>
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

                    <!--<div class="pagination-wrapper float-right">
                        <b-pagination size="md" :total-rows="100" v-model="currentPage" :per-page="10"></b-pagination>
                    </div>-->
            </div>
        </div>
        <support-detail @HideModalValue="HideModal" :showModalProp="supportdetailpopup"></support-detail>
    </div>
</template>

<script>
export default {
  data () {
    return {
        supportdetailpopup: false,

            listing: [
                {
                    full_name: 'Dickerson Geneva',
                    email_address: 'Burley.Mueller23@hotmail.com',
                    type: 'Customer',

                },
                {
                    full_name: 'Geneva Mick',
                    email_address: 'irgie_Douglas@gmail.com',
                    type: 'Service Provider',

                },
                {
                    full_name: 'James Martin',
                    email_address: 'Guadalupe_Hauck@gmail.com',
                    type: 'Customer',

                },
                {
                    full_name: 'Harry Carige',
                    email_address: 'Mueller23@hotmail.com',
                    type: 'Service Provider',

                },
                {
                    full_name: 'James Methew',
                    email_address: 'Virgie_Douglas@gmail.com',
                    type: 'Customer',

                },
                {
                    full_name: 'Methew Peterson',
                    email_address: 'psm@test.com',
                    type: 'Service Provider',

                },
            ],
        }
    },

    methods: {
        SupportDetail(){
            this.supportdetailpopup = true;
        },
        HideModal(){
            this.supportdetailpopup = false;
        },
    },
}
</script>
