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
                <h2 class="page-title">{{serviceProvider.user_detail | fullName }}</h2>
            </div>
            <div class="table-area">
                <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                            <th>Job Title</th>
                            <th>Customer Name</th>
                            <th class="text-center">Urgent Job</th>
                            <th class="text-center">Project Amount</th>                          
                            <th>Customer Rating</th>

                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="record in records">
                            <td>{{ record.title }}</td>
                            <td>{{ record.user | fullName }}</td>
                            <td class="text-center">{{ record | jobType }}</td>
                            <td class="text-center"> {{ record.job_amount ? '$' : '-' }} {{record.job_amount ? record.job_amount + ' ' : ' ' }}</td>                           
                            <td><star-rating :increment="0.5" :star-size="20" read-only :rating="record.user.average_rating ? record.user.average_rating  : 0" active-color="#8200ff"></star-rating></td>

                            <td class="text-center">
                                <div class="action-icons">
                                    <i @click="currentItem = record; servicerecord = true;" v-b-tooltip.hover title="View Details" class="icon-eye"></i>
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
<vue-common-methods :hideLoader="true" :url="requestUrl" @get-records="getRecords"></vue-common-methods>
<view-service-record :item="currentItem" :showModalProp="servicerecord" @HideModalValue="HideModal"></view-service-record>
<vue-common-methods :url="requestSecondaryUrl" @get-records="getSecondaryRecord"></vue-common-methods>

</div> 
</template>
<script>
    import StarRating from 'vue-star-rating';

    export default {
      data () {
        return {
            currentItem : '',
            customerrecord: false,
            servicerecord: false,
            noRecordFound : false,
            loading : true,
            records : [],
            url: 'api/job',
            serviceProvider : ''
        }
    },
    components: {
        StarRating
    },
    methods: {
        ViewCustomerRecord() {
            this.customerrecord = true;
        },
        ViewServiceRecord() {
            this.servicerecord = true;
        },
        HideModal(){
            this.customerrecord = false;
            this.servicerecord = false;
        },
        getRecords(response){
            let self = this;
            if(response.data){
                self.records = response.data;
                self.noRecordFound = response.noRecordFound;
                self.loading = false;
            }
            
        },
        getSecondaryRecord(data){
            this.serviceProvider = data;
        }
    },
    computed : {
        requestUrl(){
            return this.url + '?filter_by_service_provider='+this.$route.params.id+'&pagination=true';
        },
        requestSecondaryUrl(){
            return 'api/service-provider-profile/'+this.$route.params.id;    
        }

    },
    mounted(){
        this.loading = true;
    }
}
</script>
