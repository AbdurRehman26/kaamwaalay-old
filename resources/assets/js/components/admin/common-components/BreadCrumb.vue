<template>
    <nav aria-label="breadcrumb" class="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#" @click.prevent="switchRoute">Admin</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$route.meta.pagetitle}}</li>
      </ol>
    </nav>
</template>


<script type="text/javascript">
    export default{
        methods : {
            switchRoute(){
                this.$router.push({   name: 'dashboard'  })
            }
        }
    }
</script>