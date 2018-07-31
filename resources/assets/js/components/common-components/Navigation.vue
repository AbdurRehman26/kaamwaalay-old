<template>
    <div class="main-nav">
            <pageLoader></pageLoader>
        <b-navbar class="nav-head" toggleable="md" type="dark">

            <b-navbar-toggle target="nav_collapse"></b-navbar-toggle>


            <b-collapse is-nav id="nav_collapse" class="d-block">
            <!--<b-col cols="10" class="nav-icons" v-bind:active="tabmenu == true">
                <b-navbar-nav>
                    <b-nav-item href="#"><router-link to="/dashboard"><i class="icon-reporticon"></i>Dashboards &amp; Reports</router-link></b-nav-item>
                    <b-nav-item href="#"><router-link to="/data-explorer"><i class="icon-explorer-icon"></i>Data Explorer</router-link></b-nav-item>
                    <b-nav-item><router-link to="/data-importer"><i class="icon-importer-icon"></i>Data Importer</router-link></b-nav-item>
                    <b-nav-item><router-link to="/settings"><i class="icon-cog"></i>Settings</router-link></b-nav-item>
                    <b-nav-item><router-link to="/system-log"><i class="icon-list-icon"></i>System Log</router-link></b-nav-item>
                </b-navbar-nav>
            </b-col>
            -->
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
