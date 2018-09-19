<template>
    <div class="discussion-panel">
        <div class="panel-heading">
            <span class="chat-profile-pic" v-bind:style="{'background-image': 'url('+ getImage(getSenderImage) +')',}"></span>
            <span class="chat-head-heading">{{getSenderName}}
                <span class="status online">Available online</span>
            </span>
            <i class="icon-close2 close-icon" @click="$emit('closeChat')"></i>
        </div>
        <div class="discussion-content scrollbar style-2" ref="scrollWrapper" infinite-wrapper>
            <infinite-loading @infinite="infiniteHandler" spinner="waveDots" direction="top" ref="infiniteLoading"></infinite-loading>
            <b-list-group>
                <div class="chat-message" v-for="message in messages">
                    <b-list-group-item>
                        <span class="chat-profile-pic"  :style="{'background-image': 'url(' + getImage(message.user.profileImage) + ')'}"></span>
                        <div class="profile-message">
                            <p>{{message.text}}</p>
                            <span class="chat-last-seen">{{message.formatted_created_at}}</span>
                        </div>
                    </b-list-group-item>
                </div>
            </b-list-group>
        </div>
        <div class="panel-footer">
            <textarea class="form-control scroll" placeholder="Start typing your message" @keyup.enter.exact="onSubmit" v-model="text"></textarea>
            <span class="icon-circle secondary-color" @click.prevent="onSubmit"><i class="icon-send"></i></span>
        </div>
    </div>
</template>

<script>
    import InfiniteLoading from 'vue-infinite-loading';
    export default{
        components : {
            InfiniteLoading
        },
        props: ['jobMessageData', 'show'],
        data () {
            return{
                url: null,
                messages: [],
                text: '',
                pagination : false,
                height: 0,
                showNoRecordFound: false,
                senderImage: ''
            }
        },
        created() {
        },
        methods: {
            getList(data , page , successCallback){
                let self = this;
                self.showNoRecordFound = false;
                let url = self.url;

                if(typeof(url) == 'undefined'){
                    return false;
                }

                let result = {
                    data : [],
                    noRecordFound : false
                };

                url = self.url;
                if(typeof(page) !== 'undefined' && page){
                    url += '&page='+page;   
                }

                 self.$http.get(url).then(response=>{

                    response = response.data.response;
                    let result = {
                        data : response.data,
                        noRecordFound : false,
                        pagination : response.pagination

                    };

                    if(!response.data.length){
                        result.noRecordFound = true;
                    }
                    self.getMessages(result);

                    self.pagination = response.pagination;

                    self.loading = false;

                    if(typeof successCallback !== 'undefined'){
                        successCallback(true);
                    }


                }).catch(error=>{
                    self.loading = false;
                    console.log(error , 'exceptional handling error in generalize CommonMethods.vue@getList');
                });

            },
            infiniteHandler($state) {
                let self = this;
                this.height = this.$refs.scrollWrapper.scrollHeight;
                let data = this.jobMessageData;
                if(!self.pagination){
                    self.getList(data , false ,  function (response) {
                        setTimeout(function () {
                            $state.loaded();
                        } , 2000);
                    });

                }else{

                    if(self.pagination && self.pagination.current != self.pagination.next){

                        self.getList(data , self.pagination.next , function (response) {

                            setTimeout(function () {
                                $state.loaded();
                            } , 2000);

                        });

                    }else{
                        $state.complete();
                        setTimeout(function () {
                            $state.reset();
                        }, 3000);
                    }

                }

            },
            getImage(img) {
                return img? img : 'images/dummy/image-placeholder.jpg';
            },
            getMessages(response) {
                let self = this;
                self.loading = false;
                let len = response.data.length;
                for (var i = 0 ; i < len; i++) {
                    self.messages.unshift( response.data[i] );
                }
                self.noRecordFound = response.noRecordFound;
                self.pagination = response.pagination;
            },
            onSubmit() {
                if(this.text.trim() != null && this.text.trim() != "" && (this.text.charCodeAt(0) != 10 || this.text.trim().length > 0)){
                    var self = this;
                    this.loading = true;
                    let url = 'api/job-message';//this.url;
                    let data = this.jobMessageData;

                    let tempQuery = this.text.replace(/\n/g, "\r\n");
                    data.text = this.text;
                    this.text = "";
                    this.$http.post(url, data).then(response => {
                        response = response.data.response;
                        self.successMessage = response.message;
                        self.messages.push(response.data);
                    }).catch(error => {
                        error = error.response.data;
                        let errors = error.errors;
                    });
                }
                
            },
            showChatBox() {
                console.log(this.jobMessageData, 33333);
                this.url = 'api/job-message?pagination=true&job_id=' + this.jobMessageData.job_id + '&job_bid_id=' + this.jobMessageData.job_bid_id;
                let data = this.jobMessageData;
                data.pagination = true;
                this.getList(data, false);
                this.subscribeChannel();
            },
            subscribeChannel() {
                let self = this;
                let channelName = 'Job-Messages.' + this.jobMessageData.job_id + '.' + this.jobMessageData.job_bid_id;
                console.log(channelName, 88990099);
                window.Echo.private(channelName).listen('.App\\Events\\UserMessaged', (e) => {
                    self.messages.push(e.discussion);
                   console.log(e.discussion);
                });
            },
            hideChatBox() {
                this.$emit('closeChat');
            }
        },
        computed: {
            getSenderImage() {
                if(this.senderImage) {
                    return this.senderImage;
                }
                if(typeof(this.jobMessageData.sender_detail) != "undefined") {
                    return this.jobMessageData.sender_detail.user_detail.profileImage;
                }
                return null;
            },
            getSenderName() {
                if(typeof(this.jobMessageData.business_name) != "undefined") {
                    return this.jobMessageData.business_name.business_name;
                }
                return null;
            }
        },  
        watch: {
            show(value) {
                if(value) {
                    this.showChatBox();
                }
                if(!value) {
                    this.hideChatBox();
                }
            },
            height: function(newVal,oldVal){
                var diff = newVal - oldVal;
                this.$refs.scrollWrapper.scrollTop = diff

            }
        }
    }
</script>