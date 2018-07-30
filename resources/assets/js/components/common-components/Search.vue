<template>
  <div class="search">
  <form>
  <b-form-group
      id="fieldset1"
      label-for="input1"      
      :valid-feedback="validFeedback"
  >
    <b-form-input id="input1" v-model.trim="name" placeholder="Search"></b-form-input>
      <span class="icon-search"></span>
      <span>
        <MidLoader></MidLoader>
      </span>
  </b-form-group>
  </form>
</div>
</template>

 <script>
export default {
  computed: {
    state () {
      return this.name.length >= 4 ? true : false
    },
    invalidFeedback () {
      if (this.name.length > 4) {
        return ''
      } else if (this.name.length > 0) {
        return 'Enter at least 4 characters'
      } else {
        return ''
      }
    },
    validFeedback () {
      return this.state === true ? 'Thank you' : ''
    }
  },
  data () {
    return {
      name: ''
    }
  }
}
</script> 