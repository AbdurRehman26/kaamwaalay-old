// Adding components
Vue.component('login', require('./components/auth/Login.vue'));
Vue.component('forgot', require('./components/auth/Forgot.vue'));
Vue.component('reset-password', require('./components/auth/ResetPassword.vue'));
Vue.component('create-password', require('./components/auth/CreatePassword.vue'));



// Common Component Tags
Vue.component('logo', require('./components/common-components/Logo.vue'));
Vue.component('list-group', require('./components/common-components/ListGroup.vue'));
Vue.component('search', require('./components/common-components/Search.vue'));
Vue.component('loader', require('./components/common-components/Loader.vue'));
Vue.component('alert', require('./components/common-components/Alert.vue'));
Vue.component('title-area', require('./components/common-components/TitleArea.vue'));
Vue.component('breadcrumb', require('./components/common-components/BreadCrumb.vue'));

Vue.component('discussion', require('./components/common-components/Discussion.vue'));
Vue.component('navigation', require('./components/common-components/Navigation.vue'));
Vue.component('notification', require('./components/common-components/Notification.vue'));

Vue.component('swap-relation', require('./components/common-components/SwapRelation.vue'));
Vue.component('loadmore', require('./components/common-components/LoadMore.vue'));
Vue.component('pageLoader', require('./components/common-components/PageLoader.vue'));
Vue.component('MidLoader', require('./components/common-components/MediumLoader.vue'));
Vue.component('SpinnerLoader', require('./components/common-components/SpinnerLoader.vue'));

// Common Popup
Vue.component('delete-popup',require('./components/common-components/DeletePopup.vue'));

//left navigation
Vue.component('left-panel', require('./components/common-components/LeftPanel.vue'));

//admin
Vue.component('user', require('./components/admin/Main.vue'));
Vue.component('add-new-user',require('./components/admin/popup/AddUser.vue'));
Vue.component('change-status-user',require('./components/admin/popup/ChangeStatus.vue'));

// Service-Type
Vue.component('add-service',require('./components/service-type-user/popup/AddService.vue'));
Vue.component('view-details',require('./components/service-type-user/popup/ViewDetails.vue'));

//service provider
Vue.component('change-status-provider',require('./components/service-provide/popup/ChangeStatus.vue'));

// Customer
Vue.component('customer-detail',require('./components/customer/popup/AddCustomer.vue'));
Vue.component('view-customer-details',require('./components/customer/popup/ViewCustomerDetails.vue'));


// 404 Component
Vue.component('not-found-panel', require('./components/404/404Panel.vue'));
