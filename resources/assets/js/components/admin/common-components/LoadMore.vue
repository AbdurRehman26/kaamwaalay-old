<template>
    <div class="loadmore-records text-center">
        <i class="spinner-image rotating">
            <img :src="spinner">
        </i>
        <span>Loading More Records</span>
    </div>
</template>


<script>
export default {
    data: function () {
        return{
             spinner: 'images/spinner.svg'
        }
    }
}
</script>
