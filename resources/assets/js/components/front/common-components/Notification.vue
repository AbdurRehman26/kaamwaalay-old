<template>
    <div>
        <div class="notification-block" v-show="true">
            <div class="notify-dropdown scrollbar" id="style-2">
                <ul>
                    <li class="notify-list" v-for='notification in notificationData'>
                        <div class="notify-image">
                            <img src="images/front/profile-images/personimage6.png" alt="">
                        </div>
                        <div class="right-notification">
                            <div class="notification-content">
                                <p>
                                    <strong>{{notification}}
                                   </strong>
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
            props: ['notificationData', 'show'],
            data () {
              return {
                writereview: false,
                notificationCount : 0
            }
        },
        mounted(){
            //this.subscribeChannel()
            this.show = true
        },
        methods: {
            WriteReviewModal(){
                this.writereview = true;
            },
            HideModal(){
                this.writereview = false;
            },
            showNotificaton() {
                this.url = 'api/notification?pagination=true';
                let data = this.notificationData;
                //data.pagination = true;
                //this.getList(data, false);
                this.subscribeChannel();
            },
            subscribeChannel() {
                let channelName = 'urgent-job';
                self = this
                let roleId = 2
                window.Echo.private(channelName+roleId).listen('urgent-job-create', (e) => {
                   alert('ppppppp');
                   console.log(e.data);
                   self.notificationData = e.data
                   self.notificationCount = notificationCount+1
                   self.$emit('notificationCount',notificationCount)
                });
            },

        },
         watch: {
            show(value) {
                if(value) {
                    alert('showNotificaton')
                    this.showNotificaton();
                }
               /* if(!value) {
                    this.hideChatBox();
                }*/
            },
        }

    }
</script>