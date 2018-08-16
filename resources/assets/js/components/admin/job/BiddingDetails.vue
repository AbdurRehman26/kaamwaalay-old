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
                <h2 class="page-title">Door Repairing</h2>
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
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="record in records">
                            <td><span class="user-img radius-0"><img src=""></span></td>
                            <td class="text-center"><a href="javascript:void(0);">{{ record.user | fullName }}</a></td>
                            <td class="text-center">${{ record.amount }}</td>                           
                            <td><star-rating :star-size="20" read-only :rating="[record.user.average_rating]" active-color="#8200ff"></star-rating></td>
                            <td class="text-right">
                                <div class="action-icons">
                                    <i @click="currentRecord = record; showModalValue = true;" v-b-tooltip.hover title="View Details" class="icon-eye"></i>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<view-bidding-details :showModalProp="showModalValue" :item="currentRecord" @HideModalValue="showModalValue = false"></view-bidding-details>   

<vue-common-methods :url="requestUrl" @get-records="getRecords"></vue-common-methods>

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

        }
    },
    components: {
        StarRating
    },
    computed : {
        requestUrl(){
            return this.url+'?filter_by_job_id='+this.$route.params.jobId+'&pagination=true';
        },
    },

    methods: {
        getRecords(data){
            this.records = data;
        },
    }
}
</script>
