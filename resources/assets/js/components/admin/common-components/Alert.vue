<template>
  <div>
    <b-alert :variant="errorMessage ? 'danger' : 'success'" show>
      <i v-show="successMessage" :class="[ successMessage ?   'icon-success' : '' , 'icon-check2']"></i>
      <i v-show="errorMessage" :class="[ errorMessage ?   'icon-danger' : '' , 'icon-alert']"></i>
      <p><strong>{{errorMessage ? 'Alert' : 'Success'}}:</strong> {{errorMessage ? errorMessage : successMessage}}</p>
    </b-alert>
  </div>
</template>

<script>
    export default{
        props : ['errorMessage'  , 'successMessage']
    }
</script>

