<template>
    <div>
        <div class="notification-block" v-show="true">
            <div class="notify-dropdown scrollbar" id="style-2">
                <ul v-show="!noRecordFound">
                    <li class="notify-list" v-for='notification in notificationData'>
                     <!--    <div v-if="notification.data.image" class="notify-image">
                            <img :src="notification.data.image" alt="">
                        </div> -->
                        <div class="right-notification">
                            <div class="notification-content">
                                <p v-html="notification.data.text">
                                </p>
                                <p :class="{'notification-limit': notification.data.route}">
                                    <span v-show="notification.data.route">
                                        <a v-show="!notification.data.object_id" :href="$router.resolve({name: notification.data.route , params : { id : notification.data.id }}).href">{{notification.data.link_text}}</a>
                                        <a v-show="notification.data.object_id" :href="$router.resolve({name: notification.data.route , params : { id : notification.data.id ,jobBidId : notification.data.object_id}}).href">{{notification.data.link_text}}</a>
                                    </span>
                                    <span>{{notification.created_at | formatDateTimeUTC}}</span>
                                </p>
                            </div>
                        </div>
                    </li>  

                </ul>
                <vue-common-methods :infiniteLoad="infiniteLoad" :url="requestUrl" @get-records="getNotificationRecords"></vue-common-methods>
                <div v-show="noRecordFound" class="no-notification-found">
                    No new notification 
                </div>
            </div>  
        </div>
    </div>
</template>    


<script>
    export default{
        props: [
        'isShowTab'
        ],
        data () {
            return {
                notificationCount : 0,
                notificationData : [],
                pagination : false,
                noRecordFound: false,
                page : 0,
                loading : false,
                url : 'api/user/notification?pagination=true',
                infiniteLoad : false,
                show: false,
            }
        },
        computed : {
            requestUrl(){
                return this.url;
            },
        },
        mounted(){
            self = this
            this.show = true;
            setTimeout(function(){
                 self.subscribeChannel();
            }, 3000);      
        },
        methods: {
            getNotificationRecords(response){
                    self = this
                    this.infiniteLoad = true;
                    _.forEach(response.data, function(value, key) {
                        self.notificationData.push(value);
                    })
                    this.notificationCount = response.unread_count ? response.unread_count : "";
                    this.$parent.notificationCount = this.notificationCount;
                    this.noRecordFound = response.noRecordFound
            },
            subscribeChannel() {
                let channelName = 'App.Data.Models.User.'+this.$parent.userDetails.id;
                self = this
                window.Echo.leave(channelName);
                window.Echo.private(channelName).notification((notification) => {
                    self.noRecordFound = false
                    self.notificationData.unshift(notification);
                    self.notificationCount = 1+self.notificationCount;
                    self.$parent.notificationCount = self.notificationCount;
                });
            },
            markRead() {
                let self = this;
                self.loading = true;

                let url = 'api/user/mark-read-notification';

                let urlRequest = self.$http.post(url)

                urlRequest.then(response => {

                }).catch(error => {

                });
            },
        },
         watch:{
            isShowTab(val){
                if(val == 1){
                    this.markRead();
                    this.notificationCount = 0;
                    this.$parent.notificationCount = "";
                }
            },
        }

    }
</script>