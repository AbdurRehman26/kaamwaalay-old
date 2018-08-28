 <template>
   <div>
      <b-modal id="view-details-support" centered  @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="md" title="Support Detail">
        <!--<alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>--> 
        <div class="view-details-support">

            <b-row>
                <b-col cols="5" class="">
                    <p><strong class="title-head">Full Name</strong></p>
                </b-col>
                <b-col cols="7">
                    <p>{{selectedInquiry.name}}</p>
                </b-col>
            </b-row>

            <b-row>
                <b-col cols="5" class="">
                    <p><strong class="title-head">Email Address</strong></p>
                </b-col>
                <b-col cols="7">
                    <p>{{selectedInquiry.email}}</p>
                </b-col>
            </b-row>

            <b-row>
                <b-col cols="5" class="">
                    <p><strong class="title-head">Type</strong></p>
                </b-col>
                <b-col cols="7">
                    <p>{{ role.title }}</p>
                </b-col>
            </b-row>

            <b-row>
                <b-col cols="5" class="">
                    <p><strong class="title-head">Question</strong></p>
                </b-col>
                <b-col cols="7">
                    <p>{{support_question.question}}</p>
                </b-col>
            </b-row>

            <b-row>
                <b-col cols="12" class="">
                    <p><strong class="title-head">Message:</strong></p>
                </b-col>
                <b-col cols="12">
                    <div class="form-group">
                        <p>{{selectedInquiry.message}}</p>
                    </div>
                </b-col>
            </b-row>

        </div>
        <div slot="modal-footer" class="">
            <b-col class="float-right" cols="12">
                <button :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' , 'apply-primary-color' ]" @click.prevant="onReply">
                    <span>Reply</span> 
                    <loader></loader>
                </button>
            </b-col>
        </div>
    </b-modal>
</div>
</template>

<script>
    export default {

        props: ['showModalProp', 'selectedInquiry'],
        data () {
            return {
                errorMessage : '',
                successMessage : '',
                role: {},
                support_question: {},
                url: 'api/support-inquiry',
                loading: false
            }
        },
        methods: {
            showModal () {
                this.$refs.myModalRef.show();
            },
            hideModal () {
                this.$refs.myModalRef.hide();
            },
            onHidden() {
                this.loading = false;
                this.$emit('HideModalValue');
            },
            onReply() {
                this.onUpdate();
                location.href = "mailto:"+this.selectedInquiry.email+'?&subject=Inquiry Support'+'&body='+this.selectedInquiry.message;
            },
            onUpdate() {
                var self = this;
                this.loading = true;
                let url = this.url+"/"+this.selectedInquiry.id;

                let data = new FormData();
                data.append('_method', 'put');
                data.append('is_replied', 1);

                this.$http.post(url, data).then(response => {
                    response = response.data.response;
                    self.successMessage = 'Replied Successfully!'//response.message;

                    self.loading = false;
                    self.hideModal();
                    self.$emit('refreshList');
                    // setTimeout(function () {
                    //     self.successMessage = '';
                    //     self.hideModal();            
                    // } , 3000);

                    setTimeout(function () {
                        Vue.nextTick(() => {
                            self.errorBag.clear()
                        })
                    }, 10);


                }).catch(error => {
                    error = error.response.data;
                    let errors = error.errors;
                    _.forEach(errors, function(value, key) {
                        if(key == "title") {
                            self.errorMessage =  "The Service Name has alreary been taken.";    
                            return false;
                        }
                        self.errorMessage =  errors[key][0];
                        return false;
                    });
                    this.loading = false;
                });
            }
        },

        watch: {
            showModalProp(value) {

                if(value) {
                    this.showModal();
                }
                if(!value) {
                    this.hideModal();
                }
            },
            selectedInquiry(value) {
                this.selectedInquiry = value;
                this.role = value.role;
                this.support_question = value.support_question;
            }
        },
    }
</script>
