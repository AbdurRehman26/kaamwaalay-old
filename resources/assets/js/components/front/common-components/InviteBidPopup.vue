<template>
   <div>

    <b-modal id="invite-bid" class="post-bid-form invite-job-form" centered @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Invite on bid" hide-footer>

        <form @submit.prevent="validateBeforeSubmit">
            <div class="model-content">
                <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>        
                <b-row class="justify-content-md-center">

                    <b-col md="12">
                        <div class="search-filter service-professional invite-bid-search">
                            <!-- <h1 class="heading-large">Find best skilled service professionals near you.</h1> -->
                            <div class="custom-multi" :class="{ 'invalid': isInvalid }">
                                <multiselect :showNoResults="false" v-model="searchValue" :options="options" placeholder="Select Job" track-by="id" label="title" :loading="isLoading"  id="ajax" open-direction="bottom" :searchable="true" :options-limit="300" :limit="3" :limit-text="limitText" :max-height="600"  @search-change="asyncFind" name="search">
                                </multiselect>
                            </div>
                        </div>
                    </b-col>

                </b-row>

            </div>
            <footer id="post-bid___BV_modal_footer_" class="modal-footer">
                <button @click.prevent="validateBeforeSubmit" type="submit" :class="['btn', 'btn-primary',  loading ? 'show-spinner' : '']">
                    Submit
                    <loader></loader>
                </button>
            </footer>
        </form>

    </b-modal>            
</div>
</template>



<script>
    import DatePicker from 'vue2-datepicker'
    import Datepicker from 'vuejs-datepicker';

    export default {
        components: { DatePicker, Datepicker },
        props : ['showModalProp', 'user'],

        data() {
            return {
                errorMessage :'',
                successMessage : '',
                max: 6,
                noRecordFound: false,
                btnLoading: false,
                isLoading : false,
                options: [],				
                zipCode: '',
                isTouched: false,
                searchValue: '',
                isLoading: false,
                loading : false,
                pagination: '',
                records : [],
                url: 'api/job-bid',
                loading: false,
                categoryPopup: false,
                selectedService: '',
                isService: false,
                showCollapse: true,
                authUser: '',
                routeName: '',
                isZipEmpty: false,                	
            }
        },
        computed : {
            isInvalid () {
                return !this.searchValue
            },
        },
        methods: {
           onSubmit() {

            let self = this;


            let data = {
                job_id : this.searchValue.id,
                is_tbd : 1,
                is_invited : 1,
                user_id : this.user.user_id,
            }

            if(!data.job_id){
                this.errorMessage = 'Please select a job';
            }

            self.loading = true;

            let urlRequest = self.$http.post(self.url  , data)
            this.errorMessage = '';

            urlRequest.then(response => {
                response = response.data.response;

                self.successMessage = response.message;

                self.$emit('invite-sent');
                setTimeout(function () {
                    self.successMessage = '';
                    self.loading = false;
                    self.hideModal();
                }, 2000);

            }).catch(error => {
                let errors = error.response.data.errors;
                self.loading = false;
                
                _.forEach(errors, function(value, key) {
                    self.errorMessage =  errors[key][0];
                    return false;
                });

                
            });

        },
        validateBeforeSubmit() {
            this.$validator.validateAll().then((result) => {
                if (result) {
                    this.onSubmit();
                    this.errorMessage = ''
                    return;
                }
                this.errorMessage = this.errorBag.all()[0];
            });
        },
        limitText (count) {
            return `and ${count} other services`
        },
        showModal() {
            this.$refs.myModalRef.show()
        },
        hideModal() {
            let self = this;
            this.loading = false;
            this.submit = false;
            self.searchValue = '';
            self.options = [];
            this.$refs.myModalRef.hide()
        },
        onHidden(){
            let self = this;
            this.loading = false;
            this.submit = false;
            self.searchValue = '';
            self.options = [];
            self.errorMessage = '';
            self.successMessage = '';
            this.$emit('HideModalValue');
        },
        asyncFind: _.debounce(function(query) {
            let self = this;

            if(!query || query.length < 3) {
                return;
            };
            this.loading = true;
            this.searchUrl  = 'api/job?keyword=' + query + '&filter_by_me=true';
            this.isLoading = true;
            this.$http.get(this.searchUrl).then(response => {
                response = response.data.response;
                self.options = response.data;
                self.isLoading = false;
                self.loading = false;

            }).catch(error=>{
            });
        }, 1000),
    },
    watch:{
        bid (value){
            this.setBidData();
        },
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