<template>
	<div class="panel-inner">
		<div class="row">

			<div class="col-md-12">
				<div class="payment-setting">

	        	

					</div>

		  		</div>
		    </div>
        <customer-detail @HideModalValue="HideModal" :showModalProp="customer"></customer-detail>

	</div>
</template>

<script>
import Multiselect from 'vue-multiselect';
export default {
  data () {
    return {
    	service: false,
    	customer: false,
		value: [],
		options: [
		    { name: 'New York', language: 'New York' },
		    { name: 'Los Angeles', language: 'Los Angeles' },
		    { name: 'Chicago', language: 'Chicago' },
		    { name: 'Houston', language: 'Houston' },
		    { name: 'Phoenix', language: 'Phoenix' },
		    { name: 'San Antonio', language: 'San Antonio' }
	    ],

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
                    job_status: 'In Bidding'
                },
                {
                    id : 2,
                    customer_name: 'Shawn',
                    service_type: 'Carpenter',
                    service_subtype: 'Window',
                    zip_code: '25647',
                    address: 'Plexwood Street 251',
                    title: 'Job',
                    details: 'Job Details',
                    job_status: 'Awarded'
                },
                {
                    id : 3,
                    customer_name: 'Racheal',
                    service_type: 'Cleaning',
                    service_subtype: 'House Cleaning',
                    zip_code: '12312',
                    address: 'California Street 251',
                    title: 'Job',
                    details: 'Job Details',
                    job_status: 'Completed'
                },
                {
                    id : 4,
                    customer_name: 'Jimmy',
                    service_type: 'Painter',
                    service_subtype: 'House',
                    zip_code: '23411',
                    address: 'California Street 251',
                    title: 'Job',
                    details: 'Job Details',
                    job_status: 'Archived'
                },
                {
                    id : 5,
                    customer_name: 'Harman',
                    service_type: 'Plumber',
                    service_subtype: 'House',
                    zip_code: '23311',
                    address: 'California Street 251',
                    title: 'Job',
                    details: 'Job Details',
                    job_status: 'Initiated'
                },                                                                 
            ],
    	}
  	},
  	
  	components: { 
  	 	Multiselect 
  	},

    methods: {

    }
}
</script>
