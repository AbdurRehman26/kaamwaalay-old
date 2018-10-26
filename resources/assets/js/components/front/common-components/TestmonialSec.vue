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
        props: ['roleId'],
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
                let url = this.url;
                url = url + '?filter_by_count=2&filter_by_role=' + this.roleId;
                this.$http.get(url).then( (response) =>{
                    response = response.data;
                    this.records = response.data;
                    this.$emit('onExist', response.data.length);
                }).catch(error=>{
                });
            },
			getImage(img) {
                console.log(img , 'testinmonal image');
				return img ? img : 'images/dummy/image-placeholder.jpg';
			},
        },
        watch: {
            roleId(val) {
                this.roleId  = val;
            }
        }
    }
</script>