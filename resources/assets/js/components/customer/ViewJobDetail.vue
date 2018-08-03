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
          <div class="table-area">
                <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                            <th>ID</th>
                            <th>Job Title</th>
                            <th>Service Provider</th>
                            <th>Rating</th>
                            <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="list in listing">
                            <td>{{ list.id }}</td>
                            <td>{{ list.jobtitle }}</th>
                            <td>{{ list.serviceprovider }}</th>
                            <td><star-rating :star-size="20" read-only :rating="2"></star-rating></td>
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
                id:'1',
                jobtitle:'Electrician',
                serviceprovider: 'Elif',
                description: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi dolorem, deserunt accusamus at veniam culpa quia illum tempore consectetur dolor voluptates tempora quis natus libero modi, nesciunt magnam ipsum quod!',
            },
            {
                id:'2',
                jobtitle:'Plumber',
                serviceprovider: 'Anthony',
                description: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat eligendi blanditiis debitis libero laudantium, saepe!',
            },
            {
                id:'3',
                jobtitle:'Carpenter',
                serviceprovider: 'Anthony',
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
