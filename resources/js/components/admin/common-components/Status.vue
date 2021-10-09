 <template>
    <div>
        <b-modal id="add-new-user" centered @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Change Status" ok-only ok-title="Submit">
            <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>
            <div>
                <div class="form-group">
                    <label>Change Status</label>
                    <select class="form-control" v-model="selected">
                        <option value="" selected="" disabled="">Select Status</option>
                        <option  v-for="option in options" :value="option.key"> {{option.value}}</option>
                    </select>
                </div>
            </div>
            <div slot="modal-footer" class="">
                <b-col class="float-left" cols="6">
                    <button :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' , 'apply-primary-color' ]" @click.prevent="validateBeforeSubmit();">
                        <span>Submit</span> 
                        <loader></loader>
                    </button>
                </b-col>
            </div>
        </b-modal>
    </div>
</template>

<script>

    export default {
        props : ['showModalProp','statusData','options','url'],
        data () {
            return {
                selected: '',
                loading: false,
                errorMessage: "",
                successMessage: "",
                data: {},

            }
        },
        mounted(){
        },
        methods: {
            showModal() {
                this.$refs.myModalRef.show()
            },
            hideModal() {
                this.$refs.myModalRef.hide()
            },
            onHidden(){
                this.$emit('HideModalValue');
            },
            validateBeforeSubmit (evt) {
                // Prevent modal from closing
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        this.onSubmit()
                        this.errorMessage ='';
                        return;
                    }
                    this.errorMessage = this.errorBag.all()[0];
                });
            },
            onSubmit() {
                let self = this;

                self.errorMessage = '';
                self.successMessage = '';
                let url = self.url;
                let id = this.statusData.id;

                self.loading = true;
                self.data  = {
                  "id" : this.statusData.id,
                  "status" : this.selected,
              }
              self.$http.put(url,self.data).then(response => {
                self.successMessage = response.data.message;
                if(!response.data.message) {
                    self.successMessage = response.data.message;
                }
                self.$emit('form-updated');
                setTimeout(function() {
                    self.loading = false;
                    self.hideModal();
                    self.onHidden();
                    self.successMessage = '';
                    self.$parent.statusData.status = self.selected;
                }, 2000);

            }).catch(error => {
                var response = error.response.data;
                //self.errorMessage = response.message[0];
                if(response.data.error) {
                    self.errorMessage = response.message + "There are " + (response.data.service_provider_count? response.data.service_provider_count + " service provider(s) & " : "") + (response.data.jobs_count? response.data.jobs_count + " job(s) associated with this service." : "");   
                }
                setTimeout(function(){
                    self.loading = false;
                    self.errorMessage = '';
                }, 3000);
            });
        }
},

watch: {
    showModalProp(value){

        if(value){
            this.showModal();
        }
        if(!value){
            this.hideModal();
        }

    },
    statusData(value){
        this.statusData = value;
        this.selected = value.status;
    },
    options(value){
        this.options = value;
    },
    url(value) {
        this.url = value;
    }
},

}

</script>
