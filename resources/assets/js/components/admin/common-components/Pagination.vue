<template>
<div class="col-xs-12 col-md-12">

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
            url : 'api/dashboard_reports',
            showNoRecordFound : false,
            pagination : '',
          }
        },
        mounted(){
            this.getList();
        },
        computed : {
            totalRecords(){
                return this.pagination ? this.pagination.total : 0;
            },
        },
        methods: {
            changePage(pageNumber){
                this.$emit('page-changed', pageNumber);
            }
        }
    }
</script>
            