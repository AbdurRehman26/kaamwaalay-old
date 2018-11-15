<template>
    <div class="main-nav">
        <pageLoader></pageLoader>
            <b-navbar class="nav-head" toggleable="md" type="dark">
                <b-navbar-toggle target="nav_collapse"></b-navbar-toggle>
                <b-collapse is-nav id="nav_collapse" class="d-block">
                    <div class="float-left">
                        <h2 class="page-title"><i :class="[$route.meta.icon]"></i>{{$route.meta.pagetitle}}</h2>
                    </div>
                    <div class="float-right">
                        <div class="left-cog profile-block">                            
                            <div class="profile-username pointer-event" @click="ChangePass">
                                <i class="icon-lock_outline"></i>
                                <div class="username">{{fullName}}</div>
                                <i class="icon-triangle-down"></i>
                           </div>
                           <logout-component></logout-component> 
                        </div>
                    </div>
                </b-collapse>
                <div class="tablet-menu" @click="tabmenu ^= true">
                    <span class="responsive-btn"></span>
                </div>
            </b-navbar>
        <change-pass-popup @HideModalValue="HideModal" :showModalProp="changepass"></change-pass-popup>
</div>
</template>

<script>
import { directive as onClickaway } from 'vue-clickaway';
    export default{
        data () {
          return {
            isShowing:false,
            showModalValue : false,
            tab: false,
            tabmenu: false,
            changepass: false,
            first_name : '',
            last_name : '',
            user:{}
          }
        },
        directives: {
            onClickaway: onClickaway,
        },
       mounted: function () {
            let self = this;
             this.getAllServices();
             self.setRoleList();
             self.setPaymentTypeList();
            self.user = JSON.parse(self.$store.getters.getAuthAdminUser);
            self.first_name = self.user.first_name;
            self.last_name = self.user.last_name;
      },
       computed : {
        fullName(){
            return this.first_name + ' ' + this.last_name;
            },
       },
        methods: {
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
            ShowModal(){
                this.showModalValue = true;
            },
            ChangePass() {
                this.changepass = true;
            },
            HideModal(){
                this.showModalValue = false;
                this.changepass = false;
            },
            Showactive(){
                this.tab ^= true;
            },
            away: function(){
                this.isShowing = false;
                this.tab = false;
            },
            setRoleList() {
                let data = [
                {
                    id:2,
                    title:'Service Provider'
                },
                {
                    id:3,
                    title:'Customer'
                }
                ];
                this.$store.commit('setRoleList' , data);
            },
            setPaymentTypeList() {
                let data = [
                {
                    id:'urgent_job',
                    title:'Urgent'
                },
                {
                    id:'featured_profile',
                    title:'Featured'
                },
                {
                    id:'account_creation',
                    title:'Account Creation'
                }
                ];
                this.$store.commit('setPaymentTypeList' , data);
            },

        }
    }
</script>
