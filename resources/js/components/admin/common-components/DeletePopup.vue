<template>
	<div>
		<b-modal id="delete-popup" centered @hidden="onHidden"  title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Warning" ok-only ok-title="Submit" no-close-on-backdrop no-close-on-esc>
            <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>
            <div>
              <p>Are you sure you want to delete this {{item.parent_id? item.parent.title : item.title}}? <span v-if="!item.parent_id"> Removing this service will remove all its associated services.</span></p>
                
          </div>
          <div slot="modal-footer" class="">
            <b-col class="float-right" cols="6">
               <button :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' , 'apply-primary-color' ]" @click.prevent="validateBeforeSubmit();">
                <span>Confirm</span> 
                <loader></loader>
            </button>
        </b-col>
        <b-col class="float-right" cols="6">
           <button :class="['btn' , 'btn-link' , 'apply-primary-color' ]" @click.prevent="onHidden">
            <span>Cancel</span> 
        </button>
    </b-col>
</div>
</b-modal>
</div>
</template>

<script>

    export default {
       props : ['showModalProp', 'item', 'url'],
       data () {
          return {
            loading: false,
            errorMessage: "",
            successMessage: "",
        }
    },
    methods: {
        showModal() {
            this.$refs.myModalRef.show();
        },
        hideModal() {
            this.$refs.myModalRef.hide()
        },
        onHidden(){
            this.$emit('HideModalValue');
        },
        validateBeforeSubmit (evt) {
            // Prevent modal from closing
            this.$validator.validateAll().then((result) => {
                if (result) {
                    this.onDelete()
                    this.errorMessage ='';
                    return;
                }
                this.errorMessage = this.errorBag.all()[0];
            });
        },
        onDelete() {
            let self = this;

            self.errorMessage = '';
            self.successMessage = '';

            let id = this.item.id;//this.item.parent_id? this.item.id : this.item.parent_id;

            self.loading = true;
            let url = self.url+'/'+id;
            self.$http.delete(url).then(response => {
                response = response.data;
                self.loading = false;
                self.successMessage = response.message;
                setTimeout(function() {
                    self.hideModal();
                    self.onHidden();
                    self.successMessage = '';
                    self.$emit('call-list');

                }, 2000);

            }).catch(error => {
                let errors = error.data.response;

                self.loading = false;
                _.forEach(errors, function(value, key) {
                    self.errorMessage =  errors[key][0];
                    return false;
                });


            });
        }
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
        item(value) {
            this.item = value;
        },
        url(value) {
            this.url = value;
        }
    },
}

</script>
