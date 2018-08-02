<template>
	<div class="panel-inner">
		<div class="row">
            <div class="col-md-12">
                <div class="page-title-strip">
                    <div class="float-left">
                       <h2 class="page-title">Job</h2>
                    </div>
                    <div class="float-right">
                        <a href="javascript:;" class="btn btn-primary">Add Job</a>
                    </div>
                </div>
            </div>

				<div class="col-md-12">	
                    <div class="table-area">
                        <div class="table-responsive">
                            <table class="table first-last-col-fix" style="width:2090px;">
                              <thead>
                                <tr>
                                  <th>Id</th>
                                  <th>Image</th>
                                  <th>Customer Name</th>
                                  <th>Service Type</th>
                                  <th>Service Sub-type</th>
                                  <th>Zip Code</th>
                                  <th>Address</th>
                                  <th>Title</th>
                                  <th>Details</th>
                                  <th>Job Status</th>
                                  <th class="text-center">Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <tr v-for="list in listing">
                                    <td> {{list.id}} </td>
                                    <td>
                                        <span class="user-img radius-0">
                                            <img  :src="list.imagepath" >
                                        </span>
                                    </td>
                                    <td> {{ list.customer_name }} </td>
                                    <td> {{ list.service_type }} </td>
                                    <td> {{ list.service_subtype }} </td>
                                    <td> {{ list.zip_code }} </td>
                                    <td> {{ list.address }} </td>
                                    <td> {{ list.title }} </td>
                                    <td> {{ list.details }} </td>
                                  
                                    <td> {{ list.job_status }} </td>
                                    <td class="text-center">
                                      <div class="action-icons">
                                        <i class="icon-eye" @click="ViewDetails"></i>
                                        <i class="icon-pencil" @click="AddService"></i>
                                      </div>
                                    </td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
            </div>

		  		</div>
		    </div>
        <customer-detail @HideModalValue="HideModal" :showModalProp="customer"></customer-detail>

	</div>
</template>

<script>
export default {
  data () {
    return {
    	service: false,
    	customer: false,

            listing: [
                {
                    id : 1,
                    customer_name: 'Michel',
                    service_type: 'Electrician',
                    service_subtype: 'AC',
                    zip_code: '15235',
                    address: 'California Street 251',
                    title: 'Job',
                    details: 'Job Details',
                    job_status: 'Active'
                },
            ],
    	}
  	},
    
    methods: {

    }
}
</script>
