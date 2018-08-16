<template>  
    <div>
        <b-modal id="post-bid" centered @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Bid on job" ok-only ok-title="Submit">
        <alert></alert>
            <div>
                <p>Post a bid on <strong>Concrete Floor Building</strong> job posted by <a href="javascript:void;">Nathan Alvarez</a></p>
                <label>Bid Amount</label>
                <b-row class="justify-content-md-center">
                    <b-col cols="2" md="6">
                        <div class="form-group">
                            <input type="number" name="" class="form-control" />
                        </div>
                    </b-col>
                    <b-col cols="2" md="6">
                        <div class="form-group">
                            <select class="form-control">
                              <option v-model="selected">Minimum</option>
                            </select>
                        </div>
                    </b-col>
                    <b-col cols="1" md="12">
                        <h6 class="text-center">OR</h6>
                    </b-col>
                     <b-col cols="1" md="12">
                        <div class="radio">
                          <label><input type="radio" name="optradio" checked>Further discussion (chat) required to quote</label>
                        </div>
                        <div class="radio">
                          <label><input type="radio" name="optradio">Visit required to quote (request for visit)</label>
                        </div>
                    </b-col>
                     <b-col cols="1" md="12">
                         <label>Proposal Statement</label>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Start typing your proposal statement" name="" rows="5"></textarea>
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