<template>
  <div class="panel-inner">
    <div class="row">
      <div class=" col-xs-12 col-md-12">
        <div class="datepicker-row">
          <div class="row">
            <div class="col-xs-12 col-md-3 datepicker-field">
              <div class="form-group">
                <label>Start Date</label>
                <datepicker :class="[ hasError ? 'is-invalid' : '']" v-model="start_date" id="startDate" data-vv-name="start_date" v-validate="'required'" placeholder="Start date" calendar-button-icon="fa fa-calendar"></datepicker>
            </div>
        </div>
        <div class="col-xs-12 col-md-3 datepicker-field">
          <div class="form-group">
            <label>End Date</label>
            <datepicker :class="[ hasError ? 'is-invalid' : '']" v-model="end_date" id="endDate" data-vv-name="end_date" v-validate="'required'" placeholder="End date" calendar-button-icon="fa fa-calendar"></datepicker>
        </div>
    </div>
    <div class="col-xs-12 col-md-2">
      <button @click.prevent="validateBeforeSubmit(true)" :class="['btn btn-primary', 'filter-btn-top-space', isApplyloading ?'show-spinner' : '']">
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
        <h2>{{stats.total_customer_signup}}</h2>
    </div>
</div>
</div>
<div class="col-6">
    <div class="widget-box">
      <div class="colmn">
        <h3>Total Service Providers Sign ups</h3>
        <h2>{{stats.total_service_provider_signup}}</h2>
    </div>
</div>
</div>
<div class="col-6">
    <div class="widget-box">
      <div class="colmn">
        <h3>Total Jobs Initiated</h3>
        <h2>{{stats.total_job_initiated}}</h2>
    </div>
</div>
</div>
<div class="col-6">
    <div class="widget-box">
      <div class="colmn">
        <h3>Total Payment Collected</h3>
        <h2>{{stats.total_payment_collected}} USD</h2>
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
    <div v-show="isCustomerDataprovider && !isCustomerDataproviderLoader" id="customerSignups" class="charts-height"></div>
    <block-spinner v-if="isCustomerDataproviderLoader"></block-spinner>
    <no-record-found v-if="!isCustomerDataprovider && !isCustomerDataproviderLoader"></no-record-found>
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
    <div v-show="isProviderDataProvider && !isProviderDataProviderLoader" id="providerssigns" class="charts-height"></div>
    <block-spinner v-if="isProviderDataProviderLoader"></block-spinner>
    <no-record-found v-if="!isProviderDataProvider && !isProviderDataProviderLoader"></no-record-found>
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
<div v-show="isJobServiceType && !isJobServiceTypeLoader" id="jobCountService" class="charts-height"></div>
<block-spinner v-if="isJobServiceTypeLoader"></block-spinner>
<no-record-found v-if="!isJobServiceType && !isJobServiceTypeLoader"></no-record-found>
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
    <div v-show="isPrOverTime && !isPrOverTimeLoader" id="paymentRecievedByTime" class="charts-height"></div>
    <block-spinner v-if="isPrOverTimeLoader"></block-spinner>
    <no-record-found v-if="!isPrOverTime && !isPrOverTimeLoader"></no-record-found>
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
<div v-show="isPrType" id="paymentByType" class="charts-height"></div>
<block-spinner v-if="isPrTypeLoader"></block-spinner>
<no-record-found v-if="!isPrType && !isPrTypeLoader"></no-record-found>
</div>
</div>
<div class="col-xs-12 col-md-12 margin-bottom-20px vue-grid-list">
    <div class="graphs vue-grid-item">
      <div class="chart-header grid-head">
        <h2 class="float-left chart-heading">Top 5 Service Provider</h2>
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
                  <th>Business Type</th>
                  <th>Rating</th>
                  <th class="text-center">Jobs Completed</th>
              </tr>
          </thead>                                    
          <tbody v-if="isTopServiceProvider && !isTopServiceProviderLoader">
            <tr v-for="list in topServiceProvider">
              <td><a >{{list.full_name}}</a></th>
                <td><a >{{list.email}}</a></td>
                <td>{{list.duns_number}}</td>
                <td>{{list.business_type}}</td>
                <td ><star-rating :star-size="20" read-only :rating="list.rating" active-color="#8200ff"></star-rating></td>
                <td class="text-center">{{list.job_completed}}</td>
            </tr>
        </tbody>
    </table>
    <block-spinner v-if="isTopServiceProviderLoader"></block-spinner>
    <no-record-found v-if="!isTopServiceProvider && !isTopServiceProviderLoader"></no-record-found>
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
        <tbody v-if="isTopCustomer && !isTopCustomerLoader">
          <tr v-for="list in topCustomer">
            <td><a >{{list.full_name}}</a></th>
              <td><a >{{list.email}}</a></td>
              <td ><star-rating :star-size="20" read-only :rating="list.rating" active-color="#8200ff"></star-rating></td>
              <td class="text-center">{{list.job_completed}}</td>
          </tr>
      </tbody>
  </table>
  <block-spinner v-if="isTopCustomerLoader"></block-spinner>
  <no-record-found v-if="!isTopCustomer && !isTopCustomerLoader"></no-record-found>
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
      hasError : false,
      loading : false,
      isApplyloading : false,
      start_date:'',
      end_date:'',
      url:'api/dashboard',
      stats: {
        total_customer_signup:0,
        total_job_initiated:0,
        total_payment_collected:0,
        total_service_provider_signup:0
    },
    isCustomerDataprovider: false,
    customerDataprovider: [],
    isProviderDataProvider: false,
    providerDataprovider: [],
    isJobServiceType: false,
    jobServiceType: [],
    isPrOverTime: false,
    prOverTime: [],
    isPrType: false,
    prType: [],
    isTopServiceProvider: false,
    topServiceProvider: [],
    isTopCustomer: false,
    topCustomer: [],
    isCustomerDataproviderLoader: true,
    isProviderDataProviderLoader: true,
    isJobServiceTypeLoader: true,
    isPrOverTimeLoader: true,
    isPrTypeLoader: true,
    isTopServiceProviderLoader: true,
    isTopCustomerLoader: true,


    showModalValue : false,
    leftpanel: false,
    show: false,
    listingResponsive: false,
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
    self.generateReport();
},

