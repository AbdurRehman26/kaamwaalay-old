<template>
    <div class="panel-inner">
        <div class="row">
            <div class=" col-xs-12 col-md-12">
                <div class="datepicker-row">
                    <div class="row">
                        <div class="col-xs-12 col-md-3 datepicker-field">
                          <div class="form-group">
                              <label>Start Date</label>
                              <datepicker v-model="start_date" data-vv-name="start_date" v-validate="'required'" placeholder="Start date" calendar-button-icon="fa fa-calendar"></datepicker>
                          </div>
                      </div>
                      <div class="col-xs-12 col-md-3 datepicker-field">
                          <div class="form-group">
                              <label>End Date</label>
                              <datepicker v-model="end_date" data-vv-name="end_date" v-validate="'required'" placeholder="End date" calendar-button-icon="fa fa-calendar"></datepicker>
                          </div>
                      </div>
                      <div class="col-xs-12 col-md-2">
                        <button @click.prevent="validateBeforeSubmit(true)" :class="['btn btn-primary', 'filter-btn-top-space', loading ?'show-spinner' : '']">
                            <span>Apply</span>
                            <loader></loader>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="chart-legends row">
        <div class="col-6">
            <div class="widget-box">
                <div class="colmn">
                    <h3>Total Customers Sign up</h3>
                    <h2>70,632</h2>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="widget-box">
                <div class="colmn">
                    <h3>Total Service Providers Sign ups</h3>
                    <h2>85,632</h2>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="widget-box">
                <div class="colmn">
                    <h3>Total Jobs Initiated</h3>
                    <h2>20,632</h2>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="widget-box">
                <div class="colmn">
                    <h3>Total Payment Collected</h3>
                    <h2>85,632 USD</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-md-6 margin-bottom-20px">
            <div class="graphs vue-grid-item">
                <div class="chart-header grid-head">
                    <h2 class="float-left">Customer signups over time</h2>
                    <div class="float-right actions">
                        <div class="list-action">
                            <i v-b-tooltip.hover title="Download" class="icon-download" data-original-title="Download"></i>
                        </div>
                    </div>
                    <div id="customerSignups" class="charts-height"></div>
                </div>
            </div>
        </div>

        <div class="col-xs-6 col-md-6 margin-bottom-20px">
            <div class="graphs vue-grid-item">
                <div class="chart-header grid-head">
                    <h2 class="float-left">Service Provider signups over time</h2>
                    <div class="float-right actions">
                        <div class="list-action">
                            <i v-b-tooltip.hover title="Download" class="icon-download" data-original-title="Download"></i>
                        </div>
                    </div>
                    <div id="providerssigns" class="charts-height"></div>
                </div>
            </div>
        </div>


        <div class="col-xs-12 col-md-12 margin-bottom-20px vue-grid-list">
            <div class="graphs vue-grid-item">
                <div class="chart-header grid-head">
                    <h2 class="float-left chart-heading">Job count by service type </h2>
                    <div class="float-right actions">
                      <div class="list-action">
                          <i v-b-tooltip.hover title="Download" class="icon-download" data-original-title="Download"></i>
                      </div>
                  </div>
              </div>
              <div id="jobCountService" class="charts-height"></div>
          </div>
      </div>

      <div class="col-xs-12 col-md-6 margin-bottom-20px">
        <div class="graphs vue-grid-item">
            <div class="chart-header grid-head">
                <h2 class="float-left">Payment received over time </h2>
                <div class="float-right actions">
                    <div class="list-action">
                        <i v-b-tooltip.hover title="Download" class="icon-download" data-original-title="Download"></i>
                    </div>
                </div>
                <div id="paymentRecievedByTime" class="charts-height"></div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-6 margin-bottom-20px vue-grid-list">
        <div class="graphs vue-grid-item">
            <div class="chart-header grid-head">
                <h2 class="float-left chart-heading">Payment received by type</h2>
                <div class="float-right actions">
                    <div class="list-action">
                      <i v-b-tooltip.hover title="Download" class="icon-download" data-original-title="Download"></i>
                  </div>
              </div>
          </div>
          <div id="pieChart" class="charts-height"></div>
      </div>
  </div>
  <div class="col-xs-12 col-md-12 margin-bottom-20px vue-grid-list">
    <div class="graphs vue-grid-item">
        <div class="chart-header grid-head">
            <h2 class="float-left chart-heading">Top 5 Serivce Provider</h2>
        </div>
        <div>
            <div class="table-area">
                <div class="table-responsive">
                    <table class="table last-col-fix">
                      <thead>
                        <tr>
                          <th>Full Name</th>
                          <th>Email</th>
                          <th>DUNS</th>
                          <th>Service Type</th>
                          <th>Rating</th>
                          <th class="text-center">Jobs Completed</th>
                      </tr>
                  </thead>
                  <tbody>
                    <tr v-for="list in listing">
                      <td><a >{{list.fname}}</a></th>
                          <td><a >{{list.email}}</a></td>
                          <td>{{list.duns}}</td>
                          <td>{{list.stype}}<span :class="[list.sarrows]"></span> {{list.sstype}}</td>
                          <td ><star-rating :star-size="20" read-only :rating="2" active-color="#8200ff"></star-rating></td>
                          <td class="text-center">{{list.jobscompleted}}</td>
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>
  </div>

</div>
</div>
<div class="col-xs-12 col-md-12 margin-bottom-20px vue-grid-list">
    <div class="graphs vue-grid-item">
        <div class="chart-header grid-head">
            <h2 class="float-left chart-heading">Top 5 Customers</h2>
        </div>
        <div>
            <div class="table-area">
                <div class="table-responsive">
                    <table class="table last-col-fix">
                      <thead>
                        <tr>
                          <th>Full Name</th>
                          <th>Email</th>
                          <th>Rating</th>
                          <th class="text-center">Jobs Completed</th>
                      </tr>
                  </thead>
                  <tbody>
                    <tr v-for="list in listing">
                      <td><a >{{list.fname}}</a></th>
                          <td><a >{{list.email}}</a></td>
                          <td ><star-rating :star-size="20" read-only :rating="4" active-color="#8200ff"></star-rating></td>
                          <td class="text-center">{{list.jobscompleted}}</td>
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>
  </div>

</div>
</div>

<div class="clearfix"></div>
</div>
</div>
</template>

<script>

import Datepicker from 'vuejs-datepicker';
import StarRating from 'vue-star-rating';

