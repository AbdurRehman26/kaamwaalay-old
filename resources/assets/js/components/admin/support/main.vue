<template>
  <div class="panel-inner">
    <div class="row">
      <div class=" col-xs-12 col-md-12">
        <div class="datepicker-row">
          <div class="row">
            <div class="col-xs-12 col-md-3 datepicker-field">
              <div class="form-group">
               <SearchField @search="onSearch" :searchValue="search"></SearchField>
             </div>
           </div>
           <div class="col-xs-12 col-md-3 datepicker-field">
            <div class="form-group">
             <label>By Type</label>
             <select class="form-control" v-model="filter_by_inquiry">
               <option value="all" selected="">Select All</option>
               <option v-for="role in roles" :value="role.id">{{role.title}}</option>
             </select>
           </div>
         </div>                           
         <div class="col-xs-12 col-md-2">
          <button class="btn btn-primary filter-btn-top-space" @click="onApply">
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
        <table class="table service-provider-table">
          <thead>
            <tr>
              <th>Full Name</th>
              <th>Email Address</th>
              <th>Type</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="list in listing" v-if="listing.length">

              <td> {{ list.name }} </td>
              <td> {{ list.email }} </td>
              <td> {{ list.role.title }} </td>
              <td class="text-center">
                <div class="action-icons">
                  <i @click="SupportDetail(list)" v-b-tooltip.hover title="View Details" class="icon-eye"></i>
                  <!--  <i class="icon-pencil"></i> -->
                </div>
              </td>
            </tr>
          </tbody>
        </table>
          <no-record-found v-if="!listing.length && showNoRecordFound"></no-record-found>
      </div>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="col-xs-12 col-md-12">

    <div class="total-record float-left" v-if="totalServicesCount">
      <p><strong>Total records: <span>{{totalServicesCount}}</span></strong></p>
    </div>

    <div class="pagination-wrapper float-right" v-if="totalServicesCount">
      <b-pagination size="md" :total-rows="totalServicesCount" v-model="currentPage" :per-page="2"></b-pagination>
    </div>
      <!--<div class="pagination-wrapper float-right">
          <b-pagination size="md" :total-rows="100" v-model="currentPage" :per-page="10"></b-pagination>
        </div>-->
      </div>
    </div>
    <support-detail :selectedInquiry="selectedInquiry" @HideModalValue="HideModal" :showModalProp="supportdetailpopup" ></support-detail>
  </div>
</template>

<script>
  export default {
    data () {
      return {
        supportdetailpopup: false,
        totalServicesCount: 0,
        service: false,
        viewdetails: false,
        actiondelete: false,
        viewcustomer: false,
        currentPage: 1,
        listing: [],
        search : '',
        filter_by_inquiry: "all",
        pagination : false,
        showNoRecordFound: false,
        url: 'api/support-inquiry',
        selectedInquiry: '',
        isUpdate: false,
        roles: {},
      }
    },

    watch : {
      currentPage(pageNumber){

        var data = {
          search : this.search,
          filter: this.filter_by_inquiry
        };
        this.getList(data, pageNumber);

      },
      totalServicesCount(count) {
        this.totalServicesCount = count;
      }
    },
    methods: {
      HideModal(){
        this.supportdetailpopup = false;
      },
      onApply() {

        var data = {
          search : this.search,
          filter: this.filter_by_inquiry
        };
        this.getList(data, false);
        this.search = "";
      },
      onSearch(val) {
        this.search = val;
      },
      SupportDetail(list) {
        this.selectedInquiry = list;
        this.supportdetailpopup = true;
      },
      getResponse(response) {
        return ['Helo', "kakak"];//response.data.items
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
          if(data.filter != "all" && data.filter != "undefined") {
            var query  = query + '&type_id='+data.filter;
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
        self.totalServicesCount = response.inquiry_count;
        
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
    getRoles(data , page , successCallback){
      let self = this;
      let url = 'api/role';

      var query  = '?pagination=true';
      url = url+query;

      self.$http.get(url).then(response => {
        response = response.data.response;
        self.roles = response.data;
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
    this.getRoles(false, false);
  },

}

</script>
