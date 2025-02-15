// Adding components
Vue.component('login', require('./components/front/auth/Login.vue').default);
Vue.component('forgot', require('./components/auth/Forgot.vue').default);
Vue.component('reset-password', require('./components/front/auth/ResetPassword.vue').default);
Vue.component('create-password', require('./components/front/auth/CreatePassword.vue').default);



// 404 Component
Vue.component('not-found-panel', require('./components/404/404Panel.vue').default);


//****************front components******************//

// Common Component Tags
Vue.component('logo', require('./components/admin/common-components/Logo.vue').default);
Vue.component('no-record-found', require('./components/admin/common-components/NoRecords.vue').default);
Vue.component('search', require('./components/admin/common-components/Search.vue').default);
Vue.component('loader', require('./components/admin/common-components/Loader.vue').default);
Vue.component('page-loader', require('./components/admin/common-components/PageLoader.vue').default);
Vue.component('mid-loader', require('./components/admin/common-components/MediumLoader.vue').default);
Vue.component('spinner-loader', require('./components/admin/common-components/SpinnerLoader.vue').default);
Vue.component('alert', require('./components/admin/common-components/Alert.vue').default);
Vue.component('change-password-popup', require('./components/admin/common-components/ChangePassPopup.vue').default);
// Vue.component('info-popup', require('./components/front/common-components/InfoPopup.vue').default);
Vue.component('change-password-popup', require('./components/front/common-components/ChangePassPopup.vue').default);
Vue.component('invite-bid-popup', require('./components/front/common-components/InviteBidPopup.vue').default);
Vue.component('testmonial-sec',require('./components/front/common-components/TestmonialSec.vue').default);
Vue.component('category-popup',require('./components/front/common-components/CateogyPopup.vue').default);
Vue.component('award-job-popup',require('./components/front/common-components/AwardJobPopup.vue').default);
Vue.component('visit-request-popup',require('./components/front/common-components/VisitRequestPopup.vue').default);
Vue.component('visit-request-approval-popup',require('./components/front/common-components/VisitRequestApprovalPopup.vue').default);
Vue.component('visit-request-detials-popup',require('./components/front/common-components/VisitRequestDetailsPopup.vue').default);
Vue.component('post-bid-popup',require('./components/front/common-components/PostBidPopup.vue').default);
Vue.component('mark-job-done-popup',require('./components/front/common-components/MarkJobDonePopup.vue').default);
Vue.component('urgent-job',require('./components/front/common-components/UrgentJobPopup.vue').default);
Vue.component('feature-job',require('./components/front/common-components/FeatureJobPopup.vue').default);
Vue.component('customer-support-popup',require('./components/front/common-components/CustomerSupportPopup.vue').default);
Vue.component('go-to-visit-popup',require('./components/front/common-components/GoToVisitPopup.vue').default);
Vue.component('profile-rejection',require('./components/front/common-components/ProfileRejection.vue').default);
Vue.component('notification',require('./components/front/common-components/Notification.vue').default);
Vue.component('chat-panel', require('./components/front/common-components/Chat.vue').default);
Vue.component('write-review-popup', require('./components/front/common-components/WriteReviewPopup.vue').default);
Vue.component('job-proof-popup', require('./components/front/common-components/JobProofPopup.vue').default);
Vue.component('front-confiramtion-popup', require('./components/front/common-components/ConfirmationPopup.vue').default);
Vue.component('confirmation-popup-mark-job-completed', require('./components/front/common-components/ConfirmationPopupMarkJobCompleted.vue').default);



//header
Vue.component('front-header',require('./components/front/common-components/header.vue').default.default);
Vue.component('main-nav',require('./components/front/common-components/navigations/MainNav.vue').default);
Vue.component('customer-nav',require('./components/front/common-components/navigations/CustomerNav.vue').default);
Vue.component('provider-nav',require('./components/front/common-components/navigations/ProviderNav.vue').default);

// Footer
Vue.component('front-footer',require('./components/front/common-components/footer.vue').default);

// landing
Vue.component('featuredCategories', require('./components/front/landing/FeaturedCategories.vue').default);
Vue.component('popularservices', require('./components/front/landing/PopularServices.vue').default);
Vue.component('appstore', require('./components/front/landing/AppStore.vue').default);
Vue.component('explorenow', require('./components/front/landing/ExploreNow.vue').default);

//404 page
Vue.component('page-not-found', require('./components/404/Main.vue').default);

//join as pro
Vue.component('getstarted', require('./components/front/join-as-pro/GetStarted.vue').default);



//my-bids
Vue.component('profile-not-approved', require('./components/front/profile-rejection/not-approved.vue').default);
Vue.component('profile-not-completed', require('./components/front/profile-rejection/profile-yet.vue').default);

// Advice Center
Vue.component('customer', require('./components/front/advice-center/Customer.vue').default);
Vue.component('service-provider', require('./components/front/advice-center/ServiceProvider.vue').default);

// facebook 
Vue.component('facebook-component',require('./components/front/common-components/facebookComponent.vue').default);
/*logout*/
Vue.component('logout-component',require('./components/front/auth/LogoutComponent.vue').default);



Vue.component('vue-pagination',require('./components/admin/common-components/Pagination.vue').default);
Vue.component('vue-common-methods',require('./components/admin/common-components/CommonMethods.vue').default);
Vue.component('block-spinner', require('./components/admin/common-components/BlockSpinner.vue').default);


Vue.component('file-upload-component', require('./components/admin/common-components/FileUpload.vue').default);
// stripe checkout component
Vue.component('card-element',require('./components/front/common-components/CardElement.vue').default);
Vue.component('payment-component',require('./components/front/common-components/PaymentComponent.vue').default);

Vue.component('confirmation-popup',require('./components/admin/service-provide/popup/ConfirmationPopup.vue').default); 
Vue.component('signup-confirmation-popup',require('./components/admin/popup/SignupConfirmationPopup.vue').default); 

Vue.component('jobs-list',require('./components/front/jobs/JobsList.vue').default); 
Vue.component('explore-jobs-list',require('./components/front/jobs/ExploreJobList.vue').default); 
Vue.component('job',require('./components/front/common-components/Job.vue').default); 

Vue.component('city',require('./components/front/common-components/City.vue').default);
