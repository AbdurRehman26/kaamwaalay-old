<template>
  <div>
   <div class="panel-inner">
    <div class="row">
      <div class=" col-xs-12 col-md-12">
        <div class="datepicker-row">
          <div class="row">
            <div class="col-xs-12 col-md-3 datepicker-field">
              <div class="form-group">
                <label>Search</label>
                <input type="text" placeholder="Search" v-model="search" @keyup.enter="onApply">
              </div>
            </div>
            <!--<div class="col-xs-12 col-md-2 datepicker-field">
              <div class="form-group">
               <label>Is Featured</label>
               <select class="form-control" v-model="filter_by_featured">
                 <option value="both" selected="">Both</option>
                 <option value="1" >Yes</option>
                 <option value="0">No</option>
               </select>
             </div>
           </div> -->                           
           <div class="col-xs-12 col-md-2">
            <button class="btn btn-primary filter-btn-top-space" @click="onApply" :class="[loading  ? 'show-spinner' : '']">
              <span>Apply</span>
              <loader></loader>
            </button>
          </div>
          <div class="float-right add-btn-pos">
            <a href="javascript:;" class="btn btn-primary" @click="AddService">Add Service</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
     <div class="table-area">
      <div class="table-responsive">
        <table class="table first-last-col-fix">
          <thead>
            <tr>
              <th>Id</th>
              <th>Service</th>
              <th>Sub Service</th>
              <th class="text-center">Status</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(list, index) in listing" v-if="listing.length && !loadingStart">
              <td>{{(index + 1)}}</th>
                <td>{{list.parent_id? list.parent.title: list.title}}</td>
                <td>{{list.parent_id? list.title : list.parent.title }}</td>
                <td class="text-center"><span class="tags" :class="[list.status? 'completed':'banned']">
                        {{list.status? "ACTIVE":"INACTIVE"}}
                    </span></td>
                <td class="text-center">
                  <div class="action-icons">
                    <i v-b-tooltip.hover title="View Details" @click="ViewDetails(list, index)" class="icon-eye"></i>
                    <i v-b-tooltip.hover title="Edit Details" class="icon-pencil" @click="updateService(list)"></i>
                    <i @click="changestatuspopup(list)" :class="[list.status === 'pending'  ? 'disabled' : '']" v-b-tooltip.hover title="Change Status" class="icon-cog2"></i>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          <block-spinner v-if="loadingStart"></block-spinner>
          <no-record-found v-if="!listing.length && showNoRecordFound"></no-record-found>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-md-12">

      <div class="total-record float-left" v-if="pagination.total">
        <p><strong>Total records: <span>{{pagination.total}}</span></strong></p>
      </div>

      <div class="pagination-wrapper float-right" v-if="pagination.total">
        <b-pagination size="md" :total-rows="pagination.total" v-model="currentPage" :per-page="25"></b-pagination>
      </div>
    </div>
  </div>

</div>
<add-service @HideModalValue="HideModal" :showModalProp="service" @call-list="getList(false, false)" :isUpdate="isUpdate" :list="list"></add-service>
<view-details @HideModalValue="HideModal" :showModalProp="viewdetails" :selectedService="selectedService"></view-details>
<changestatuspopup @HideModalValue="HideModal" :showModalProp="changestatus" :statusData="statusData" :options="ChangeStatusesOptions" :url="statusUrl" ></changestatuspopup>
</div>
</template>

<script>
  export default {
    data () {
      return {
       service: false,
       viewdetails: false,
       actiondelete: false,
       viewcustomer: false,
       currentPage: 1,
       listing: [],
       search : '',
       filter_by_featured: "both",
       pagination : false,
       showNoRecordFound: false,
       url: 'api/service',
       selectedService: '',
       isUpdate: false,
       list: {},
       loading: false,
       loadingStart: true,
       changestatus: false,
       statusData:'',
       statusUrl: 'api/service',
       ChangeStatusesOptions : [
       {
        key : 0,
        value : 'Inactive'
      },
      {
        key : 1,
        value :'Active'
      }
      ],
    }
  },
  watch : {
    currentPage(pageNumber){

      var data = {
        search : this.search,
        filter: this.filter_by_featured
      };
      this.getList(data, pageNumber);

    },
  },
  methods: {

    changestatuspopup(list) {
      this.statusUrl = 'api/service/'+list.id;
      this.statusData = list;
      this.changestatus = true;
    },
    onApply() {
      this.loadingStart = true;
      this.loading = true;
      var data = {
        search : this.search,
        filter: this.filter_by_featured
      };
      this.getList(data, false);
    },
    AddService(){
      this.isUpdate = false;
      this.service = true;
    },
    updateService(list){
      this.list = list
      this.isUpdate = true;
      this.service = true;
    },
    ViewDetails(list, index) {
      list['index'] = index;
      this.selectedService = list;
      this.viewdetails = true;
    },
    HideModal(){
      this.service = false;
      this.viewdetails = false;
      this.actiondelete = false;
      this.isUpdate = false;
      this.changestatus = false;
      this.list = {};
    },
    getResponse(response) {
      return response.data.items
    },

    getList(data , page , successCallback){
      let self = this;
      self.showNoRecordFound = false;
      let url = self.url;

      if(typeof(page) == 'undefined' || !page){                        
        self.records = [];
      }

      if((typeof(data) !== 'undefined' && data) || this.search){
        var query  = '?pagination=true';
        if(data.search != "" && data.search != "undefined") {
          var query  = query + '&keyword='+data.search;        
        }
        if(data.filter != "both" && data.filter != "undefined") {
          var query  = query + '&filter_by_featured='+data.filter;
        }
        //var query  = '?pagination=true&keyword='+this.search+'&filter_by_featured='+this.search.filter_by_featured;
        url = url+query;
      }else{
        var query  = '?pagination=true';
        url = url+query;
      }

      if(typeof(page) !== 'undefined' && page){
        url += '&page='+page;   
      }

      self.$http.get(url).then(response => {
        response = response.data.response;
        self.listing = response.data;
        if(!data && !page) {
          self.$store.commit('setAllServices' , response.data);
        }
        if(!self.listing.length) {
          self.showNoRecordFound = true;
        }
        var serviceArray = _.filter(self.listing, {parent_id: null});
        
        self.pagination = response.pagination;

        if (!self.listing.length) {
          self.showNoRecordFound = true;
        }
        self.loading = false;
        self.loadingStart = false;
        successCallback(true);

      }).catch(error=>{
        if(error.status == 403) {
          self.pagination = false;
        }

      });
    },
  },
  mounted(){
    this.getList(false, false);
        // for (var i = 1; i <= 10; i++) {
        //     var loopperson =  {
        //                 id : i,
        //                 imagepath:'',
        //                 service: this.$faker().commerce.department(),
        //                 subservice: this.$faker().commerce.productName(),
        //     };
        //     this.listing.push(loopperson);
        // };
      },

    }
  </script>
