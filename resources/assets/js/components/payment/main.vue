<template>
  <div>
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
                                     <option>Urgent</option>
                                     <option>Featured</option>
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
        </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-area">
                        <div class="table-responsive">
                            <table class="table last-col-fix">
                              <thead>
                                <tr>
                                  <th>Pay By</th>
                                  <th>Date</th>
                                  <th>Amount</th>
                                  <th>Activity Type</th>
                                  <th>Status</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr v-for="list in listing">
                                  <td>{{list.payby}}</td>
                                  <td>{{list.date}}</td>
                                  <td>${{list.amount}}</td>
                                  <td >{{list.activitytype}}</td>
                                  <td><span class="tags" :class="[list.status.replace(/\s/g, '').toLowerCase().trim()]">{{list.status}}</span></td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <div class="clearfix"></div>

                <div class="col-xs-12 col-md-12">
            
                    <div class="total-record float-left">
                        <p><strong>Total records: <span>2</span></strong></p>
                    </div>

                    <div class="pagination-wrapper float-right">
                        <b-pagination size="md" :total-rows="100" v-model="currentPage" :per-page="10"></b-pagination>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>
<script>
export default {
  data () {
    return {
        listing: [
            {
                payby:'Customer',
                date:'May, 20 2017',
                amount:20,
                activitytype:'Urgent',
                status: 'Active',
            },
            {
                payby:'Service Provider',
                date:'May, 20 2017',
                amount:52,
                activitytype:'Featured',
                status: 'Pending',
            },
        ],

        }
    },
    methods: {

    }
}
</script>
