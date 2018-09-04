<template>  
    <div>
        <b-modal id="customer-support" centered @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Support Enquiry" ok-only ok-title="Submit">
            <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>
            <div>
                <p>Please fill out the following form and we'll get right back to you.</p>
                <label>What can we help you with?</label>
                <div class="form-group">
                    <select class="form-control" v-model="selectedQuestion">
                      <option value="" selected="">General questions</option>
                      <option :value="supportQuestion" v-for="supportQuestion in supportQuestions">{{supportQuestion.question}}</option>
                  </select>
              </div>
              <label>Message</label>
              <div class="form-group">
                <textarea class="form-control" placeholder="Start typing your message" name="" rows="5" v-model="message" name="message" :class="[errorBag.first('message') ? 'is-invalid' : '']" v-validate="'required|max:1000'"></textarea>
            </div>           
        </div>
        <div slot="modal-footer" class="">
            <b-col class="float-left" cols="6">
                <button :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' , 'apply-primary-color' ]" @click.prevant="validateBeforeSubmit();">
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

        props : ['showModalProp'],

        data(){
            return {
                selectedQuestion :'',
                loading: false,
                errorMessage: "",
                successMessage: "",
                message: '',
                supportQuestions: '',
                user: '',
            }
        },
        mounted() {
        },
        methods: {
            getSupportQuestions() {
                let self = this;
                this.user = JSON.parse(this.$store.getters.getAuthUser);
                console.log(this.user.id, 444444444);
                console.log(this.user, 444444444);
                let supportUrl = 'api/support-question?role_id=' + this.user.role_id;
                self.$http.get(supportUrl).then(response => {
                    response = response.data.response;
                    self.supportQuestions = response.data;
                    console.log(response.data, 2233);
                    self.$store.commit('setSupportQuestions' , response.data);
                }).catch(error => {
                    var response = error.response.data.response;
                });
            },
            onSubmit() {
                alert("submit");
            },
            showModal() {
                this.$refs.myModalRef.show();
                this.supportQuestions = this.$store.getters.getSupportQuestions;
                if(!this.supportQuestions.length) {
                    this.getSupportQuestions();
                }  
            },
            hideModal() {
                this.resetForm();
                this.$refs.myModalRef.hide()
            },
            onHidden(){
                this.$emit('HideModalValue');
            },
            resetForm() {
                let self = this;
                this.selectedQuestion = '';
                this.message = '';
                setTimeout(function () {
                    Vue.nextTick(() => {
                        self.errorMessage = '';
                        self.successMessage = '';
                        self.errorBag.clear();
                    })
                }, 100);
            },
            validateBeforeSubmit (evt) {
                // Prevent modal from closing
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        if(!this.selectedQuestion) {
                            this.errorMessage = "Please select a question.";
                            return;        
                        }
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
                let supportInquiryUrl = 'api/support-inquiry';
                console.log(this.selectedQuestion.id, 999);
                var data = {
                    support_question_id: this.selectedQuestion.id,
                    message: this.message,
                    user_id: this.user.id,
                    name: this.user.first_name + " " + this.user.last_name,
                    email: this.user.email,
                };

              self.loading = true;
              self.$http.post(supportInquiryUrl, data).then(response => {
                response = response.data.response;
                self.successMessage = "Your message has been submitted successfully.";//response.message;
                
                setTimeout(function() {
                    self.loading = false;
                    self.hideModal();
                    self.onHidden();
                    self.successMessage = '';
                    
                }, 2000);

            }).catch(error => {
                var response = error.response.data.errors;
                self.errorMessage = response.message[0];
                
                setTimeout(function(){
                    self.loading = false;
                    self.errorMessage = '';
                }, 3000);
            });
        }        
        },
        watch:{
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