+<template>  
    <div>
        <b-modal id="post-bid" class="post-bid-form" centered @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Bid on job" hide-footer>
            
        </b-modal>
    </div>
    </template>

    <script>

        export default {
            props : ['showModalProp'],
            mounted () {
            },
            data() {
                return {
                    
                }
            },
            computed : {
            },
            methods: {

                showModal() {
                    this.$refs.myModalRef.show()
                },
                onHidden(){
                    this.errorBag.clear();
                    this.errorMessage = '';
                    this.$emit('HideModalValue');
                },

                hideModal() {
                    this.$refs.myModalRef.hide()
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