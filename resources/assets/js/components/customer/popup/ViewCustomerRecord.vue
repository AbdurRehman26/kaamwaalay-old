 <template>	
	<div>
		<b-modal id="view-customer-record" centered  @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Customer Detail" ok-only ok-title="Cancel">
            <alert></alert>
            <div class="view-details-list">

                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Job Title</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>Electrician</p>
                    </b-col>
                </b-row>

                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Service Provider</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>James</p>
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