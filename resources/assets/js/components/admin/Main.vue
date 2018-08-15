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
                                  <td >{{record.access_level}}</td>
                                  <td>{{record.created_at.date | formatDate}}</td>
                                  <td class="text-center statustext">
                                    <div class=""><a class="active" @click="statusLink">{{record.status}}</a></div>
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
        	  showModalValue: false,
            changestatus: false,
            actiondelete: false,
            pageTitle:'Admin',
            noRecordFound : false,
            url : 'api/user?filter_by_role=1&pagination=true',
            loading : true,
            records : [],
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

          statusLink(event) {
            if(event.target.className == "active")
            {
                event.target.className = "deactive";
                event.target.text = "Deactive";
            }
            else
            {
                event.target.className = "active";
                event.target.text = "Active";
            }
          },
          getRecords(data){
            let self = this;
            self.loading = false;
            self.records = data;
            if (!self.records.length) {
              self.noRecordFound = true;
            }

          },
    },
    mounted(){

      this.loading = true;

    }
}
</script>