export default{
    data () {
        return {
            loading : false,
            start_date:'',
            end_date:'',
            url:'api/dashboard',
            total_customer_signup:0,
            total_job_initiated:0,
            total_payment_collected:0,
            total_service_provider_signup:0,
            isShowing:false,
            showModalValue : false,
            leftpanel: false,
            show: false,
            listingResponsive: false,
            listing: [
            {
                fname:'Dickerson Macdonald',
                email:'dmacdonald@gmail.com',
                duns:'245689',
                stype: 'Electricians',
                sstype: 'Cars',
                sarrows:'services-arrow',
                jobscompleted:'10'
            },
            {
                fname:'Larsen Shaw',
                email:'shawlarsen@gmail.com',
                duns:'245689',
                stype: 'Carpenters',
                jobscompleted:'40',
                sarrows:'',
            },
            {
                fname:'Geneva Wilson',
                email:'genevawilson@gmail.com',
                duns:'245689',
                stype: 'Cleaning Services',
                jobscompleted:'5',
                sarrows:'',
            },
            {
                fname:'Dickerson Macdonald',
                email:'dmacdonald@gmail.com',
                duns:'245689',
                stype: 'Electricians',
                sstype: 'Wiring repair',
                sarrows:'services-arrow',
                jobscompleted:'30'
            },
            {
                fname:'Larsen Shaw',
                email:'shawlarsen@gmail.com',
                duns:'245689',
                stype: 'Electricians',
                sstype: 'Air conditioning',
                jobscompleted:'50',
                sarrows:'services-arrow',
            }
            ],
        }
    },

    components: {
        Datepicker,
        StarRating
    },

    created() {
        this.start_date = moment().subtract(1, 'month').format('MM/DD/Y');
        this.end_date   = moment().format('MM/DD/Y');
    },

    mounted() {
        let self = this;
        self.initializeCharts();
        // this.titlepush();
        self.generateReport();
    },

    methods: {
        showleftpanel(){
            this.show = true;
            this.listingResponsive ^= true;
        },
        validateBeforeSubmit() {
            this.$validator.validateAll().then((result) => {
                if (result) {
                    this.generateReport(true);
                    return;
                }
                //this.errorMessage = 'Please fill in the highlighted fields.';
                return false;
            });
        },
        generateReport(isApply){
            let self = this;
            var isApply = isApply || false;
            alert(isApply)
            self.dashboard(isApply, 'stats');
            setTimeout(function () {
                self.dashboard(isApply, 'customer_signup');
            } , 100);
            setTimeout(function () {
                self.dashboard(isApply, 'service_provider_signup');
            } , 200);
            setTimeout(function () {
                self.dashboard(isApply, 'job_service_type');
            } , 300);
            setTimeout(function () {
                self.dashboard(isApply, 'pr_over_time');
            } , 400);
            setTimeout(function () {
                self.dashboard(isApply, 'pr_type');
            } , 500);
            setTimeout(function () {
                self.dashboard(isApply, 'top_service_provider');
            } , 600);
            setTimeout(function () {
                self.dashboard(isApply, 'top_customer');
            } , 700);
        },
        dashboard (isApply, type) {
            let self = this;
            self.loading = isApply;
            let params = {
                start_date: this.start_date,
                end_date: this.end_date,
                type: type,
            };
            self.$http.get(self.url, {params: params}).then(response=>{
                let data = response.data;
                console.log(data)
                self.loading = false;

            }).catch(error=>{
                self.loading = false;
            });
        },


//line charts

initializeCharts(){

//custom signups
AmCharts.makeChart("customerSignups",
{
    "type": "serial",
    "pathToImages": "https://www.amcharts.com/lib/3/images/",
    "categoryField": "date",
    "dataDateFormat": "YYYY-MM-DD",
    "colors": [
    "#8200ff",
    "#ff7217",
    "#B0DE09",
    "#0D8ECF",
    "#2A0CD0",
    "#CD0D74",
    "#CC0000",
    "#00CC00",
    "#0000CC",
    "#DDDDDD",
    "#999999",
    "#333333",
    "#990000"
    ],
    "color": "#1A1A1A",
    "fontFamily": "AkzidenzGroteskBE-Regular",
    "theme": "default",
    "autoMargins": false,
    "marginBottom": 25,
    "marginTop": 6,
    "marginLeft": 55,
    "marginRight": 20,
    "categoryAxis": {
        "parseDates": true,
        "gridAlpha": 1,
        "gridColor": "#F5F5F5"
    },
    "chartCursor": {
        "enabled": true,
        "categoryBalloonDateFormat": "MMM YYYY"
    },
    "chartScrollbar": {
        "enabled": true,
        "backgroundColor": "#D9D9D9",
        "graphFillColor": "#D9D9D9",
        "graphLineColor": "#D9D9D9",
        "selectedBackgroundColor": "#F5F5F5"
    },
    "trendLines": [],
    "graphs": [
    {
        "balloonText": "[[title]]: [[value]]",
        "bullet": "round",
        "fillAlphas": 0.13,
        "id": "AmGraph-1",
        "title": "Data Label",
        "valueField": "value"
    }
    ],
    "guides": [],
    "valueAxes": [
    {
        "id": "ValueAxis-1",
        "gridAlpha": 1,
        "gridColor": "#F5F5F5",
        "title": ""
    }
    ],
    "allLabels": [],
    "balloon": {
        "horizontalPadding": 6,
        "offsetX": 5,
        "verticalPadding": 6
    },
    "titles": [
    {
        "id": "Title-1",
        "size": 15,
        "text": ""
    }
    ],
    "dataProvider": [
    {
        "date": "2012-07-27",
        "value": 13
    },
    {
        "date": "2012-07-28",
        "value": 11
    },
    {
        "date": "2012-07-29",
        "value": 15
    },
    {
        "date": "2012-07-30",
        "value": 16
    },
    {
        "date": "2012-07-31",
        "value": 18
    },
    {
        "date": "2012-08-01",
        "value": 13
    },
    {
        "date": "2012-08-02",
        "value": 22
    },
    {
        "date": "2012-08-03",
        "value": 23
    },
    {
        "date": "2012-08-04",
        "value": 20
    },
    {
        "date": "2012-08-05",
        "value": 17
    },
    {
        "date": "2012-08-06",
        "value": 16
    },
    {
        "date": "2012-08-07",
        "value": 18
    },
    {
        "date": "2012-08-08",
        "value": 21
    },
    {
        "date": "2012-08-09",
        "value": 26
    },
    {
        "date": "2012-08-10",
        "value": 24
    },
    {
        "date": "2012-08-11",
        "value": 29
    },
    {
        "date": "2012-08-12",
        "value": 32
    },
    {
        "date": "2012-08-13",
        "value": 18
    },
    {
        "date": "2012-08-14",
        "value": 24
    },
    {
        "date": "2012-08-15",
        "value": 22
    },
    {
        "date": "2012-08-16",
        "value": 18
    },
    {
        "date": "2012-08-17",
        "value": 19
    },
    {
        "date": "2012-08-18",
        "value": 14
    },
    {
        "date": "2012-08-19",
        "value": 15
    },
    {
        "date": "2012-08-20",
        "value": 12
    },
    {
        "date": "2012-08-21",
        "value": 8
    },
    {
        "date": "2012-08-22",
        "value": 9
    },
    {
        "date": "2012-08-23",
        "value": 8
    },
    {
        "date": "2012-08-24",
        "value": 7
    },
    {
        "date": "2012-08-25",
        "value": 5
    },
    {
        "date": "2012-08-26",
        "value": 11
    },
    {
        "date": "2012-08-27",
        "value": 13
    },
    {
        "date": "2012-08-28",
        "value": 18
    },
    {
        "date": "2012-08-29",
        "value": 20
    },
    {
        "date": "2012-08-30",
        "value": 29
    },
    {
        "date": "2012-08-31",
        "value": 33
    },
    {
        "date": "2012-09-01",
        "value": 42
    },
    {
        "date": "2012-09-02",
        "value": 35
    },
    {
        "date": "2012-09-03",
        "value": 31
    },
    {
        "date": "2012-09-04",
        "value": 47
    },
    {
        "date": "2012-09-05",
        "value": 52
    },
    {
        "date": "2012-09-06",
        "value": 46
    },
    {
        "date": "2012-09-07",
        "value": 41
    },
    {
        "date": "2012-09-08",
        "value": 43
    },
    {
        "date": "2012-09-09",
        "value": 40
    },
    {
        "date": "2012-09-10",
        "value": 39
    },
    {
        "date": "2012-09-11",
        "value": 34
    },
    {
        "date": "2012-09-12",
        "value": 29
    },
    {
        "date": "2012-09-13",
        "value": 34
    },
    {
        "date": "2012-09-14",
        "value": 37
    },
    {
        "date": "2012-09-15",
        "value": 42
    },
    {
        "date": "2012-09-16",
        "value": 49
    },
    {
        "date": "2012-09-17",
        "value": 46
    },
    {
        "date": "2012-09-18",
        "value": 47
    },
    {
        "date": "2012-09-19",
        "value": 55
    },
    {
        "date": "2012-09-20",
        "value": 59
    },
    {
        "date": "2012-09-21",
        "value": 58
    },
    {
        "date": "2012-09-22",
        "value": 57
    },
    {
        "date": "2012-09-23",
        "value": 61
    },
    {
        "date": "2012-09-24",
        "value": 59
    },
    {
        "date": "2012-09-25",
        "value": 67
    },
    {
        "date": "2012-09-26",
        "value": 65
    },
    {
        "date": "2012-09-27",
        "value": 61
    },
    {
        "date": "2012-09-28",
        "value": 66
    },
    {
        "date": "2012-09-29",
        "value": 69
    },
    {
        "date": "2012-09-30",
        "value": 71
    },
    {
        "date": "2012-10-01",
        "value": 67
    },
    {
        "date": "2012-10-02",
        "value": 63
    },
    {
        "date": "2012-10-03",
        "value": 46
    },
    {
        "date": "2012-10-04",
        "value": 32
    },
    {
        "date": "2012-10-05",
        "value": 21
    },
    {
        "date": "2012-10-06",
        "value": 18
    },
    {
        "date": "2012-10-07",
        "value": 21
    },
    {
        "date": "2012-10-08",
        "value": 28
    },
    {
        "date": "2012-10-09",
        "value": 27
    },
    {
        "date": "2012-10-10",
        "value": 36
    },
    {
        "date": "2012-10-11",
        "value": 33
    },
    {
        "date": "2012-10-12",
        "value": 31
    },
    {
        "date": "2012-10-13",
        "value": 30
    },
    {
        "date": "2012-10-14",
        "value": 34
    },
    {
        "date": "2012-10-15",
        "value": 38
    },
    {
        "date": "2012-10-16",
        "value": 37
    },
    {
        "date": "2012-10-17",
        "value": 44
    },
    {
        "date": "2012-10-18",
        "value": 49
    },
    {
        "date": "2012-10-19",
        "value": 53
    },
    {
        "date": "2012-10-20",
        "value": 57
    },
    {
        "date": "2012-10-21",
        "value": 60
    },
    {
        "date": "2012-10-22",
        "value": 61
    },
    {
        "date": "2012-10-23",
        "value": 69
    },
    {
        "date": "2012-10-24",
        "value": 67
    },
    {
        "date": "2012-10-25",
        "value": 72
    },
    {
        "date": "2012-10-26",
        "value": 77
    },
    {
        "date": "2012-10-27",
        "value": 75
    },
    {
        "date": "2012-10-28",
        "value": 70
    },
    {
        "date": "2012-10-29",
        "value": 72
    },
    {
        "date": "2012-10-30",
        "value": 70
    },
    {
        "date": "2012-10-31",
        "value": 72
    },
    {
        "date": "2012-11-01",
        "value": 73
    },
    {
        "date": "2012-11-02",
        "value": 67
    },
    {
        "date": "2012-11-03",
        "value": 68
    },
    {
        "date": "2012-11-04",
        "value": 65
    },
    {
        "date": "2012-11-05",
        "value": 71
    },
    {
        "date": "2012-11-06",
        "value": 75
    },
    {
        "date": "2012-11-07",
        "value": 74
    },
    {
        "date": "2012-11-08",
        "value": 71
    },
    {
        "date": "2012-11-09",
        "value": 76
    },
    {
        "date": "2012-11-10",
        "value": 77
    },
    {
        "date": "2012-11-11",
        "value": 81
    },
    {
        "date": "2012-11-12",
        "value": 83
    },
    {
        "date": "2012-11-13",
        "value": 80
    },
    {
        "date": "2012-11-14",
        "value": 81
    },
    {
        "date": "2012-11-15",
        "value": 87
    },
    {
        "date": "2012-11-16",
        "value": 82
    },
    {
        "date": "2012-11-17",
        "value": 86
    },
    {
        "date": "2012-11-18",
        "value": 80
    },
    {
        "date": "2012-11-19",
        "value": 87
    },
    {
        "date": "2012-11-20",
        "value": 83
    },
    {
        "date": "2012-11-21",
        "value": 85
    },
    {
        "date": "2012-11-22",
        "value": 84
    },
    {
        "date": "2012-11-23",
        "value": 82
    },
    {
        "date": "2012-11-24",
        "value": 73
    },
    {
        "date": "2012-11-25",
        "value": 71
    },
    {
        "date": "2012-11-26",
        "value": 75
    },
    {
        "date": "2012-11-27",
        "value": 79
    },
    {
        "date": "2012-11-28",
        "value": 70
    },
    {
        "date": "2012-11-29",
        "value": 73
    },
    {
        "date": "2012-11-30",
        "value": 61
    },
    {
        "date": "2012-12-01",
        "value": 62
    },
    {
        "date": "2012-12-02",
        "value": 66
    },
    {
        "date": "2012-12-03",
        "value": 65
    },
    {
        "date": "2012-12-04",
        "value": 73
    },
    {
        "date": "2012-12-05",
        "value": 79
    },
    {
        "date": "2012-12-06",
        "value": 78
    },
    {
        "date": "2012-12-07",
        "value": 78
    },
    {
        "date": "2012-12-08",
        "value": 78
    },
    {
        "date": "2012-12-09",
        "value": 74
    },
    {
        "date": "2012-12-10",
        "value": 73
    },
    {
        "date": "2012-12-11",
        "value": 75
    },
    {
        "date": "2012-12-12",
        "value": 70
    },
    {
        "date": "2012-12-13",
        "value": 77
    },
    {
        "date": "2012-12-14",
        "value": 67
    },
    {
        "date": "2012-12-15",
        "value": 62
    },
    {
        "date": "2012-12-16",
        "value": 64
    },
    {
        "date": "2012-12-17",
        "value": 61
    },
    {
        "date": "2012-12-18",
        "value": 59
    },
    {
        "date": "2012-12-19",
        "value": 53
    },
    {
        "date": "2012-12-20",
        "value": 54
    },
    {
        "date": "2012-12-21",
        "value": 56
    },
    {
        "date": "2012-12-22",
        "value": 59
    },
    {
        "date": "2012-12-23",
        "value": 58
    },
    {
        "date": "2012-12-24",
        "value": 55
    },
    {
        "date": "2012-12-25",
        "value": 52
    },
    {
        "date": "2012-12-26",
        "value": 54
    },
    {
        "date": "2012-12-27",
        "value": 50
    },
    {
        "date": "2012-12-28",
        "value": 50
    },
    {
        "date": "2012-12-29",
        "value": 51
    },
    {
        "date": "2012-12-30",
        "value": 52
    },
    {
        "date": "2012-12-31",
        "value": 58
    },
    {
        "date": "2013-01-01",
        "value": 60
    },
    {
        "date": "2013-01-02",
        "value": 67
    },
    {
        "date": "2013-01-03",
        "value": 64
    },
    {
        "date": "2013-01-04",
        "value": 66
    },
    {
        "date": "2013-01-05",
        "value": 60
    },
    {
        "date": "2013-01-06",
        "value": 63
    },
    {
        "date": "2013-01-07",
        "value": 61
    },
    {
        "date": "2013-01-08",
        "value": 60
    },
    {
        "date": "2013-01-09",
        "value": 65
    },
    {
        "date": "2013-01-10",
        "value": 75
    },
    {
        "date": "2013-01-11",
        "value": 77
    },
    {
        "date": "2013-01-12",
        "value": 78
    },
    {
        "date": "2013-01-13",
        "value": 70
    },
    {
        "date": "2013-01-14",
        "value": 70
    },
    {
        "date": "2013-01-15",
        "value": 73
    },
    {
        "date": "2013-01-16",
        "value": 71
    },
    {
        "date": "2013-01-17",
        "value": 74
    },
    {
        "date": "2013-01-18",
        "value": 78
    },
    {
        "date": "2013-01-19",
        "value": 85
    },
    {
        "date": "2013-01-20",
        "value": 82
    },
    {
        "date": "2013-01-21",
        "value": 83
    },
    {
        "date": "2013-01-22",
        "value": 88
    },
    {
        "date": "2013-01-23",
        "value": 85
    },
    {
        "date": "2013-01-24",
        "value": 85
    },
    {
        "date": "2013-01-25",
        "value": 80
    },
    {
        "date": "2013-01-26",
        "value": 87
    },
    {
        "date": "2013-01-27",
        "value": 84
    },
    {
        "date": "2013-01-28",
        "value": 83
    },
    {
        "date": "2013-01-29",
        "value": 84
    },
    {
        "date": "2013-01-30",
        "value": 81
    }
    ]
}
);
//custom signups
AmCharts.makeChart("paymentRecievedByTime",
{
    "type": "serial",
    "pathToImages": "https://www.amcharts.com/lib/3/images/",
    "categoryField": "date",
    "dataDateFormat": "YYYY-MM-DD",
    "colors": [
    "#8200ff",
    "#ff7217",
    "#B0DE09",
    "#0D8ECF",
    "#2A0CD0",
    "#CD0D74",
    "#CC0000",
    "#00CC00",
    "#0000CC",
    "#DDDDDD",
    "#999999",
    "#333333",
    "#990000"
    ],
    "color": "#1A1A1A",
    "fontFamily": "AkzidenzGroteskBE-Regular",
    "theme": "default",
    "autoMargins": false,
    "marginBottom": 25,
    "marginTop": 6,
    "marginLeft": 55,
    "marginRight": 20,
    "categoryAxis": {
        "parseDates": true,
        "gridAlpha": 1,
        "gridColor": "#F5F5F5"
    },
    "chartCursor": {
        "enabled": true,
        "categoryBalloonDateFormat": "MMM YYYY"
    },
    "chartScrollbar": {
        "enabled": true,
        "backgroundColor": "#D9D9D9",
        "graphFillColor": "#D9D9D9",
        "graphLineColor": "#D9D9D9",
        "selectedBackgroundColor": "#F5F5F5"
    },
    "trendLines": [],
    "graphs": [
    {
        "balloonText": "[[title]]: $[[value]]",
        "bullet": "round",
        "fillAlphas": 0.13,
        "id": "AmGraph-1",
        "title": "Data Label",
        "valueField": "value"
    }
    ],
    "guides": [],
    "valueAxes": [
    {
        "id": "ValueAxis-1",
        "gridAlpha": 1,
        "gridColor": "#F5F5F5",
        "title": ""
    }
    ],
    "allLabels": [],
    "balloon": {
        "horizontalPadding": 6,
        "offsetX": 5,
        "verticalPadding": 6
    },
    "titles": [
    {
        "id": "Title-1",
        "size": 15,
        "text": ""
    }
    ],
    "dataProvider": [
    {
        "date": "2012-07-27",
        "value": 13
    },
    {
        "date": "2012-07-28",
        "value": 11
    },
    {
        "date": "2012-07-29",
        "value": 15
    },
    {
        "date": "2012-07-30",
        "value": 16
    },
    {
        "date": "2012-07-31",
        "value": 18
    },
    {
        "date": "2012-08-01",
        "value": 13
    },
    {
        "date": "2012-08-02",
        "value": 22
    },
    {
        "date": "2012-08-03",
        "value": 23
    },
    {
        "date": "2012-08-04",
        "value": 20
    },
    {
        "date": "2012-08-05",
        "value": 17
    },
    {
        "date": "2012-08-06",
        "value": 16
    },
    {
        "date": "2012-08-07",
        "value": 18
    },
    {
        "date": "2012-08-08",
        "value": 21
    },
    {
        "date": "2012-08-09",
        "value": 26
    },
    {
        "date": "2012-08-10",
        "value": 24
    },
    {
        "date": "2012-08-11",
        "value": 29
    },
    {
        "date": "2012-08-12",
        "value": 32
    },
    {
        "date": "2012-08-13",
        "value": 18
    },
    {
        "date": "2012-08-14",
        "value": 24
    },
    {
        "date": "2012-08-15",
        "value": 22
    },
    {
        "date": "2012-08-16",
        "value": 18
    },
    {
        "date": "2012-08-17",
        "value": 19
    },
    {
        "date": "2012-08-18",
        "value": 14
    },
    {
        "date": "2012-08-19",
        "value": 15
    },
    {
        "date": "2012-08-20",
        "value": 12
    },
    {
        "date": "2012-08-21",
        "value": 8
    },
    {
        "date": "2012-08-22",
        "value": 9
    },
    {
        "date": "2012-08-23",
        "value": 8
    },
    {
        "date": "2012-08-24",
        "value": 7
    },
    {
        "date": "2012-08-25",
        "value": 5
    },
    {
        "date": "2012-08-26",
        "value": 11
    },
    {
        "date": "2012-08-27",
        "value": 13
    },
    {
        "date": "2012-08-28",
        "value": 18
    },
    {
        "date": "2012-08-29",
        "value": 20
    },
    {
        "date": "2012-08-30",
        "value": 29
    },
    {
        "date": "2012-08-31",
        "value": 33
    },
    {
        "date": "2012-09-01",
        "value": 42
    },
    {
        "date": "2012-09-02",
        "value": 35
    },
    {
        "date": "2012-09-03",
        "value": 31
    },
    {
        "date": "2012-09-04",
        "value": 47
    },
    {
        "date": "2012-09-05",
        "value": 52
    },
    {
        "date": "2012-09-06",
        "value": 46
    },
    {
        "date": "2012-09-07",
        "value": 41
    },
    {
        "date": "2012-09-08",
        "value": 43
    },
    {
        "date": "2012-09-09",
        "value": 40
    },
    {
        "date": "2012-09-10",
        "value": 39
    },
    {
        "date": "2012-09-11",
        "value": 34
    },
    {
        "date": "2012-09-12",
        "value": 29
    },
    {
        "date": "2012-09-13",
        "value": 34
    },
    {
        "date": "2012-09-14",
        "value": 37
    },
    {
        "date": "2012-09-15",
        "value": 42
    },
    {
        "date": "2012-09-16",
        "value": 49
    },
    {
        "date": "2012-09-17",
        "value": 46
    },
    {
        "date": "2012-09-18",
        "value": 47
    },
    {
        "date": "2012-09-19",
        "value": 55
    },
    {
        "date": "2012-09-20",
        "value": 59
    },
    {
        "date": "2012-09-21",
        "value": 58
    },
    {
        "date": "2012-09-22",
        "value": 57
    },
    {
        "date": "2012-09-23",
        "value": 61
    },
    {
        "date": "2012-09-24",
        "value": 59
    },
    {
        "date": "2012-09-25",
        "value": 67
    },
    {
        "date": "2012-09-26",
        "value": 65
    },
    {
        "date": "2012-09-27",
        "value": 61
    },
    {
        "date": "2012-09-28",
        "value": 66
    },
    {
        "date": "2012-09-29",
        "value": 69
    },
    {
        "date": "2012-09-30",
        "value": 71
    },
    {
        "date": "2012-10-01",
        "value": 67
    },
    {
        "date": "2012-10-02",
        "value": 63
    },
    {
        "date": "2012-10-03",
        "value": 46
    },
    {
        "date": "2012-10-04",
        "value": 32
    },
    {
        "date": "2012-10-05",
        "value": 21
    },
    {
        "date": "2012-10-06",
        "value": 18
    },
    {
        "date": "2012-10-07",
        "value": 21
    },
    {
        "date": "2012-10-08",
        "value": 28
    },
    {
        "date": "2012-10-09",
        "value": 27
    },
    {
        "date": "2012-10-10",
        "value": 36
    },
    {
        "date": "2012-10-11",
        "value": 33
    },
    {
        "date": "2012-10-12",
        "value": 31
    },
    {
        "date": "2012-10-13",
        "value": 30
    },
    {
        "date": "2012-10-14",
        "value": 34
    },
    {
        "date": "2012-10-15",
        "value": 38
    },
    {
        "date": "2012-10-16",
        "value": 37
    },
    {
        "date": "2012-10-17",
        "value": 44
    },
    {
        "date": "2012-10-18",
        "value": 49
    },
    {
        "date": "2012-10-19",
        "value": 53
    },
    {
        "date": "2012-10-20",
        "value": 57
    },
    {
        "date": "2012-10-21",
        "value": 60
    },
    {
        "date": "2012-10-22",
        "value": 61
    },
    {
        "date": "2012-10-23",
        "value": 69
    },
    {
        "date": "2012-10-24",
        "value": 67
    },
    {
        "date": "2012-10-25",
        "value": 72
    },
    {
        "date": "2012-10-26",
        "value": 77
    },
    {
        "date": "2012-10-27",
        "value": 75
    },
    {
        "date": "2012-10-28",
        "value": 70
    },
    {
        "date": "2012-10-29",
        "value": 72
    },
    {
        "date": "2012-10-30",
        "value": 70
    },
    {
        "date": "2012-10-31",
        "value": 72
    },
    {
        "date": "2012-11-01",
        "value": 73
    },
    {
        "date": "2012-11-02",
        "value": 67
    },
    {
        "date": "2012-11-03",
        "value": 68
    },
    {
        "date": "2012-11-04",
        "value": 65
    },
    {
        "date": "2012-11-05",
        "value": 71
    },
    {
        "date": "2012-11-06",
        "value": 75
    },
    {
        "date": "2012-11-07",
        "value": 74
    },
    {
        "date": "2012-11-08",
        "value": 71
    },
    {
        "date": "2012-11-09",
        "value": 76
    },
    {
        "date": "2012-11-10",
        "value": 77
    },
    {
        "date": "2012-11-11",
        "value": 81
    },
    {
        "date": "2012-11-12",
        "value": 83
    },
    {
        "date": "2012-11-13",
        "value": 80
    },
    {
        "date": "2012-11-14",
        "value": 81
    },
    {
        "date": "2012-11-15",
        "value": 87
    },
    {
        "date": "2012-11-16",
        "value": 82
    },
    {
        "date": "2012-11-17",
        "value": 86
    },
    {
        "date": "2012-11-18",
        "value": 80
    },
    {
        "date": "2012-11-19",
        "value": 87
    },
    {
        "date": "2012-11-20",
        "value": 83
    },
    {
        "date": "2012-11-21",
        "value": 85
    },
    {
        "date": "2012-11-22",
        "value": 84
    },
    {
        "date": "2012-11-23",
        "value": 82
    },
    {
        "date": "2012-11-24",
        "value": 73
    }
    ]
}
);
//providersignups
AmCharts.makeChart("providerssigns",
{
    "type": "serial",
    "pathToImages": "https://www.amcharts.com/lib/3/images/",
    "categoryField": "date",
    "dataDateFormat": "YYYY-MM-DD",
    "colors": [
    "#8200ff",
    "#ff7217",
    "#B0DE09",
    "#0D8ECF",
    "#2A0CD0",
    "#CD0D74",
    "#CC0000",
    "#00CC00",
    "#0000CC",
    "#DDDDDD",
    "#999999",
    "#333333",
    "#990000"
    ],
    "color": "#1A1A1A",
    "fontFamily": "AkzidenzGroteskBE-Regular",
    "theme": "default",
    "autoMargins": false,
    "marginBottom": 25,
    "marginTop": 6,
    "marginLeft": 55,
    "marginRight": 20,
    "categoryAxis": {
        "parseDates": true,
        "gridAlpha": 1,
        "gridColor": "#F5F5F5"
    },
    "chartCursor": {
        "enabled": true,
        "categoryBalloonDateFormat": "MMM YYYY"
    },
    "chartScrollbar": {
        "enabled": true,
        "backgroundColor": "#D9D9D9",
        "graphFillColor": "#D9D9D9",
        "graphLineColor": "#D9D9D9",
        "selectedBackgroundColor": "#F5F5F5"
    },
    "trendLines": [],
    "graphs": [
    {
        "balloonText": "[[title]]: [[value]]",
        "bullet": "round",
        "fillAlphas": 0.13,
        "id": "AmGraph-1",
        "title": "Data Label",
        "valueField": "value"
    }
    ],
    "guides": [],
    "valueAxes": [
    {
        "id": "ValueAxis-1",
        "gridAlpha": 1,
        "gridColor": "#F5F5F5",
        "title": ""
    }
    ],
    "allLabels": [],
    "balloon": {
        "horizontalPadding": 6,
        "offsetX": 5,
        "verticalPadding": 6
    },
    "titles": [
    {
        "id": "Title-1",
        "size": 15,
        "text": ""
    }
    ],
    "dataProvider": [
    {
        "date": "2012-07-27",
        "value": 13
    },
    {
        "date": "2012-07-28",
        "value": 11
    },
    {
        "date": "2012-07-29",
        "value": 15
    },
    {
        "date": "2012-07-30",
        "value": 16
    },
    {
        "date": "2012-07-31",
        "value": 18
    },
    {
        "date": "2012-08-01",
        "value": 13
    },
    {
        "date": "2012-08-02",
        "value": 22
    },
    {
        "date": "2012-08-03",
        "value": 23
    },
    {
        "date": "2012-08-04",
        "value": 20
    },
    {
        "date": "2012-08-05",
        "value": 17
    },
    {
        "date": "2012-08-06",
        "value": 16
    },
    {
        "date": "2012-08-07",
        "value": 18
    },
    {
        "date": "2012-08-08",
        "value": 21
    },
    {
        "date": "2012-08-09",
        "value": 26
    },
    {
        "date": "2012-08-10",
        "value": 24
    },
    {
        "date": "2012-08-11",
        "value": 29
    },
    {
        "date": "2012-08-12",
        "value": 32
    },
    {
        "date": "2012-08-13",
        "value": 18
    },
    {
        "date": "2012-08-14",
        "value": 24
    },
    {
        "date": "2012-08-15",
        "value": 22
    },
    {
        "date": "2012-08-16",
        "value": 18
    },
    {
        "date": "2012-08-17",
        "value": 19
    },
    {
        "date": "2012-08-18",
        "value": 14
    },
    {
        "date": "2012-08-19",
        "value": 15
    },
    {
        "date": "2012-08-20",
        "value": 12
    },
    {
        "date": "2012-08-21",
        "value": 8
    },
    {
        "date": "2012-08-22",
        "value": 9
    },
    {
        "date": "2012-08-23",
        "value": 8
    },
    {
        "date": "2012-08-24",
        "value": 7
    },
    {
        "date": "2012-08-25",
        "value": 5
    },
    {
        "date": "2012-08-26",
        "value": 11
    },
    {
        "date": "2012-08-27",
        "value": 13
    },
    {
        "date": "2012-08-28",
        "value": 18
    },
    {
        "date": "2012-08-29",
        "value": 20
    },
    {
        "date": "2012-08-30",
        "value": 29
    },
    {
        "date": "2012-08-31",
        "value": 33
    },
    {
        "date": "2012-09-01",
        "value": 42
    },
    {
        "date": "2012-09-02",
        "value": 35
    },
    {
        "date": "2012-09-03",
        "value": 31
    },
    {
        "date": "2012-09-04",
        "value": 47
    },
    {
        "date": "2012-09-05",
        "value": 52
    },
    {
        "date": "2012-09-06",
        "value": 46
    },
    {
        "date": "2012-09-07",
        "value": 41
    },
    {
        "date": "2012-09-08",
        "value": 43
    },
    {
        "date": "2012-09-09",
        "value": 40
    },
    {
        "date": "2012-09-10",
        "value": 39
    },
    {
        "date": "2012-09-11",
        "value": 34
    },
    {
        "date": "2012-09-12",
        "value": 29
    },
    {
        "date": "2012-09-13",
        "value": 34
    },
    {
        "date": "2012-09-14",
        "value": 37
    },
    {
        "date": "2012-09-15",
        "value": 42
    },
    {
        "date": "2012-09-16",
        "value": 49
    },
    {
        "date": "2012-09-17",
        "value": 46
    },
    {
        "date": "2012-09-18",
        "value": 47
    },
    {
        "date": "2012-09-19",
        "value": 55
    },
    {
        "date": "2012-09-20",
        "value": 59
    },
    {
        "date": "2012-09-21",
        "value": 58
    },
    {
        "date": "2012-09-22",
        "value": 57
    },
    {
        "date": "2012-09-23",
        "value": 61
    },
    {
        "date": "2012-09-24",
        "value": 59
    },
    {
        "date": "2012-09-25",
        "value": 67
    },
    {
        "date": "2012-09-26",
        "value": 65
    },
    {
        "date": "2012-09-27",
        "value": 61
    },
    {
        "date": "2012-09-28",
        "value": 66
    },
    {
        "date": "2012-09-29",
        "value": 69
    },
    {
        "date": "2012-09-30",
        "value": 71
    },
    {
        "date": "2012-10-01",
        "value": 67
    },
    {
        "date": "2012-10-02",
        "value": 63
    },
    {
        "date": "2012-10-03",
        "value": 46
    },
    {
        "date": "2012-10-04",
        "value": 32
    },
    {
        "date": "2012-10-05",
        "value": 21
    },
    {
        "date": "2012-10-06",
        "value": 18
    },
    {
        "date": "2012-10-07",
        "value": 21
    },
    {
        "date": "2012-10-08",
        "value": 28
    },
    {
        "date": "2012-10-09",
        "value": 27
    },
    {
        "date": "2012-10-10",
        "value": 36
    },
    {
        "date": "2012-10-11",
        "value": 33
    },
    {
        "date": "2012-10-12",
        "value": 31
    },
    {
        "date": "2012-10-13",
        "value": 30
    },
    {
        "date": "2012-10-14",
        "value": 34
    },
    {
        "date": "2012-10-15",
        "value": 38
    },
    {
        "date": "2012-10-16",
        "value": 37
    },
    {
        "date": "2012-10-17",
        "value": 44
    },
    {
        "date": "2012-10-18",
        "value": 49
    },
    {
        "date": "2012-10-19",
        "value": 53
    },
    {
        "date": "2012-10-20",
        "value": 57
    },
    {
        "date": "2012-10-21",
        "value": 60
    },
    {
        "date": "2012-10-22",
        "value": 61
    },
    {
        "date": "2012-10-23",
        "value": 69
    },
    {
        "date": "2012-10-24",
        "value": 67
    },
    {
        "date": "2012-10-25",
        "value": 72
    },
    {
        "date": "2012-10-26",
        "value": 77
    },
    {
        "date": "2012-10-27",
        "value": 75
    },
    {
        "date": "2012-10-28",
        "value": 70
    },
    {
        "date": "2012-10-29",
        "value": 72
    },
    {
        "date": "2012-10-30",
        "value": 70
    },
    {
        "date": "2012-10-31",
        "value": 72
    },
    {
        "date": "2012-11-01",
        "value": 73
    },
    {
        "date": "2012-11-02",
        "value": 67
    },
    {
        "date": "2012-11-03",
        "value": 68
    },
    {
        "date": "2012-11-04",
        "value": 65
    },
    {
        "date": "2012-11-05",
        "value": 71
    },
    {
        "date": "2012-11-06",
        "value": 75
    },
    {
        "date": "2012-11-07",
        "value": 74
    },
    {
        "date": "2012-11-08",
        "value": 71
    },
    {
        "date": "2012-11-09",
        "value": 76
    },
    {
        "date": "2012-11-10",
        "value": 77
    },
    {
        "date": "2012-11-11",
        "value": 81
    },
    {
        "date": "2012-11-12",
        "value": 83
    },
    {
        "date": "2012-11-13",
        "value": 80
    },
    {
        "date": "2012-11-14",
        "value": 81
    },
    {
        "date": "2012-11-15",
        "value": 87
    },
    {
        "date": "2012-11-16",
        "value": 82
    },
    {
        "date": "2012-11-17",
        "value": 86
    },
    {
        "date": "2012-11-18",
        "value": 80
    },
    {
        "date": "2012-11-19",
        "value": 87
    },
    {
        "date": "2012-11-20",
        "value": 83
    },
    {
        "date": "2012-11-21",
        "value": 85
    },
    {
        "date": "2012-11-22",
        "value": 84
    },
    {
        "date": "2012-11-23",
        "value": 82
    },
    {
        "date": "2012-11-24",
        "value": 73
    },
    {
        "date": "2012-11-25",
        "value": 71
    },
    {
        "date": "2012-11-26",
        "value": 75
    },
    {
        "date": "2012-11-27",
        "value": 79
    },
    {
        "date": "2012-11-28",
        "value": 70
    },
    {
        "date": "2012-11-29",
        "value": 73
    },
    {
        "date": "2012-11-30",
        "value": 61
    },
    {
        "date": "2012-12-01",
        "value": 62
    },
    {
        "date": "2012-12-02",
        "value": 66
    },
    {
        "date": "2012-12-03",
        "value": 65
    },
    {
        "date": "2012-12-04",
        "value": 73
    },
    {
        "date": "2012-12-05",
        "value": 79
    },
    {
        "date": "2012-12-06",
        "value": 78
    },
    {
        "date": "2012-12-07",
        "value": 78
    },
    {
        "date": "2012-12-08",
        "value": 78
    },
    {
        "date": "2012-12-09",
        "value": 74
    },
    {
        "date": "2012-12-10",
        "value": 73
    },
    {
        "date": "2012-12-11",
        "value": 75
    },
    {
        "date": "2012-12-12",
        "value": 70
    },
    {
        "date": "2012-12-13",
        "value": 77
    },
    {
        "date": "2012-12-14",
        "value": 67
    },
    {
        "date": "2012-12-15",
        "value": 62
    },
    {
        "date": "2012-12-16",
        "value": 64
    },
    {
        "date": "2012-12-17",
        "value": 61
    },
    {
        "date": "2012-12-18",
        "value": 59
    },
    {
        "date": "2012-12-19",
        "value": 53
    },
    {
        "date": "2012-12-20",
        "value": 54
    },
    {
        "date": "2012-12-21",
        "value": 56
    },
    {
        "date": "2012-12-22",
        "value": 59
    },
    {
        "date": "2012-12-23",
        "value": 58
    },
    {
        "date": "2012-12-24",
        "value": 55
    },
    {
        "date": "2012-12-25",
        "value": 52
    },
    {
        "date": "2012-12-26",
        "value": 54
    },
    {
        "date": "2012-12-27",
        "value": 50
    },
    {
        "date": "2012-12-28",
        "value": 50
    },
    {
        "date": "2012-12-29",
        "value": 51
    },
    {
        "date": "2012-12-30",
        "value": 52
    },
    {
        "date": "2012-12-31",
        "value": 58
    },
    {
        "date": "2013-01-01",
        "value": 60
    },
    {
        "date": "2013-01-02",
        "value": 67
    },
    {
        "date": "2013-01-03",
        "value": 64
    },
    {
        "date": "2013-01-04",
        "value": 66
    },
    {
        "date": "2013-01-05",
        "value": 60
    },
    {
        "date": "2013-01-06",
        "value": 63
    },
    {
        "date": "2013-01-07",
        "value": 61
    },
    {
        "date": "2013-01-08",
        "value": 60
    },
    {
        "date": "2013-01-09",
        "value": 65
    },
    {
        "date": "2013-01-10",
        "value": 75
    },
    {
        "date": "2013-01-11",
        "value": 77
    },
    {
        "date": "2013-01-12",
        "value": 78
    },
    {
        "date": "2013-01-13",
        "value": 70
    },
    {
        "date": "2013-01-14",
        "value": 70
    },
    {
        "date": "2013-01-15",
        "value": 73
    },
    {
        "date": "2013-01-16",
        "value": 71
    },
    {
        "date": "2013-01-17",
        "value": 74
    },
    {
        "date": "2013-01-18",
        "value": 78
    },
    {
        "date": "2013-01-19",
        "value": 85
    },
    {
        "date": "2013-01-20",
        "value": 82
    },
    {
        "date": "2013-01-21",
        "value": 83
    },
    {
        "date": "2013-01-22",
        "value": 88
    },
    {
        "date": "2013-01-23",
        "value": 85
    },
    {
        "date": "2013-01-24",
        "value": 85
    },
    {
        "date": "2013-01-25",
        "value": 80
    },
    {
        "date": "2013-01-26",
        "value": 87
    },
    {
        "date": "2013-01-27",
        "value": 84
    },
    {
        "date": "2013-01-28",
        "value": 83
    },
    {
        "date": "2013-01-29",
        "value": 84
    },
    {
        "date": "2013-01-30",
        "value": 81
    }
    ]
}
);
//job count by service

AmCharts.makeChart("jobCountService",
{
    "type": "serial",
    "categoryField": "category",
    "rotate": true,
    "startDuration": 1,
    "pathToImages": "https://www.amcharts.com/lib/3/images/",
    "categoryAxis": {
        "gridPosition": "start"
    },
    "colors": [
    "#8200ff",
    "#CD0D74",
    "#ff7217",
    "#B0DE09",
    "#2A0CD0",
    "#CD0D74",
    "#CC0000",
    "#00CC00",
    "#0000CC",
    "#DDDDDD",
    "#999999",
    "#333333",
    "#990000"
    ],
    "chartCursor": {
        "enabled": true
    },
    "chartScrollbar": {
        "enabled": true
    },
    "trendLines": [],
    "graphs": [
    {
        "fillAlphas": 1,
        "id": "AmGraph-1",
        "title": "graph 1",
        "type": "column",
        "valueField": "column-1"
    }
    ],
    "guides": [],
    "valueAxes": [
    {
        "id": "ValueAxis-1",
        "title": ""
    }
    ],
    "allLabels": [],
    "balloon": {},
    "titles": [
    {
        "id": "Title-1",
        "size": 15,
        "text": ""
    }
    ],
    "dataProvider": [
    {
        "category": "Service 1",
        "column-1": 8
    },
    {
        "category": "Service 2",
        "column-1": 16
    },
    {
        "category": "Service 3",
        "column-1": 2
    },
    {
        "category": "Service 4",
        "column-1": 7
    },
    {
        "category": "Service 5",
        "column-1": 5
    },
    {
        "category": "Service 6",
        "column-1": 9
    },
    {
        "category": "Service 7",
        "column-1": 4
    },
    {
        "category": "Service 8",
        "column-1": 15
    },
    {
        "category": "Service 9",
        "column-1": 12
    },
    {
        "category": "Service 10",
        "column-1": 17
    }
    ]
}
);
/*
pie chart
*/

AmCharts.makeChart("pieChart",
{
    "type": "pie",
    "balloonText": "[[title]]<br><span style='font-size:14px'><b>$[[value]]</b> ([[percents]]%)</span>",
    "colors": [
    "#cf9dff",
    "#8200ff",
    ],
    "gradientRatio": [],
    "labelColorField": "#1A1A1A",
    "labelsEnabled": false,
    "labelTickAlpha": 1,
    "labelTickColor": "#1A1A1A",
    "autoMargins": false,
    "marginBottom": 0,
    "marginTop": 0,
    "marginLeft": 0,
    "marginRight": 0,
    "pullOutRadius": 0,
    "titleField": "category",
    "valueField": "column-1",
    "color": "#1A1A1A",
    "fontFamily": "AkzidenzGroteskBE-Regular",
    "fontSize": 12,
    "allLabels": [],
    "balloon": {
        "animationDuration": 0.96,
        "fadeOutDuration": 0.96,
        "fillAlpha": 1
    },
    "titles": [],
    "dataProvider": [
    {
        "category": "Featured",
        "column-1": 10000
    },
    {
        "category": "Urgent",
        "column-1": 25000
    }
    ]
}
);

}
},

}

</script>
