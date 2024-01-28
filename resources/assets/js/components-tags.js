// Adding components
Vue.component('login', require('./components/auth/Login.vue').default);
Vue.component('forgot', require('./components/auth/Forgot.vue').default);
Vue.component('reset-password', require('./components/auth/ResetPassword.vue').default);
Vue.component('create-password', require('./components/auth/CreatePassword.vue').default);



// Common Component Tags
Vue.component('logo', require('./components/admin/common-components/Logo.vue').default);
Vue.component('list-group', require('./components/admin/common-components/ListGroup.vue').default);
Vue.component('search', require('./components/admin/common-components/Search.vue').default);
Vue.component('loader', require('./components/admin/common-components/Loader.vue').default);
Vue.component('alert', require('./components/admin/common-components/Alert.vue').default);
Vue.component('title-area', require('./components/admin/common-components/TitleArea.vue').default);
Vue.component('breadcrumb', require('./components/admin/common-components/BreadCrumb.vue').default);

Vue.component('discussion', require('./components/admin/common-components/Discussion.vue').default);
Vue.component('navigation', require('./components/admin/common-components/Navigation.vue').default);
Vue.component('notification', require('./components/admin/common-components/Notification.vue').default);

Vue.component('swap-relation', require('./components/admin/common-components/SwapRelation.vue').default);
Vue.component('loadmore', require('./components/admin/common-components/LoadMore.vue').default);
Vue.component('pageLoader', require('./components/admin/common-components/PageLoader.vue').default);
Vue.component('MidLoader', require('./components/admin/common-components/MediumLoader.vue').default);
Vue.component('SpinnerLoader', require('./components/admin/common-components/SpinnerLoader.vue').default);
Vue.component('DatePicker', require('./components/admin/common-components/Datepicker.vue').default);
Vue.component('SearchField', require('./components/admin/common-components/Search.vue').default);
Vue.component('no-record-found', require('./components/admin/common-components/NoRecords.vue').default);
Vue.component('block-spinner', require('./components/admin/common-components/BlockSpinner.vue').default);

// Common Popup
Vue.component('delete-popup',require('./components/admin/common-components/DeletePopup.vue').default);
Vue.component('confirmation-popup',require('./components/admin/common-components/ConfirmationPopup.vue').default);
Vue.component('change-pass-popup',require('./components/admin/common-components/ChangePassPopup.vue').default);
Vue.component('changestatuspopup',require('./components/admin/common-components/Status.vue').default);
Vue.component('warning', require('./components/admin/common-components/Warning.vue').default);

//left navigation
Vue.component('left-panel', require('./components/admin/common-components/LeftPanel.vue').default);

//admin
Vue.component('user', require('./components/admin/Main.vue').default);
Vue.component('add-new-user',require('./components/admin/popup/AddUser.vue').default);
Vue.component('change-status-user',require('./components/admin/popup/ChangeStatus.vue').default);
Vue.component('confirmation',require('./components/admin/popup/Confirmation.vue').default);
Vue.component('confirmation-access',require('./components/admin/popup/ChangeAccess.vue').default);

// Service-Type
Vue.component('add-service',require('./components/admin/service-type/popup/AddService.vue').default);
Vue.component('view-details',require('./components/admin/service-type/popup/ViewDetails.vue').default);

//service provider
Vue.component('change-status-provider',require('./components/admin/service-provide/popup/ChangeStatus.vue').default);
Vue.component('service-provider-detail',require('./components/admin/service-provide/popup/ServiceProviderDetail.vue').default);
Vue.component('view-service-record',require('./components/admin/service-provide/popup/ViewServiceRecord.vue').default);
Vue.component('confirmation-popup',require('./components/admin/service-provide/popup/ConfirmationPopup.vue').default); 
Vue.component('confirmation-popup-admin',require('./components/admin/common-components/ConfirmationPopup.vue').default);


// service-provide-review-popup
Vue.component('service-provider-review',require('./components/admin/service-provider-review/popup/ChangeStatus.vue').default);


// Customer
Vue.component('customer-detail',require('./components/admin/customer/popup/AddCustomer.vue').default);
Vue.component('view-customer-details',require('./components/admin/customer/popup/ViewCustomerDetails.vue').default);
Vue.component('view-customer-record',require('./components/admin/customer/popup/ViewCustomerRecord.vue').default);


//Jobs
Vue.component('view-bidding-details',require('./components/admin/job/popup/ViewBuiddingDetails.vue').default);

// Support Popup
Vue.component('support-detail',require('./components/admin/support/popup/SupportDetail.vue').default);



// 404 Component
Vue.component('not-found-panel', require('./components/404/404Panel.vue').default);

// dashboard



//****************front components******************//

//header
Vue.component('front-header',require('./components/front/common-components/header.vue').default);

/*logout*/
Vue.component('logout-component',require('./components/auth/LogoutComponent.vue').default);

Vue.component('vue-pagination',require('./components/admin/common-components/Pagination.vue').default);
Vue.component('vue-common-methods',require('./components/admin/common-components/CommonMethods.vue').default);
