<template>
    <div>
        <b-modal id="status-user-change" centered @hidden="onHidden"  title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Sign Up Confirmation" >
            <div>
               <p>Are you sure you want to sign up as a {{signupText}}?</p>
            </div>
            <div slot="modal-footer" class="w-100">
                <button :class="['btn' , 'btn-primary' , 'apply-primary-color']" @click="onConfirm">Confirm
                </button>
            </div>
            <div slot="modal-footer" class="w-100">
                <button :class="['btn' , 'btn-link']" @click="onHidden">Cancel
                </button>
            </div>
        </b-modal>
    </div>
</template>

<script>

export default {
    props : ['showModalProp', 'signupText'],
    data () {
        return {
        }
    },
    methods: {
        onConfirm() {
            this.$emit('onConfirm');
        },
        showModal() {
            this.$refs.myModalRef.show()
        },
        hideModal() {
            this.$refs.myModalRef.hide()
        },
        onHidden(){
            this.$emit('hideModalValue');
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