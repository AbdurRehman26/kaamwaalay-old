 <template>
    <div>
        <b-modal id="change-provider-status" centered @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Change Status" ok-only ok-title="Submit">
            <alert></alert>
                <div>
                    <div class="form-group">
                        <label>Change Status</label>
                        <select class="form-control">
                            <option value="" selected="" disabled="">Select Status</option>
                            <option value="">Pending</option>
                            <option value="">Approved</option>
                            <option value="">Rejected</option>
                        </select>
                    </div>
                </div>
        </b-modal>
    </div>
</template>

<script>

export default {
    data () {

    return {
            selected: null,
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

    watch: {
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
