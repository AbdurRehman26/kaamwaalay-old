<template>	
	<div>
		<b-modal id="change-pass" centered @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" hide-footer size="sm" title="Change Password" ok-only ok-title="Submit">
            <form action="" method="" @submit.prevent="validateBeforeSubmit">
            <div class="form-block">
            <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>
                <b-row class="justify-content-md-center">
                    <b-col md="12">
                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" v-model="userData.old_password" :maxlength="25" v-validate="'required|min:8|max:25'" data-vv-as="old password" name="old_password" class="form-control"  data-vv-name="old_password" placeholder="Enter old password" :class="['form-group' , errorBag.first('old_password') ? 'is-invalid' : '']">
                        </div>
                    </b-col> 
                    <b-col md="6">
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" v-model="userData.new_password"  :maxlength="25" v-validate="'required|min:8|max:25'" data-vv-as="new password" name="new_password" class="form-control"  data-vv-name="new_password" placeholder="Create new password" :class="['form-group' , errorBag.first('new_password') ? 'is-invalid' : '']">
                        </div>
                    </b-col> 
                    <b-col md="6">
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" v-model="userData.password_confirmation" :maxlength="25" v-validate="'required|confirmed:new_password'" data-vv-as="confirm password" name="password_confirmation" class="form-control"  data-vv-name="password_confirmation" placeholder="Re-type new password" :class="['form-group' , errorBag.first('password_confirmation') ? 'is-invalid' : '']" >
                        </div> 
                    </b-col> 
                </b-row>           
		    </div>
            <div slot="modal-footer" class="">
                <b-col class="float-left">
                    <button type="submit" :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' , 'apply-primary-color' ]">
                        <span>Submit</span> 
                        <loader></loader>
                    </button>
                </b-col>
            </div>
        </form>
	    </b-modal>
	</div>
</template>

<script>
export default {
data () {
        return {
            errorMessage: '',
            successMessage: '',
            showNoRecordFound: false,
            UpdatedFound: false,
            userData: {
                'old_password': '',
                'new_password': '',
                'password_confirmation': '',
            },
            loading: false,
        }
    },
    props : ['showModalProp'],
        methods: {
        showModal() {
            this.$refs.myModalRef.show()
        },
        hideModal() {
            this.$refs.myModalRef.hide()
            this.clearFormFields();
        },
        onHidden(){
            this.$emit('HideModalValue');
        },
        clearFormFields(){
                let self = this;
                self.userData.old_password = '';
                self.userData.new_password = '';
                self.userData.password_confirmation = '';

                setTimeout(function () {
                    Vue.nextTick(() => {
                        self.errorBag.clear()
                    })

                }, 100);

            },
            validateBeforeSubmit() {
                if(this.loading) {
                    return;
                }
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        this.errorMessage = '';
                        this.update();
                        return;
                    }

                   this.errorMessage = this.errorBag.all()[0];
                });
            },
            update: function () {
                let self = this;
                self.loading = true
                this.$http.put('api/auth/change/password/', this.userData)
                    .then(response => {
                            self.successMessage= response.data.message;
                            setTimeout(function(){
                                self.loading = false;
                                self.successMessage='';
                                self.hideModal();
                            }, 2000);
                    })
                    .catch(error => {
                        self.loading = false
                        self.errorMessage =error.response.data.errors.message[0];
                        setTimeout(function(){
                            self.errorMessage='';
                        }, 2000);
                    })
            },
    },
   watch:{
        showModalProp(value){
            if(value){
                this.showModal();
            }
            if(!value){
                this.errorMessage = '';
                this.successMessage = '';
                this.hideModal();
            }

        }
    },
}
</script>


