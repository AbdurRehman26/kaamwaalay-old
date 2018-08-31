<template>  
    <div>
        <b-modal id="go-to-visit" centered @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Go to visit" ok-only ok-title="Submit">
        <alert></alert>
            <div>
                
                <label>How much time approx. it will take to reach there?</label>
                <b-row class="justify-content-md-center">
                    <b-col cols="2" md="12">
                        <div class="form-group">
                            <input type="text" name="" class="form-control" placeholder="For e.g. 20 minutes or 1 hour" />
                        </div>
                    </b-col>
                </b-row>
                    
            </div>
        </b-modal>
    </div>
</template>

<script>

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

        }
    },
}

</script>