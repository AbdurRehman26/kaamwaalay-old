<template>
    <div>
        <div class="notification-block" v-show="true">
            <div class="notify-dropdown scrollbar" id="style-2">
                <ul>
                    <li class="notify-list" v-for='notification in notificationData'>
                        <div class="notify-image">
                            <img :src="notification.data.image" alt="">
                        </div>
                        <div class="right-notification">
                            <div class="notification-content">
                                <p>
                                    <strong>{{notification.data.text}}</strong>
                                </p>
                                <p class="notification-limit">
                                    <span><router-link :to="{name: notification.data.route , params : { id : notification.data.id }}">{{notification.data.link_text}}</router-link></span>

                                    <span>{{notification.created_at | formatDate}}</span>
                                </p>
                            </div>
                        </div>
                    </li>
                  <!--   <li class="notify-list">
                        <div class="notify-image">
                            <img src="images/front/explore/carpenter1.jpg" alt="">
                        </div>
                        <div class="right-notification">
                            <div class="notification-content">
                                <p>
                                    <strong>Christopher Ward Joinery Services</strong> posted a bid on
                                    <strong>Concrete Floor Building</strong>
                                </p>
                                <p class="notification-limit">
                                    <span><a href="javascript:;" @click="$emit('ReviewWrite')">Write Review </a></span>
                                    <span>10 Jan, 2018 at 10:45 am</span>
                                </p>
                            </div>
                        </div>
                    </li> -->
                </ul>
                
            </div>        
        </div>
        
    </div>
</template>    


   <script>
        export default{
            props: ['show'],
            data () {
              return {
                writereview: false,
                notificationCount : 0,
                notificationData : [],
                 pagination : false,
                height: 0,
                showNoRecordFound: false,
                senderImage: '',
                errorMessage: false,
                isOnline: false,
            }
        },
        mounted(){
            //this.subscribeChannel()
            this.show = true
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
                    self.getData(result);

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
            getData(response) {
                let self = this;
                self.notificationData =[]
                self.loading = false;
                let len = response.data.length;
                for (var i = 0 ; i < len; i++) {
                    self.notificationData.unshift( response.data[i] );
                }
                self.notificationCount = len
                self.$parent.notificationCount = self.notificationCount
                self.noRecordFound = response.noRecordFound;
                self.pagination = response.pagination;
            },
            WriteReviewModal(){
                this.writereview = true;
            },
            HideModal(){
                this.writereview = false;
            },
            showNotificaton() {
                self = this
                this.url = 'api/user/get-notification';
                let data = this.notificationData;
                this.subscribeChannel()
                 setTimeout(function () {
                         data.pagination = true;
                         self.getList(data, false);
                    }, 3000);
            },
            subscribeChannel() {
                let channelName = 'urgent-job-user.'+this.$parent.userDetails.id;
                self = this
                window.Echo.private(channelName).listen('.App\\Events\\UrgentJobCreated', (e) => {
                   self.showNotificaton(); 
                });
            },

        },
         watch: {
            show(value) {
                if(value) {
                    this.showNotificaton();
                }
               /* if(!value) {
                    this.hideChatBox();
                }*/
            },
        }

    }
</script>