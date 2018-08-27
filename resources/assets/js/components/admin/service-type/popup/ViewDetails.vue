 <template>	
   <div>
      <b-modal id="view-service-detail" centered  @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="md" title="Service Detail" ok-only ok-title="Close">
        <alert v-if="successMessage"></alert>
        <div class="view-details-list">
            <b-row>
                <b-col cols="5" class="">
                    <p><strong class="title-head">ID</strong></p>
                </b-col>
                <b-col cols="7">
                    <p>{{(selectedService.index + 1)}}</p>
                </b-col>
            </b-row>
            <b-row>
                <b-col cols="5" class="">
                    <p><strong class="title-head">Service</strong></p>
                </b-col>
                <b-col cols="7">
                    <p>{{selectedService.parent_id? selectedService.parent.title : selectedService.title}}</p>
                </b-col>
            </b-row>
            <b-row>
                <b-col cols="5" class="">
                    <p><strong class="title-head">Sub-Service</strong></p>
                </b-col>
                <b-col cols="7">
                    <p>{{selectedService.parent_id? selectedService.title : "-"}}</p>
                </b-col>
            </b-row>
            <b-row>
                <b-col cols="5" class="">
                    <p><strong class="title-head">URL Prefix</strong></p>
                </b-col>
                <b-col cols="7">
                    <p>{{selectedService.parent_id? selectedService.parent.url_prefix : selectedService.url_prefix}}</p>
                </b-col>
            </b-row>
            <b-row>
                <b-col cols="5" class="">
                    <p><strong class="title-head">Is Featured?</strong></p>
                </b-col>
                <b-col cols="7">
                    <p>{{selectedService.is_featured? "YES":"NO"}}</p>
                </b-col>
            </b-row>
            <b-row>
                <b-col cols="5" class="">
                    <p><strong class="title-head">Display Banner</strong></p>
                </b-col>
                <b-col cols="7">
                    <p>{{selectedService.is_display_banner? "YES":"NO"}}</p>
                </b-col>
            </b-row>
            <b-row>
                <b-col cols="5" class="">
                    <p><strong class="title-head">Display Service Navigation</strong></p>
                </b-col>
                <b-col cols="7">
                    <p>{{selectedService.is_display_service_nav? "YES":"NO"}}</p>
                </b-col>
            </b-row>
            <b-row>
                <b-col cols="5" class="">
                    <p><strong class="title-head">Display Footer Navigation</strong></p>
                </b-col>
                <b-col cols="7">
                    <p>{{selectedService.is_display_footer_nav? "YES":"NO"}}</p>
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
                <b-col cols="12">
                    <div class="form-group">
                        <p>{{selectedService.parent_id? selectedService.parent.description : selectedService.description}}</p>
                    </div>
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

methods: {
  showModal () {
   this.$refs.myModalRef.show()
},
hideModal () {
   this.$refs.myModalRef.hide()
},
onHidden() {
   this.$emit('HideModalValue');
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
    selectedService(value) {
        this.selectedService = value;
    },
},

}
</script>
