import Router from './routes';

Vue.http.interceptors.push((request, next) => {

request.headers.set('Authorization', 'Bearer '+Vue.auth.getToken())
request.headers.set('Accept', 'application/json')
next()


return function(response) {

    if(response.status == 401){
        if(Router.currentRoute.name != 'undefinedRoute'){

            Vue.auth.destroyToken();
            Router.push('/');
            
        }   
    }

};

});