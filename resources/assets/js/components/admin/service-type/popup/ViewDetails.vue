 <template>	
   <div>
      <b-modal id="view-service-detail" centered  @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="md" title="Service Detail" ok-only ok-title="Close">
        <alert v-if="successMessage"></alert>
        <div class="view-details-list">
            <b-row>
                <b-col col md="3" sm="12" class="">
                    <div class="user-img bigimage">
                        <img :src="getImage" alt="">
                    </div>
                </b-col>
                <b-col col md="9" sm="12" class="">
                   <b-row>
                        <b-col cols="5" class="">
                            <p><strong class="title-head">Service</strong></p>
                        </b-col>
                        <b-col cols="7">
                            <p>{{selectedService.title}}</p>
                        </b-col>
                    </b-row>
                    <b-row>
                        <b-col cols="5" class="">
                            <p><strong class="title-head">Parent Service</strong></p>
                        </b-col>
                        <b-col cols="7">
                            <p>{{selectedService.parent_id? selectedService.parent.title : '-'}}</p>
                        </b-col>
                    </b-row>
                    <b-row>
                        <b-col cols="5" class="">
                            <p><strong class="title-head">URL Suffix</strong></p>
                        </b-col>
                        <b-col cols="7">
                            <p>{{selectedService.url_suffix}}</p>
                        </b-col>
                    </b-row>
                    <b-row>
                        <b-col cols="5" class="">
                            <p><strong class="title-head">Home Page Banner</strong></p>
                        </b-col>
                        <b-col cols="7">
                            <p>{{selectedService.is_display_banner? "YES":"NO"}}</p>
                        </b-col>
                    </b-row>
                    <b-row>
                        <b-col cols="5" class="">
                            <p><strong class="title-head">Explore Banner</strong></p>
                        </b-col>
                        <b-col cols="7">
                            <p>{{selectedService.is_display_service_nav? "YES":"NO"}}</p>
                        </b-col>
                    </b-row>
                    <b-row>
                        <b-col cols="5" class="">
                            <p><strong class="title-head">Total Service Providers</strong></p>
                        </b-col>
                        <b-col cols="7">
                            <p>{{selectedService.service_prodider_count}}</p>
                        </b-col>
                    </b-row>
                    <b-row>
                        <b-col cols="5" class="">
                            <p><strong class="title-head">Total Jobs Initiated</strong></p>
                        </b-col>
                        <b-col cols="7">
                            <p>{{selectedService.job_init_count}}</p>
                        </b-col>
                    </b-row>
                    <b-row>
                        <b-col cols="5" class="">
                            <p><strong class="title-head">Total Jobs Finished</strong></p>
                        </b-col>
                        <b-col cols="7">
                            <p>{{selectedService.job_finished_count}}</p>
                        </b-col>
                    </b-row>
                    <b-row>
                        <b-col cols="5" class="">
                            <p><strong class="title-head">Description</strong></p>
                        </b-col>
                        <b-col cols="7">
                            <div class="form-group">
                                <p>{{selectedService.parent_id? selectedService.parent.description : selectedService.description}}</p>
                                <p>{{selectedService.images}}</p>
                            </div>
                        </b-col>
                    </b-row>
                </b-col>                
            </b-row>
        </div>
    </b-modal>
</div>
</template>

<script>
export default {
    props: ['showModalProp', 'selectedService'],
    data () {
        return {
            successMessage: "",
        }
    },
    methods: {
        showModal () {
            this.$refs.myModalRef.show();
        },
        hideModal () {
            this.loading = false;
            this.$refs.myModalRef.hide();
        },
        onHidden() {
            this.$emit('HideModalValue');
        }
    },
    computed: {
        getImage() {
            return this.selectedService.images? (this.selectedService.images[0].upload_url? this.selectedService.images[0].upload_url: 'images/dummy/image-placeholder.jpg') : 'images/dummy/image-placeholder.jpg';
        },
    },
    watch: {
        showModalProp(value) {
            if(value) {
                this.showModal();
            } else {
                this.hideModal();
            }
        },
        selectedService(value) {
            this.selectedService = value;
        },
    },
}
</script>
