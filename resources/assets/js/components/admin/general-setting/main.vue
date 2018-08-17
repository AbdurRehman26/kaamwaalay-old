<template>
	<div class="panel-inner">
		<div class="row">

			<div class="col-md-12">
				<div class="general-setting">

	        	<!-- Featured Row -->

				<div class="featured-row">
					<div class="row">
						<div class="col-md-12">
							<div class="featured-detail-title">
								<h2 class="page-title">Featured Profile</h2>
							</div>
						</div>
					</div>

					<div class="row featured-setting">
                        <div class="col-xs-12 col-md-4">
                            <label>Featured Amount</label>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <label>Featured Quantity</label>
                        </div>
                        <div class="col-xs-12 col-md-8 featured-setting-row">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Enter featured amount">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Enter featured quantity">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-8 featured-setting-row">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Enter featured amount">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Enter featured quantity">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:;" class="addmore-text">+ Add more</a>
                    </div>


					<div class="row">
							<div class="col-xs-12 col-md-3">
                                <button class="btn btn-primary">
                                    <span>Apply</span>
                                    <loader></loader>
                                </button>
                            </div>
					</div>
				</div>
				<!-- Featured Row End -->

	        	<!-- Urgent Row -->
					<div class="urgent-section-row">
						<div class="row">
							<div class="col-md-12">
								<div class="urgent-detail-title">
									<h2 class="page-title">Urgent</h2>
								</div>
							</div>
						</div>

						<div class="row urgent-setting">
							<div class="col-md-4">
								<div class="form-group">
									<label>Urgent Amount</label>
									<input class="form-control" placeholder="Enter urgent amount">
								</div>
							</div>

						</div>

						<div class="row">
							<div class="col-xs-12 col-md-3">
                                <button class="btn btn-primary">
                                    <span>Apply</span>
                                    <loader></loader>
                                </button>
                            </div>
						</div>
					</div>
    					<!-- Urgent Row End -->

    					<!-- Location Row -->

<!-- 						<div class="row">
							<div class="col-md-12">
								<div class="urgent-detail-title">
									<h2 class="page-title">Location Management</h2>
								</div>
							</div>
						</div>

						<div class="row urgent-setting">
							<div class="col-md-4">
								<div class="form-group">
									<label>State</label>
									<select class="form-control">
										<option>CA</option>
										<option>South America</option>
										<option>North America</option>
										<option>Houston</option>
									</select>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label>City</label>
									<multiselect
									      v-model="value"
									      :options="options"
									      :multiple="true"
									      :close-on-select="false"
									      :clear-on-select="false"
									      :hide-selected="true"
									      :preserve-search="true"
									      placeholder="Pick some"
									      label="name"
									      track-by="name"
									      :preselect-first="true">

								    <template slot="tag" slot-scope="props">
								    	<span class="custom__tag">
								    		<span>{{ props.option.language }}</span>
								    			<span class="custom__remove" @click="props.remove(props.option)"></span>
								    		</span>
								    </template>

								  </multiselect>
								</div>
							</div>

						</div>

						<div class="row">
							<div class="col-xs-12 col-md-3">
                                <button class="btn btn-primary">
                                    <span>Apply</span>
                                    <loader></loader>
                                </button>
                            </div>
						</div> -->

    					<!-- Location Row End -->

					</div>

		  		</div>
		    </div>

	</div>
</template>

<script>
import Multiselect from 'vue-multiselect';
export default {
  data () {
    return {
		value: [],
		options: [
		    { name: 'New York', language: 'New York' },
		    { name: 'Los Angeles', language: 'Los Angeles' },
		    { name: 'Chicago', language: 'Chicago' },
		    { name: 'Houston', language: 'Houston' },
		    { name: 'Phoenix', language: 'Phoenix' },
		    { name: 'San Antonio', language: 'San Antonio' }
	    ],
    	}
  	},

  	components: {
  	 	Multiselect
  	},

    methods: {

    }
}
</script>
