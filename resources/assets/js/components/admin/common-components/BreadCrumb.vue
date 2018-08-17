<template>
    <nav aria-label="breadcrumb" class="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><router-link to="dashboard">Admin</router-link></li>
        <li class="breadcrumb-item active" aria-current="page">{{$route.meta.pagetitle}}</li>
      </ol>
    </nav>
</template>
