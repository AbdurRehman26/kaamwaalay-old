<template>
	<div class="panel-inner">
		<div class="row">
            <div class=" col-xs-12 col-md-12">
                    <div class="datepicker-row">
                        <div class="row">
                            <div class="col-xs-12 col-md-3 datepicker-field">
                              <div class="form-group">
                                   <SearchField></SearchField>
                              </div>
                            </div>
                            <div class="col-xs-12 col-md-3 datepicker-field">
                              <div class="form-group">
                                   <label>By Type</label>
                                   <select class="form-control">
                                     <option>Select Type</option>
                                     <option>Electrician</option>
                                     <option>Electrician >> Ac</option>
                                   </select>
                              </div>
                            </div>
                            <div class="col-xs-12 col-md-2">
                                <button class="btn btn-primary filter-btn-top-space">
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
        <changestatuspopup @HideModalValue="HideModal" :showModalProp="changestatus"></changestatuspopup>
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
        changestatus:false,
        viewcustomer: false,
        listing: [
            {
            imagepath:'',
            fullname:'Levi Boyer',
            email:'Chester_Kris15@gmail.com',
            contact_number:'894-807-8690',
            status:'Active',
            },
        ],
        records : [],
        url : 'api/user',
        showNoRecordFound : false,
        search : '',
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
            this.changestatus = true;
        },
        HideModal(){
            this.customer = false;
            this.viewcustomer = false;
            this.changestatus = false;
        },
        getList(data , page , successCallback){
            let self = this;
            self.showNoRecordFound = false;
            let url = self.url;

            if(typeof(page) == 'undefined' || !page){                        
                self.records = [];
            }

            if((typeof(data) !== 'undefined' && data) || this.search){
                
                // if(data.workspace_id)
                // {
                //     this.search = {
                //         name :  data.name,
                //         workspace_id : data.workspace_id,
                //         status : data.status
                //     };

                // }

                // var query  = '?pagination=true&keyword='+this.search.name+'&workspace_id='+this.search.workspace_id+'&status='+this.search.status;
                // url = 'user/search'+query;
            
            }else{
                var query  = '?pagination=false&filter_by_role=1';
                url = url+query;
            }

            if(typeof(page) !== 'undefined' && page){
                url += '&page='+page;   
            }

            self.$http.get(url).then(response=>{
                console.log(response.data.response)
            response = response.data.response//response.body.response;
            
            if(typeof(page) !== 'undefined' && page){
            for(var i = 0 ; i < response.data.length ; i++){
                 self.records.push(response.data[i]);
            }

            }else{
                console.log(response.data)
                self.records = response.data;
            }
            

            self.pagination = response.pagination;
            
            if (!self.records.length) {
                self.showNoRecordFound = true;
            }

            successCallback(true);

            }).catch(error=>{

            });
        },

    },
    components: {
        StarRating
    },

    mounted(){
        this.getList();
/*        for (var i = 1; i <= 50; i++) {
            var loopperson =  {
                        id : i,
                        imagepath:'',
                        fullname: this.$faker().name.findName(),
                        email_address: this.$faker().internet.email(),
                        address: this.$faker().address.streetAddress(),
                        city: this.$faker().address.city(),
                        state: this.$faker().address.state(),
                        zip_code: this.$faker().address.zipCode(),
                        country: this.$faker().address.country(),
                        contact_number: this.$faker().phone.phoneNumber(),
                        avg_rating: '5',
                        status: 'Active',
                        join_date: 'May 25 2018',
                        approval_date: this.$faker().date.past(),
            };
            this.listing.push(loopperson);
        };*/
    }

}
</script>
