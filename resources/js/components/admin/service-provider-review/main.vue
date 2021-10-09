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
                                <label>By Service Type</label>
                                <select v-model="search.filter_by_service" class="form-control">
                                    <option value="">Select All</option>
                                    <option v-for="service in servicesList" :value="service.id">
                                        {{ service  | mainServiceOrChildService}}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-2 datepicker-field">
                            <div class="form-group">
                                <label>By Business/Individual</label>
                                <select v-model="search.filter_by_business_type" class="form-control">
                                    <option value="">Select All</option>
                                    <option value="business">Business</option>
                                    <option value="individual">Individual</option>
                                </select>
                            </div>             
                        </div>
                        <div class="col-xs-12 col-md-2 datepicker-field capitilize">
                            <div class="form-group">
                                <label>By Status</label>
                                <select v-model="search.filter_by_status" class="form-control">
                                    <option value="">Select All</option>
                                    <option value="approved">Approved</option>
                                    <option value="pending">Pending</option>
                                    <option value="rejected">Rejected</option>
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
                                    <th>Full Name</th>
                                    <!-- <th>Email Address</th> -->
                                    <th>Services</th>                                  
                                    <!-- <th>Contact Number</th> -->
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(record , recordIndex) in records">
                                    <!-- <td> <a href="javascript:void(0);" @click="detailreview(record.id)"></a> </td> -->
                                    <td class="fullName"><a @click.prevent="viewDetails(record.id)" class="basecolor">{{ record.service_provider_profile.first_name + ' ' + record.service_provider_profile.last_name }}</a></td>
                                    


                                    <td class="services"> 
                                        <span v-if="index < 2" v-for="(service , index) in record.services">{{service.service.title }} 
                                            {{ (record.services.length > 1 && index < record.services.length-1) && index < 1 ? ", " : '' }}
                                        </span>

                                    <a v-if="record.services.length > 2" v-b-toggle="''+recordIndex+''" :aria-controls="''+recordIndex+''" href="javascript:void(0);" variant="info">View More</a>
                                    
                                    <b-collapse :id="''+recordIndex+''" accordion="my-accordion" role="tabpanel">
                                        <b-card-body>
                                            <ul>
                                                <li v-for="(serviceList, serviceIndex) in record.services" v-if="serviceIndex > 1" class="card-text">
                                                    {{serviceList.service.title}}
                                                </li>
                                            </ul>
                                        </b-card-body>
                                    </b-collapse>

                                    </td>

                            <td class="type"> {{ record.service_provider_profile && record.service_provider_profile.business_details &&  record.service_provider_profile.business_details.business_type == 'individual' ? 'I' : 'B' }} </td>
                            <td  class="status">
                                <span class="tags" :class="[record.status]">
                                    {{ record.status }}
                                </span>
                            </td>
                            <td class="text-center action">
                                <div class="action-icons">                    
                                    <a @click.prevent="viewDetails(record.id)" class="basecolor"><i v-b-tooltip.hover title="View Details" class="icon-eye"></i></a>
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
</div>
</template>

<script>
    import StarRating from 'vue-star-rating';
    export default {
        data () {
            return {
                noRecordFound : false,
                search : {
                    keyword : '',
                    filter_by_business_type : '',
                    filter_by_service : '',
                    filter_by_status : ''
                },
                url : 'api/service-provider-profile-request?pagination=true&with-trashed=true',
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
                changeservicestatus: false,
            }
        },
        computed : {
            requestUrl(){
                return this.url;
            },
            servicesList(){
                return this.$store.getters.getAllServices;
            },

        },
        methods: {
            viewDetails(id){

                let routeData = this.$router.resolve({ name: 'service.detail.review', params: { id: id }});
                window.open(routeData.href, '_blank');

            },
            ShowModalUser(){
                this.changeProviderStatus = true;
            },
            AddService(){
                this.service = true;
            },
            ViewDetails() {
                this.viewdetails = true;
            },
            ChangeProviderStatus() {
                this.changeservicestatus = true;
            },
            HideModal(){
                this.service = false;
                this.viewdetails = false;
                this.changeservicestatus = false;   
            },
/*detailreview(id){
this.$router.push({name: 'service.detail.review' , params : {id : id}});
},*/
startLoading(){
    this.loading = true;
},
getRecords(response){
    let self = this;
    self.loading = false;
    self.records = response.data;
    self.noRecordFound = response.noRecordFound;

},
searchList(){
    let newDate  = new Date().getMilliseconds();

    this.url = 'api/service-provider-profile-request?pagination=true&time='+newDate;

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
}
</script>
