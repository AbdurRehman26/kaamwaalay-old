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
           <div class="col-xs-12 col-md-2">
            <button class="btn btn-primary filter-btn-top-space" @click="onApply" :class="[loading  ? 'show-spinner' : '']">
              <span>Apply</span>
              <loader></loader>
            </button>
          </div>
          <div class="float-right add-btn-pos">
            <a href="javascript:;" class="btn btn-primary" @click="addService">Add Service</a>
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
              <th>Service</th>
              <th>Parent Service</th>
              <th class="text-center">Status</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(list, index) in listing" v-if="listing.length && !loadingStart">
              <td>{{list.title}}</td>
              <td>{{list.parent_id? list.parent.title : '-'}}</td>
              <td class="text-center"><span class="tags" :class="[list.status? 'completed':'banned']">
                {{list.status? "ACTIVE":"INACTIVE"}}
              </span></td>
              <td class="text-center">
                <div class="action-icons">
                  <i v-b-tooltip.hover title="View Details" @click="showViewDetails(list, index)" class="icon-eye"></i>
                  <i v-b-tooltip.hover title="Edit Details" class="icon-pencil" @click="updateService(list)"></i>
                  <i @click="changeStatusPopup(list)" :class="[list.status === 'pending'  ? 'disabled' : '']" v-b-tooltip.hover title="Change Status" class="icon-cog2"></i>
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
      <b-pagination size="md" :total-rows="pagination.total" v-model="currentPage" :per-page="10"></b-pagination>
    </div>
  </div>
</div>
</div>
<add-service @HideModalValue="hideModal" :showModalProp="service" @call-list="onCallList" :isUpdate="isUpdate" :list="list"></add-service>
<view-details @HideModalValue="hideModal" :showModalProp="viewDetails" :selectedService="selectedService"></view-details>
<changestatuspopup @HideModalValue="hideModal" :showModalProp="changeStatus" :statusData="statusData" :options="changeStatusOptions" :url="statusUrl" ></changestatuspopup>
</div>
</template>

<script>
  export default {
    data () {
      return {
       service: false,
       viewDetails: false,
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
       changeStatus: false,
       statusData:'',
       statusUrl: 'api/service',
       changeStatusOptions : [
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
    changeStatusPopup(list) {
      this.statusUrl = 'api/service/' + list.id;
      this.statusData = list;
      this.changeStatus = true;
    },
    onCallList() {
      if(this.search) {
        this.onApply();
      }else {
        this.getList(false, this.currentPage);
      }
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
    addService(){
      this.isUpdate = false;
      this.service = true;
    },
    updateService(list){
      this.list = list
      this.isUpdate = true;
      this.service = true;
    },
    showViewDetails(list, index) {
      list['index'] = index;
      this.selectedService = list;
      this.viewDetails = true;
    },
    hideModal(){
      this.service = false;
      this.viewDetails = false;
      this.isUpdate = false;
      this.changeStatus = false;
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
      url = url + "&order_by=updated_at";
      self.$http.get(url).then(response => {
        response = response.data;
        self.listing = response.data;

        if(!self.listing.length) {
          self.showNoRecordFound = true;
        }
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
  },
}
</script>
