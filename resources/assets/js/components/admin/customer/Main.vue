<template>
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
                     <div class="col-xs-12 col-md-3 datepicker-field">
                      <div class="form-group">
                         <label>By Type</label>
                         <select class="form-control">
                           <option>Select Type</option>
                           <option>Electrician</option>
                           <option>Electrician >> Ac</option>
                       </select>
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
<div class="col-md-12">

    <div class="table-area">
        <div class="table-responsive">
            <table class="table first-last-col-fix">
              <thead>
                <tr>
                  <th></th>
                  <th>Full Name</th>
                  <!-- <th>Email</th> -->
                  <th>Contact Number</th>
                  <th>Status</th>
                  <th>Avg. Rating</th>
                  <th class="text-center">Actions</th>
              </tr>
          </thead>
          <tbody>
              <tr v-for="list in listing">
                <td>
                    <span class="user-img radius-0">
                        <img  :src="list.imagepath" >
                    </span>
                </td>
                <td><a href="javascript:void(0);" @click="ViewCustomerDetail">{{list.fullname}}</a></td>
                <!-- <td>{{list.email}} </td> -->
                <td>{{list.contact_number}} </td>
                <td ><span class="tags" :class="[list.status.replace(/\s/g, '').toLowerCase().trim()]">{{list.status}}</span></td>
                <td><star-rating :star-size="20" read-only :rating="2" active-color="#8200ff"></star-rating></td>
                <td class="text-center">
                  <div class="action-icons">
                    <i @click="ViewCustomerDetail" v-b-tooltip.hover title="View Details" class="icon-eye"></i>
                    <i @click="changestatuspopup" v-b-tooltip.hover title="Change Status" class="icon-pencil"></i>
                </div>
            </td>
        </tr>
    </tbody>
</table>
</div>
</div>
</div>

<div class="clearfix"></div>

<vue-common-methods :url="requestUrl" @get-records="getRecords"></vue-common-methods>


</div>
<changestatuspopup @HideModalValue="HideModal" :showModalProp="changestatus"></changestatuspopup>
<customer-detail @HideModalValue="HideModal" :showModalProp="customer"></customer-detail>
<view-customer-details @HideModalValue="HideModal" :showModalProp="viewcustomer"></view-customer-details>
</div>
</template>

<script>
    import StarRating from 'vue-star-rating';

    export default {
      data () {
        return {
           service: false,
           customer: false,
           changestatus:false,
           viewcustomer: false,
           listing: [
           {
            imagepath:'',
            fullname:'Levi Boyer',
            email:'Chester_Kris15@gmail.com',
            contact_number:'894-807-8690',
            status:'Active',
        },
        {
            imagepath:'',
            fullname:'Miss Godfrey Lemke',
            email:'Guadalupe_Hauck@gmail.com',
            contact_number:'136-452-8690',
            status:'Banned',
        },
        {
            imagepath:'',
            fullname:'Anais Crist',
            email:'Burley.Mueller23@hotmail.com',
            contact_number:'306-452-8690',
            status:'Pending',
        },
        {
            imagepath:'',
            fullname:'Mrs. Orlando Kris',
            email:'Virgie_Douglas@gmail.com',
            contact_number:'306-452-8690',
            status:'Active',
        },
        {
            imagepath:'',
            fullname:'Levi Boyer',
            email:'Chester_Kris15@gmail.com',
            contact_number:'894-807-8690',
            status:'Active',
        },
        {
            imagepath:'',
            fullname:'Miss Godfrey Lemke',
            email:'Guadalupe_Hauck@gmail.com',
            contact_number:'136-452-8690',
            status:'Banned',
        },
        {
            imagepath:'',
            fullname:'Anais Crist',
            email:'Burley.Mueller23@hotmail.com',
            contact_number:'306-452-8690',
            status:'Pending',
        },
        {
            imagepath:'',
            fullname:'Mrs. Orlando Kris',
            email:'Virgie_Douglas@gmail.com',
            contact_number:'306-452-8690',
            status:'Active',
        },
        {
            imagepath:'',
            fullname:'Anais Crist',
            email:'Burley.Mueller23@hotmail.com',
            contact_number:'306-452-8690',
            status:'Pending',
        },
        {
            imagepath:'',
            fullname:'Mrs. Orlando Kris',
            email:'Virgie_Douglas@gmail.com',
            contact_number:'306-452-8690',
            status:'Active',
        },
        ],
    }
},

computed : {
    requestUrl(){
        return 'user?filter_by_role=3';
    }
},
methods: {

   AddCustomer() {
      this.customer = true;
  },
  ViewCustomerDetail() {
    /*this.viewcustomer = true;*/
    this.$router.push({name: 'customerdetail'});
},
changestatuspopup() {
    this.changestatus = true;
},
HideModal(){
    this.customer = false;
    this.viewcustomer = false;
    this.changestatus = false;
},
getRecords(data){
    console.log(data , '123123123');
}

},
components: {
    StarRating
},

mounted(){

}

}
</script>
