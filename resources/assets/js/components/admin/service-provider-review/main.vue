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
                     <label>By Business/Individual</label>
                     <select v-model="search.filter_by_business_type" class="form-control">
                       <option value="">Select</option>
                       <option value="business">Business</option>
                       <option value="individual">Individual</option>
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
            <table class="table service-provider-table first-last-col-fix">
              <thead>
                <tr>
                  <th width="40"></th>
                  <th>Full Name</th>
                  <!-- <th>Email Address</th> -->
                  <th>Services</th>                                  
                  <!-- <th>Contact Number</th> -->
                  <th>Type</th>
                  <th>Status</th>
                  <th class="text-center">Actions</th>
              </tr>
          </thead>
          <tbody>
            <tr v-for="record in records">
                <td>
                    <span class="user-img radius-0">
                        <img  :src="record.imagepath" >
                    </span>
                </td>
                <td> <a href="javascript:void(0);" @click="detailreview(record.id)">{{ record.service_provider_profile.first_name + ' ' + record.service_provider_profile.last_name }}</a> </td>
                <td> <span v-for="(service , index) in record.services">{{service.service | mainServiceOrChildService }} 
                    {{ (record.services.length > 1 && index < record.services.length-1) ? ", " : '' }}
                </span> <span :class="[record.sarrows]"></span> {{ record.sub_services}}</td>
                
                <td> {{ record.service_provider_profile.business_details.business_type == 'individual' ? 'I' : 'B' }} </td>
                <td>
                    <span class="tags" :class="[record.status]">
                        {{ record.status }}
                    </span>
                </td>
                <td class="text-center">
                  <div class="action-icons">
                    <i @click="detailreview(record.id)" v-b-tooltip.hover title="View Details" class="icon-eye"></i>
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
</div>
</template>

<script>
    import StarRating from 'vue-star-rating';
    export default {
      data () {
        return {
            noRecordFound : false,
            search : {
                keyword : '',
                filter_by_business_type : '',
                filter_by_service : ''
            },
            url : 'api/service-provider-profile-request?pagination=true',
            loading : true,
            statuses : [
            {
                key : 'active',
                value : 'active'
            },
            {
                key : 'in_active',
                value : 'Inactive'
            },
            {
                key : 'banned',
                value :'Banned'
            }
            ],
            records : [],
            service: false,
            viewdetails: false,
            changeProviderStatus: false,
            changeservicestatus: false,
        }
    },
    computed : {
        requestUrl(){
            return this.url;
        },
        servicesList(){
            return this.$store.getters.getAllServices;
        },

    },
    methods: {
        ShowModalUser(){
            this.changeProviderStatus = true;
        },
        AddService(){
            this.service = true;
        },
        ViewDetails() {
            this.viewdetails = true;
        },
        ChangeProviderStatus() {
            this.changeservicestatus = true;
        },
        HideModal(){
            this.service = false;
            this.viewdetails = false;
            this.changeservicestatus = false;   
        },
        detailreview(id){
            this.$router.push({name: 'service.detail.review' , params : {id : id}});
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

            this.url = 'api/service-provider-profile-request?pagination=true&time='+newDate;
            
            Reflect.ownKeys(this.search).forEach(key =>{

                if(key !== '__ob__'){
                    this.url += '&' + key + '=' + this.search[key];
                }        
            });

        }

    },
    components: {
        StarRating
    },
}
</script>
