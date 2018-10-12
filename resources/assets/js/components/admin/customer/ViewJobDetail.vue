<template>
  <div class="panel-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-strip">
                <div class="float-left">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="customer-detail-title">
                <h2 class="page-title">{{mainUser | fullName}}</h2>
            </div>
            <div class="table-area">
                <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                            <th>Job Title</th>
                            <th>Service Provider</th>
                            <th class="text-center">Urgent Job</th>
                            <th class="text-center">Project Amount</th>                          
                            <th>Service Provider Rating</th>

                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(record, index) in records">
                            <td>{{ record.title }}</td>
                            <td>{{record.service_provider}}</td>
                            <td class="text-center"> {{ record |jobType}}</td>
                            <td class="text-center">{{record.job_amount == null ? '-':'$'+record.job_amount}}  </td>                           
                            <td><star-rating :star-size="20" read-only :increment="0.02" :rating="record.avg_rating" active-color="#8200ff"></star-rating></td>

                            <td class="text-center">
                                <div class="action-icons">
                                    <i @click="ViewCustomerRecord(record,index)" v-b-tooltip.hover title="View Details" class="icon-eye"></i>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <no-record-found v-show="noRecordFound"></no-record-found>
            </div>
        </div>
    </div>
    <vue-common-methods :url="requestUrl" @get-records="getRecords"></vue-common-methods>
    <vue-common-methods :hideLoader="true" :url="requestUserUrl" @get-records="getUserRecord"></vue-common-methods>
</div>
<view-customer-record :showModalProp="viewCustomerRecord" @HideModalValue="HideModal" :selectedJob="selectedJob"></view-customer-record>

</div> 
</template>
<script>
    import StarRating from 'vue-star-rating';

    export default {
        data () {
            return {
                viewCustomerRecord: false,
                customerId: null,
                noRecordFound : false,
                loading : true,
                records : [],
                url:'',
                record:{},
                selectedJob:'',
                mainUser : ''
            }
        },

        components: {
            StarRating
        },

        methods: {
            ViewCustomerRecord(record,index) {
                record['index'] = index;
                this.selectedJob = record;
                this.viewCustomerRecord = true;
            },
            HideModal(){
                this.viewCustomerRecord = false;
                this.record = {};
            },
            getRecords(response){
                let self = this;
                if(response.data){
                    self.records = response.data;
                    self.loading = false;
                    self.noRecordFound = response.noRecordFound;
                }
                

            },
            getUserRecord(response){
                let self = this;
                if(response.data){
                    self.mainUser = response.data;
                }

            }
        },

        mounted(){
            this.loading = true;
            this.customerId = this.$route.params.id;
            this.url = 'api/job?filter_by_user='+this.$route.params.id+'&pagination=true'
        },

        computed : {
            requestUrl(){
                this.loading = true;
                return this.url;
            },
            requestUserUrl(){
                return 'api/user/'+this.$route.params.id;    
            }
        },

    }
</script>
