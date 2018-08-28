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
                             <label>By Business/Individual</label>
                             <select v-model="search.filter_by_business_type" class="form-control">
                               <option value="">Select</option>
                               <option value="business">Business</option>
                               <option value="individual">Individual</option>
                           </select>
                       </div>
                   </div>
                   <div class="col-xs-12 col-md-3 datepicker-field">

                      <div class="form-group">
                         <label>By Service Type</label>
                         <select v-model="search.filter_by_service" class="form-control">
                           <option value="">Select All</option>
                           <option v-for="service in servicesList" :value="service.id">
                               {{ service  | mainServiceOrChildService}}
                           </option>
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
              <th></th>
              <th>Full Name</th>
              <th>Type</th>
              <th>Business</th>
              <th>Contact</th>
              <th>Status</th>
              <th>Avg. Rating</th>
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
            <td> <a href="javascript:void(0);" @click="profileimage(record.id)">{{ record.user_detail.first_name +' '+ record.user_detail.last_name }}</a> </td>
            <td> {{ record.business_type == 'individual' ? 'I' : 'B' }} </td>
            <td> {{ record.business_name }} </td>
            <td> {{ record.user_detail.phone_number }} </td>
            <td ><span class="tags" :class="[record.user_detail.status]">{{record.user_detail.status}}</span></td>
            <td><star-rating :star-size="20" read-only :rating="record.avg_rating" active-color="#8200ff"></star-rating></td>
            <td class="text-center">
              <div class="action-icons">
                <i @click="providerdetailclick(record.id)" v-b-tooltip.hover title="View Details" class="icon-eye"></i>
                <i @click="changestatuspopup(record)"  
                v-b-tooltip.hover title="Change Status" :class="['icon-cog2', ($store.getters.getAuthUser.id != record.user_detail.id && record.user_detail.status == 'pending') ? 'disabled' : '']">
            </i>
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
<service-provider-detail @HideModalValue="HideModal" :showModalProp="providerdetailpopup"></service-provider-detail>

<changestatuspopup @HideModalValue="HideModal" :showModalProp="changestatus" :statusData="statusData" :options="ChangeStatusesOptions"  :url="changeStatusURL" ></changestatuspopup>

<add-service @HideModalValue="HideModal" :showModalProp="service"></add-service>
<view-details @HideModalValue="HideModal" :showModalProp="viewdetails"></view-details>
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
            url : 'api/service-provider-profile?pagination=true&user_detail=true',
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
            changestatus:false,
            providerdetailpopup:false,
            ChangeStatusesOptions : [
            {
                key : 'active',
                value : 'Active'
            },
            {
                key : 'banned',
                value :'Banned'
            }
            ],
            changeStatusURL: 'api/user/change-status',
            statusData : []
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
        startLoading(){
            this.loading = true;
        },
        ShowModalUser(){
            this.changeProviderStatus = true;
        },
        AddService(){
            this.service = true;
        },
        ViewDetails() {
            this.viewdetails = true;
        },
        changestatuspopup(record) {
            this.statusData = record.user_detail;
            this.changestatus = true;
        },
        providerdetailclick(id) {
            this.$router.push({name: 'Service_Provider_Detail' , params : {id  : id }});
        },
        ConfirmationPopup() {
            this.confirmationpopup = true;
        },
        HideModal(){
            this.service = false;
            this.viewdetails = false;
            this.changestatus = false;
            this.providerdetailpopup = false;
            this.confirmationpopup = false;
        },
        profileimage(id){
            this.$router.push({name: 'Service_Provider_Detail' , params : {id : id }});  
        },
        getRecords(response){
            let self = this;
            self.loading = false;
            self.records = response.data;
            self.noRecordFound = response.noRecordFound;
            
        },
        searchList(){
            let url = 'api/service-provider-profile?pagination=true';
            this.url = JSON.parse(JSON.stringify(url));

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
    mounted(){

        this.loading = true;

    }

}
</script>
