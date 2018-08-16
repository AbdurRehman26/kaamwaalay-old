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
                    <h2 class="page-title">Edward Jackson</h2>
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
                            <tr v-for="record in records">
                                <td>{{ record.title }}</td>
                                <td>Electrician</td>
                                <td class="text-center"> {{ record |jobType}}</td>
                                <td class="text-center">$555</td>                           
                                <td><star-rating :star-size="20" read-only :rating="2" active-color="#8200ff"></star-rating></td>

                                <td class="text-center">
                                    <div class="action-icons">
                                        <i @click="ViewCustomerRecord" v-b-tooltip.hover title="View Details" class="icon-eye"></i>
                                    </div>
                                </td>
                            </tr>
                          </tbody>
                        </table>
                        <no-record-found v-show="noRecordFound"></no-record-found>
                    </div>
                </div>
            </div>
            </div>
        <vue-common-methods :url="requestUrl" @get-records="getRecords"></vue-common-methods>
        <view-customer-record :showModalProp="customerrecord" @HideModalValue="HideModal"></view-customer-record>
  </div> 
</template>
<script>
import StarRating from 'vue-star-rating';

export default {
    data () {
        return {
            customerrecord: false,
            customerId: null,
            noRecordFound : false,
            loading : true,
            records : [],
            url:'',
        }
    },

    components: {
        StarRating
    },

    methods: {
        ViewCustomerRecord() {
            this.customerrecord = true;
        },
        HideModal(){
            this.customerrecord = false;
        },
        getRecords(data){
            let self = this;
            self.loading = false;
            self.records = data;
            console.log(self.records , 'job detail');
            if (!self.records.length) {
                self.noRecordFound = true;
            }
        },
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
        }
    },

}
</script>
