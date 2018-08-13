<template>	
	<div>
        <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>  
		<form @submit.prevent="validateBeforeSubmit">
            <b-modal id="change-pass" centered @hidden="onHidden" title-tag="h4" ref="myModalRef" size="sm" title="Change Password" no-close-on-backdrop no-close-on-esc>
                <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>
                <div>
                    <div :class="['form-group' , UpdatedFound ? 'alert alert-success' : 'd-none']" role="alert">
                        Password Updated Successfully
                    </div>
                    <label>Old Password</label>
                    <div :class="[ 'form-group' , errorBag.first('old_password')  ? 'is-invalid' : '']">
                        <div class="form-group">
                            <input type="password" v-model="userData.old_password" v-validate="'required|min:8|max:25'" data-vv-as="old password" name="old_password" class="form-control"  data-vv-name="old_password" placeholder="Enter old password">
                        </div>
                    </div>

                    <label>New Password</label>
                    <div :class="[ 'form-group' , errorBag.first('new_password')  ? 'is-invalid' : '']">
                        <div class="form-group">
                            <input type="password" v-model="userData.new_password" v-validate="'required|min:8|max:25'" data-vv-as="new password" name="new_password" class="form-control"  data-vv-name="new_password" placeholder="Create new password">
                        </div>
                    </div>
                    <label>Confirm Password</label>
                    <div :class="[ 'form-group' , errorBag.first('password_confirmation')  ? 'is-invalid' : '']">
                        <div class="form-group mb-0">
                            <input type="password" v-model="userData.password_confirmation" v-validate="'required|confirmed:new_password'" data-vv-as="confirm password" name="password_confirmation" class="form-control"  data-vv-name="password_confirmation" placeholder="Re-type new password">
                        </div>
                    </div>
                </div>
                <div slot="modal-footer" class="w-100">
                        <button :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-block' ,'btn-secondary' , 'float-left','col-sm-3' ]">Submit
                            <loader></loader>
                        </button>
                </div>
            </b-modal>
        </form>
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
                            self.loading = false
                            self.successMessage= response.data.message;
                            setTimeout(function(){
                                self.successMessage='';
                                self.hideModal();
                            }, 5000);
                    })
                    .catch(error => {
                        self.loading = false
                        self.errorMessage ='Old Password is not valid.';
                        setTimeout(function(){
                            self.errorMessage='';
                        }, 5000);
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