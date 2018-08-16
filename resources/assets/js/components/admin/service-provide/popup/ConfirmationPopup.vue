<template>
    <div>
        <b-modal id="status-user-change" centered @hidden="onHidden" title-tag="h4" cancel-variant="danger" ok-variant="primary" ref="myModalRef" size="sm" title="Confirmation" ok-title="Yes" cancel-title="No">
        <alert></alert>
            <div>
                <p>Are you sure you want to comfirm this action?</p>
            </div>
        </b-modal>
    </div>
</template>

<script>

export default {
    props : ['showModalProp'],
        methods: {
            StatusChange(){
                this.changestatus = true;
            },
            showModal() {
                this.$refs.myModalRef.show()
            },
            hideModal() {
                this.$refs.myModalRef.hide();
                 this.changestatus = false;
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
