<template>
	    <div>

        <b-modal id="invite-bid" class="post-bid-form invite-job-form" centered @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Invite on bid" hide-footer>

            <form @submit.prevent="validateBeforeSubmit">
                <div class="model-content">
                    <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>        
                    <b-row class="justify-content-md-center">

                        <b-col md="12">
                        <div class="search-filter service-professional invite-bid-search">
                            <!-- <h1 class="heading-large">Find best skilled service professionals near you.</h1> -->
                            <div class="custom-multi" :class="{ 'invalid': isInvalid }">
                                <multiselect :showNoResults="false" v-model="searchValue" :options="options" placeholder="Select Job" track-by="id" label="title" :loading="isLoading"  id="ajax" open-direction="bottom" :searchable="true" :options-limit="300" :limit="3" :limit-text="limitText" :max-height="600"  @search-change="asyncFind" name="search">
                                </multiselect>
                            </div>
                        </div>
                        </b-col>

                        </b-row>

                    </div>
                    <footer id="post-bid___BV_modal_footer_" class="modal-footer">
                        <button type="submit" :class="['btn', 'btn-primary',  loading ? 'show-spinner' : '']">
                            Submit
                            <loader></loader>
                        </button>
                    </footer>
                </form>

            </b-modal>            
        </div>
</template>



   <script>
        import DatePicker from 'vue2-datepicker'
        import Datepicker from 'vuejs-datepicker';

        export default {
            components: { DatePicker, Datepicker },
            props : ['showModalProp',],

            data() {
                return {
					max: 6,
					noRecordFound: false,
					btnLoading: false,
					options: [
					  {
					  	title: 'choice 1',
						},
					  {title: 'choice 2'},
					  {title: 'choice 3'},
					  {title: 'choice 4'},
					  {title: 'choice 5'},
					],
      data: [{
        name: 'first group',
        list: [
          { name: '0' },
          { name: '2' },
          { name: '3' },
          { name: '8' },
          { name: '9' },
          { name: '11' },
          { name: '13' },
          { name: '14' },
          { name: '15' },
          { name: '18' },
        ],
      }, {
        name: 'second group',
        list: [
          { name: '21' },
          { name: '22' },
          { name: '24' },
          { name: '27' },
          { name: '28' },
          { name: '29' },
          { name: '31' },
          { name: '33' },
          { name: '35' },
          { name: '39' },
        ],
      }],					
					zipCode: '',
					isTouched: false,
					searchValue: '',
					isLoading: false,
					loading : false,
					pagination: '',
					records : [],
					url: '',
					serviceProviderUrl : null,
					service: '',
					serviceTitle: '',
					relatedServices: '',
					loading: false,
					categoryPopup: false,
					selectedService: '',
					isService: false,
					showCollapse: true,
					authUser: '',
					routeName: '',
					isZipEmpty: false,                	
                }
            },
            computed : {

            },
            methods: {
                showModal() {
                    this.$refs.myModalRef.show()
                },
                hideModal() {
                    this.loading = false;
                    this.submit = false;

                    this.$refs.myModalRef.hide()
                },
                onHidden(){
                    this.$emit('HideModalValue');
                },
            },
            watch:{
                bid (value){
                    this.setBidData();
                },
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