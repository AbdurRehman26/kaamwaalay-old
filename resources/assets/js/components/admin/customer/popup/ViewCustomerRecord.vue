 <template>	
	<div>
		<b-modal id="view-customer-record" centered  @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Job Detail" ok-only ok-title="Close">
            <alert></alert>
            <div class="view-details-list">

                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Job Title</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>Carpenters</p>
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
                        <p><strong class="title-head">Urgent Job</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>Yes</p>
                    </b-col>
                </b-row>

                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Rating</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p><star-rating :star-size="20" read-only :rating="4" active-color="#8200ff"></star-rating></p>
                    </b-col>
                </b-row>

                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Service</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>Electrician <span class="services-arrow"></span> AC</p>
                    </b-col>
                </b-row>  

                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Project Amount</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>$400</p>
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