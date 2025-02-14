// Common Component Tags
Vue.component('logo', require('./components/admin/common-components/Logo.vue').default);
Vue.component('list-group', require('./components/admin/common-components/ListGroup.vue').default);
Vue.component('search', require('./components/admin/common-components/Search.vue').default);
Vue.component('loader', require('./components/admin/common-components/Loader.vue').default);
Vue.component('alert', require('./components/admin/common-components/Alert.vue').default);
Vue.component('title-area', require('./components/admin/common-components/TitleArea.vue').default);
Vue.component('breadcrumb', require('./components/admin/common-components/BreadCrumb.vue').default);

// Common Popup
Vue.component('delete-popup',require('./components/admin/common-components/DeletePopup.vue').default);
Vue.component('confirmation-popup',require('./components/admin/common-components/ConfirmationPopup.vue').default);
Vue.component('change-pass-popup',require('./components/admin/common-components/ChangePassPopup.vue').default);
Vue.component('changestatuspopup',require('./components/admin/common-components/Status.vue').default);
Vue.component('warning', require('./components/admin/common-components/Warning.vue').default);

//****************front components******************//

//header
Vue.component('front-header',require('./components/front/common-components/header.vue').default);

/*logout*/
Vue.component('logout-component',require('./components/auth/LogoutComponent.vue').default);

Vue.component('vue-pagination',require('./components/admin/common-components/Pagination.vue').default);
Vue.component('vue-common-methods',require('./components/admin/common-components/CommonMethods.vue').default);
