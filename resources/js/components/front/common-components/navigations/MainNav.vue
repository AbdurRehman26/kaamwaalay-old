<template>
            <div class="navigation main-navigation">
                <ul>
                    <li @click="$emit('clickmenu')"><router-link @click.native="scrollToTop()" to="/explore">Explore</router-link></li>
                    <li @click="$emit('clickmenu')"><router-link @click.native="scrollToTop()" to="/join-as-pro">Join as a Pro</router-link></li>
                    <li @click="$emit('clickmenu')"><router-link @click.native="scrollToTop()" to="/login">Login</router-link></li>
                    <li @click="$emit('clickmenu')"><router-link @click.native="scrollToTop()" to="/sign-up">Sign up</router-link></li>
                    <li @click="$emit('clickmenu')"><a href="javascript:void(0);" class="btn btn-primary post-job-btn btn-md" @click.prevent="onPostJob">Post a Job</a></li>
                </ul>

                <vue-common-methods :url="requestCityUrl" @get-records="getCityResponse" :hideLoader="true"></vue-common-methods>

            </div>
</template>


   <script>
        export default{
            data () {
              return {
            }
        },
        mounted(){
              this.getAllServices();
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

            onPostJob() {
                localStorage.clear();
                this.$router.push({name: 'job.create'});
            },
            scrollToTop() {
                window.scrollTo(0,0);
            },

        }
    }
</script>
