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


Vue.filter('jobStatus', function (value) {


    let obj = _.find(jobStatuses, item =>{
        if(item.key == value.status){
            return item; 
        }
    });

    return obj.value.replace(/\s/g, '').toLowerCase().trim();
});
