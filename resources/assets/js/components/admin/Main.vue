<template>
    <div>
        <div class="panel-inner">
            <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>         
            <div class="row">
                <div class=" col-xs-12 col-md-12">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 ">
                            <a href="javascript:;" class="btn btn-primary float-right margin-bottom-30px" @click="ShowModalUser">Add Admin</a>
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
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email Address</th>
                                        <th>Join Date</th>
                                        <th>Access Level</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="record in records">
                                        <td>{{record.first_name}}</td>
                                        <td>{{record.last_name}}</td>

                                        <td><a href="javascript:;">{{record.email}}</a></td>
                                        <td>{{record.created_at.date | formatDate}}</td>                                        
                                        <td class="statustext"><a class="active" @click="changeAccessLevel(record)" v-model="currentRecord.role_id" :class="{'disabled': user_id == record.id}">{{(record.role)?record.role.title:''}}</a></td>
                                        <td class="text-center statustext">
                                            <div class=""><a class="" @click="changeStatus(record)" v-model="currentRecord.status"  :class="{'deactive': record.status !='active','active': record.status =='active','disabled': user_id == record.id}">{{record | adminStatus}}</a></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <no-record-found v-show="noRecordFound"></no-record-found>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <vue-common-methods :url="requestUrl" @get-records="getRecords"></vue-common-methods>
            </div>
            <confirmation-popup-admin :showModalProp="actionConfirmation" :url='updateUrl' :data='updateData'></confirmation-popup-admin>
            <add-new-user @HideModalValue="showModalValue = false;" :showModalProp="showModalValue"></add-new-user>
        </div>
    </div>
</template>
<script>
    export default {
        data () {
            return {
                errorMessage: '',
                successMessage: '',
                showModalValue: false,
                changestatus: false,
                actionConfirmation: false,
                pageTitle:'Admin',
                noRecordFound : false,
                url : 'api/user?filter_by_roles[]=1&filter_by_roles[]=4&pagination=true',
                updateUrl : '',
                updateData : {},
                loading : true,
                currentRecord :{},
                records : [],
            }
        },
        computed : {
            requestUrl(){
                this.loading = true;
                return this.url;
            },
            user_id() {
                let user = JSON.parse(this.$store.getters.getAuthAdminUser);
                return user.id;
            },
        },
        methods: {
            ShowModalUser(){
                this.showModalValue = true;
            },
            changeStatus(record){
                this.actionConfirmation = true;
                let self = this
                let status = ''
                this.currentRecord = record
                if(this.currentRecord.status == 'banned'){
                    status= 'active'
                }else{
                    status= 'banned'
                } 
                self.updateUrl = 'api/user/change-status'
                self.updateData  = {
                    "id" : self.currentRecord.id,
                    "status" : status,
                }
            }, 
            changeAccessLevel(record) {
                let self = this
                this.currentRecord = record
                if(this.currentRecord.role_id == 4){
                    this.currentRecord.role_id = 1
                    this.currentRecord.role.title = 'Full'
                }else{
                    this.currentRecord.role_id = 4
                    this.currentRecord.role.title = 'Service Provider Review'
                }
                self.updateUrl = 'api/user/change-access-level'
                self.updateData  = {
                    "id" : self.currentRecord.id,
                    "role_id" : self.currentRecord.role_id,
                }   
                this.updateAccessLevel();
            },
            getRecords(response){
                let self = this;
                self.loading = false;
                self.records = response.data;
                self.noRecordFound = response.noRecordFound;

            },
            updateAccessLevel: function () {
                let self = this;
                this.$http.put(self.updateUrl,self.updateData)
                .then(response => {
                    self.successMessage= response.data.message;
                    setTimeout(function(){
                        self.successMessage='';
                    }, 5000);
                })
                .catch(error => {
                    self.loading = false
                    self.errorMessage =error.response.data.message[0];
                    setTimeout(function(){
                        self.errorMessage='';
                    }, 5000);
                })
            }
        },
        mounted(){

            this.loading = true;

        },
    }
</script>
