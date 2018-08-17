<template>
	<div class="panel-inner">
		<div class="row">
            <div class=" col-xs-12 col-md-12">
                <div class="datepicker-row">
                    <div class="row">
                        <div class="col-xs-12 col-md-3 datepicker-field">
                          <div class="form-group">
                            <label>Search</label>
                            <input @keyup.enter.prevent="getList(false)" type="text" placeholder="Search" autocomplete="off" v-model="search.keyword" class="form-control type-ahead-select taller">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-3 datepicker-field">
                      <div class="form-group">
                       <label>By Type</label>
                       <select v-model="search.service_id" class="form-control">
                         <option value="">Select All</option>
                         <option v-for="service in servicesList" :value="service.id">{{service.title}}</option>
                     </select>
                 </div>
             </div>
             <div class="col-xs-12 col-md-3 datepicker-field">
              <div class="form-group">
               <label>By Job Status</label>
               <select v-model="search.status" class="form-control">
                 <option value="">Select All</option>
                 <option v-for="status in jobStatuses" :value="status.key">{{status.value}}</option>
             </select>
         </div>
     </div>                            
     <div class="col-xs-12 col-md-2">
        <button @click.prevent="getList(false)" :class="['btn btn-primary', 'filter-btn-top-space', loading ?'show-spinner' : '']">
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
            <table class="table first-last-col-fix">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Customer</th>
                  <th>Service Type</th>
                  <th>Service Sub-type</th>
                  <th>Job Status</th>
                  <th class="text-center">Actions</th>
              </tr>
          </thead>
          <tbody>

            <tr v-for="record in records">
                <td> {{ record.title }} </td>
                <td> <a href="javascript:void(0);" @click="profileimage">{{ record.user.first_name }}</a> </td>
                <td> {{ record.service.parent_id ? record.service.parent.title : record.service.title }} </td>
                <td> {{ record.service.parent_id ? record.service.title : '' }} </td>
                <td>
                    <span class="tags" :class="[record.status.replace(/\s/g, '').toLowerCase().trim()]">
                        {{ record | jobStatus }}
                    </span>
                </td>
                <td class="text-center">
                  <div class="action-icons">
                    <i class="icon-eye" v-b-tooltip.hover title="View Details" @click="ViewDetails(record.id)"></i>
                </div>
            </td>
        </tr>
    </tbody>
</table>
<no-record-found v-show="noRecordFound"></no-record-found>

</div>
</div>

</div>


<div class="clearfix"></div>



</div>

<vue-pagination @page-changed="getList" :pagination="pagination"></vue-pagination>

<customer-detail @HideModalValue="HideModal" :showModalProp="customer"></customer-detail>
<change-status-user @HideModalValue="HideModal" :showModalProp="changeProviderStatus"></change-status-user>

</div>
</template>

<script>
    export default {
        mounted(){
            this.getList();
        },
        data () {
            return {
                noRecordFound : false,
                search : {
                    service_id : '',
                    status : '',
                    keyword : ''
                },
                loading : false,
                jobStatuses : [
                {
                    key : 'in_bidding',
                    value : 'Bidding'
                },
                {
                    key : 'cancelled',
                    value : 'Archived'
                },
                {
                    key : 'completed',
                    value :'Completed'
                },
                {
                    key :'awarded',
                    value : 'Awarded'
                },
                {
                    key :'initiated',
                    value : 'Initiated'
                }

                ],
                service: false,
                customer: false,
                changeProviderStatus: false,
                url : 'api/job',
                noRecordFound : false,
                records : [],
                pagination : []
            }
        },
        computed : {
            servicesList(){
                return this.$store.getters.getAllServices;
            },
            currentPage(){
                return this.pagination ? this.pagination.current : 0; 
            }
        },
        methods: {
            getList(page){

                let self = this;
                self.noRecordFound = false;
                let url = self.url;
                self.loading = true;
                self.noRecordFound = false;

                if(this.search.service_id || this.search.status || this.search.keyword){
                    var query  = '?pagination=true&keyword='+this.search.keyword+'&filter_by_service='+this.search.service_id+'&filter_by_status='+this.search.status;

                }else{

                    var query  = '?pagination=true';
                }
                
                url = self.url+query;

                if(typeof(page) !== 'undefined' && page){
                    url += '&page='+page;   
                }

                self.$http.get(url).then(response=>{
                    response = response.data.response;

                    self.records = response.data;
                    self.pagination = response.pagination;

                    if (!self.records.length) {
                        self.noRecordFound = true;
                    }
                    self.loading = false;


                }).catch(error=>{
                    self.loading = false;
                    console.log(error , 'error');
                });
            },
            HideModal(){
                this.changeProviderStatus = false;
                this.customer = false;
            },
            ViewDetails(id){
                /*this.customer = true;*/
                this.$router.push({name: 'mainjobdetail' , params : { id : id}});
            },

            AddService(){
                this.changeProviderStatus = true;
            },
            profileimage(){
              this.$router.push({name: 'Service_Provider_Detail'});  
          },        

      },
  }
</script>
