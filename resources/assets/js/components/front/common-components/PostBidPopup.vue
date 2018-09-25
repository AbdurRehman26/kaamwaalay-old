<template>  
    <div>
        <b-modal id="post-bid" class="post-bid-form" centered @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Bid on job" ok-only ok-title="Submit" hide-footer="true">
        <form>
                <div class="model-content">
                    <alert></alert>
                    <p>Post a bid on <strong>Concrete Floor Building</strong> job posted by <a href="javascript:void;">Nathan Alvarez</a></p>
                    <b-row class="justify-content-md-center">
                        <b-col md="6">
                            <div class="form-group">
                                <label>Bid Amount</label>
                                <input type="number" name="" class="form-control" />
                            </div>
                        </b-col> 
                        <b-col md="6">
                            <div class="form-group">
                                <label class="nolabel">&nbsp;</label>
                                <select class="form-control">
                                  <option>Minimum</option>
                                </select>
                            </div>
                        </b-col>
                        <b-col md="12">
                            <h6 class="text-center">OR</h6>
                        </b-col>
                         <b-col md="12">
                            <div class="form-group">
                                <div class="custom-circle-radio">
                                    <input type="radio" id="further_discussion" name="radio-group" checked>
                                    <label for="further_discussion">Further discussion (chat) required to quote</label>   
                                </div>

                                <div class="custom-circle-radio">
                                    <input type="radio" id="visit_required" name="radio-group">
                                    <label for="visit_required">Visit required to quote (request for visit)</label>  
                                </div>
                            </div>
                        </b-col>
                        <b-col md="6">
                            <div class="form-group custom-datepicker">
                                <label>Preferred date and time of visit</label>
                                <date-picker v-model="value" type="date" format="DD-MM-YYYY" lang="en"></date-picker>
                            </div>
                        </b-col>
                        <b-col md="6">
                            <div class="form-group custom-datepicker custom-timepicker">
                                <label class="nolabel">&nbsp;</label>
                                <date-picker v-model="value12" lang="en" type="time" format="HH:mm:ss" placeholder="Select Time"></date-picker>
                            </div>
                        </b-col>
                         <b-col md="12">
                             <label>Proposal Statement</label>
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Start typing your proposal statement" name="" rows="5"></textarea>
                            </div>           
                        </b-col>
                    </b-row>
                        
                </div>
                <footer id="post-bid___BV_modal_footer_" class="modal-footer">
                    <button type="button" class="btn btn-primary">
                        Submit
                    </button>
                </footer>
            </form>
        </b-modal>
    </div>
</template>

<script>
    import DatePicker from 'vue2-datepicker'

export default {
      data() {
    return {
    value: '', 
    value12:'',
    value_month:'',
    value_year:'',
    time1: '',
    time2: '',
    time3: '',
      shortcuts: [
        {
          text: 'Today',
          onClick: () => {
            this.time3 = [ new Date(), new Date() ]
          }
        }
      ],
      timePickerOptions:{
        start: '00:00',
        step: '00:30',
        end: '23:30'
      }
    }
  },
    components: { DatePicker },
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