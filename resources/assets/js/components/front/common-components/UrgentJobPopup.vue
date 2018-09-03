<template>	
	<div>
		<b-modal id="urgent-job" centered @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Urgent/Featured Job" ok-only ok-title="Submit">
        <alert></alert>
		    <div>

                <b-row class="justify-content-md-center">
                    <b-col md="12">
                        <div class="form-group">
                            <label>Card Holder Name</label>
                            <input type="name" class="form-control" placeholder="Enter card holder name" name="">
                        </div>
                    </b-col>
                        <div class="col-md-12">
                            <label for="">Expiry Date</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group custom-datepicker">
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
                                <div class="col-md-6">
                                    <div class="form-group custom-datepicker">
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
                        </div>                     
                </b-row>           
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