<template>
    <div class="login-form auth-forms active">
        <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>
        <form @submit.prevent="validateBeforeSubmit">
            <facebook-component :text = "'Log in with Facebook'"></facebook-component>
            <div class="row">
                <div class="col-xs-12 col-md-12" :class="[errorBag.first('email') ? 'is-invalid' : '']">
                    <div class="form-group">
                        <label>Email Address</label>
                        <input id="login_email" type="email" v-model="login_info.email" v-validate="'required|email'"  name="email" class="form-control"  data-vv-name="email"  placeholder="Enter your Email" :class="[errorBag.first('email') ? 'is-invalid' : '']">
                    </div>
                </div>
                <div class="col-xs-12 col-md-12" :class="[errorBag.first('password') ? 'is-invalid' : '']">
                    <div class="form-group">
                        <label>Password</label>
                        <input id="login_password" type="password" :maxlength="25" v-model="login_info.password" v-validate="'required'" data-vv-as="password" name="password" class="form-control"  data-vv-name="password" placeholder="Enter your account password" :class="[errorBag.first('password') ? 'is-invalid' : '']">
                    </div>
                </div>
                <div class="col-xs-12 col-md-12">
                    <div class="form-group">
                        <span class="forgot-password-text" @click.prevent="$emit('show-login')">Forgot Password?</span>
                    </div>

                </div>

                <div class="col-xs-12 col-md-6">
                    <button class="btn btn-primary apply-primary-color btn-lg" :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' , 'apply-primary-color' ]"><span>Log In</span> <loader></loader></button>
                </div>
            </div>
        </form>

    </div>

</template>