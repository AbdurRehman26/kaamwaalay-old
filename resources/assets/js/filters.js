import Vue from 'vue';
import moment from 'moment';

const jobStatuses = [
{
    key : 'in_bidding',
    value : 'Bidding'
},
{
    key : 'cancelled',
    value : 'Archived'
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



Vue.filter('jobStatus', function (value) {


    let obj = _.find(jobStatuses, item =>{
        if(item.key == value.status){
            return item; 
        }
    });

    return obj.value.replace(/\s/g, '').toLowerCase().trim();
});

Vue.filter('userStatus', function (value) {

    let obj = _.find(providerStatuses, item =>{
        if(item.key == value.status){
            return item; 
        }
    });
    return typeof(obj) == 'undefined' ? '' : obj.value.replace(/\s/g, '').toLowerCase().trim();
});

Vue.filter('formatDate', function(value) {
    if (value) {
        return moment(String(value)).format('MMMM DD,YYYY')
    }
});