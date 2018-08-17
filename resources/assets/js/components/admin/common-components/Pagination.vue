<template>
<div v-if="pagination">

    <div class="total-record float-left">
        <p><strong>Total records: <span>{{totalRecords}}</span></strong></p>
    </div>

    <div class="pagination-wrapper float-right">
        <b-pagination @input="changePage" size="md" :total-rows="totalRecords" v-model="currentPage" :per-page="10"></b-pagination>
    </div>
</div>
</template>

<script>
    export default{
        props : ['pagination'],
        data(){
            return{
            records : [],
            showNoRecordFound : false,
          }
        },
        mounted(){
        },
        computed : {
            totalRecords(){
                return this.pagination ? this.pagination.total : 0;
            },
            currentPage(){
                return this.pagination ? this.pagination.current : 1;    
            }
        },
        watch :{
            pagination(){

            }
        },
        methods: {
            changePage(pageNumber){
                console.log(pageNumber , '123');
                this.$emit('page-changed', pageNumber);
            }
        }
    }
</script>
            