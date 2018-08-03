<template>

    <div class="graph-log-entires vue-grid-item dashboard-grid">
      <discussion v-show="isShowing" @CloseDiscussion="isShowing = false"></discussion>
        <b-row>
          <b-col cols="8"> <h5 class="data-header colum-header">Record table heading will be place here</h5></b-col>
          <b-col cols="4">
            <div class="float-right actions">

                <div class="list-action">
                  <i v-b-tooltip.hover title="Analyze Data" class="icon-analyze-icon" data-original-title="Analyze Data"></i>
                  <i v-b-tooltip.hover title="Download" class="icon-download" data-original-title="Download"></i>
                  <i v-b-tooltip.hover title="Dicussion" class="icon-comment-icon" @click="isShowing ^= true" data-original-title="Dicussion"></i>
                </div>
          </div>
          </b-col>

        </b-row>

            <ag-grid-vue style="width: 100%; height: 100%;"
                         class="ag-theme-balham withoutheading withoutlabels"
                         :gridOptions="gridOptions"
                         :columnDefs="columnDefs"
                         :rowData="rowData"
                         :enableSorting="true"
                         :enableColResize="true">
            </ag-grid-vue>
    </div>

</template>

<script>
 import {AgGridVue} from "ag-grid-vue";
export default{
        name: 'App',
        data() {
            return {
                isShowing: false,
                gridOptions: {},
                columnDefs: null,
                rowData: [],
                height: 150,
            }
        },
        components: {
            'ag-grid-vue': AgGridVue
        },
        beforeMount() {
            this.columnDefs = [

                {
                  headerName: 'Name', field: 'name', editable: true,lockPosition: true,

                },

                {headerName: 'Country', field: 'country', editable: true,lockPosition: true,

              },


                {headerName: 'Cities', field: 'cities', editable: true,lockPosition: true,

              },
                {headerName: 'Joining Date', field: 'joiningdate', editable: true,lockPosition: true,

              },
                {headerName: 'Gender', field: 'gender', editable: true,lockPosition: true,

              },
                {headerName: 'Age', field: 'age', editable: true,lockPosition: true,

              }

            ];




        },
        mounted(){
            for (var i = 10 - 1; i >= 0; i--) {
            var person =  {name: this.$faker().name.findName(), country: this.$faker().address.country(), cities: this.$faker().address.city(), joiningdate: this.$faker().date.recent(), gender: 'Male', age: i+' years'};
            this.rowData.push(person);
            }

        }
}

</script>

