import Vue from 'vue';

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
];



Vue.filter('jobStatus', function (value) {
    if(typeof(value) == 'undefined'){
        return ;
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

Vue.filter('userStatus', function (value) {

    let obj = _.find(providerStatuses, item =>{
        if(item.key == value.status){
            return item; 
        }
    });

    return obj.value.replace(/\s/g, '').toLowerCase().trim();
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

    return value.parent.title;

});