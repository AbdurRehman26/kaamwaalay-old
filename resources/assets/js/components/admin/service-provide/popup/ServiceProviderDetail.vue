 <template>
	<div>
		<b-modal id="view-service-detail" centered  @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="md" title="Service Provider Detail" ok-only ok-title="Close">
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
                        <p><strong class="title-head">First Name</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>Bruce </p>
                    </b-col>
                </b-row>
                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Last Name</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>Fahey</p>
                    </b-col>
                </b-row>

                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Business or Individual?</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>Business</p>
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
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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
