<template>
	<div class="panel-inner">
		<div class="row">
            <div class="col-md-12">
                <div class="page-title-strip">
                </div>
            </div>

				<div class="col-md-12">
                    <div class="table-area">
                        <div class="table-responsive">
                            <table class="table first-last-col-fix">
                              <thead>
                                <tr>
                                  <th>Id</th>
                                  <th>Title</th>                                  
                                  <th>Customer Name</th>
                                  <th>Service Type</th>
                                  <th>Service Sub-type</th>
                                  <th>Zip Code</th>
                                  <th>Address</th>
                                  <th>Job Status</th>
                                  <th class="text-center">Actions</th>
                                </tr>
                              </thead>
                              <tbody>

                                  <tr v-for="list in listing">
                                    <td> {{list.id}} </td>
                                    <td> {{ list.title }} </td>                                    
                                    <td> <a href="javascript:;">{{ list.customer_name }}</a> </td>
                                    <td> {{ list.service_type }} </td>
                                    <td> {{ list.service_subtype }} </td>
                                    <td> {{ list.zip_code }} </td>
                                    <td> {{ list.address }} </td>                                  
                                    <td>
                                        <span class="tags" :class="[list.job_status.replace(/\s/g, '').toLowerCase().trim()]">
                                            {{ list.job_status }}
                                        </span> 
                                    </td>
                                    <td class="text-center">
                                      <div class="action-icons">
                                        <i class="icon-eye" v-b-tooltip.hover title="View Details" @click="ViewDetails"></i>
                                        <i class="icon-pencil" v-b-tooltip.hover title="Edit Details" @click="AddService"></i>
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
        <change-status-user @HideModalValue="HideModal" :showModalProp="changeProviderStatus"></change-status-user>

	</div>
</template>

<script>
export default {
  data () {
    return {
    	service: false,
    	customer: false,
        changeProviderStatus: false,
            listing: [
                {
                    id : 1,
                    customer_name: 'Michel',
                    service_type: 'Electrician',
                    service_subtype: 'Electrical and Wiring Repair',
                    zip_code: '15235',
                    address: 'California Street 251',
                    title: 'Electrician Required',
                    job_status: 'In Bidding'
                },
                {
                    id : 2,
                    customer_name: 'Shawn',
                    service_type: 'Carpenter',
                    service_subtype: 'Window',
                    zip_code: '25647',
                    address: 'Plexwood Street 251',
                    title: 'Concrete Floor Building',
                    job_status: 'Awarded'
                },
                {
                    id : 3,
                    customer_name: 'Racheal',
                    service_type: 'Cleaning',
                    service_subtype: 'House Cleaning',
                    zip_code: '12312',
                    address: 'California Street 251',
                    title: 'Cleaner Required',
                    job_status: 'Completed'
                },
                {
                    id : 4,
                    customer_name: 'Jimmy',
                    service_type: 'Painter',
                    service_subtype: 'House',
                    zip_code: '23411',
                    address: 'California Street 251',
                    title: 'Painting & Other Jobs',
                    job_status: 'Archived'
                },
                {
                    id : 5,
                    customer_name: 'Harman',
                    service_type: 'Plumber',
                    service_subtype: 'Building',
                    zip_code: '23311',
                    address: 'California Street 251',
                    title: 'Leaking Water Pipe',
                    job_status: 'Initiated'
                },

                {
                    id : 6,
                    customer_name: 'Johnny',
                    service_type: 'Doctor',
                    service_subtype: 'Clinic',
                    zip_code: '23311',
                    address: 'California Street 251',
                    title: 'Part Time Doctor',
                    job_status: 'Completed'
                },  

                {
                    id : 7,
                    customer_name: 'Simons',
                    service_type: 'Painter',
                    service_subtype: 'Wallpaper Installation',
                    zip_code: '23311',
                    address: 'California Street 251',
                    title: 'Canvas Painter Required',
                    job_status: 'Archived'
                },  

                {
                    id : 8,
                    customer_name: 'Nathan',
                    service_type: 'Electrician',
                    service_subtype: 'Air Conditioning Repair',
                    zip_code: '23311',
                    address: 'California Street 251',
                    title: 'Floor Electric',
                    job_status: 'Awarded'
                },  

                {
                    id : 9,
                    customer_name: 'Julia',
                    service_type: 'Carpenter',
                    service_subtype: 'General Carpentry',
                    zip_code: '23311',
                    address: 'California Street 251',
                    title: 'Door Repairing',
                    job_status: 'In Bidding'
                },  

                {
                    id : 10,
                    customer_name: 'Drake',
                    service_type: 'Cleaning',
                    service_subtype: 'Carpet Cleaning',
                    zip_code: '23311',
                    address: 'California Street 251',
                    title: 'Carpet & House Cleaning',
                    job_status: 'Archived'
                },                                                                                                                                                   
            ],
    	}
  	},

    methods: {

        HideModal(){
            this.changeProviderStatus = false;
            this.customer = false;
        },
        ViewDetails(){
            /*this.customer = true;*/   
            this.$router.push('/jobs/viewjobdetail');
        },

        AddService(){
            this.changeProviderStatus = true;   
        },        

    },
}
</script>
