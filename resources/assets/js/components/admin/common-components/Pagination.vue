<template>
    <div>

        <block-spinner v-if="loadingStart"></block-spinner>

        <div v-if="pagination && !infiniteLoad" class="total-record float-left">
            <p><strong>Total records: <span>{{totalRecords}}</span></strong></p>
        </div>
        <div v-if="pagination && !infiniteLoad" class="pagination-wrapper float-right">
            <b-pagination @input="changePage" size="md" :total-rows="totalRecords" v-model="currentPage" :per-page="25"></b-pagination>
        </div>
        <infinite-loading :distance="10" v-if="infiniteLoad" @infinite="infiniteHandler" required="false">
            <span slot="no-more">
            </span>
            <span slot="spinner"></span>
        </infinite-loading>    

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
            if(this.infiniteLoad){
                this.infiniteHandler();
            }
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
            pagination(value){
                if(value){
                    if(value.current == value.next){

                    }
                }
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

                    self.$parent.getList(false , function (response) {
                        setTimeout(function () {
                            $state.loaded();
                        } , 3000);
                    });

                }else{
                    if(self.pagination && self.pagination.current != self.pagination.next){

                        self.$parent.getList(self.pagination.next , function (response) {

                            setTimeout(function () {
                                $state.loaded();
                            } , 3000);

                        });

                    }else{

                        $state.complete();
                    }

                }

            },
        }
    }
</script>