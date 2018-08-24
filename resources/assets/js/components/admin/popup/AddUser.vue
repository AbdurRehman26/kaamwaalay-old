 <template>
	<div>
		<b-modal id="add-new-user" centered @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Add New User" ok-only ok-title="Submit" no-close-on-backdrop no-close-on-esc>
            
         <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>
         <div>
            <div :class="[ 'form-group' , errorBag.first('first_name')  ? 'is-invalid' : '']">
                <div class="form-group">
                    <label for="addForm_first_name">First Name</label>
                    <input id="addForm_first_name" type="text" v-model="add_form_info.first_name" v-validate="'required'"  name="first_name" data-vv-as="first name" data-vv-name="first_name"  class="form-control" placeholder="Enter your First Name">
                </div>
            </div>
            <div :class="['form-group' , errorBag.first('last_name')  ? 'is-invalid' : '']">
                <div class="form-group">
                    <label for="addForm_last_name">Last Name</label>
                    <input id="addForm_last_name" type="text" v-model="add_form_info.last_name" v-validate="'required'"  name="last_name" data-vv-as="last name" data-vv-name="last_name" class="form-control" placeholder="Enter your Last Name">
                </div>
            </div>
            <div :class="[  'form-group' , errorBag.first('email')  ? 'is-invalid' : '']">
                <div class="form-group">
                    <label for="addForm_email">Email</label>
                    <input id="addForm_email" type="email" v-model="add_form_info.email" v-validate="'required|email'"  name="email" class="form-control"  data-vv-name="email"  placeholder="Enter your Email">
                </div>
            </div>
            <div class="form-group">
                        <label>Access Level</label>
                        <select class="form-control"  v-model="add_form_info.role_id" >
                            <option value="1">Full Access</option>
                            <option value="4">Review Process Only</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control"  v-model="add_form_info.status" >
                            <option value="active">Active</option>
                            <option value="banned">Deactive</option>
                        </select>
                    </div>
        </div>
        <div slot="modal-footer" class="w-100">
         <button @click.prevent="validateBeforeSubmit();" :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' , 'col-sm-3' ]">Submit
            <loader></loader>
        </button>
        </div>
	    </b-modal>
	</div>
</template>

<script>

export default {
	data () {

    return {
		    selected: null,
           add_form_info: {
            'first_name': '',
            'last_name': '',
            'email': '',
            'role_id': 1,
            'status': 'active',
           },
            loading: false,
            errorMessage: '',
            successMessage: '',
    	}
  	},

	props : ['showModalProp'],
	    methods: {
        showModal() {
            this.$refs.myModalRef.show()
        },
        hideModal() {
            this.$refs.myModalRef.hide()
        },
        onHidden(){
            this.$emit('HideModalValue');
            this.resetModal();
        },
        validateBeforeSubmit() {
                // Prevent modal from closing
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        this.save();
                        return;
                    }
                    this.errorMessage = this.errorBag.all()[0];
                    return false;
                });
            },
            resetModal () {
                let self = this;
                self.add_form_info = {
                    'first_name': '',
                        'last_name': '',
                        'email': '',
                        'role_id': 1,
                        'access_level': 'full',
                        'status': 'active',
                },
                    setTimeout(function () {
                      self.errorBag.items = [];
                    }, 100);
                   self.errorMessage = '';
                   self.successMessage = '';
                   self.hideModal()
            },
            save () {
                  let self = this;
                self.loading = true
                this.$http.post('/api/user', self.add_form_info)
                .then(response => {
                    self.successMessage =  response.data.message
                    self.$parent.url = "";
                    setTimeout(function(){
                    self.$parent.url = 'api/user?filter_by_roles[]=1&filter_by_roles[]=4&pagination=true';
                        self.loading = false
                        self.successMessage='';
                         self.resetModal();
                    }, 5000);
                })
                .catch(error => {
                        self.loading = false
                        self.errorMessage = error.response.data.message[0]
                        setTimeout(function(){
                            self.errorMessage=''
                        }, 5000);
                })
            },
    },

    watch: {
        showModalProp(value){

            if(value){
                this.showModal();
            }
            if(!value){
                this.hideModal();
            }

        }
    },

}

</script>
