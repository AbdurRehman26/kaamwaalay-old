<template>
  <div>
    <div class="panel-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-strip">

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
                                  <td>{{list.payby}}</th>
                                  <td>{{list.date}}</td>
                                  <td>{{list.amount}}</td>
                                  <td >{{list.activitytype}}</td>
                                  <td><span class="tags" :class="[list.status.replace(/\s/g, '').toLowerCase().trim()]">{{list.status}}</span></td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
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
                amount:'2000',
                activitytype:'Urgent',
                status: 'Active',
            },
            {
                payby:'Service Provider',
                date:'May, 20 2017',
                amount:'2000',
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
