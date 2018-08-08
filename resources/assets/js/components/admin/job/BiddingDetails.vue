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
            <h2 class="page-title">Door Repairing</h2>
        </div>
          <div class="table-area">
                <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Bid Amount</th>                          
                            <th>Rating</th>
                            <th class="text-right">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="list in listing">
                            <td>{{ list.id }}</td>
                            <td><span class="user-img radius-0"><img src=""></span></td>
                            <td class="text-center"><a href="javascript:void(0);">{{ list.name }}</a></td>
                            <td class="text-center">${{ list.amount }}</td>                           
                            <td><star-rating :star-size="20" read-only :rating="[list.rating]" active-color="#8200ff"></star-rating></td>
                            <td class="text-right">
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
        <view-bidding-details :showModalProp="customerrecord" @HideModalValue="HideModal"></view-bidding-details>   
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
                id: 1,
                name: 'Elif',
                amount: 300,                
                rating: 3,
            },
            {
                id: 2,
                name: 'Anthony',
                amount: 555,                 
                rating: 2,
            },
            {
                id: 3,
                name: 'Johnny',
                amount: 1000,    
                rating: 5,                
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
