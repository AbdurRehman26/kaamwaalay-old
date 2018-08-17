<template>
  <div>
   <div class="panel-inner">
    <div class="row">
      <div class=" col-xs-12 col-md-12">
        <div class="datepicker-row">
          <div class="row">
            <div class="col-xs-12 col-md-3 datepicker-field">
              <div class="form-group">
                <SearchField @search="onSearch" :searchValue="search" @onSearchEnter="onApply"></SearchField>
              </div>
            </div>
            <div class="col-xs-12 col-md-2 datepicker-field">
              <div class="form-group">
               <label>Is Featured</label>
               <select class="form-control" v-model="filter_by_featured">
                 <option value="both" selected="">Both</option>
                 <option value="1" >Yes</option>
                 <option value="0">No</option>
               </select>
             </div>
           </div>                            
           <div class="col-xs-12 col-md-2">
            <button class="btn btn-primary filter-btn-top-space" @click="onApply">
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
              <th class="text-center">Is Featured</th>
              <th class="text-center">Hero Navigation</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(list, index) in listing" v-if="listing.length">
              <td>{{(index + 1)}}</th>
                <td>{{list.parent_id? list.parent.title: list.title}}</td>
                <td>{{list.parent_id? list.title : list.parent.title }}</td>
                <td class="text-center">{{list.is_featured? "YES":"NO"}}</td>
                <td class="text-center">{{list.is_hero_nav? "YES":"NO"}}</td>
                <td class="text-center">
                  <div class="action-icons">
                    <i v-b-tooltip.hover title="View Details" @click="ViewDetails(list, index)" class="icon-eye"></i>
                    <i v-b-tooltip.hover title="Edit Details" class="icon-pencil" @click="updateService(list)"></i>
                    <i v-b-tooltip.hover title="Delete" @click="ActionDelete(list)" class="icon-delete"></i>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          <no-record-found v-if="!listing.length && showNoRecordFound"></no-record-found>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-md-12">

      <div class="total-record float-left" v-if="totalServicesCount">
        <p><strong>Total records: <span>{{totalServicesCount}}</span></strong></p>
      </div>

      <div class="pagination-wrapper float-right" v-if="totalServicesCount">
        <b-pagination size="md" :total-rows="totalServicesCount" v-model="currentPage" :per-page="25"></b-pagination>
      </div>
    </div>
  </div>

</div>
<add-service @HideModalValue="HideModal" :showModalProp="service" @call-list="getList(false, false)" :isUpdate="isUpdate" :list="list"></add-service>
<view-details @HideModalValue="HideModal" :showModalProp="viewdetails" :selectedService="selectedService"></view-details>
<delete-popup @HideModalValue="HideModal" :showModalProp="actiondelete" :item="selectedService" :url="url" @call-list="getList(false, false)"></delete-popup>
</div>
</template>

<script>
  export default {
    data () {
      return {
       totalServicesCount: 0,
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
    totalServicesCount(count) {
      this.totalServicesCount = count;
    }
  },
  methods: {
    onApply() {
      var data = {
        search : this.search,
        filter: this.filter_by_featured
      };
      this.getList(data, false);
      this.search = "";
    },
    onDelete(itemId) {
      alert(itemId);
    },
    onSearch(val) {
      this.search = val;
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
    ActionDelete(list) {
      this.selectedService = list;
      this.actiondelete = true;
    },
    HideModal(){
      this.service = false;
      this.viewdetails = false;
      this.actiondelete = false;
      this.isUpdate = false;
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
        if(!self.listing.length) {
          self.showNoRecordFound = true;
        }
        var serviceArray = _.filter(self.listing, {parent_id: null});
        self.totalServicesCount = response.service_count;
        
        self.pagination = response.pagination;

        if (!self.listing.length) {
          self.showNoRecordFound = true;
        }
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
