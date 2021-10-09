<template> 
    <div class="alertPopup">

        <b-modal id="warningPopup" ref="myModalRef" size="sm" title="Alert" cancel-variant="link" @hidden="onHidden">
            <b-row>
                <b-col cols="12">
                    <p>Are you sure you want to delete this?</p>
                </b-col>
            </b-row>

            <div slot="modal-footer" class="w-100">
        

                <b-col class="float-right" cols="4">
         
         <button href="#" @click.prevent="validateBeforeSubmit();" :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-block' ,'btn-success']">Confirm

        <loader></loader>

         </button>
      
                </b-col>
      
       </div>

        </b-modal>
    </div>
</template>

<script>
export default {
    props : ['showModalProp'  , 'url' , 'id'],
    data () {
        return {
            loading :false
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
            this.$emit('modal-hidden');
        },      
        validateBeforeSubmit (evt) {
            // Prevent modal from closing
            this.$validator.validateAll().then((result) => {
                if (result) {
                    this.remove()
                    this.errorMessage ='';
                    return;
                }
                this.errorMessage = this.errorBag.all()[0];
            });
        },
        remove(){


            let self = this;
                
                self.errorMessage = '';
                self.successMessage = '';
                
                let id = self.id;

                self.loading = true;
                let url = self.url+'/'+id;
                self.$http.delete(url).then(response => {
                response = response.body.response;
                self.loading = false;
                self.successMessage = response.message;
                setTimeout(function() {
                self.hideModal();
                self.onHidden();
                self.successMessage = '';
                self.$emit('call-list');

                }, 2000);
        

                }).catch(error => {
                let errors = error.body.errors;

                self.loading = false;
                _.forEach(errors, function(value, key) {
                self.errorMessage =  errors[key][0];
                return false;
                });
                

                });

        }  
    },
    mounted(){

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
        id(value){
        }
    }
}
</script>

