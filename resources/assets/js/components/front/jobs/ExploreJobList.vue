<template>

    <div v-if="records.length">
        <div class="job-post-list" v-for="record in records">
            <job :job="record" @showBidPopup="bidPopup" @chatMessage="chatMessage" tabType="'activebid'"></job>
        </div>
        <post-bid-popup :bid="bidValue" :job="currentRecord" @HideModalValue="showBidPopup = false; bidValue = '';" :showModalProp="showBidPopup"></post-bid-popup>

    </div>

</template>

<script>
    import StarRating from 'vue-star-rating';

    export default{
        props : ['records', 'tabType'],
        components: {
            StarRating
        },
        data(){
            return { 
                bidValue : '',
                currentRecord : '',
                showBidPopup: false,
            }
        },
        methods: {
            bidPopup(job, val) {
                if(val == 'bidNow') {
                    this.currentRecord = job;
                }else {
                    this.currentRecord = job;
                    this.bidValue = job.my_bid;
                }
                this.showBidPopup = true;
            },
            chatMessage(record) {
                switch(this.tabType) {
                    case 'activebid':
                        this.$emit('chatMessage', record, true, false);
                    break;
                }
            }
        }

    }

</script>