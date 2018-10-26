 <template> 
    <div class="popup categories-popup">
        <b-modal id="award-job" centered hide-footer hide-header @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Parent Service Detail" ok-only ok-title="Yes, award job">

            <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>        

            <div class="category-selected">
                <div class="category-image-block" :style="'background-image:url('+jobImage+');'">
                </div>
                <h4>{{job.title}}</h4>
                <i @click="onHidden" class="icon-close2"></i>
            </div>
            <div class="category-search-field">
                <h5>Are you sure you want to award this job to 
                    {{ bidder.service_provider ? bidder.service_provider.business_name : '' }}?
                </h5>

                <button @click.prevent="onSubmit" :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' ]">
                    Yes, award job 
                    <loader></loader>
                </button>

                <a href="javascript:void();" class="btn btn-link" @click="hideModal">Cancel</a>
            </div>
        </b-modal>
    </div>
</template>

<script>
    export default {

        props: [
        'showModalProp',
        'bidder',
        'job'
        ],
        
        data(){
            return { 
                successMessage : '',
                errorMessage : '',
                loading : false,
                url : 'api/job-bid'
            }
        },
        methods: {
            onSubmit() {
                let self = this;
                let data = {
                    is_awarded : 1,
                    job_id : this.job.id
                };

                self.loading = true;

                let url = self.url + '/' +  this.bidder.id;

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
            showModal () {
                this.$refs.myModalRef.show()
            },
            hideModal () {
                this.$refs.myModalRef.hide()
            },
            onHidden() {
                this.$emit('HideModalValue');
            },
            categorydetail(){
                this.$router.push({name: 'Explore_Detail'});
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
            }
        },
        computed : {
            jobImage(){
                if(this.job){
                    return this.job.jobImages.length ? this.job.jobImages[0] : 'images/dummy/image-placeholder.jpg'; 
                }
            }
        }
    }
</script>