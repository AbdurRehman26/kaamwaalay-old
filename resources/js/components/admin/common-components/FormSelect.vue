<template>
	<div class="form-group">
		<label>{{label}}</label>
		<select class="form-control" :value="val" ref="selectField" @input="onValueChange()">
			<option v-if="defaultOption" :selected="defaultOption == selected">{{defaultOption}}</option>
			<option v-for="option in options" :value="option[opKey]" :selected="option == selected">{{option[filter]}}</option>
		</select>
	</div>
</template>

<script>
	export default {
		props: ['value', 'options', 'selected', 'label', 'filter', 'defaultOption', 'opKey'],
		mounted() {
		},
		data: function () {
			return { 
				val: this.value,
				def: this.defaultOption? this.defaultOption : null,
			}
		},
		methods: {

			onValueChange() {
				this.$emit('input', this.$refs.selectField.value)
			}
		},
		watch: {
			options(value) {
				
			}
		}
	}

</script>
