<template>	
	<div>
		<b-modal id="job-proof" class="no-footer" centered  hide-footer @hidden="onHidden" title-tag="h4" ok-variant="primary" ref="myModalRef" size="sm" title="Attach Images" ok-only ok-title="Submit">
        <alert style="display: none;"></alert>
		    <div>
            <div class="note-label">
            <label>Please Attach images as a proof that the job has been completed</label>
            </div>
            <div class="image-upload">

                <!-- <web-cam v-if="showModalProp"></web-cam> -->
                <div class="image-uploading-btn">
                    <ul>
                        <!-- <li>
                            <a href="javascript:void(0);">
                                <i class="capture-image-icon"></i>
                            </a>
                        </li> -->
                        <li>
                            <div class="uploadattached">
                               <div class="browse-btn">
                                    <div class="form-group">
                                        <label class="file-upload-label">
                                            <!-- <i class="upload-image-icon"></i> -->
                                            Upload Images
                                        </label>
                                        <file-upload-component :class="[jobImages && jobImages.lenght > 3 ? 'disabled' : '']" :multiple="true" @get-response="getResponse($event)" :uploadKey="'job_done'" :limit="(jobImages) ? jobImages.length : 0" fixedLimit="3" ></file-upload-component>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="content-image-attached">
                    <div class="images-added">
                        <div class="imagegallery">
                            <div class="image-upload-block" v-for="(image, i) in listJobImages">
                                <img class="image" :src="image.upload_url" :alt="image.name" @click="onClickImage(i)">
                                <!-- <button type="button" class="btn btn-primary btn-xs">delete</button> -->
                                <i class="icon-close2" @click="onDeleteImage(i)"></i>
                            </div>

                         </div>                            
                    </div>     
                </div>

                <div class="verification-prove-submittion" v-if="listJobImages.length">
                    <button type="button" class="btn btn-primary btn-xs">Submit</button>
                </div>
                <div class="alert-line">
                    <p><strong>Note: </strong>Please make sure the funds are transferred to you.</p>
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
                jobImages: [],
                listJobImages: [],
                img: null,
                camera: null,
                deviceId: null,
                devices: []
            }
        },    
	    methods: {
            onDeleteImage(i) {
                this.listJobImages.splice(i, 1);
                this.jobImages.splice(i, 1);
            },
            getResponse($event){
                console.log($event, 88889999);
                var image = {
                        name : $event.name,
                        original_name : $event.original_name
                    };
                this.listJobImages.push({
                    upload_url: $event.upload_url,
                    name: $event.name
                });
                this.jobImages.push(image);
            },
            getFileUploadResponse() {

            },
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
        computed: {

        },
   watch:{
        showModalProp(value){

            if(value){
                this.showModal();
            }
            if(!value){
                this.hideModal();
            }

        },
        
    },   
}

</script>