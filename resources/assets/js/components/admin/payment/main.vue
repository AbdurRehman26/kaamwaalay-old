<template>
    <div>
        <div class="panel-inner">
            <div class="row">
                <div class=" col-xs-12 col-md-12">
                    <div class="datepicker-row">
                        <div class="row">
                            <div class="col-xs-12 col-md-3 datepicker-field">
                                <div class="form-group">
                                  <div class="form-group">
                                    <label>Search</label>
                                    <input @keyup.enter.prevent="searchList(false)" type="text" placeholder="Search" autocomplete="off" v-model="search.keyword" class="form-control type-ahead-select taller">
                                </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-3 datepicker-field">
                                <div class="form-group">
                                    <label>By Pay By</label>
                                    <select v-model="search.filter_by_pay_by" class="form-control">
                                        <option value="">Select All</option>
                                        <option v-for="role in roleList" :value="role.id">{{ role.title}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-3 datepicker-field">
                                <div class="form-group">
                                    <label>By Type</label>
                                    <select v-model="search.filter_by_type" class="form-control">
                                        <option value="">Select All</option>
                                        <option v-for="type in paymentTypeList" :value="type.id">{{ type.title}}</option>
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
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-area">
                        <div class="table-responsive">
                            <table class="table last-col-fix">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Pay By</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Activity Type</th>
                                        <!-- <th>Status</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="record in records">
                                        <td>{{record.full_name}}</td>
                                        <td>{{record.pay_by.role.title}}</td>
                                        <td>{{record.formatted_created_at}}</td>
                                        <td>${{record.amount}}</td>
                                        <td >{{record.type}}</td>
                                        <!-- <td><span class="tags" :class="[record.status.replace(/\s/g, '').toLowerCase().trim()]">{{record.status}}</span></td> -->
                                    </tr>
                                </tbody>
                            </table>
                            <no-record-found v-show="noRecordFound"></no-record-found>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <vue-common-methods @start-loading="startLoading" :url="requestUrl" @get-records="getRecords"></vue-common-methods>

        </div>
    </div>
</template>
<script>
export default {
    data () {
        return {
            url : 'api/payment?pagination=true',
            noRecordFound : false,
            loading : false,
            records : [],
            pagination : [],
            search : {
                filter_by_pay_by : '',
                filter_by_type : '',
                keyword : ''
            },

        }
    },
    methods: {
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
            let url = 'api/payment?pagination=true';
            this.url = JSON.parse(JSON.stringify(url));
            Reflect.ownKeys(this.search).forEach(key =>{
                if(key !== '__ob__'){
                    this.url += '&' + key + '=' + this.search[key];
                }        
            });
        },
    },
    computed : {
        currentPage(){
            return this.pagination ? this.pagination.current : 0; 
        },
        requestUrl(){
            return this.url ;
        },
        roleList(){
            return this.$store.getters.getRoleList;
        },
        paymentTypeList(){
            return this.$store.getters.getPaymentTypeList;
        },
    },
}
</script>
