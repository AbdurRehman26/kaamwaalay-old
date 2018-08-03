<template>
    <div class="main-nav">
        <pageLoader></pageLoader>
            <b-navbar class="nav-head" toggleable="md" type="dark">
                <b-navbar-toggle target="nav_collapse"></b-navbar-toggle>
                <b-collapse is-nav id="nav_collapse" class="d-block">
                    <div class="float-left">
                        <h2 class="page-title"><i :class="[$route.meta.pagetitle]"></i>{{$route.meta.pagetitle}}</h2>
                    </div>
                    <div class="float-right">
                        <div class="left-cog">
                            <span class="user-img" @click="ShowModal">
                                <img src="/images/dummy/user-pic.jpg" alt="">
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
          }
        },
        directives: {
            onClickaway: onClickaway,
        },
        methods: {
            ShowModal(){
                this.showModalValue = true;
            },
            HideModal(){
                this.showModalValue = false;
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
