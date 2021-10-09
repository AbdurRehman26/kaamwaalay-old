<template>
	<div class="form-check form-check-inline">
		<input class="form-check-input" type="radio" :name="name" ref="radioField" :value="radioValue" @input="onValueChange()" :checked="checked">
		<label class="form-check-label" :for="name">{{label}}</label>
	</div>
</template>

<script>
	export default {
		props: ['value', 'name', 'options', 'radioValue', 'label', 'checked'],
		mounted() {
		},
		data: function () {
			return { 
				val: this.value
			}
		},
		methods: {

			onValueChange() {
				this.$emit('input', this.$refs.radioField.value)
			}
		}
	}

</script>
