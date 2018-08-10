<template>
  <div class="forgot-form auth-forms">
    <b-form v-if="show">
      <div class="form-statement">
      <p>Don't worry. Resetting your password is easy, just tell us the email address you registered with PSM</p>
      </div>
      <b-form-group id="exampleInputGroup1"
                    label="Email Address:"
                    label-for="exampleInput1"
                    description="">

        <b-form-input id="login_email"
                      type="email"
                      v-model="form.email"
                      placeholder="Enter your email address">
        </b-form-input>
      </b-form-group>
      <b-button @click.prevent="ShowNewPassword" type="submit" variant="primary" class="btn btn-primary apply-primary-color">Send</b-button>
      <span @click.prevent="$emit('show-login','valuechange')" class="back-to-login">Back to login</span>
    </b-form>
  </div>
</template>

<script>
export default {
  data () {

    return {
      form: {
        email: '',
        name: '',
      },
      show: true
    }
  },
  methods: {
    onSubmit (evt) {
    },
    ShowNewPassword (){
      this.$router.push({ name: 'createpassword'});
    }
    

  }
}
</script>