methods: {
    showleftpanel(){
      this.show = true;
      this.listingResponsive ^= true;
  },
  validateBeforeSubmit() {
      let self = this;
      self.$validator.validateAll().then((result) => {
        self.hasError = false;
        if(new Date(self.start_date) > new Date(self.end_date)){
          self.hasError = true;
          return false;
      }

      if(new Date(self.end_date) < new Date(self.start_date)){
          self.hasError = true;
          return false;
      }

      if (result) {
          self.generateReport(true);
          return;
      }
                //this.errorMessage = 'Please fill in the highlighted fields.';
                return false;
            });
  },
  generateReport(isApply){
      let self = this;
      var isApply = isApply || false;

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

      self.isCustomerDataproviderLoader = true;
      self.isProviderDataProviderLoader = true;
      self.isJobServiceTypeLoader = true;
      self.isPrOverTimeLoader = true;
      self.isPrTypeLoader = true;
      self.isTopServiceProviderLoader = true;
      self.isTopCustomerLoader = true;
  },
  dashboard (isApply, type) {
      let self = this;
      self.loading = true;
      self.isApplyloading = isApply;
      let params = {
        start_date: this.start_date,
        end_date: this.end_date,
        type: type,
    };
    self.$http.get(self.url, {params: params}).then(response=>{
        let data = response.data;
        console.log(data, type, data.length)
        if(type == 'stats'){
          self.stats = data;
      }

      if(type == 'customer_signup'){
          self.customerDataprovider = data;
          self.isCustomerDataprovider = false;
          if(self.customerDataprovider.length){
            self.isCustomerDataprovider = true;
        }
        self.isCustomerDataproviderLoader = false;
    }

    if(type == 'service_provider_signup'){
      self.providerDataprovider = data;
      self.isProviderDataProvider = false;
      if(self.providerDataprovider.length){
        self.isProviderDataProvider = true;
    }
    self.isProviderDataProviderLoader = false;
}

if(type == 'job_service_type'){
  self.jobServiceType = data;
  self.isJobServiceType = false;
  if(self.jobServiceType.length){
    self.isJobServiceType = true;
}
self.isJobServiceTypeLoader = false;
}

if(type == 'pr_over_time'){
  self.prOverTime = data;
  self.isPrOverTime = false;
  if(self.prOverTime.length){
    self.isPrOverTime = true;
}
self.isPrOverTimeLoader = false;
}

if(type == 'pr_type'){
  self.prType = data;
  self.isPrType = false;
  if(self.prType.length){
    self.isPrType = true;
}
self.isPrTypeLoader = false;
}

if(type == 'top_service_provider'){
  self.topServiceProvider = data;
  self.isTopServiceProvider = false;
  if(self.topServiceProvider.length){
    self.isTopServiceProvider = true;
}
self.isTopServiceProviderLoader = false;
}

if(type == 'top_customer'){
  self.topCustomer = data;
  self.isTopCustomer = false;
  if(self.topCustomer.length){
    self.isTopCustomer = true;
}
self.isTopCustomerLoader = false;
}


self.initializeCharts(type);

self.loading = false;
self.isApplyloading = false;

}).catch(error=>{
    self.loading = false;
    self.isApplyloading = false;
});
},
initializeCharts(type){

  let self = this;

  if(type=='customer_signup'){
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
        "title": "Count",
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
    "dataProvider": self.customerDataprovider
});

}

if(type=='service_provider_signup'){
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
        "title": "Count",
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
    "dataProvider": self.providerDataprovider
}
);
}

if(type=='job_service_type'){
    AmCharts.makeChart("jobCountService",
    {
      "type": "serial",
      "categoryField": "title",
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
        "valueField": "value"
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
    "dataProvider": self.jobServiceType
});
}

if(type=='pr_over_time'){

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
        "title": "Count",
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
    "dataProvider": self.prOverTime
});
}

if(type=='pr_type'){
    AmCharts.makeChart("paymentByType",
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
      "titleField": "type",
      "valueField": "value",
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
    "dataProvider": self.prType
});
}
}
},

}

</script>
