 <template>
     <div>
        <b-modal id="view-service-detail" centered  @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="md" title="Service Detail" ok-only ok-title="Close">
            <alert></alert>
            <div class="view-details-list">
                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">ID</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>1</p>
                    </b-col>
                </b-row>
                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Service</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>Carpenters</p>
                    </b-col>
                </b-row>
                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Sub-Service</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>Wiring</p>
                    </b-col>
                </b-row>
                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">URL Prefix</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>www.psm.com</p>
                    </b-col>
                </b-row>
                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Is Featured?</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>No</p>
                    </b-col>
                </b-row>
                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Display Banner?</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>No</p>
                    </b-col>
                </b-row>
                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Display Service Nav?</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>No</p>
                    </b-col>
                </b-row>
                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Display Footer Nav?</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>No</p>
                    </b-col>
                </b-row>
                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Hero Navigation</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>Yes</p>
                    </b-col>
                </b-row>
                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Total Service Providers</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>12</p>
                    </b-col>
                </b-row>
                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Total Jobs Initiated</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>12</p>
                    </b-col>
                </b-row>
                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Total Jobs Finished</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>12</p>
                    </b-col>
                </b-row>
                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Description</strong></p>
                    </b-col>
                    <b-col cols="12">
                        <div class="form-group">
                            <p>Jobs might be building a house from the ground up, or simply replacing a doorframe. Carpenters work in all facets of construction, from large industrial jobs to small handyman jobs.</p>
                        </div>
                    </b-col>
                </b-row>
            </div>
        </b-modal>
    </div>
</template>

<script>
    export default {

     props: ['showModalProp'],

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
}
},
}
</script>
