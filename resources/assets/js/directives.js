import Vue from 'vue'
Vue.directive('can', {
  bind: function (el, binding, vnode) {
    let user = JSON.parse(localStorage.getItem('user'));
        var permissionValue = binding.value + '.' + binding.arg  ;
           /*if(user.role_id == 4)
            {*/
             //   commentNode(el, vnode)
           // }
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