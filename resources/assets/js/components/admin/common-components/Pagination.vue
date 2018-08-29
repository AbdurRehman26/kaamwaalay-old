<template>
    <div>

        <block-spinner v-if="loadingStart"></block-spinner>

        <div v-if="pagination && !infiniteLoad" class="total-record float-left">
            <p><strong>Total records: <span>{{totalRecords}}</span></strong></p>
        </div>
        <div v-if="pagination && !infiniteLoad" class="pagination-wrapper float-right">
            <b-pagination @input="changePage" size="md" :total-rows="totalRecords" v-model="currentPage" :per-page="25"></b-pagination>
        </div>
        <infinite-loading v-if="infiniteLoad" @infinite="infiniteHandler"></infinite-loading>    

    </div>
</template>

<script>
    import InfiniteLoading from 'vue-infinite-loading';

    export default{
        components : {
            InfiniteLoading
        },
        props : ['pagination', 'loadingStart' , 'infiniteLoad'],
        data(){
            return{
                loading : false,
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
            loadingStart(value){
            },
            pagination(){

            }
        },
        methods: {
            changePage(pageNumber){
                console.log(pageNumber , '123');
                this.$emit('page-changed', pageNumber);
            },
            infiniteHandler($state) {
            let self = this;

            if(!self.pagination){

                self.$parent.getList(false);

            }else{

                if(self.pagination && self.pagination.current != self.pagination.next){

                    self.$parent.getList(false , self.pagination.next , function (response) {

                        setTimeout(function () {
                            $state.loaded();
                        } , 2000);

                    });
                    
                }else{
                    $state.complete();
                    setTimeout(function () {
                        $state.reset();
                    }, 3000);
                }

            }

        },
        }
    }
</script>
