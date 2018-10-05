<template>



    <div>

        <b-form-file @change="onFileChange" :state="isFileUpload" v-model="file" ref="fileinput" 
        :accept="acceptedFiles"
        placeholder="Choose a file..."
        name="upload image" 
        :class="['form-control','file-upload-input', 'form-group']">
        </b-form-file>

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
        'currentRecord'
        
        ],

        data(){
            return {
                acceptedFiles : '.jpg, .png, .gif',
                file : '',
                isFileUpload : false,
                fileUploadKey : 'user',
            }
        },
        methods : {
            onFileChange(e) {
                var supportedType = [
                '.jpg',
                '.png',
                '.gif',
                '.pdf',
                '.doc',
                '.docx',
                '.xls',
                '.xlsx'                
                ];
                
                var files = e.target.files || e.dataTransfer.files;
                this.errorMessage = "";
                if(!supportedType.includes(files[0].type)) {
                    this.errorBag.add({
                      field: 'upload image',
                      msg: 'The file must be an image.',
                      rule: 'image',
                      id: 6,
                  });
                    this.errorMessage = this.errorBag.all()[0];
                    self.isFileUpload = false;
                    return;
                }
                this.errorBag.clear();
                this.isFileUpload = null;
                if (!files.length)
                    return;
                this.createImage(files[0]);

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

                this.$http.post(url, data).then(response => {
                    response = response.data;
                    self.$emit('get-response', response);
                }).catch(error => {
                    error = error.response.data;
                    let errors = error.errors;
                    self.isFileUpload = false;
                    _.forEach(errors, function(value, key) {
                        self.errorMessage =  errors[key][0];
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