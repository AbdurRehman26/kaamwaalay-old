 <template> 
    <div class="popup categories-popup">
        <b-modal id="visit-request" centered hide-header=false hide-footer=false  @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Parent Service Detail" ok-only ok-title="Yes, award job">
            <alert></alert>
                <div class="category-selected">
                     <i @click="onHidden" class="icon-close2"></i>
                    <div class="category-image-block" style="background-image:url(/images/front/explore/carpenter1.jpg);">
                    </div>
                    <div class="category-content-block">
                       
                        <h6>Christopher Ward Joinery Services Requested to visit your address to evaluate work before bidding.</h6>
                        
                    </div>
                </div>
                <div class="category-search-field">
                    <h6>Are you sure you want to accept visit request?</h6>
                    <p>If you accept, your contact details and address will be shared with the service provider.</p>
                    <a href="javascript:void();" class="btn btn-primary">Yes, allow visit</a>
                    <a href="javascript:void();" class="btn btn-primary" @click="hideModal">No, decline request</a>
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
        },
        categorydetail(){
            this.$router.push({name: 'Explore_Detail'});
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