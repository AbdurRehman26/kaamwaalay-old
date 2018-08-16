 <template>	
	<div class="popup categories-popup">
		<b-modal id="" centered hide-header=false hide-footer=false  @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Parent Service Detail" ok-only ok-title="Continue">
            <alert></alert>
		    	<div class="category-selected">
                    <div class="category-image-block" style="background-image:url(/images/front/explore/carpenter1.jpg);">
                    </div>
                    <h4>General carpentry</h4>
                    <i @click="onHidden" class="icon-close2"></i>
		    	</div>
                <div class="category-search-field">
                    <h5>What do you need general carpentry service?</h5>
                    <div class="zip-code-field">
                        <i class="icon-location"></i>
                        <input type="number" name="zip-code" class="form-control lg" placeholder="Enter your zip code">
                    </div>
                    <a href="javascript:void();" @click="categorydetail" class="btn btn-primary m-t-24">Continue</a>
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