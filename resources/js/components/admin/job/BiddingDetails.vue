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
                <h2 class="page-title">{{mainJob.title}}</h2>
            </div>
            <div class="table-area">
                <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                            <th>Image</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Bid Amount</th>                          
                            <th>Rating</th>
                            <th>Awarded</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="record in records">
                           <td>
                            <span class="user-img radius-0">
                                <img  :src="record.user ? record.user.profileImage : ''" >
                            </span>
                        </td>

                        <td class="text-center"><router-link tag="a" :to="{name: 'service.provider.detail' , params : {id  : record.service_provider ? record.service_provider.id : 1}}">{{ record.user | fullName }}</router-link></td>
                        <td class="text-center"> {{record.amount ? '$' : '-'}} {{ record.amount }}</td>                           
                        <td><star-rating :increment="0.5" :star-size="20" read-only :rating="[record.user ? parseFloat(record.user.average_rating) : 0]" active-color="#326497"></star-rating></td>
                        <td class="text-center"> {{ record.is_awarded ? 'Yes' : 'No' }}</td>                           
                        <td class="text-right">
                            <div class="action-icons">
                                <i @click="currentRecord = record; showModalValue = true;" v-b-tooltip.hover title="View Details" class="icon-eye"></i>
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
<view-bidding-details :showModalProp="showModalValue" :item="currentRecord" @HideModalValue="showModalValue = false"></view-bidding-details>   

<vue-common-methods :hideLoader="true" :url="requestUrl" @get-records="getRecords"></vue-common-methods>
<vue-common-methods :url="requestSecondaryUrl" @get-records="getSecondaryRecord"></vue-common-methods>


</div> 
</template>
<script>
    import StarRating from 'vue-star-rating';

    export default {
      data () {
        return {
            currentRecord : '',
            showModalValue : false,
            url : 'api/job-bid',
            records : [],
            mainJob : '',
            noRecordFound : ''
        }
    },
    components: {
        StarRating
    },
    computed : {
        requestUrl(){
            return this.url+'?filter_by_job_id='+this.$route.params.jobId+'&pagination=true';
        },
        requestSecondaryUrl(){
            return 'api/job/'+this.$route.params.jobId;    
        }
    },

    methods: {
        getRecords(response){
            let self = this;
            self.loading = false;
            self.records = response.data;
            self.noRecordFound = response.noRecordFound;
            
        },
        getSecondaryRecord(response){
            let self = this;
            self.loading = false;
            self.mainJob = response.data;
            
            
        }
    }
}
</script>
