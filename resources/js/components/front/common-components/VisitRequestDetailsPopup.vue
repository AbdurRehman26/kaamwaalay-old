<template> 
    <div class="popup categories-popup">
        <b-modal id="visit-request" centered hide-footer @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Visit Details">
            <div class="category-search-field">
                <p><b>Details provided by {{bid.user | fullName}}:</b> {{bid.visit_details}}</p>
            </div>
        </b-modal>
    </div>
</template>

<script>
    export default {
        data () {
            return {
            }
        },

        props: [
        'showModalProp',
        'bid'
        ],
        mounted () {
        },
        methods: {
            showModal () {
                this.$refs.myModalRef.show()
            },
            hideModal () {
                this.$refs.myModalRef.hide()
            },
            onHidden() {
                this.$emit('HideModalValue');
            },
        },
        computed : {
        },
        watch: {
            bid(value){
                this.submitFormData = JSON.parse(JSON.stringify(value));
            },
            showModalProp(value) {
                if(value) {
                    this.showModal();
                }
                if(!value) {
                    this.hideModal();
                }
            }
        },
    }
</script>