 <template>
	<div>
		<b-modal id="view-bidding-detail" title-tag="h4" centered ref="myModalRef" size="md" title=" Bidding Detail" ok-only ok-title="Cancel" cancel-variant="primary" @hidden="onHidden">
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
                        <p><strong class="title-head">Name</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>Johnny</p>
                    </b-col>
                </b-row>

                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Bid Amount</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>$1000</p>
                    </b-col>
                </b-row>

                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Rating</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p><star-rating :star-size="20" read-only :rating="4"></star-rating></p>
                    </b-col>
                </b-row>


                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Bid Statement</strong></p>
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
import StarRating from 'vue-star-rating';

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
        },
        ViewCustomerRecord() {
            this.$router.push('/customer/viewjobdetail');
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
        }
    },
}
</script>
