<template>
	<div class="panel-inner">
		<div class="row">
            <div class=" col-xs-12 col-md-12">
                    <div class="datepicker-row">
                        <div class="row">
                            <div class="col-xs-12 col-md-3 datepicker-field">
                                <div class="form-group">
                                    <label>Search</label>
                                    <input @keyup.enter.prevent="getList(false)" type="text" placeholder="Search" autocomplete="off" v-model="search.keyword" class="form-control type-ahead-select taller">
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-3 datepicker-field">
                              <div class="form-group">
                                   <label>By Type</label>
                                   <select v-model="search.service_id" class="form-control">
                                     <option value="">Select All</option>
                                     <option v-for="service in servicesList" :value="service.id">{{service.title}}</option>
                                   </select>
                              </div>
                            </div>
                            <div class="col-xs-12 col-md-2">
                                <button @click.prevent="getList(false)" :class="['btn btn-primary', 'filter-btn-top-space', loading ?'show-spinner' : '']">
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
                                  <th></th>
                                  <th>Full Name</th>
                                  <!-- <th>Email</th> -->
                                  <th>Contact Number</th>
                                  <th>Status</th>
                                  <th>Avg. Rating</th>
                                  <th class="text-center">Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <tr v-for="record in records">
                                    <td>
                                    <span class="user-img radius-0">
                                        <!-- <img  :src="list.imagepath" > -->
                                    </span>
                                    </td>
                                    <td><a href="javascript:void(0);" @click="ViewCustomerDetail">{{record.first_name}} {{record.last_name}}</a></td>
                                    <!-- <td>{{record.email}} </td> -->
                                    <td>{{record.phone_number}} </td>
                                    <td ><span class="tags" :class="[record.status.replace(/\s/g, '').toLowerCase().trim()]">{{record.status}}</span></td>
                                    <td><star-rating :star-size="20" read-only :rating="2" active-color="#8200ff"></star-rating></td>
                                    <td class="text-center">
                                      <div class="action-icons">
                                        <i @click="ViewCustomerDetail" v-b-tooltip.hover title="View Details" class="icon-eye"></i>
                                        <i @click="changestatuspopup" v-b-tooltip.hover title="Change Status" class="icon-pencil"></i>
                                      </div>
                                    </td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
                    </div>
		  		</div>

          <div class="clearfix"></div>

          <div class="col-xs-12 col-md-12">

            <div class="total-record float-left">
                <p><strong>Total records: <span>9</span></strong></p>
            </div>

            <div class="pagination-wrapper float-right">
                <b-pagination size="md" :total-rows="100" v-model="currentPage" :per-page="10"></b-pagination>
            </div>
          </div>
		    </div>
        <changestatuspopup @HideModalValue="HideModal" :showModalProp="changeCustomerStatus"></changestatuspopup>
        <customer-detail @HideModalValue="HideModal" :showModalProp="customer"></customer-detail>
        <view-customer-details @HideModalValue="HideModal" :showModalProp="viewcustomer"></view-customer-details>
	</div>
</template>

<script>
import StarRating from 'vue-star-rating';

export default {
  data () {
    return {
    	service: false,
    	customer: false,
        changeCustomerStatus:false,
        viewcustomer: false,
        records : [],
        url : 'api/user',
        noRecordFound : false,
        search : {
            service_id : '',
            keyword : ''
        },
        loading : false,
        pagination : []
    	}
  	},
    computed : {
        servicesList(){
            return this.$store.getters.getServicesList;
        },
        currentPage(){
            return this.pagination ? this.pagination.current : 0; 
        }
    },
    methods: {

    	AddCustomer() {
    		this.customer = true;
    	},
        ViewCustomerDetail() {
            /*this.viewcustomer = true;*/
            this.$router.push({name: 'customerdetail'});
        },
        changestatuspopup() {
            this.changeCustomerStatus = true;
        },
        HideModal(){
            this.customer = false;
            this.viewcustomer = false;
            this.changeCustomerStatus = false;
        },
        getList(page){
            let self = this;
            self.noRecordFound = false;
            let url = self.url;
            self.loading = true;

            if(this.search.service_id || this.search.keyword){
                    var query  = '?pagination=true&filter_by_role=3&keyword='+this.search.keyword+'&filter_by_service='+this.search.service_id;

            }else{

                var query  = '?pagination=true&filter_by_role=3';
            }

            url = self.url+query;

            if(typeof(page) !== 'undefined' && page){
                url += '&page='+page;   
            }

            self.$http.get(url).then(response=>{
                    response = response.data.response;

                    self.records = response.data;
                    self.pagination = response.pagination;

                    if (!self.records.length) {
                        self.showNoRecordFound = true;
                    }
                    self.loading = false;


            }).catch(error=>{
                self.loading = false;
                console.log(error , 'error');
            });

        },

    },
    components: {
        StarRating
    },

    mounted(){
        this.getList();

    }

}
</script>
