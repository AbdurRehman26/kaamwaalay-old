<template>
	<div class="search-field">
		<label>Search</label>
		<!--<TypeAhead placeholder="Search" v-model="search" @keyup.enter="onHit" :getResponse="getResponse"></TypeAhead>-->
		<input type="text" placeholder="Search" v-model="search" @keyup.enter="onSearch">
	</div>
</template>

<script>
//https://www.npmjs.com/package/vue2-typeahead
//import TypeAhead  from 'vue2-typeahead';
export default {
	//src="/static/data.json?keyword=:keyword"
	// components: {
	// 	TypeAhead
	// },
	props: ['searchValue'],
	data () {
		return {
			search: ''
		}
	},
	methods: { 
		onSearch(){
			// this.search = item;
			this.$emit('onSearchEnter');
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
