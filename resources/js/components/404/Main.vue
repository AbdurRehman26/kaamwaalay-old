<template>
		<div class="not-found-container">
				<not-found-panel :anchor="anchor"></not-found-panel>
<!--         <button class="custin" @click="showModal = true">asdasdasd</button> -->
				<data-approval :showModalProp="showModalValue" @HideModalValue="HideModal"></data-approval>
                <discussion v-show="isShowing" @CloseDiscussion="isShowing = false"></discussion>
                <warning :showModalProp="showWarningValue" @HideModalValue="HideModal"></warning>

		</div>
</template>

<script>
    export default{
      props: ['anchor'],
        data () {
          return {
              showModalValue : false,
              isShowing: false,
              showWarningValue: false,
              listingResponsive: false,
              show: false
          }
      },
      methods: {
        ShowModal(){
            this.showModalValue = true;
        },
        HideModal(){
            this.showModalValue = false;
            this.showWarningValue= false;
        },
        deletelisting(){
            this.showWarningValue= true;
        },
        showleftpanel(){
            this.show = true;
            this.listingResponsive ^= true;
        },
    },
}
</script>
