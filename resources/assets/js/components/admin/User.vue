<template>
	<div class="panel-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-strip">
                    <div class="float-left">
                       <h2 class="page-title">Admins</h2>
                    </div>
                    <div class="float-right">
                        <a href="javascript:;" class="btn btn-primary" @click="ShowModalUser">Add User</a>
                    </div>
                </div>
            </div>
        </div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-area">
                        <div class="table-responsive">
                            <table class="table ">
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
                                  <td><a href="">{{list.email}}</a></td>
                                  <td >{{list.acesslevel}}</td>
                                  <td>{{list.jdate}}</td>
                                  <td class="text-center statustext">
                                    <div class=""><a class="active" @click="statusLink">Active</a></div>
<!--                                     <div class="action-icons">
    <i class="icon-pencil"  @click="changestatus"></i>
</div> -->
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
		 <delete-popup @HideModalValue="HideModal" :showModalProp="actiondelete"></delete-popup>
	</div>
</template>
<script>
export default {
  data () {
    return {
    	showModalValue: false,
        changestatus: false,
        actiondelete: false,


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
        ActionDelete() {
            this.actiondelete = true;
        },
        HideModal(){
            this.showModalValue = false;
            this.changestatus = false;
            this.actiondelete = false;
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
