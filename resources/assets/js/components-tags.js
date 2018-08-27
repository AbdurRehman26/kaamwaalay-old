// Adding components
Vue.component('login', require('./components/auth/Login.vue'));
Vue.component('forgot', require('./components/auth/Forgot.vue'));
Vue.component('reset-password', require('./components/auth/ResetPassword.vue'));
Vue.component('create-password', require('./components/auth/CreatePassword.vue'));



// Common Component Tags
Vue.component('logo', require('./components/admin/common-components/Logo.vue'));
Vue.component('list-group', require('./components/admin/common-components/ListGroup.vue'));
Vue.component('search', require('./components/admin/common-components/Search.vue'));
Vue.component('loader', require('./components/admin/common-components/Loader.vue'));
Vue.component('alert', require('./components/admin/common-components/Alert.vue'));
Vue.component('title-area', require('./components/admin/common-components/TitleArea.vue'));
Vue.component('breadcrumb', require('./components/admin/common-components/BreadCrumb.vue'));

Vue.component('discussion', require('./components/admin/common-components/Discussion.vue'));
Vue.component('navigation', require('./components/admin/common-components/Navigation.vue'));
Vue.component('notification', require('./components/admin/common-components/Notification.vue'));

Vue.component('swap-relation', require('./components/admin/common-components/SwapRelation.vue'));
Vue.component('loadmore', require('./components/admin/common-components/LoadMore.vue'));
Vue.component('pageLoader', require('./components/admin/common-components/PageLoader.vue'));
Vue.component('MidLoader', require('./components/admin/common-components/MediumLoader.vue'));
Vue.component('SpinnerLoader', require('./components/admin/common-components/SpinnerLoader.vue'));
Vue.component('DatePicker', require('./components/admin/common-components/Datepicker.vue'));
Vue.component('SearchField', require('./components/admin/common-components/Search.vue'));
Vue.component('no-record-found', require('./components/admin/common-components/NoRecords.vue'));
Vue.component('block-spinner', require('./components/admin/common-components/BlockSpinner.vue'));

// Common Popup
Vue.component('delete-popup',require('./components/admin/common-components/DeletePopup.vue'));
Vue.component('confirmation-popup',require('./components/admin/common-components/ConfirmationPopup.vue'));
Vue.component('change-pass-popup',require('./components/admin/common-components/ChangePassPopup.vue'));
Vue.component('changestatuspopup',require('./components/admin/common-components/Status.vue'));
Vue.component('warning', require('./components/admin/common-components/Warning.vue'));

//left navigation
Vue.component('left-panel', require('./components/admin/common-components/LeftPanel.vue'));

//admin
Vue.component('user', require('./components/admin/Main.vue'));
Vue.component('add-new-user',require('./components/admin/popup/AddUser.vue'));
Vue.component('change-status-user',require('./components/admin/popup/ChangeStatus.vue'));
Vue.component('confirmation',require('./components/admin/popup/Confirmation.vue'));
Vue.component('confirmation-access',require('./components/admin/popup/ChangeAccess.vue'));

// Service-Type
Vue.component('add-service',require('./components/admin/service-type/popup/AddService.vue'));
Vue.component('view-details',require('./components/admin/service-type/popup/ViewDetails.vue'));

//service provider
Vue.component('change-status-provider',require('./components/admin/service-provide/popup/ChangeStatus.vue'));
Vue.component('service-provider-detail',require('./components/admin/service-provide/popup/ServiceProviderDetail.vue'));
Vue.component('view-service-record',require('./components/admin/service-provide/popup/ViewServiceRecord.vue'));
Vue.component('confirmation-popup',require('./components/admin/service-provide/popup/ConfirmationPopup.vue'));


// service-provide-review-popup
Vue.component('service-provider-review',require('./components/admin/service-provider-review/popup/ChangeStatus.vue'));


// Customer
Vue.component('customer-detail',require('./components/admin/customer/popup/AddCustomer.vue'));
Vue.component('view-customer-details',require('./components/admin/customer/popup/ViewCustomerDetails.vue'));
Vue.component('view-customer-record',require('./components/admin/customer/popup/ViewCustomerRecord.vue'));


//Jobs
Vue.component('view-bidding-details',require('./components/admin/job/popup/ViewBuiddingDetails.vue'));

// Support Popup
Vue.component('support-detail',require('./components/admin/support/popup/SupportDetail.vue'));



// 404 Component
Vue.component('not-found-panel', require('./components/404/404Panel.vue'));

// dashboard



//****************front components******************//

//header
Vue.component('front-header',require('./components/front/common-components/header.vue'));

/*logout*/
Vue.component('logout-component',require('./components/auth/LogoutComponent.vue'));

Vue.component('vue-pagination',require('./components/admin/common-components/Pagination.vue'));
Vue.component('vue-common-methods',require('./components/admin/common-components/CommonMethods.vue'));
