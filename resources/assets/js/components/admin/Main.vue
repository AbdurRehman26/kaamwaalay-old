<template>
  <div>
	<div class="panel-inner">
        <div class="row">
            <div class=" col-xs-12 col-md-12">
                <div class="row">
                  <div class="col-xs-12 col-md-12 ">
                      <a href="javascript:;" class="btn btn-primary float-right margin-bottom-30px" @click="ShowModalUser">Add Admin</a>
                  </div>
                </div>
            </div>
        </div>
         <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>  
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
                                  <th>Access Level</th>
                                  <th>Join Date</th>
                                  <th class="text-center">Status</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr v-for="record in records">
                                  <td>{{record.first_name}}</td>
                                  <td>{{record.last_name}}</td>
                                  <td><a href="javascript:;">{{record.email}}</a></td>
                                  <td >{{record | accessLevel}}</td>
                                  <td>{{record.created_at.date | formatDate}}</td>
                                  <td class="text-center statustext">
                                    <div class=""><a class="" @click="statusLink(record)" v-model="currentRecord.status"  :class="{'deactive': record.status !='active','active': record.status =='active','disabled': user_id == record.id}">{{record | adminStatus}}</a></div>
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

		 <add-new-user @HideModalValue="HideModal" :showModalProp="showModalValue"></add-new-user>
     <change-status-user @HideModalValue="HideModal" :showModalProp="changestatus"></change-status-user>
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
            actiondelete: false,
            pageTitle:'Admin',
            noRecordFound : false,
            url : 'api/user?filter_by_role=1&pagination=true',
            loading : true,
            currentRecord :{},
            records : [],
            user_id: null,
    	}
  	},
    computed : {
        requestUrl(){
            this.loading = true;
            return this.url;
      }
    },
    methods: {
        ShowModalUser(){
            this.showModalValue = true;
        },
        StatusChange(){
            this.changestatus = true;
        },
        HideModal(){
            this.showModalValue = false;
            this.changestatus = false;
        },

          statusLink(record) {
            this.currentRecord = record
            if(this.currentRecord.status == 'banned'){
              this.currentRecord.status = 'active'
            }else{
              this.currentRecord.status = 'banned'
            }
            this.update();
          },
          getRecords(data){
            let self = this;
            self.loading = false;
            self.records = data;
            if (!self.records.length) {
              self.noRecordFound = true;
            }

          },
          update: function () {
                let self = this;
                let data  = {
                  "id" : self.currentRecord.id,
                  "status" : self.currentRecord.status,
                }
                this.$http.put('api/user/change-status', data)
                    .then(response => {
                            self.successMessage= response.data.message;
                            setTimeout(function(){
                                self.successMessage='';
                            }, 5000);
                    })
                    .catch(error => {
                        self.loading = false
                        self.errorMessage ='An Error occured';
                        setTimeout(function(){
                            self.errorMessage='';
                        }, 5000);
                    })
            },
          },
    mounted(){

      this.loading = true;

    },
    beforeMount() {
          let user = JSON.parse(this.$store.getters.getAuthUser);
          this.user_id = user.id;
        },
}
</script>
