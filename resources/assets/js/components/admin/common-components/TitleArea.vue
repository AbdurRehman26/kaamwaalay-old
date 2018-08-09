<template>
        <div class="title-area">
            <div class="description-area">
                <div class="breadcrum">
                    <ul>
                        <li><a href="#" class="active">{{ Title.breadcrumParent }}</a></li>
                        <li><a class="currentpage">{{ Title.breadcrumPresent }}</a></li>
                    </ul>
                </div>
                <h2>{{ Title.name }} <!-- <i v-b-tooltip.hover title="Info Text" class="icon-exclamation-solid"></i> --></h2>
                <h4>{{ Title.description }}</h4>
                <h4 style="display: none;">{{ propval }}</h4>
            </div>
            <div class="hotlinks drop-down-menus">
                  <b-dropdown v-on:click="Showactive" variant="link" size="lg" no-caret>
                    <template slot="button-content">
                      <i v-bind:active="tab == true" class="icon-dots-three-vertical"></i>
                    </template>

                    <b-dropdown-item  @click="$emit('show-discussion')" href="javascript:void()"><i class="icon-comment-icon"></i> Discussion</b-dropdown-item>

                    <b-dropdown-item href="#" @click="$emit('show-duplicate')"><i class="icon-duplicate-icon"></i> Duplicate</b-dropdown-item>

                    <b-dropdown-item @click="$emit('show-individual-dashboard')" href="#"><i class="icon-edit-pencil"></i> Modify</b-dropdown-item>

                    <b-dropdown-item @click="$emit('show-delete-modal')" href="javascript:void()"><i class="icon-delete"></i> Remove</b-dropdown-item>

                  </b-dropdown>
            </div>
        </div>
</template>


<script>
    export default{
        props : ['titleprop','showModalProp'],
        data () {
          return {
            Title: {
                    breadcrumParent: 'Data Explorer',
                    breadcrumPresent: 'Current Data Model Name',
                    name: 'Citizens',
                    description: "Data model description will be place here",
                },

                propval: this.titleprop,
            }
        },

        methods: {
            Showactive(){
                this.tab ^= true;
            },

            competitionn: function(){
                return this.titleprop.length;
            },

            ReportProperties(){
                this.Title.breadcrumParent = "Dashboards & Reports";
                this.Title.breadcrumPresent = "Report title place here";
                this.Title.name = "Report title place here";
                this.Title.description = "Short report description place here";
            },

            DashboardProperties(){
                this.Title.breadcrumParent = "Dashboards & Reports";
                this.Title.breadcrumPresent = "Dashboard title place here";
                this.Title.name = "Dashboard title place here";
                this.Title.description = "Short Dashboard description place here";
            },

            DataExplorerProperties(){
                this.Title.breadcrumParent = "Data Explorer";
                this.Title.breadcrumPresent = "Current Data Model Name";
                this.Title.name = "Citizens";
                this.Title.description = "Data model description will be place here";
            },

            DataImporterProperties(){
                this.Title.breadcrumParent = "Data Importer";
                this.Title.breadcrumPresent = "Imported data in citizens data model";
                this.Title.name = "Citizens";
                this.Title.description = "Added 88,475 records in citizen data model  Upload on May 10, 2018 by Yasir Shah";
            },

        },

        watch:{
        titleprop(value){

            if(this.propval == 'report-title'){
                this.ReportProperties();
            }

            else if(this.propval == 'dashboard-title'){
                this.DashboardProperties();
            }

            else if(this.propval == 'explorer-title'){
                this.DataExplorerProperties();
            }

            else if(this.propval == 'importer-title'){
                this.DataImporterProperties();
            }
        },
        showModalProp(value){

            if(value){
                this.showModal();
            }
        }
    }
}
</script>
