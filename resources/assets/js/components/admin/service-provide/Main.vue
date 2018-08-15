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
                             <select class="form-control">
                               <option>Select</option>
                               <option>Business</option>
                               <option>Individual</option>
                           </select>
                       </div>
                   </div>
                   <div class="col-xs-12 col-md-3 datepicker-field">
                      <div class="form-group">
                                   <label>By Type</label>
                                   <select class="form-control">
                                     <option>Select Service Type</option>
                                     <option>Electrician</option>
                                     <option>Electrician >> Ac</option>
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
                                  <!-- <th>DUNS</th>
                                      <th>Email Address</th> -->
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
                                    <td> <a href="javascript:void(0);" @click="profileimage">{{ record.fullname }}</a> </td>
                                    <td> {{ record.business }} </td>
                                    <td> {{ record.businessName }} </td>
                                    <!-- <td> {{ record.DUNSnum }} </td>
                                        <td> {{ record.email_address }} </td> -->
                                        <td> {{ record.contact_number }} </td>
                                        <td ><span class="tags" :class="[record.status.replace(/\s/g, '').toLowerCase().trim()]">{{record.status}}</span></td>
                                        <td><star-rating :star-size="20" read-only :rating="3" active-color="#8200ff"></star-rating></td>
                                        <td class="text-center">
                                          <div class="action-icons">
                                            <i @click="providerdetailclick" v-b-tooltip.hover title="View Details" class="icon-eye"></i>
                                            <i @click="changestatuspopup" v-b-tooltip.hover title="Change Status" class="icon-pencil"></i>
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

            <vue-common-methods :url="requestUrl" @get-records="getRecords"></vue-common-methods>


        </div>
        <service-provider-detail @HideModalValue="HideModal" :showModalProp="providerdetailpopup"></service-provider-detail>
        <change-status-provider @HideModalValue="HideModal" :showModalProp="changestatus"></change-status-provider>
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
                filter_by_status : '',
                keyword : ''
            },
            url : 'api/service-provider-profile?filter_by_role=3&pagination=true',
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
        }
    },
    computed : {
        requestUrl(){
            this.loading = true;
            return this.url;
        }
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
        changestatuspopup() {
            this.changestatus = true;
        },
        providerdetailclick() {
            /*this.providerdetailpopup = true;*/
            this.$router.push({name: 'Service_Provider_Detail'});
        },
        HideModal(){
            this.service = false;
            this.viewdetails = false;
            this.changestatus = false;
            this.providerdetailpopup = false;
        },
        profileimage(){
          this.$router.push({name: 'Service_Provider_Detail'});  
      },
      getRecords(data){
        let self = this;
        self.loading = false;
        self.records = data;
        console.log(self.records , '12312321');
        if (!self.records.length) {
            self.noRecordFound = true;
        }



    },
    searchList(){
        let url = 'api/service-provider-profile?filter_by_role=3&pagination=true';
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
