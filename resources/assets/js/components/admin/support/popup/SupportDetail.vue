 <template>
	<div>
		<b-modal id="view-details-support" centered  @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="md" title="Support Detail" ok-only ok-title="Reply">
            <alert></alert>
            <div class="view-details-support">

                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Full Name</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>Methew Peterson</p>
                    </b-col>
                </b-row>

                 <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Email Address</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>Email Address</p>
                    </b-col>
                </b-row>

                 <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Type</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>Customer</p>
                    </b-col>
                </b-row>

                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Question</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>General Question</p>
                    </b-col>
                </b-row>

                <b-row>
                    <b-col cols="12" class="">
                        <p><strong class="title-head">Message:</strong></p>
                    </b-col>
                    <b-col cols="12">
                        <div class="form-group">
                            <p>Great services, had an amazing experience working with PSM.</p>
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
