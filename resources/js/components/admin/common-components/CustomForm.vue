<template>
	<form role="form"> 
		<alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>        
		<div class="box-body">
			<slot></slot>
		</div>
		<div class="box-footer" v-if="!hideBtn">
			<slot name="button">
				<button type="button" :class="['btn' , 'pull-right', btnClass? btnClass: 'btn-primary']" @click.prevent="onSubmit">{{btnTitle? btnTitle :'Submit'}}</button>
			</slot>
		</div>
	</form>
</template>

<script>
	export default {
		props: ['data', 'method', 'action', 'btnTitle', 'btnClass', 'hideBtn'],
		mounted() {
		},
		data: function () {
			return {
				url: this.action,
				successMessage: '',
				errorMessage: '',
			}
		},
		methods: { 
			onSubmit() {
				this.$emit('getResponse', this.data);
				this.$http[this.method](this.url, this.data).then(response => {
			    	// get body data
			    	response = response.data;
			    	this.$emit('getResponse', response);
			    }, error => {
			    	// error callback
			    });
			}

		},
	}

</script>