 <template> 
    <div class="popup categories-popup">
        <b-modal id="visit-request" centered hide-header=false hide-footer=false  @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Parent Service Detail" ok-only ok-title="Yes, award job">
            <alert></alert>
                <div class="category-selected info">
                     <i @click="onHidden" class="icon-close2"></i>
                    <div class="category-content-block">                       
                       <h3>Lorem Ipsum</h3>                        
                    </div>                     
                </div>
                <div class="category-search-field">                    
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
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