<template>	
	<div>
		<b-modal id="urgent-job" centered @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Urgent Job" ok-only ok-title="Submit">
        <alert></alert>
		    <div>

                <div class="verify-account nobar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Credit Card Type</label>
                                    <select class="form-control">
                                        <option selected="" disabled="">Select credit card type</option>
                                        <option>VISA</option>
                                        <option>Master</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group custom-datepicker">
                                <label for="">&nbsp;</label>
                                <select class="form-control">
                                    <option selected="" disabled="">Select Month</option>
                                    <option>January</option>
                                    <option>Feburay</option>
                                    <option>March</option>
                                    <option>April</option>
                                    <option>May</option>
                                    <option>June</option>
                                    <option>July</option>
                                    <option>August</option>
                                    <option>September</option>
                                    <option>October</option>
                                    <option>November</option>
                                    <option>December</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Credit Card Number</label>
                                    <input type="text" class="form-control" placeholder="Enter your credit card number">
                            </div>
                        </div>
                        <div class="col-md-6">                          
                            <div class="form-group custom-datepicker">
                                <label for="">&nbsp;</label>
                                <select class="form-control">
                                    <option selected="" disabled="">Select Year</option>
                                    <option>2010</option>
                                    <option>2011</option>
                                    <option>2012</option>
                                    <option>2013</option>
                                    <option>2014</option>
                                    <option>2015</option>
                                    <option>2016</option>
                                    <option>2017</option>
                                    <option>2018</option>
                                    <option>2019</option>
                                    <option>2020</option>
                                    <option>2021</option>
                                </select>
                            </div>                                                  
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Security Code (CVV)</label>
                                <input class="form-control" placeholder="Enter your cvv number" type="" name="">
                            </div>
                        </div>
                    </div>
                </div>       
		    </div>
	    </b-modal>
	</div>
</template>

<script>

export default {

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