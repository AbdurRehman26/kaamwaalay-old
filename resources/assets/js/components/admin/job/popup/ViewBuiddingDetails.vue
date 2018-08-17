 <template>
	<div>
		<b-modal id="view-bidding-detail" title-tag="h4" centered ref="myModalRef" size="md" title=" Bidding Detail" ok-only ok-title="Cancel" cancel-variant="primary" @hidden="onHidden">
            
            <div class="view-details-list">

                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Name</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>{{currentItem.user | fullName}}</p>
                    </b-col>
                </b-row>

                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Bid Amount</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>${{currentItem.amount}}</p>
                    </b-col>
                </b-row>

                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Rating</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p><star-rating :star-size="20" read-only :rating="currentItem.user ? currentItem.user.average_rating : 0" active-color="#8200ff"></star-rating></p>
                    </b-col>
                </b-row>


                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Bid Statement</strong></p>
                    </b-col>
                    <b-col cols="12">
                        <div class="form-group">
                            <p>{{currentItem.description}}</p>
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

    props: ['showModalProp' , 'item'],

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
    data(){
        return{
            currentItem : ''
        }
    },
    mounted(){
        this.currentItem = this.item;
    },
    components: {
        StarRating
    },

    watch: {
        item(value){
            this.currentItem = value;
        },
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
