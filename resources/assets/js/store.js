import Vue from 'vue';
import Vuex from 'vuex';


Vue.use(Vuex);

   
export default new Vuex.Store({

    
    // You can use it as state property
    state: {
        step2StatsData: [],
        authUser : localStorage.getItem('user')?localStorage.getItem('user'):false,
        type_id:'',
        category_id:'',
        metric_id:'',
        loginTab : false,
        forgotPassword : false,
        country : [],
        allServices : [],
        start_year : '',
        end_year : '',
        bubbleQueryArr : {},
        barQueryArr : {},
        tabularQueryArr : {},
        scatterQueryArr : {},
        servicesList : [],
        roles : [],
        paymentTypes : [],
    },

    // You can use it as a state getter function (probably the best solution)
    getters: {
        getServicesList(state){
                return state.servicesList;
        },
        getStep2StatsData(state){
            return state.step2StatsData;
        },
        getAuthUser(state){
            return     state.authUser;
        },
         getInitialiseStore(state){
            return localStorage.getItem('store', JSON.stringify(state));;
        },
        getTypeId(state){
            return state.type_id;
        },
        getCategoryId(state){
            return state.category_id;
        },
        getMetricId(state){
            return state.metric_id;
        },   
        getLoginTab(state){
            return     state.loginTab;
        },
        getForgotPassword(state){
            return     state.forgotPassword;
        },
        getCountry(state){
            return     state.country;
        },
        getStartYear(state){
            return     state.start_year;
        },
        getEndYear(state){
            return     state.end_year;
        },
        getBubbleChartQuery(state){
            return     state.bubbleQueryArr;
        },
        getBarChartQuery(state){
            return     state.barQueryArr;
        },
        getTabularChartQuery(state){
            return     state.tabularQueryArr;
        },
        getScatterChartQuery(state){
            return     state.scatterQueryArr;
        },
        getAllServices(state){
            return     state.allServices;
        },
        getRoleList(state){
            return     state.roles;
        },
        getPaymentTypeList(state){
            return     state.paymentTypes;
        },
    },

    // Mutation for when you use it as state property
    mutations: {
        setServicesList(state , data){
            state.servicesList = data;
        },
        setStep2StatsData(state , data){
            state.step2StatsData = data;
        },
        setAuthUser(state, data){
            localStorage.setItem('user', JSON.stringify(data));
            state.authUser = localStorage.getItem('user');
        },
        setTypeId(state , data){
            state.type_id = data;
        },
        setCategoryId(state , data){
            state.category_id = data;
        },
        setMetricId(state , data){
            state.metric_id = data;
        },
        setLoginTab(state, data){
          state.loginTab = data;
        },
        setForgotPassword(state, data){
          state.forgotPassword = data;
        },
        setCountry(state, data){
          state.country = data;
        },
        setStartYear(state, data){
          state.start_year = data;
        },
        setEndYear(state, data){
          state.end_year = data;
        },
        setBubbleChartQuery(state, data){
            state.bubbleQueryArr = data;
        },
        setBarChartQuery(state, data){
            state.barQueryArr = data;
        },
        setTabularChartQuery(state, data){
            state.tabularQueryArr = data;
        },
        setAllServices(state, data){
            state.allServices = data;
        },
        setRoleList(state, data){
            state.roles = data;
        },
        setPaymentTypeList(state, data){
            state.paymentTypes = data;
        },
    },
});