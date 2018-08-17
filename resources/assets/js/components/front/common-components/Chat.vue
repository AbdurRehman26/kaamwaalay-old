<template>
    <div class="discussion-panel">
        <div class="panel-heading">
            <h3>Discussion</h3>
            <i class="icon-close2 close-icon" @click="$emit('CloseDiscussion')"></i>
        </div>
        <div class="discussion-content scrollbar style-2">
            <b-list-group>
                <div class="chat-message" v-for="person in persons">
                <b-list-group-item>
                    <span class="profile-pics"  :style="{'background-image': 'url(' + profileImage + ')'}"></span>
                    <div class="profile-message">
                        <h5>{{person.name}} <span class="time-date"><i>May 10,</i> 1:12 PM</span></h5>
                        <p>{{person.desc}}</p>
                    </div>
                </b-list-group-item>
                </div>

                <div class="section-separator">
                    <span>Today</span>
                </div>
                <div class="today-message">
                    <div class="chat-message" v-for="person in persons">
                        <b-list-group-item>
                            <span class="profile-pics"  :style="{'background-image': 'url(' + profileImage + ')'}"></span>
                            <div class="profile-message">
                                <h5>Ammara Hussain <span class="time-date"><i>May 10,</i> 1:12 PM</span></h5>
                                <p>
                                   Before I begin the report, I'd like to get some ideas from you all. How do you feel about rural sales in your sales districts? I suggest we go round the table first to get all of your input.
                                </p>
                            </div>
                        </b-list-group-item>
                    </div>
                </div>

            </b-list-group>
        </div>
        <div class="panel-footer">
            <textarea class="form-control scroll" placeholder="Start typing your message"></textarea>
            <span class="icon-circle secondary-color"><i class="icon-comment-icon"></i></span>
        </div>
    </div>
</template>

<script>
    export default{
        data () {
            return{
                profileImage:'images/image-placeholder.jpg',
                persons : [
                    {
                        id : 0,
                        name : 'Ammara Hussain',
                        desc:"Before I begin the report, I'd like to get some ideas from you all. How do you feel about rural sales in your sales districts? I suggest we go round the table first to get all of your input."
                    },

                    {
                        id : 1,
                        name : 'Sana Bukhari',
                        desc:"In my opinion, we have been focusing too much on urban customers and their needs. The way I see things, we need to return to our rural base by developing an advertising campaign to focus on their particular needs."
                    },
                    {
                        id : 2,
                        name : 'Saad Khan',
                        desc:"I'd also like to introduce Margaret Simmons who recently joined our team."
                    },

                    {
                        id : 3,
                        name : 'Arsalan Akhtar',
                        desc:"Thank you for having me, I'm looking forward to today's meeting."
                    }
                ]
            }
        },
        methods: {

        }
    }
</script>
