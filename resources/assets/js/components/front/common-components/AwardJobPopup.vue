 <template> 
    <div class="popup">
        <b-modal id="award-job" centered hide-header=false hide-footer=false  @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Parent Service Detail" ok-only ok-title="Yes, award job">
            <alert></alert>
                <div class="category-selected">
                    <div class="category-image-block" style="background-image:url(/images/front/explore/carpenter1.jpg);">
                    </div>
                    <h4>Concrete Floor Building</h4>
                    <i @click="onHidden" class="icon-close2"></i>
                </div>
                <div class="category-search-field">
                    <h5>Are you sure you want to award this job to C&N Home Solutions?</h5>
                    <a href="javascript:void();" class="btn btn-primary m-t-24">Yes, award job</a>
                    <a href="javascript:void();" class="btn btn-link m-t-24" @click="hideModal">Cancel</a>
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