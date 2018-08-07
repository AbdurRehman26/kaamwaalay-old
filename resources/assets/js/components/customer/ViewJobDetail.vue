<template>
  <div class="panel-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-strip">
                    <div class="float-left">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="customer-detail-title">
                    <h2 class="page-title">Javed Miadad</h2>
                </div>
                <div class="table-area">
                    <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                                <th>Job Title</th>
                                <th>Service Provider</th>
                                <th class="text-center">Urgent Job</th>
                                <th class="text-center">Project Amount</th>                          
                                <th>Service Provider Rating</th>

                                <th class="text-center">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="list in listing">
                                <td>{{ list.jobtitle }}</td>
                                <td>{{ list.serviceprovider }}</td>
                                <td class="text-center">{{ list.urgentjob }}</td>
                                <td class="text-center">${{ list.amount }}</td>                           
                                <td><star-rating :star-size="20" read-only :rating="2" active-color="#8200ff"></star-rating></td>

                                <td class="text-center">
                                    <div class="action-icons">
                                        <i @click="ViewCustomerRecord" v-b-tooltip.hover title="View Details" class="icon-eye"></i>
                                    </div>
                                </td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        <view-customer-record :showModalProp="customerrecord" @HideModalValue="HideModal"></view-customer-record>
  </div> 
</template>
<script>
import StarRating from 'vue-star-rating';

export default {
  data () {
    return {
        customerrecord: false,
        
        listing: [
            {
                jobtitle:'Electrician',
                serviceprovider: 'Elif',
                amount: 300,
                urgentjob: 'Yes',
                description: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi dolorem, deserunt accusamus at veniam culpa quia illum tempore consectetur dolor voluptates tempora quis natus libero modi, nesciunt magnam ipsum quod!',
            },
            {
                jobtitle:'Plumber',
                serviceprovider: 'Anthony',
                amount: 555,     
                urgentjob: 'No',       
                description: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat eligendi blanditiis debitis libero laudantium, saepe!',
            },
            {
                jobtitle:'Carpenter',
                serviceprovider: 'Anthony',
                amount: 1000,    
                urgentjob: 'Yes',          
                description: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat eligendi blanditiis debitis libero laudantium, saepe!',
            },
        ],

        }
    },
    components: {
        StarRating
    },
    methods: {
        ViewCustomerRecord() {
            this.customerrecord = true;
        },
        HideModal(){
            this.customerrecord = false;
        },
    }
}
</script>
