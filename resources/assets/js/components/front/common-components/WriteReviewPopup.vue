<template>  
    <div>
        <b-modal id="write-review" centered @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Write Review" ok-only ok-title="Submit">
        <alert></alert>
            <div>
                <p>Write review and provide your feedback on Leaking water pipe job performed by <strong>A-General Plumbing &amp; Sewer Service.</strong></p>
                
                <b-row class="justify-content-md-center">
                    <b-col cols="2" md="12">
                        <div class="form-group">
                            <label>Overall Service Rating</label>
                            <star-rating :increment="0.5" :star-size="20" :rating="3" active-color="#8200ff"></star-rating>    
                        </div>

                        <div class="form-group">
                            <label>Review</label>
                            <textarea class="form-control" placeholder="Start typing your review" rows="5"></textarea>
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

    props : ['showModalProp'],
        methods: {
        showModal() {
            this.$refs.myModalRef.show()
        },
        hideModal() {
            this.$refs.myModalRef.hide()
        },
        onHidden(){
            this.$emit('HideModalValue');
        },        
    },    
   watch:{
        showModalProp(value){

            if(value){
                this.showModal();
            }
            if(!value){
                this.hideModal();
            }

        },
    },
    components: {
        StarRating
    },    
}

</script>