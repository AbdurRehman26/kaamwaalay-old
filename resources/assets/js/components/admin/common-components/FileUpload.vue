<template>



    <div  :class="[isUploading ? 'small-loader-browser' : '' ]">

        <b-form-file @change="onFileChange" :state="isFileUpload" v-model="file" ref="fileinput" 
        :accept="acceptedFiles"
        placeholder="Choose a file..."
        name="upload image" 
        :multiple="multiple"
        :class="['form-control','file-upload-input', 'form-group']">
    </b-form-file>

    <block-spinner v-if="isUploading"></block-spinner>

    <!-- <alert v-if="errorMessage" :errorMessage="errorMessage"></alert>         -->

</div>


</template>    

<script type="text/javascript">

    // uploadKey determines the folder name 

    export default{
        mounted (){
            this.file = this.currentRecord;
            this.acceptedFiles = this.fileExtensions ? this.fileExtensions : this.acceptedFiles;
        },
        
        props : [
        
        'uploadKey',
        'fileExtensions',
        'currentRecord',
        'multiple',
        'hideLoader'

        ],

        data(){
            return {
                errorMessage : '',
                acceptedFiles : '.png, .jpg, .jpeg',
                file : '',
                isFileUpload : false,
                fileUploadKey : 'user',
                isUploading : false,
            }
        },
        methods : {
            onFileChange(e) {
                var supportedType = [
                'png',
                'jpg',
                'jpeg',
                'pdf',
                'xlsx',
                'xls',
                'doc',
                'docx'
                ];
                var files = e.target.files || e.dataTransfer.files;

                this.errorMessage = "";

                if (!files.length){
                    return;
                }

                for (var i = files.length - 1; i >= 0; i--) {
                    if(files[i]){             
                        if(supportedType.includes(files[i].name.split('.').pop())) {
                         this.errorBag.clear();
                         this.isFileUpload = null;
                         this.createImage(files[i]);
                     }
                 }


             }

         },
         createImage(file) {
            var self = this;    
            var image = new Image();
            var reader = new FileReader();
            reader.onload = (e) => {
                self.image = e.target.result;
            };
            reader.readAsDataURL(file);
            this.onUpload(file);
        },
        onUpload(file) {
            var self = this;
            let url = "api/file/upload";

            if(this.uploadKey){
                this.fileUploadKey = this.uploadKey;
            }

            var data = new FormData;
            data.append('key', this.fileUploadKey);
            data.append('file', file);

            if(!this.hideLoader){
                this.isUploading = true;
            }

            // had to use JQUERY since couldnt find a solution for uploading the same file twice 
            // :'(


            this.$http.post(url, data).then(response => {

                response = response.data;
                this.isUploading = false;

                self.$emit('get-response', response);


            }).catch(error => {
                error = error.response.data;
                let errors = error.errors;
                self.isUploading = false;
                self.isFileUpload = false;
                _.forEach(errors, function(value, key) {
                    self.errorMessage =  errors[key][0];
                    setTimeout(function(){
                        // self.errorMessage = '';
                    }, 2000);

                    return false;
                });
            });
        },

    },
    watch : {
        currentRecord(value){
        },
        fileExtensions(value){
            if(value){
                this.acceptedFiles = value;
            }
        }
    }
}

</script>