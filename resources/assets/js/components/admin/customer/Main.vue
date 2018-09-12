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
                <td>
                    <router-link :to="{ name: 'customer.detail', params: { id: record.id }}">{{record.first_name}} {{record.last_name}}</router-link>
                </td>
                <td>{{record.phone_number}} </td>
                <td ><span class="tags" :class="[record.status != null ?record.status.replace(/\s/g, '').toLowerCase().trim():'']">{{record.status}}</span></td>
                <td><star-rating :star-size="20" read-only :increment="0.02" :rating="parseInt(record.avg_rating)" active-color="#8200ff"></star-rating></td>
                <td class="text-center">
                  <div class="action-icons">
                    <router-link :to="{ name: 'customer.detail', params: { id: record.id }}">
                        <i v-b-tooltip.hover title="View Details" class="icon-eye"></i>
                    </router-link>
                    <i @click="changeStatusPopup(record)" :class="[record.status === 'pending'  ? 'disabled' : '']" v-b-tooltip.hover title="Change Status" class="icon-cog2"></i>
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
<changestatuspopup @HideModalValue="hideModal" :showModalProp="changeStatus" :statusData="statusData" :options="ChangeStatusesOptions"  :url="changeStatusUrl" ></changestatuspopup>
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
                changeStatus:false,
                url : 'api/user?filter_by_role=3&pagination=true',
                loading : true,
                statuses : [
                {
                    key : 'active',
                    value : 'Active'
                },
                {
                    key : 'pending',
                    value : 'Pending'
                },
                {
                    key : 'banned',
                    value :'Banned'
                }
                ],
                records : [],
                record : {},
                statusData:'',
                changeStatusUrl: 'api/user/change-status',
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
                
            }
        },

        computed : {
            requestUrl(){
                return this.url;
            }
        },

        methods: {
            startLoading(){
                this.loading = true;
            },
            changeStatusPopup(record) {
                this.statusData = record;
                this.changeStatus = true;
            },
            hideModal(){
                this.customer = false;
                this.changeStatus = false;
            },
            getRecords(response){
                let self = this;
                self.loading = false;
                self.records = response.data;
                self.noRecordFound = response.noRecordFound;
            },
            searchList(){
                
                let newDate  = new Date().getMilliseconds();

                this.url = 'api/user?filter_by_role=3&pagination=true&time='+newDate;
                
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
