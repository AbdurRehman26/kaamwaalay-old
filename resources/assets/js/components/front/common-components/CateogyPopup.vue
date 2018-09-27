 <template>	
	<div class="popup categories-popup">
		<b-modal id="" centered hide-header hide-footer  @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Parent Service Detail" ok-only ok-title="Continue">
		    	<div class="category-selected">
                    <div class="category-image-block" v-bind:style="{'background-image': 'url('+ getImage(selectedValue.images)+')'}">
                    </div>
                    <h4>{{selectedValue ? selectedValue.title : ''}}</h4>
                    <i @click="onHidden" class="icon-close2"></i>
		    	</div>
                <div class="category-search-field">
                    <h5>What do you need {{selectedValue ? selectedValue.title : ''}} service?</h5>
                    <div class="zip-code-field">
                        <i class="icon-location"></i>
                        <input type="number" class="form-control lg" placeholder="Enter your zip code" v-model="zip" name="zip" :class="[errorBag.first('zip') ? 'is-invalid' : '']" v-validate="'required|numeric'" @keyup.enter="validateBeforeSubmit">
                    </div>
                    <a href="javascript:void(0);" @click="validateBeforeSubmit" class="btn btn-primary m-t-24">Continue</a>
                </div>
	    </b-modal>
	</div>
</template>

<script>
export default {

    props: ['showModalProp', 'selectedValue'],
    
    data () {
        return {
            zip: '',
            errorMessage: '',
        }
    },
    methods: {
        validateBeforeSubmit() {
            this.$validator.validateAll().then((result) => {
                if (result) {
                    this.categorydetail();
                    this.errorMessage = "";
                    return;
                }
                this.errorMessage = this.errorBag.all()[0];
            });
        }, 
        getImage(img) {
            return img? (img[0].upload_url? img[0].upload_url: 'images/dummy/image-placeholder.jpg') : 'images/dummy/image-placeholder.jpg';
        },
        showModal () {
            this.$refs.myModalRef.show()
        },
        hideModal () {
            this.errorBag.clear();
            this.$refs.myModalRef.hide()
        },
        onHidden() {
            this.errorBag.clear();
            this.$emit('HideModalValue');
        },
        categorydetail(){
            this.scrollToTop();
            this.$emit('onSubmit', this.zip);
        },
        scrollToTop() {
        },        
    },

    watch: {
        showModalProp(value) {
            if(value) {
                this.showModal();
            }
            if(!value) {
                this.hideModal();
            }
        },
        selectedValue(value) {
            this.selectedValue = value;
        },
        zip(val) {
            if(val.length > 5) {
                val = val.substr(0, 5);
            }
            this.zip = val; 
        }
    },
}
</script>