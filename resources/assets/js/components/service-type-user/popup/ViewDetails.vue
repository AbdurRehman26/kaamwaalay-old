 <template>	
	<div>
		<b-modal id="view-service-detail" centered  @hidden="onHidden" title-tag="h4" ok-variant="secondary" ref="myModalRef" size="sm" title="View Service Detail" ok-only ok-title="Submit">
            <alert></alert>
            <row>
                <p>hjhd</p>
            </row>
	    </b-modal>
	</div>
</template>

<script>
export default {

    props: ['showModalProp'],
    
    methods: {
        showModal () {
            this.$refs.myModalRef.show()
        },
        hideModal () {
            this.$refs.myModalRef.hide()
        },
        onHidden() {
            this.$emit('HideModalValue');
        }
    },

    watch: {
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