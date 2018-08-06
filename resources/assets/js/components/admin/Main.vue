<template>
  <div>
	<div class="panel-inner">
        <div class="row">
            <div class=" col-xs-12 col-md-12">
                    <div class="datepicker-row">
                        <div class="row">
                          <div class="col-xs-12 col-md-12 ">
                              <a href="javascript:;" class="btn btn-primary float-right margin-bottom-30px" @click="ShowModalUser">Add User</a>
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
                                  <th>First Name</th>
                                  <th>Last Name</th>
                                  <th>Email Address</th>
                                  <th>Access Level</th>
                                  <th>Join Date</th>
                                  <th class="text-center">Status</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr v-for="list in listing">
                                  <td>{{list.fname}}</th>
                                  <td>{{list.lname}}</td>
                                  <td><a href="javascript:;">{{list.email}}</a></td>
                                  <td >{{list.acesslevel}}</td>
                                  <td>{{list.jdate}}</td>
                                  <td class="text-center statustext">
                                    <div class=""><a class="active" @click="statusLink">Active</a></div>
                                </td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
		    		</div>
		  		</div>
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

            listing: [
                {
                    fname:'Dickerson',
                    lname:'Macdonald',
                    email:'dmacdonald@gmail.com',
                    acesslevel:'Full',
                    jdate: '22-01-2018',
                    status: 'Active',
                },
                {
                    fname:'Larsen',
                    lname:'Shaw',
                    email:'shawlarsen@gmail.com',
                    acesslevel:'Review',
                    jdate: 'July 1, 2018',
                    status: 'Active',
                },
                {
                    fname:'Geneva',
                    lname:'Wilson',
                    email:'genevawilson@gmail.com',
                    acesslevel:'Full',
                    jdate: 'July 2, 2018',
                    status: 'Deactive',
                },
            ],

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
          }
    }
}
</script>
