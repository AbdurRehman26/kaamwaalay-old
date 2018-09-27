<template>
	<div class="testmonial-section">
		<div class="item-list">

			<div class="item" v-for="record in records">
				<div class="testmonial-block">
					<i class="icon-quotes-left"></i>
					<p>{{record.message}}</p>
					<div class="caret"></div>
				</div>
				<div class="testmonial-img">
					<img :src="getImage(record.user.profileImage)">
				</div>
				<div class="testmonial-name">
					<h3>{{record.user.first_name + " " + record.user.last_name}}</h3>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
    export default {
        data () {
            return {
                url: 'api/testimonial',
                records: [],
            }
        },
        mounted() {
        	this.getTopTestimonials();
        },
        methods: {
            getTopTestimonials() {
                let self = this;
                let url = this.url;
                url = url + '?filter_by_count=2&filter_by_role=2'
                self.$http.get(url).then(response=>{
                    response = response.data.response;
                    this.records = response.data;
                }).catch(error=>{
                });
            },
			getImage(img) {
				return img? img : 'images/dummy/image-placeholder.jpg';
			},
        },

        watch: {
            
        },
        computed : {
        }
    }
</script>