<template>
    <div class="discussion-panel">
        <div class="panel-heading">
            <span class="chat-profile-pic" style="background-image: url('images/dummy/electrician.jpg');"></span>
            <span class="chat-head-heading">C&N Home Solutions
                <span class="status online">Available online</span>
            </span>
            <i class="icon-close2 close-icon" @click="$emit('CloseDiscussion')"></i>
        </div>
        <div class="discussion-content scrollbar style-2" ref="scrollWrapper" infinite-wrapper>
            <infinite-loading @infinite="infiniteHandler" spinner="waveDots" direction="top" ref="infiniteLoading"></infinite-loading>
            <b-list-group>
                <div class="chat-message" v-for="message in messages">
                    <b-list-group-item>
                        <span class="chat-profile-pic"  :style="{'background-image': 'url(' + getImage(message.user.profile_image) + ')'}"></span>
                        <div class="profile-message">
<!--                             <h5>{{person.name}} <span class="time-date"><i>May 10,</i> 1:12 PM</span></h5> -->
                            <p>{{message.text}}</p>
                            <span class="chat-last-seen">{{message.formatted_created_at}}</span>
                        </div>
                    </b-list-group-item>
                </div>
            </b-list-group>
            <!-- <vue-common-methods :url="url" :infiniteLoad="true" @get-records="getMessages"></vue-common-methods> -->
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
            }
        },
        created() {
            // window.Echo.private('Discussion-Dashboard-Report.'+worspaces[i].id).listen('.Dms\\Events\\UserDiscussed', e => {
            //     var obj = {
            //         data: {
            //             notification_details: e.discussion,
            //         },
            //     };
            //     obj.data.notification_details.fromUser = e.discussion.user;
            //     self.notifications.unshift(obj);
            //     var count = e.discussion.notification_count;
            //     self.$emit('setNotificationCount', count);
            // });
            window.Echo.channel('hello').listen('App\\Events\\UserMessaged', (e) => {
               alert();
               console.log(e);
            });

            // setTimeout(function() {
            //     window.Echo.leave('hello');
            // }, 10000);
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
                console.log(url, 12321);
                if(typeof(page) !== 'undefined' && page){
                    url += '&page='+page;   
                }

                 self.$http.get(url).then(response=>{

                    response = response.data.response;
                    console.log(response.pagination, 2222222222);
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
                console.log(response, 99999);
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
                        // setTimeout(function () {
                        //     self.successMessage = '';
                        //     self.loading = false; 
                        //     self.hideModal();  
                        //     self.resetFormFields(); 
                        //     self.$emit('call-list');         
                        // } , 2000);

                        // setTimeout(function () {
                        //     Vue.nextTick(() => {
                        //         self.errorBag.clear()
                        //     })
                        // }, 10);
                        // self.getAllServices();

                    }).catch(error => {
                        error = error.response.data;
                        let errors = error.errors;
                        // _.forEach(errors, function(value, key) {
                        //     if(key == "title") {
                        //         self.errorMessage =  "The Service Name has alreary been taken.";    
                        //         return false;
                        //     }
                        //     self.errorMessage =  errors[key][0];
                        //     return false;
                        // });
                        // this.loading = false;
                    });
                }
                
            },
            showChatBox() {
                this.url = 'api/job-message?pagination=true&job_id=' + this.jobMessageData.job_id + '&job_bid_id=' + this.jobMessageData.job_bid_id;
                let data = this.jobMessageData;
                data.pagination = true;
                this.getList(data, false);
            },
            hideChatBox() {
                this.$emit('closeChat');
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