import Vue from 'vue'
import VueRouter from 'vue-router'
import store from './store.js'
const app = new Vue({
    router: router,
    store
});
// Create the router instance
const router = new VueRouter({
    mode: 'history',
    app,
})
Vue.directive('can', {

  bind: function (el, binding, vnode) {
    let user
    var permissionValue = binding.value;
    if(app.$store != 'undefined'){
      user = JSON.parse(app.$store.getters.getAuthUser);
      var allPermissions = user.role.scope;
      if(allPermissions){       
        if(!allPermissions.includes(permissionValue))
        {
            commentNode(el, vnode);
        }
    }
}
},
update: function (el, binding, vnode) {
    let user
    var permissionValue = binding.value;
    if(app.$store != 'undefined'){
      user = JSON.parse(app.$store.getters.getAuthUser);
      var allPermissions = user.role.scope;
      if(allPermissions){       
        if(!allPermissions.includes(permissionValue))
        {
            commentNode(el, vnode);
        }
    }
}
}
});
/**
 * Create comment node
 *
 * @private
 * @author https://stackoverflow.com/questions/43003976/a-custom-directive-similar-to-v-if-in-vuejs#43543814
 */
 function commentNode(el, vnode) {
  const comment = document.createComment(' ')

  Object.defineProperty(comment, 'setAttribute', {
    value: () => undefined
})

  vnode.text = ' '
  vnode.elm = comment
  vnode.isComment = true
  vnode.context = undefined
  vnode.tag = undefined
  vnode.data.directives = undefined

  if (vnode.componentInstance) {
    vnode.componentInstance.$el = comment
}

if (el.parentNode) {
    el.parentNode.replaceChild(comment, el)
}
}