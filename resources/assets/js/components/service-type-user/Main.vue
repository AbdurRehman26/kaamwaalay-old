<template>
<div>
   <div class="float-right add-btn-pos">
      <a href="javascript:;" class="btn btn-primary" @click="AddService">Add Service</a>
  </div>
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
                            <div class="col-xs-12 col-md-2">
                                <button class="btn btn-primary filter-btn-top-space">
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
                            <table class="table first-last-col-fix">
                              <thead>
                                <tr>
                                  <th>Id</th>
                                  <th>Image</th>
                                  <th>Service</th>
                                  <th>Sub Service</th>
                                  <th class="text-center">Is Featured</th>
                                  <th class="text-center">Hero Navigation</th>
                                  <th class="text-center">Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr v-for="list in listing">
                                  <td>{{list.id}}</th>
                                  <td><span class="user-img radius-0"><img  :src="list.imagepath" ></span></td>
                                  <td>{{list.service}}</td>
                                  <td>{{list.subservice}}</td>
                                  <td class="text-center">{{list.featured}}</td>
                                  <td class="text-center">{{list.heronavigation}}</td>
                                  <td class="text-center">
                                    <div class="action-icons">
                                      <i v-b-tooltip.hover title="View Details" @click="ViewDetails" class="icon-eye"></i>
                                      <i v-b-tooltip.hover title="Edit Details" class="icon-pencil" @click="AddService"></i>
                                      <i v-b-tooltip.hover title="Delete" @click="ActionDelete" class="icon-delete"></i>
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
		    		</div>
		  		</div>
		    </div>
        <add-service @HideModalValue="HideModal" :showModalProp="service"></add-service>
        <view-details @HideModalValue="HideModal" :showModalProp="viewdetails"></view-details>
        <delete-popup @HideModalValue="HideModal" :showModalProp="actiondelete"></delete-popup>
	</div>
</div>
</template>

<script>
export default {
  data () {
    return {
    	service: false,
      viewdetails: false,
      actiondelete: false,

            listing: [
                {
                    id : 1,
                    imagepath:'',
                    service:'Electricians',
                    subservice:'',
                    featured:'No',
                    heronavigation:'Yes',
                    description: 'Testing',
                    url: 'www.psm.com',
                },
                {
                    id : 2,
                    imagepath:'',
                    service:'Carpenters',
                    subservice:'',
                    featured:'Yes',
                    heronavigation:'Yes',
                    description: 'Testing',
                    url: 'www.psm.com',
                },
                {
                    id : 3,
                    imagepath:'',
                    service:'Cleaning Services',
                    subservice:'',
                    featured:'No',
                    heronavigation:'No',
                    description: 'Testing',
                    url: 'www.psm.com',
                },
                {
                    id : 4,
                    imagepath:'',
                    service:'Electricians',
                    subservice:'Electrical and wiring repair',
                    featured:'No',
                    heronavigation:'No',
                    description: 'Testing',
                    url: 'www.psm.com',
                },
                {
                    id : 5,
                    imagepath:'',
                    service:'Electricians',
                    subservice:'Air conditioning repair',
                    featured:'No',
                    heronavigation:'No',
                    description: 'Testing',
                    url: 'www.psm.com',
                },
            ],
    	}
  	},
    methods: {
        AddService(){
            this.service = true;
        },
        ViewDetails() {
            this.viewdetails = true;
        },
        ActionDelete() {
            this.actiondelete = true;
        },
        HideModal(){
            this.service = false;
            this.viewdetails = false;
            this.actiondelete = false;
        },
        getResponse: function (response) {
          return response.data.items
        }
    }
}
</script>
