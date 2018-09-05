<template>  
    <div>
        <b-modal id="customer-support" centered @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Support Enquiry" ok-only ok-title="Submit">
            <alert></alert>
            <div>
                <p>Please fill out the following form and we'll get right back to you.</p>
                <label>What can we help you with?</label>
                <div class="form-group">
                    <select class="form-control">
                      <option v-model="selected">General questions</option>
                  </select>
              </div>
              <label>Message</label>
              <div class="form-group">
                <textarea class="form-control" placeholder="Start typing your message" name="" rows="5"></textarea>
            </div>           
        </div>
    </b-modal>
</div>
</template>

<script>

    export default {

        props : ['showModalProp'],
        data(){
            return {
                selected :''
            }
        },
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