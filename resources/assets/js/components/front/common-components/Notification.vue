<template>
    <div>
        <div class="notification-block" v-show="true">
            <div class="notify-dropdown scrollbar" id="style-2">
                <ul>
                    <li class="notify-list" v-for='notification in notifications'>
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
            data () {
              return {
                writereview: false,
                notifications: [],
                notificationCount : 0
            }
        },
        mounted(){
            let self = this
            window.Echo.channel('urgent-job')
               .listen('urgent-job-create', (e) => {
                self.notificationCount++;
                self.$parent.notificationCount == self.notificationCount;
                self.notifications.push = e.data
                console.log(e.data,'dataaa')
            });
        },
        methods: {
            WriteReviewModal(){
                this.writereview = true;
            },
            HideModal(){
                this.writereview = false;
            }

        }
    }
</script>