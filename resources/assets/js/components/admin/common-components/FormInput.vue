<template>
	<div class="form-group">
		<label>{{label}}</label>
		<input :type="type" ref="inputField" v-model="val" @input="onValueChange()" :placeholder="placeholder" v-validate="validate" :class="['form-control' , errorMessage ? 'is-invalid' : '']" />
	</div>
</template>
<script>
	export default {
		props: ['value', 'name', 'label', 'type', 'placeholder', 'validate', 'error'],
		mounted() {
		},
		data: function () {
			return { 
				val: this.value,
				fieldName: this.name,
				errorMessage: ''
			}
		},
		methods: {

			validateBeforeSubmit() {
				var self = this;
				self.$validator.validateAll().then((result) => {
					if (!result) {
			          // do stuff if not valid.
						self.errorMessage = self.errorBag.all()[0];
						return;
			      	}
			      	self.errorMessage = "";
				});

			}, 
			onValueChange() {
				this.$emit('input', this.$refs.inputField.value);	
				this.validateBeforeSubmit();
			}
				
		}
	}

</script>