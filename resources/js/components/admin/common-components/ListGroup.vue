<template>
  <div class="list-height">
    <div class="scrollbar pl-13" id="style-2">
        <b-list-group>
          <b-list-group-item href="#">{{ list.AllList }}</b-list-group-item>
          <b-list-group-item href="#" active>{{ list.list1 }}</b-list-group-item>
          <b-list-group-item href="#">{{ list.list2 }}</b-list-group-item>
          <b-list-group-item href="#">{{ list.list3 }}</b-list-group-item>
          <b-list-group-item href="#">{{ list.list4 }}</b-list-group-item>
          <b-list-group-item href="#">{{ list.list5 }}</b-list-group-item>
        </b-list-group>
    </div>
  </div>
</template>


<script>
export default{
    props : ['listprop'],
   data() {
       return {
           list:{
                AllList: 'All workspaces (21)',
                list1: 'PSI (6)',
                list2: 'HANDS (5)',
                list3: 'RSPN (2)',
                list4: 'Sales (1)',
                list5: 'Health Service Delivery (6)',
           },
           propval: this.listprop,
       }
   },
   methods:{
        datalist(){
            this.list.AllList = 'All Data Models (31)';
            this.list.list1 = 'PSI (4)';
            this.list.list2 = 'HANDS (12)';
            this.list.list3 = 'RSPN (5)';
            this.list.list4 = 'Sales (7)';
            this.list.list5 = 'Health Service Delivery (3)';
        },

        dataimport(){
            this.list.AllList = 'PSI';
            this.list.list1 = 'HANDS';
            this.list.list2 = 'RSPN';
            this.list.list3 = 'Sales';
            this.list.list4 = 'Health Service Delivery' ;
            this.list.list5 = 'HANDS' ;
        },
        dashboardvalue(){
            this.list.AllList = 'All Data Models (2)';
            this.list.list1 = 'PSI (2)';
            this.list.list2 = 'HANDS (7)';
            this.list.list3 = 'RSPN (8)';
            this.list.list4 = 'Sales (10)';
            this.list.list5 = 'Health Service Delivery (4)';    
        },

        reportvalue(){
            this.list.AllList = 'All Data Models (50)';
            this.list.list1 = 'PSI (20)';
            this.list.list2 = 'HANDS (11)';
            this.list.list3 = 'RSPN (20)';
            this.list.list4 = 'Sales (20)';
            this.list.list5 = 'Health Service Delivery (35)';    
        },        

   },
    watch:{
        listprop(value){
            if(this.propval == 'data-listing'){
                this.datalist();
            }

            else if(this.propval == 'data-importer'){
                this.dataimport();
            }

            else if(this.propval == 'dashboardvalue'){
                this.dashboardvalue();
            }

            else if(this.propval == 'reportvalue'){
                this.reportvalue();
            }            

        }
    },

}

</script>