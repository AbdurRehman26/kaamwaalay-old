<template>
    <div>
        <b-modal id="status-user-change" centered @hidden="onHidden"  title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Change Status" ok-only ok-title="Update">
        <alert></alert>
            <div>
               <p>Are you sure you want to change this access level?</p>
            </div>
        </b-modal>
    </div>
</template>

<script>

export default {
    data () {
    return {
        selected: null,
            options: [
                { value: null, text: 'Active' },
                { value: 'b', text: 'Deactive' },
            ]
        }
    },
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
