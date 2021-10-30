<template>
            <div>
                <vue-common-methods :url="requestCityUrl" @get-records="getCityResponse" :hideLoader="true"></vue-common-methods>
            </div>
</template>

   <script>
        export default{
            data () {
              return {
                cityUrl : 'api/city-area',
            }
        },
        mounted(){
              this.getAllServices();
        },
        computed: {
          requestCityUrl(){
              return this.cityUrl;
          },
        },
        methods: {

            getCityResponse(response){
                if(response.data){
                    this.$store.commit('setAreasList', response.data);
                }
            },

            getAllServices() {
                let self = this;
                let url = 'api/service?order_by=title';
                self.$http.get(url).then(response=>{
                    response = response.data;
                    self.$store.commit('setAllServices' , response.data);
                    self.$store.commit('setServiceUrlPrefix' , response.url_prefix);
                }).catch(error=>{


                });
            },
        }
    }
</script>
