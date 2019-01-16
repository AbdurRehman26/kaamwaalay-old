<template>	
	<div>
		<b-modal id="job-proof" class="no-footer" centered  hide-footer @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Attach Images" ok-only ok-title="Submit">
        <alert style="display: none;"></alert>
		    <div>
            <div class="note-label">
            <label>Please Attach images as a proof that the job has been completed</label>
            </div>
            <div class="image-upload">
                <div class="image-uploading-btn">
                    <ul>
                        <li>
                            <a href="javascript:void();">
                                <i class="capture-image-icon"></i>
                            </a>
                        </li>
                        <li>
                            <div class="uploadattached">
                               <div class="browse-btn">
                                    <div class="form-group">
                                        <label class="file-upload-label"><i class="upload-image-icon"></i></label>
                                        <file-upload-component :hideLoader="true" @get-response="getFileUploadResponse">
                                        </file-upload-component>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="content-image-attached">
                    <div class="images-added">
                        <div class="imagegallery">
                            <img class="image" v-for="(image, i) in images" :src="image" @click="onClickImage(i)">
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
        data() {
            return {
                job_proof: 'capture_image',
                images: [
                  'https://placekitten.com/801/800',
                  'https://placekitten.com/802/800',
                  'https://placekitten.com/803/800',
                  'https://placekitten.com/804/800',
                ],                
            }
        },    
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
        onClickImage(i) {
            this.index = i;
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