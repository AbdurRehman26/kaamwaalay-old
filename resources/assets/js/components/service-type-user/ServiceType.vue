<template>
	<div class="panel-inner">
		<div class="row">
            <div class="col-md-12">
                <div class="page-title-strip">
                    <div class="float-left">
                       <h2 class="page-title">Service / Sub service</h2>
                    </div>
                    <div class="float-right">
                        <a href="javascript:;" class="btn btn-primary" @click="AddService">Add Service</a>
                    </div>
                </div>
            </div>
				<div class="col-md-12">
					<div class="table-area">
                        <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>Id</th>
                                  <th>Image</th>
                                  <th>Service</th>
                                  <th>Sub Service</th>
                                  <th class="text-center">Is Featured</th>
                                  <th class="text-center">Hero Navigation</th>
                                  <th>Description</th>
                                  <th>URL</th>
                                  <th>Actions</th>
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
                                  <td>{{list.description}}</td>
                                  <td>{{list.url}}</td>
                                  <td><i class="icon-eye"></i><i class="icon-pencil"></i><i class="icon-delete"></i></td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
		    		</div>
		  		</div>
		    </div>
        <add-service @HideModalValue="HideModal" :showModalProp="service"></add-service>
        <view-details @HideModalValue="HideModal" :showModalProp="viewdetails"></view-details>

	</div>
</template>

<script>

export default {
  data () {
    return {
    	service: false,
        viewdetails: false,

            listing: [
                {
                    id : 1,
                    imagepath:'images/dummy/user-pic.jpg',
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
                    imagepath:'images/dummy/user-pic.jpg',
                    service:'Electricians',
                    subservice:'Electrical and wiring repair',
                    featured:'No',
                    heronavigation:'No',
                    description: 'Testing',
                    url: 'www.psm.com',
                },
                {
                    id : 5,
                    imagepath:'images/dummy/user-pic.jpg',
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
        HideModal(){
            this.service = false;
            this.viewdetails = false;
        },
    }
}
</script>
