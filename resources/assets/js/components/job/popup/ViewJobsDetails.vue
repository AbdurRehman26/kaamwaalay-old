 <template>	
	<div>
		<b-modal id="view-customer-detail" title-tag="h4" ref="myModalRef" size="md" title="View Job Detail" ok-variant="link" ok-title="View Customer Detail" @ok="ViewJobRecord" cancel-title="Cancel" cancel-variant="secondary" @hidden="onHidden">
            <alert></alert>
            <div class="view-details-list">

                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">ID</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>1</p>
                    </b-col>
                </b-row>

                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Customer</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <a href="javascript:void(0);">Shawn</a>
                    </b-col>
                </b-row>

                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Service Type</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>Carpenter</p>
                    </b-col>
                </b-row>

                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Service Sub-type</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>Window</p>
                    </b-col>
                </b-row>
                
                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Zipcode</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>125964</p>
                    </b-col>
                </b-row>

                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Address</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>North Hampton</p>
                    </b-col>
                </b-row>

                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">City</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>New Hampshire</p>
                    </b-col>
                </b-row>
                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">State</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>US</p>
                    </b-col>
                </b-row>                    

                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Country</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>USA</p>
                    </b-col>
                </b-row>

                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Join Date</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>May, 12 2017</p>
                    </b-col>
                </b-row>

                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Avg. Rating</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>4</p>
                    </b-col>
                </b-row>

                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Total jobs initiated</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>4</p>
                    </b-col>
                </b-row>

                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Total jobs finished</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>4</p>
                    </b-col>
                </b-row>

                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Total urgent jobs created</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>4</p>
                    </b-col>
                </b-row>

                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Total urgent jobs completed</strong></p>
                    </b-col>
                    <b-col cols="7">
                        <p>4</p>
                    </b-col>
                </b-row>

                <b-row>
                    <b-col cols="5" class="">
                        <p><strong class="title-head">Description</strong></p>
                    </b-col>
                    <b-col cols="12">
                        <div class="form-group">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                    </b-col>
                </b-row>                
            </div>
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
        },
        ViewJobRecord() {
            /*this.$router.push('/customer/viewjobdetail');*/
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