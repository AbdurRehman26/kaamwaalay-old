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
                             <option value="">Select All</option>
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
                  <th></th>
                  <th>Full Name</th>
                  <th>Type</th>
                  <th>Business</th>
                  <th>Contact</th>
                  <th>Status</th>
                  <th>Avg. Rating</th>
                  <th class="text-right p-r-30">Actions</th>
              </tr>
          </thead>
          <tbody>
              <tr v-for="record in records">
                <td>
                    <span v-if="record.user_detail.profileImage" class="user-img radius-0" v-bind:style="{'background-image': 'url('+ record.user_detail.profileImage +')'}">
                        <!-- <img v-if="record.user_detail && record.user_detail.profile_image" :src="record.user_detail ? record.user_detail.profileImage : ''" > -->
                    </span>
                    <span v-if="!record.user_detail.profileImage" class="user-img radius-0">
                        <!-- <img v-if="record.user_detail && record.user_detail.profile_image" :src="record.user_detail ? record.user_detail.profileImage : ''" > -->
                    </span>                
                </td>            
                <td>
                    <a @click.prevent="viewDetails(record.id)">
                        {{ record.user_detail.first_name +' '+ record.user_detail.last_name }}
                    </a>
                </td>

                <td> {{ record.business_type == 'individual' ? 'I' : 'B' }} </td>
                <td> {{ record.business_name }} </td>
                <td> {{ record.user_detail.phone_number }} </td>
                <td ><span class="tags" :class="[record.user_detail.status]">{{record.user_detail.status}}</span></td>
                <td><star-rating :increment="0.5" :star-size="20" read-only :rating="record.avg_rating ? parseInt(record.avg_rating) : 0" active-color="#8200ff"></star-rating></td>
                <td class="text-right">
                  <div class="action-icons">
                    <a @click.prevent="viewDetails(record.id)">
                        <i v-b-tooltip.hover title="View Details" class="icon-eye basecolor"></i>
                    </a>
                    <i @click="changestatuspopup(record)"  
                    v-b-tooltip.hover title="Change Status" :class="['icon-cog2', ($store.getters.getAuthUser.id != record.user_detail.id && record.user_detail.status == 'pending') ? 'disabled' : '']">
                </i>
                <i v-b-tooltip.hover @click.prevent="currentRecord = record; confirmPopupShow = true;" 
                v-if="!record.is_verified" title="" :class="['icon-check' , record.user_detail.status == 'banned' ? 'disabled' : '']" title="Confirm Verification"></i>
                <i v-b-tooltip.hover @click.prevent="currentRecord = record; confirmPopupShow = true;" 
                v-if="record.is_verified" title="" class="icon-cancel" title="Cancel Verification"></i>
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

<confirmation-popup @form-updated="formUpdated" :submitFormData="formData" :requestUrl="submitUrl" @HideModalValue="confirmPopupShow = false;" :showModalProp="confirmPopupShow"></confirmation-popup>
<changestatuspopup @form-updated="formUpdated" @HideModalValue="HideModal" :showModalProp="changestatus" :statusData="statusData" :options="ChangeStatusesOptions"  :url="changeStatusURL" ></changestatuspopup>

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
            statusData : [],
            confirmPopupShow : false,
            currentRecord : '',
            formData : {

            }
        }
    },
    computed : {
        requestUrl(){
            return this.url;
        },
        servicesList(){
            return this.$store.getters.getAllServices;
        },
        submitUrl(){
            if(this.currentRecord){  
                this.formData.is_verified = !this.currentRecord.is_verified;
                this.formData.id = this.currentRecord.id;

                return 'api/service-provider-profile/' +this.currentRecord.id;
            }
        }

    },

    methods: {
        viewDetails(id){
           let routeData = this.$router.resolve({ name: 'service.provider.detail', params: { id:id }});
           window.open(routeData.href, '_blank');
       },
       formUpdated(){
        let newDate  = new Date().getMilliseconds();

        this.url = 'api/service-provider-profile?pagination=true&time='+newDate;
    },
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
    getRecords(response){
        let self = this;
        self.loading = false;
        self.records = response.data;
        self.noRecordFound = response.noRecordFound;

    },
    searchList(){
        let newDate  = new Date().getMilliseconds();

        this.url = 'api/service-provider-profile?pagination=true&time='+newDate;

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
