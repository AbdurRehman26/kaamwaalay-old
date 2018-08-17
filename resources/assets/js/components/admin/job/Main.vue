<template>
    <div class="panel-inner">
        <div class="row">
            <div class=" col-xs-12 col-md-12">
                <div class="datepicker-row">
                    <div class="row">
                        <div class="col-xs-12 col-md-3 datepicker-field">
                          <div class="form-group">
                            <label>Search</label>
                            <input @keyup.enter.prevent="searchList(false)" type="text" placeholder="Search" autocomplete="off" v-model="search.keyword" class="form-control type-ahead-select taller">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-3 datepicker-field">
                      <div class="form-group">
                       <label>By Type</label>
                       <select v-model="search.filter_by_service" class="form-control">
                         <option value="">Select All</option>
                         <option v-for="service in servicesList" :value="service.id">{{service.title}}</option>
                     </select>
                 </div>
             </div>
             <div class="col-xs-12 col-md-3 datepicker-field">
              <div class="form-group">
               <label>By Job Status</label>
               <select v-model="search.filter_by_status" class="form-control">
                 <option value="">Select All</option>
                 <option v-for="status in jobStatuses" :value="status.key">{{status.value}}</option>
             </select>
         </div>
     </div>                            
     <div class="col-xs-12 col-md-2">
        <button @click.prevent="searchList(false)" :class="['btn btn-primary', 'filter-btn-top-space', loading ?'show-spinner' : '']">
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
                <td> <a href="javascript:void(0);" @click="profileimage(record.user.id)">{{ record.user.first_name }}</a> </td>
                <td> {{ record.service | mainService }} </td>
                <td> {{ record.service | childOrParentService }} </td>
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

<vue-common-methods @start-loading="startLoading" :url="requestUrl" @get-records="getRecords"></vue-common-methods>

<customer-detail @HideModalValue="HideModal" :showModalProp="customer"></customer-detail>
<change-status-user @HideModalValue="HideModal" :showModalProp="changeProviderStatus"></change-status-user>

</div>
</template>

<script>
    export default {
        data () {
            return {
                noRecordFound : false,
                search : {
                    filter_by_service : '',
                    filter_by_status : '',
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
                url : 'api/job?pagination=true',
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
            },
            requestUrl(){
                this.records = [];
                return this.url ;
            }
        },
        methods: {
            startLoading(){
                this.loading = true;
            },
            getRecords(data){
                let self = this;
                self.loading = false;
                self.records = data;
                self.noRecordFound = false;
                // console.log(self.records , '12312321');
                if (!self.records.length) {
                    self.noRecordFound = true;
                }

            },
            searchList(){
                let url = 'api/job?pagination=true';
                this.url = JSON.parse(JSON.stringify(url));

                Reflect.ownKeys(this.search).forEach(key =>{

                    if(key !== '__ob__'){
                        this.url += '&' + key + '=' + this.search[key];
                    }        
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
            profileimage(id){
              this.$router.push({name: 'Service_Provider_Detail' , params : {id  : id}});  
          },        

      },
  }
</script>
