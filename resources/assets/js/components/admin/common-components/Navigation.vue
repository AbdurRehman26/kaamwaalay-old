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
                        <div class="left-cog">
                            <span class="user-img" @click="ChangePass">
                                <img src="" alt="">
                            </span>
                            <router-link to="/"><span><i class="icon-exit"></i></span></router-link>
                        </div>
                    </div>
                </b-collapse>
                <div class="tablet-menu" @click="tabmenu ^= true">
                    <span class="responsive-btn"></span>
                </div>
            </b-navbar>
        <update-profile @HideModalValue="HideModal" :showModalProp="showModalValue"></update-profile>
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
          }
        },
        directives: {
            onClickaway: onClickaway,
        },
        methods: {
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
            }

        }
    }
</script>
