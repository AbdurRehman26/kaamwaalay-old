import Vue from 'vue';
import moment from 'moment';

const jobStatuses = [
{
    key : 'draft',
    value : 'Draft'
},
{
    key : 'in_bidding',
    value : 'Bidding'
},
{
    key : 'cancelled',
    value : 'Cancelled'
},
{
    key : 'completed',
    value :'Completed'
},
{
    key :'awarded',
    value : 'Awarded'
},
{
    key :'initiated',
    value : 'Initiated'
}

];

const jobTypes = [
{
    key : 'normal',
    value : 'No'
},
{
    key : 'urgent',
    value : 'Yes'
},
];

const providerStatuses = [
{
    key : 'active',
    value : 'Active'
},
{
    key : 'pending',
    value : 'Pending'
},
{
    key : 'in_pending',
    value : 'Pending'
},
{
    key : 'in_review',
    value :'In Review'
},
{
    key :'rejected',
    value : 'Rejected'
},
{
    key :'banned',
    value : 'Banned'
},
];

const adminStatuses = [
{
    key : 'active',
    value : 'Active'
},
{
    key : 'banned',
    value : 'Deactive'
}
];
const accessLevelField = [
{
    key : '1',
    value : 'Full'
},
{
    key : '4',
    value : 'Review'
}
];


const jobPreferences = [
{
    key : 'with_in_a_week',
    value : 'with in a week'
},
{
    key : 'few_weeks',
    value : 'in next few days'
},
{
    key : 'normal',
    value : 'normal'
},
{
    key : 'few_days',
    value : 'few days'
},
{
    key : 'any_time',
    value : 'Any time'
}
];

const paymentType = [
{
    key : 'featured_profile',
    value : 'Featured'
},
{
    key : 'urgent_job',
    value : 'Urgent'
},
{
    key : 'account_creation',
    value : 'Account Creation'
}
];

Vue.filter('jobStatus', function (value) {
    if(typeof(value) == 'undefined'){
        return ;
    }

    if(value.is_archived){
        return 'archived';
    }

    if(!Object.keys(value).length){
        return ;
    }

    let obj = _.find(jobStatuses, item =>{
        if(item.key == value.status){
            return item; 
        }
    });
    return obj.value.replace(/\s/g, '').trim();
});

Vue.filter('jobType', function (value) {

    if(!value){
        return ;
    }

    let obj = _.find(jobTypes, item =>{
        if(item.key == value.job_type){
            return item; 
        }
    });
    return obj.value;
});

Vue.filter('userStatus', function (value) {
    if(!value){
        return;
    }


    let obj = _.find(providerStatuses, item =>{
        if(item.key == value.status){
            return item; 
        }
    });
    return typeof(obj) == 'undefined' ? '' : obj.value.replace(/\s/g, '').toLowerCase().trim();
});

Vue.filter('formatDate', function(value) {
    if (value) {
        return moment(String(value)).format('MMMM DD, YYYY')
    }
});
Vue.filter('formatDateTime', function(value) {
    if (value) {
        return moment(String(value)).format('MMMM DD, YYYY HH:mm:ss A')
    }
});

Vue.filter('fullName', function (value) {
    if(value){
        return value.first_name + ' '+ value.last_name;
    }
});


Vue.filter('mainService', function (value) {
    if(!value){
        return ;
    }

    if(value.parent_id){
        return value.parent.title;
    }

    return value.title;

});

Vue.filter('childOrParentService', function (value) {

    if(!value){
        return ;
    }

    if(value.parent_id){
        return value.title;
    }
    if(value.parent){
     return value.parent.title;   
 }
 return '-';
});

Vue.filter('adminStatus', function (value) {

    let obj = _.find(adminStatuses, item =>{
        if(item.key == value.status){
            return item; 
        }
    });

    return typeof(obj) == 'undefined' ? '' :obj.value.charAt(0).toUpperCase() + obj.value.substr(1).toLowerCase();
});

Vue.filter('accessLevel', function (value) {
    let obj = _.find(accessLevelField, item =>{
        if(item.key == value.role_id){
            return item; 
        }
    });
    return typeof(obj) == 'undefined' ? '' :obj.value.charAt(0).toUpperCase() + obj.value.substr(1).toLowerCase();
});


Vue.filter('phoneNumber', function (value) {
    if(value) {
        return 'tel:+'+value.phone_number;
    }
});

Vue.filter('disableProfileStatusButton', function (value) {
    if(!value){
        return false;
    }

    if(value == 'rejected' ||  value == 'approved') {
        return true;
    }

    return false;
});

Vue.filter('mainServiceOrChildService', function (value, sign) {
    var serviceHtml = '';

    if(!value){
        return ;
    }

    if(value.parent_id){

        var signValue = typeof(sign) !== 'undefined' ? sign : '→';
        
        serviceHtml =   value.parent.title + ' '+signValue+' '  + value.title ;


    }else{
        serviceHtml = value.title;

    }

    return serviceHtml;
});

Vue.filter('jobPreference', function (value) {

    let obj = _.find(jobPreferences, item =>{
        if(item.key == value){
            return item; 
        }
    });

    if(!obj){
        return '';
    }
    return obj.value;
});

Vue.filter('appendYoutubeUrl', function (value) {
    return 'https://www.youtube.com/embed/' + value;
})


Vue.filter('bidStatus', function (bid) {


    if(typeof(bid) == 'undefined'){
        return ;
    }
    
    if(bid.is_visit_required && bid.status =='pending' || bid.is_visit_required && bid.status =='cancelled'){
        return 'Visit requested';
    }

    if(bid.is_visit_required && bid.status =='visit_allowed' || bid.is_visit_required && bid.status =='cancelled'){
        return 'Visit allowed';
    }

    if(bid.is_visit_required && bid.status =='on_the_way' || bid.is_visit_required && bid.status =='cancelled'){
        return 'On the way';
    }

    if(bid.is_tbd){
        return 'TBD';
    }
    if(bid.is_visit_required && bid.status =='suggested_time') {
        return 'Suggested Time';
    }
    return bid.amount ? bid.formatted_amount + " " + bid.amount_type: 0 + " " + bid.amount_type;

});

Vue.filter('roundOff', function(value) {
    if (value) {
        return Number((value).toFixed(2));
    }
});

Vue.filter('paymentType', function (value) {

    let obj = _.find(paymentType, item =>{
        if(item.key == value){
            return item; 
        }
    });

    if(!obj){
        return '';
    }
    return obj.value;
});

Vue.filter('formatDateTimeUTC', function(value) {
    if (value) {
        return moment.utc(value).local().format('MMM Do, YYYY, h:mm a')
    }
});


Vue.filter('googleMapEmbeded', function(axisPoints) {
    var mapZoom = 10;
    var mapKey = window.mapKey;

    return 'https://www.google.com/maps/embed/v1/place?key='+mapKey+'&zoom='+mapZoom+'&q='+axisPoints+'"';
});


