<template>
    <div>

        <block-spinner v-if="loadingStart"></block-spinner>

        <div v-if="pagination && !infiniteLoad && !loadingStart" class="total-record float-left">
            <p><strong>Total records: <span>{{totalRecords}}</span></strong></p>
        </div>
        <div v-if="pagination && !infiniteLoad && !loadingStart" class="pagination-wrapper float-right">
            <b-pagination @input="changePage" size="md" :total-rows="totalRecords" v-model="currentPage" :per-page="10"></b-pagination>
        </div>
        <infinite-loading :distance="100" v-if="infiniteLoad" @infinite="infiniteHandler" required="false">
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
        },
        computed : {
            totalRecords(){
                return this.pagination ? this.pagination.total : 0;
            },
            currentPage : {
                get: function() {
                    return this.pagination ? this.pagination.current : 1;    

                },
                set: function() {

                }
            }
        },
        watch :{
            loadingStart(value){
            },
            pagination(value){
            }
        },
        methods: {
            changePage(pageNumber){
                this.$emit('page-changed', pageNumber);
            },
            infiniteHandler($state) {
                let self = this;
                if(self.loading) {
                    return false;
                }


                if(!self.pagination){
                    self.loading = true;
                    self.$parent.getList(false , function (response) {
                        setTimeout(function () {
                            self.loading = false;
                            self.$emit('custom-loading-start', false);
                            $state.loaded();
                        } , 3000);
                    });

                }else{

                    self.loading = true;
                    if(self.pagination && self.pagination.current != self.pagination.next){
                        self.$emit('custom-loading-start', true);
                        self.$parent.getList(self.pagination.next , function (response) {
                            self.$emit('custom-loading-start', false);
                            setTimeout(function () {
                                $state.loaded();
                                self.loading = false;
                            } , 3000);

                        });

                    }else{
                        self.$emit('custom-loading-start', false);
                        self.loading = false;
                        $state.complete();
                    }

                }

            },
        }
    }
</script>