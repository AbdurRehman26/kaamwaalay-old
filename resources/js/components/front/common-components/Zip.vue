<template>
    <div class="form-group">
        <label>Zip Code *</label>

        <div class="custom-multi" :class="{ 'invalid': isInvalid }">
            <input name="search" type="text" style="display: none;">
            <multiselect  v-model="searchValue" :options="options"  placeholder="Enter your zip code" track-by="zip_code" label="zip_code" :loading="isLoading"  id="ajax" open-direction="bottom" :searchable="true" :options-limit="300" :limit="8" :limit-text="limitText" :max-height="600"  @search-change="asyncFind" name="search" :internal-search="false" :showNoResults="true" @select="dispatchAction" @close="dispatchCloseAction" @keyup.enter="validateBeforeSubmit">
                <span slot="noResult">No zip code found.</span>
            </multiselect>
        </div>

    </div>
</template>

<script>
    import _ from 'lodash';

    export default {
        props: ['showError', 'initialValue'],
        data() {
            return {
                isLoading: false,
                searchValue: '',
                options: [],
                isTouched: false,
                isError: false,
            }
        },
        computed : {
            isInvalid () {
                return this.isTouched && !this.searchValue && this.isError;
            },
        },
        mounted () {
            if(typeof(this.initialValue) != "undefined" && this.initialValue) {
                this.searchValue = {
                    zip_code: this.initialValue,
                    latitude: '',
                    longitude: '',
                };
                this.searchZipCode(this.initialValue, true);


            }else {
                this.searchValue = "";
            }
        },
        methods:{
            onTouch () {
                this.isTouched = true
            },
            dispatchAction (actionName) {
                this.options = [];
                this.$emit('onSelect', actionName);
            },
            dispatchCloseAction (actionName) {
                this.options = [];
                this.onTouch();
            },
            limitText (count) {
                return `and ${count} other zip codes.`;
            },
            asyncFind: _.debounce(function(query) {
                let self = this;
                if(!query) {
                    this.loading = false;
                }
                if(!query || query.length < 3) {
                    return;
                };

                this.searchZipCode(query);

            }, 1000),
            searchZipCode(query, prefilledValue){
                let self = this;
                this.searchUrl  = 'api/zipcode?zip_code=' + query;
                this.isLoading = true;
                this.$http.get(this.searchUrl).then(response => {
                    response = response.data;
                    self.options = response.data;
                    self.isLoading = false;

                    if(prefilledValue){
                        self.dispatchAction(self.options[0]);                        
                    }


                }).catch(error=>{
                });


            }
        },
        watch:{
            initialValue(val) {
                if(val) {
                    this.searchValue = {
                        zip_code: val,
                        latitude: '',
                        longitude: '',
                    };
                }else {
                    this.searchValue = "";
                }
            },
            showError(val) {
                this.isError = val;
                if(val) {
                    this.isTouched = true;
                }
            },
            searchValue(val) {
                if(!val) {
                    this.$emit('onSelect', 
                    {
                        zip_code: "",
                        latitude: '',
                        longitude: '',
                    }
                    );
                    this.searchValue = "";
                    this.isTouched = true;
                    this.isError = true;
                }
            }
        }
    }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>