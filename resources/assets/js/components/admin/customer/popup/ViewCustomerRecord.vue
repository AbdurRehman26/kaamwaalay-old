 <template>	
	<div>
		<b-modal id="view-customer-record" centered  @hidden="onHidden" hide-footer title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Job Detail" ok-only ok-title="Close">
            <alert v-if="successMessage"></alert>
            <div class="view-details-list">

                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Job Title</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>{{selectedJob.title}}</p>
                    </b-col>
                </b-row>
                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Service Provider</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>{{selectedJob.service_provider}}</p>
                    </b-col>
                </b-row>
                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Urgent Job</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>{{selectedJob.job_type == 'urgent' ? 'Yes' : 'No'}}</p>
                    </b-col>
                </b-row>
                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Rating</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p><star-rating :star-size="20" read-only :increment="0.02" :rating="selectedJob.avg_rating" active-color="#8200ff"></star-rating></p>
                    </b-col>
                </b-row>

                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Service</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>{{selectedJob.service != null ? selectedJob.service.title: '-'}}</p>
                    </b-col>
                </b-row>  

                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Project Amount</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>{{selectedJob.job_amount == null ? '-':'$'+selectedJob.job_amount}}</p>
                    </b-col>
                </b-row>                                

                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Description</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <div class="form-group">
                            <p>{{selectedJob.description}}</p>
                        </div>
                    </b-col>
                </b-row>
                
            </div>
	   </b-modal>
	</div>
</template>

<script>
import StarRating from 'vue-star-rating';

export default {

    props: ['showModalProp', 'selectedJob'],
    data () {
        return {
            successMessage: "",
            selectedJob:{},
        }
    },
    
    methods: {
        showModal () {
            this.$refs.myModalRef.show()
        },
        hideModal () {
            this.loading = false;
            this.$refs.myModalRef.hide()
        },
        onHidden() {
            this.$emit('HideModalValue');
        }
    },
    components: {
        StarRating
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
        selectedJob(value) {
            this.selectedJob = value;
        }
    },
}
</script>