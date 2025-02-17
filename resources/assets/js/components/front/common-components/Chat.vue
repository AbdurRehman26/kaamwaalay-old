<template>
    <div class="discussion-panel">
        <div class="alert-indicator" v-show="errorMessage">
            <div class="alert alert-danger">
                <i class="icon-alert"></i>
                <p>You are not allowed to send contact details and personal information.</p>
            </div>
        </div>         
        <div class="panel-heading">
            <span class="chat-profile-pic" v-bind:style="{'background-image': 'url('+ getImage(getSenderImage) +')',}"></span>
            <span class="chat-head-heading">{{getSenderName}}
                <!-- <span class="status online" v-if="isOnline" v-show="!disabledChat">Available online</span>
                <span class="status offline" v-else v-show="!disabledChat">Not available offline</span> -->
            </span>
            <i class="icon-close2 close-icon" @click="$emit('closeChat')"></i>
        </div>
        <div class="discussion-content scrollbar style-2" ref="scrollWrapper" infinite-wrapper>
            <infinite-loading @infinite="infiniteHandler" spinner="waveDots" direction="top" ref="infiniteLoading"></infinite-loading>
            <b-list-group>
                <div class="chat-message" v-for="message in messages">
                    <b-list-group-item>
                        <span class="chat-profile-pic"  :style="{'background-image': 'url(' + getImage(message.user.profileImage) + ')'}"></span>
                        <div class="profile-message" :class="[checkCurrentUser(message)? 'bg-light-custom' : '']">
                            <p>{{message.text}}</p>
                            <span class="chat-last-seen">{{getFormattedDateTime(message.updated_at.date)}}</span>
                        </div>
                    </b-list-group-item>
                </div>
<!--                 <b-list-group-item v-show="errorMessage">
                    <div class="alert alert-danger" style="font-size: 12px;">
                        <i class="icon-alert" style="font-size: 24px;"></i>
                        <p>You are not allowed to send contact details and personal information.</p>
                    </div>
                </b-list-group-item> -->               
            </b-list-group>
        </div>
        <div class="panel-footer">
                <b-list-group-item v-if="errorMessage" class="no-chat">
                    <div class="alert alert-danger">
                        <i class="icon-alert"></i>
                        <p>You are not allowed to send contact details and personal information.</p>
                    </div>
                </b-list-group-item>
                <b-list-group-item v-if="disabledChat" class="no-chat">
                    <div class="alert alert-secondary">
                        <p>Chat is Closed.</p>
                    </div>
                </b-list-group-item>
            </b-list-group>
        </div>
        <div :class="[disabledChat? 'disabled' : '', 'panel-footer']">
            <textarea class="form-control scroll" placeholder="Start typing your message" @keyup.enter.exact="validateBeforeSubmit" v-model="text"></textarea>
            <span class="icon-circle secondary-color" @click.prevent="validateBeforeSubmit"><i class="icon-send"></i></span>
        </div>
    </div>
</template>

<script>
    import InfiniteLoading from 'vue-infinite-loading';
    export default{
        components : {
            InfiniteLoading
        },
        props: ['messageData', 'show', 'strict', 'disabled'],
        data () {
            return{
                url: null,
                messages: [],
                text: '',
                pagination : false,
                height: 0,
                showNoRecordFound: false,
                senderImage: '',
                errorMessage: false,
                isOnline: false,
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
                var after = ((self.messages.length > 0)? self.messages[0].id : 0);
                url += '&after=' + after;
                 self.$http.get(url).then(response=>{

                    response = response.data;
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
                    self.scrollToEnd();
                    if(typeof successCallback !== 'undefined'){
                        successCallback(true);
                    }


                }).catch(error=>{
                    self.loading = false;
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
            validateBeforeSubmit() {
                let message = this.text;
                if(this.strict) {
                    let digitRegex = /(<!\d)?\d{5,}(!\d)?/g;
                    let emailRegex = /\S+@\S+\.\S+/ig;
                    let urlRegex =/(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
                    let generalRegex = /((house)|(flat)|(society)|(appartment)|(block)|(road)|(home))/ig;

                    let containsDigits = digitRegex.test(message);
                    let containsEmail = emailRegex.test(message);
                    let containsGeneral = generalRegex.test(message);
                    let containsUrl = urlRegex.test(message);
                    if(containsDigits || containsEmail || containsGeneral || containsUrl) {
                        this.errorMessage = true;
                        setTimeout((e) => {
                            this.errorMessage = false;
                        }, 3000);
                        return;
                    }

                }
                this.errorMessage = false;
                this.onSubmit();
            },
            onSubmit() {
                if(this.text.trim() != null && this.text.trim() != "" && (this.text.charCodeAt(0) != 10 || this.text.trim().length > 0)){
                    var self = this;
                    this.loading = true;
                    let url = 'api/job-message';//this.url;
                    let data = this.jobMessageData;
                    let tempQuery = this.text.replace(/\n/g, "\r\n");
                    data.text = this.text;
                    let tempText = self.text;
                    self.text = "";

                    if(this.strict) {
                        url = url + '?strict_chat=true';
                    }
                    this.$http.post(url, data).then(response => {
                        response = response.data;
                        if(response.data == "error") {
                            self.errorMessage = true;
                            setTimeout((e) => {
                                self.errorMessage = false;
                            }, 3000);
                            self.text = tempText;
                            return;
                        }
                        self.scrollToEnd();
                        self.successMessage = response.message;

                        self.messages.push(response.data);
                    }).catch(error => {
                        error = error.response.data;
                        let errors = error.errors;
                    });
                }else {
                    this.text = "";
                }
                
            },
            checkCurrentUser(message) {
                let currentUser = JSON.parse(this.$store.getters.getAuthUser);
                return currentUser.id == message.user.id;
            },
            getFormattedDateTime(date) {
                return moment.utc(date).local().format('MMM Do, YYYY, h:mm a');
            },
            showChatBox() {
                
                this.url = 'api/job-message?pagination=true&job_id=' + this.jobMessageData.job_id + '&job_bid_id=' + this.jobMessageData.job_bid_id;
                let data = this.jobMessageData;
                data.pagination = true;
                this.getList(data, false);
            },
            scrollToEnd() {
                let self = this;
                setTimeout(function(){
                    self.$refs.scrollWrapper.scrollTop = self.$refs.scrollWrapper.scrollHeight;
                }, 500);
            },
        },
        computed: {
            disabledChat() {
                return typeof(this.disabled) == "undefined"? false : this.disabled;
            },
            jobMessageData() {
                if(typeof(this.messageData) != "undefined") {
                    return this.messageData;
                }
            },
            getSenderImage() {
                if(this.senderImage) {
                    return this.senderImage;
                }
                if(typeof(this.jobMessageData) != "undefined" && typeof(this.jobMessageData.sender_detail) != "undefined" ) {
                    return this.jobMessageData.sender_detail.profileImage;
                }
                return null;
            },
            getSenderName() {
                if(typeof(this.jobMessageData) != "undefined") {
                    return this.jobMessageData.business_name;
                }
                return null;
            }
        },  
        watch: {
            height(newVal,oldVal){
                var diff = newVal - oldVal;
                this.$refs.scrollWrapper.scrollTop = diff

            },
            messageData(val) {
                this.messageData = val;
                if(this.show) {
                    this.messages = [];
                    this.text = "";
                    this.showChatBox();
                }
            },
        }
    }
</script>