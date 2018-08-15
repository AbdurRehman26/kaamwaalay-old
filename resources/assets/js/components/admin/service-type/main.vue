<template>
  <div>
   <div class="panel-inner">
    <div class="row">
      <div class=" col-xs-12 col-md-12">
        <div class="datepicker-row">
          <div class="row">
            <div class="col-xs-12 col-md-3 datepicker-field">
              <div class="form-group">
                <SearchField @search="onSearch"></SearchField>
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
            <tr v-for="list in listing">
              <td>{{list.id}}</th>
                <td>{{list.title}}</td>
                <td>{{list.subservice}}</td>
                <td class="text-center">{{list.is_featured? "YES":"NO"}}</td>
                <td class="text-center">{{list.is_hero_nav? "YES":"NO"}}</td>
                <td class="text-center">
                  <div class="action-icons">
                    <i v-b-tooltip.hover title="View Details" @click="ViewDetails" class="icon-eye"></i>
                    <i v-b-tooltip.hover title="Edit Details" class="icon-pencil" @click="AddService"></i>
                    <i v-b-tooltip.hover title="Delete" @click="ActionDelete" class="icon-delete"></i>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-md-12">

      <div class="total-record float-left">
        <p><strong>Total records: <span>{{totalServicesCount}}</span></strong></p>
      </div>

      <div class="pagination-wrapper float-right">
        <b-pagination size="md" :total-rows="totalServicesCount" v-model="currentPage" :per-page="2"></b-pagination>
      </div>
    </div>
  </div>

</div>
<add-service @HideModalValue="HideModal" :showModalProp="service"></add-service>
<view-details @HideModalValue="HideModal" :showModalProp="viewdetails"></view-details>
<delete-popup @HideModalValue="HideModal" :showModalProp="actiondelete"></delete-popup>
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
       filter_by_featured: 1,
       pagination : false,
       showNoRecordFound: false,
       url: 'api/service',
     }
   },
   watch : {
    currentPage(pageNumber){
      this.getList(false, pageNumber);
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
    },
    onSearch(val) {
        this.search = val;
        console.log(this.search, "search");
    },
    AddService(){
      this.service = true;
    },
    ViewDetails() {
      this.viewdetails = true;
    },
    ActionDelete() {
      this.actiondelete = true;
    },
    HideModal(){
      this.service = false;
      this.viewdetails = false;
      this.actiondelete = false;
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
        if(data.search != "") {
            var query  = query + '&keyword='+data.search;        
        }
        if(data.filter != "both") {
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
        console.log(response, 33332123);
        self.listing = response.data;
        // if(typeof(page) !== 'undefined' && page){
        //   var listingLength = response.data.length;
        //   for(var i = 0 ; i < listingLength; i++){
        //     self.listing.push(response.data[i]);
        //   }
        // }else{
        // }

        self.totalServicesCount = self.$store.getters.getAllServices.length;
        self.pagination = response.pagination;

        if (!self.listing.length) {
          self.showNoRecordFound = true;
        }
        successCallback(true);

      }).catch(error=>{
        if(error.status == 403) {
          self.pagination = false;
          console.log(self.listing.length,"asdsad");
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
