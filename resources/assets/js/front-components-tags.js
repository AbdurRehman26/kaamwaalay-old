// Adding components
Vue.component('login', require('./components/front/auth/Login.vue'));
Vue.component('forgot', require('./components/front/auth/Forgot.vue'));
Vue.component('reset-password', require('./components/front/auth/ResetPassword.vue'));
Vue.component('create-password', require('./components/front/auth/CreatePassword.vue'));



// 404 Component
Vue.component('not-found-panel', require('./components/404/404Panel.vue'));


//****************front components******************//

// Common Component Tags
Vue.component('logo', require('./components/admin/common-components/Logo.vue'));
Vue.component('no-record-found', require('./components/admin/common-components/NoRecords.vue'));
Vue.component('search', require('./components/admin/common-components/Search.vue'));
Vue.component('loader', require('./components/admin/common-components/Loader.vue'));
Vue.component('alert', require('./components/admin/common-components/Alert.vue'));
Vue.component('change-password-popup', require('./components/admin/common-components/ChangePassPopup.vue'));
Vue.component('change-password-popup', require('./components/front/common-components/ChangePassPopup.vue'));
Vue.component('testmonial-sec',require('./components/front/common-components/TestmonialSec.vue'));
Vue.component('category-popup',require('./components/front/common-components/CateogyPopup.vue'));
Vue.component('award-job-popup',require('./components/front/common-components/AwardJobPopup.vue'));
Vue.component('visit-request-popup',require('./components/front/common-components/VisitRequestPopup.vue'));
Vue.component('post-bid-popup',require('./components/front/common-components/PostBidPopup.vue'));
Vue.component('customer-support-popup',require('./components/front/common-components/CustomerSupportPopup.vue'));
Vue.component('go-to-visit-popup',require('./components/front/common-components/GoToVisitPopup.vue'));
Vue.component('write-review-popup',require('./components/front/common-components/writeReviewPopup.vue'));
Vue.component('profile-rejection',require('./components/front/common-components/ProfileRejection.vue'));
Vue.component('notification',require('./components/front/common-components/Notification.vue'));
Vue.component('chat-panel', require('./components/front/common-components/Chat.vue'));

//header
Vue.component('front-header',require('./components/front/common-components/header.vue'));
Vue.component('main-nav',require('./components/front/common-components/navigations/MainNav.vue'));
Vue.component('customer-nav',require('./components/front/common-components/navigations/CustomerNav.vue'));
Vue.component('provider-nav',require('./components/front/common-components/navigations/ProviderNav.vue'));

// Footer
Vue.component('front-footer',require('./components/front/common-components/footer.vue'));

// landing
Vue.component('featuredCategories', require('./components/front/landing/FeaturedCategories.vue'));
Vue.component('popularservices', require('./components/front/landing/PopularServices.vue'));
Vue.component('appstore', require('./components/front/landing/AppStore.vue'));
Vue.component('explorenow', require('./components/front/landing/ExploreNow.vue'));

//join as pro
Vue.component('getstarted', require('./components/front/join-as-pro/GetStarted.vue'));



//my-bids
Vue.component('bid-invitation', require('./components/front/bids/Invitations.vue'));
Vue.component('bid-completed', require('./components/front/bids/Completed.vue'));
Vue.component('bid-awarded', require('./components/front/bids/Awarded.vue'));
Vue.component('bid-archived', require('./components/front/bids/Archived.vue'));
Vue.component('bid-active', require('./components/front/bids/ActiveBids.vue'));

// Advice Center
Vue.component('customer', require('./components/front/advice-center/Customer.vue'));
Vue.component('service-provider', require('./components/front/advice-center/ServiceProvider.vue'));

// facebook 
Vue.component('facebook-component',require('./components/front/common-components/facebookComponent.vue'));


