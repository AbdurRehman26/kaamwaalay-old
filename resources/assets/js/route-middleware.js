import Router from './routes';

Router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.forVisitors)) {

      if (Vue.auth.getToken()) {
        next({
          path: '/dashboard'
      })
    }
    else next()
}
else if (to.matched.some(record => record.meta.forAuth)) {
  if (!Vue.auth.getToken()) {
    next({
      path: '/'
  })
}
else {
    next()

}
}
else{
  next()
}
});


function getRoutes(argument) {
    var allRoutes = [];
    Router.options.routes.forEach(route => {
        allRoutes.push({
            name: route.name
            , path: route.path
        })
    })
    return allRoutes;
}