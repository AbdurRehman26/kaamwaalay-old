 <template>	
	<div class="popup categories-popup">
		<b-modal id="" centered hide-header=false hide-footer=false  @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Parent Service Detail" ok-only ok-title="Continue">
		    	<div class="category-selected">
                    <div class="category-image-block" v-bind:style="{'background-image': 'url('+ getImage(selectedValue)+')'}">
                    </div>
                    <h4>{{selectedValue.title}}</h4>
                    <i @click="onHidden" class="icon-close2"></i>
		    	</div>
                <div class="category-search-field">
                    <h5>What do you need general carpentry service?</h5>
                    <div class="zip-code-field">
                        <i class="icon-location"></i>
                        <input type="number" class="form-control lg" placeholder="Enter your zip code" v-model="zip" name="zip" :class="[errorBag.first('zip') ? 'is-invalid' : '']" v-validate="'required|numeric'">
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
            //return img.images[0].upload_url? img.images[0].upload_url : 'images/dummy/image-placeholder.jpg';
            return img? img : 'images/dummy/image-placeholder.jpg';
        },
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
            this.$emit('onSubmit', this.zip);
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
        },
        selectedValue(value) {
            console.log(value, 88999943);
            this.selectedValue = value;
        }
    },
}
</script>