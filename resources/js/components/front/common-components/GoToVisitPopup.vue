<template>  
    <div>
        <b-modal id="go-to-visit" centered @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Go to visit" hide-footer>
            <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>        
            <div>

                <label>How much time approx. it will take to reach there?</label>
                <b-row class="justify-content-md-center">
                    <b-col cols="2" md="12">
                        <div class="form-group">
                            <input v-model="visit_details" type="text" v-validate="'required|max:200'" name="highlighted" class="form-control" placeholder="For e.g. 20 minutes or 1 hour" :class="['form-control' , errorBag.first('highlighted') ? 'is-invalid' : '']"/>
                        </div>
                    </b-col>
                </b-row>

                <div class="category-search-field">

                    <button @click.prevent="validateBeforeSubmit" :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' ]">
                        Submit 
                        <loader></loader>
                    </button>

                    <a href="javascript:void();" class="btn btn-link" @click="hideModal">Cancel</a>
                </div>
            </div>
        </b-modal>
    </div>
</template>

<script>

    export default {
        data(){
            return {
                successMessage : '',
                errorMessage : '',
                loading : false,
                url : 'api/job-bid',
                visit_details : ''
            }
        },
        
        props : [
        'showModalProp',
        'bid',
        'job'
        ],
        
        methods: {
            showModal() {
                this.$refs.myModalRef.show()
            },
            hideModal() {
                this.$refs.myModalRef.hide();
                this.errorBag.clear();
                this.errorMessage = '';
            },
            onHidden(){
                this.$emit('HideModalValue');
                this.errorBag.clear();
                this.errorMessage = '';
            },
            validateBeforeSubmit() {
                let self = this;

                this.errorMessage = '';

                this.$validator.validateAll().then((result) => {
                    if (result) {
                        this.onSubmit();
                        return;
                    }
                    this.errorMessage = this.errorBag.all()[0];
                });
            },
            onSubmit() {
                let self = this;
                let data = {
                    status : 'on_the_way',
                    job_id : this.job.id,
                    visit_details : this.visit_details,
                };

                self.loading = true;

                let url = self.url + '/' +  this.bid.id;

                let urlRequest = self.$http.put(url , data)

                urlRequest.then(response => {
                    response = response.data;

                    self.successMessage = response.message;

                    self.$emit('bid-updated');

                    setTimeout(function () {
                        self.successMessage = '';
                        self.loading = false;
                        self.hideModal();
                    }, 2000);

                }).catch(error => {

                    let errors = error.response;

                    console.log(errors , 'error in job posting');

                    self.loading = false;
                });

            },       
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