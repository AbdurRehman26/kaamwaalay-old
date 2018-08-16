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
                        </div>                     </div>
                        <div class="col-xs-12 col-md-3 datepicker-field">
                          <div class="form-group">
                           <label>By Status</label>
                           <select v-model="search.filter_by_status" class="form-control">
                             <option value="">Select All</option>
                             <option v-for="status in statuses" :value="status.key">{{status.value}}</option>
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
                        <img  :src="record.profile_image" >
                    </span>
                </td>
                <td><a href="javascript:void(0);" @click="ViewCustomerDetail(record.id)">{{record.first_name}} {{record.last_name}}</a></td>
                <!-- <td>{{list.email}} </td> -->
                <td>{{record.phone_number}} </td>
                <td ><span class="tags" :class="[record.status.replace(/\s/g, '').toLowerCase().trim()]">{{record.status}}</span></td>
                <td><star-rating :star-size="20" read-only :rating="record.avg_rating" active-color="#8200ff"></star-rating></td>
                <td class="text-center">
                  <div class="action-icons">
                    <i @click="ViewCustomerDetail(record.id)" v-b-tooltip.hover title="View Details" class="icon-eye"></i>
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

<vue-common-methods @start-loading="startLoading" :url="requestUrl" @get-records="getRecords"></vue-common-methods>


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
                noRecordFound : false,
                search : {
                    filter_by_status : '',
                    keyword : ''
                },
                service: false,
                customer: false,
                changestatus:false,
                viewcustomer: false,
                url : 'api/user?filter_by_role=3&pagination=true',
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
                // record : {},
            }
        },

        computed : {
            requestUrl(){
                this.loading = true;
                return this.url;
            }
        },

        methods: {
            startLoading(){
                this.loading = true;
            },
            AddCustomer() {
                this.customer = true;
            },
            ViewCustomerDetail(id) {

                /*this.viewcustomer = true;*/
                this.$router.push({ name: 'customerdetail', params: { id:id }})
            },
            changestatuspopup() {
                this.changestatus = true;
            },
            HideModal(){
                this.customer = false;
                this.viewcustomer = false;
                this.changestatus = false;
            },
            getRecords(data){
                let self = this;
                self.loading = false;
                self.records = data;
                self.noRecordFound = false;
                // console.log(self.records , '12312321');
                if (!self.records.length) {
                    self.noRecordFound = true;
                }

            },
            searchList(){
                let url = 'api/user?filter_by_role=3&pagination=true';
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
