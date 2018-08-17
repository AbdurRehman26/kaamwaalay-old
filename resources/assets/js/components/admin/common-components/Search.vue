<template>
	<div class="search-field">
		<label>Search</label>
		<TypeAhead src="/static/data.json?keyword=:keyword" :getResponse="getResponse" :onHit="onHit" placeholder="Search" v-model="search"></TypeAhead>
	</div>
</template>

<script>
//https://www.npmjs.com/package/vue2-typeahead
import TypeAhead  from 'vue2-typeahead';
export default {
	//src="/static/data.json?keyword=:keyword"
	components: {
		TypeAhead
	},
	props: ['searchValue'],
	data () {
		return {
			search: ''
		}
	},
	methods: { 
		onHit(item, vue, index){
			// this.search = item;
			// alert(this.search);
			// this.$emit('search' , this.search)
		},
		getResponse: function (response) {
			return [];//response.data.data.items
		},
	},
	watch: {
		search(val) {
			this.search = val;
			this.$emit('search' , this.search);
		},
		searchValue(value) {
			this.search = value;
		}
	}
}
</script>
