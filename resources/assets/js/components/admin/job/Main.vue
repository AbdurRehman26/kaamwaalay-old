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
                           <option v-for="service in servicesList" :value="service.id">
                            {{ service  | mainServiceOrChildService}}
                        </option>
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
                  <th class="text-center">Action</th>
              </tr>
          </thead>
          <tbody>

            <tr v-for="record in records">
                <td> {{ record.title }} </td>
                <td> 

                    <a @click.prevent="viewDetails(record.user.id)">{{ record.user.first_name }}</a>

                </td>
                <td> {{ record.service | mainService }} </td>
                <td> {{ record.service | childOrParentService }} </td>
                <td>
                    <span v-if="!record.is_archived" class="tags" 
                    :class="[record.status.replace(/\s\_/g, '').replace('_' , '').replace('cancelled' , 'rejected')]">
                    {{ record | jobStatus }}
                </span> 

                <span v-else class="tags" :class="['archived']">
                    {{ record | jobStatus }}
                </span>
            </td>
            <td class="text-center">
              <div class="action-icons">

                <a class="basecolor" @click.prevent="viewJobDetails(record.id)"><i v-b-tooltip.hover title="View Details" class="icon-eye"></i></a>

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



<vue-common-methods @start-loading="startLoading" :url="requestUrl" @get-records="getRecords"></vue-common-methods>
</div>


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
                    value : 'Cancelled'
                },
                {
                    key : 'archived',
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
                return this.url ;
            }
        },
        methods: {
            viewDetails(id){

                let routeData = this.$router.resolve({ name: 'customer.detail', params: { id: id }});
                window.open(routeData.href, '_blank');
            },
            viewJobDetails(id){
              let routeData = this.$router.resolve({name: 'main.job.detail' , params : {id : id}});
              window.open(routeData.href, '_blank');


          },
          startLoading(){
            this.loading = true;
        },
        getRecords(response){
            let self = this;
            self.loading = false;
            self.records = response.data;
            self.noRecordFound = response.noRecordFound;

        },
        searchList(){

            let newDate  = new Date().getMilliseconds();

            this.url = 'api/job?pagination=true&time='+newDate;

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
        AddService(){
            this.changeProviderStatus = true;
        },

    },
}
</script>
