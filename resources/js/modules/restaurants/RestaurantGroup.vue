<template>
    <div class="resto-group__wrapper mb-5">
      <div class="row">
        <div class="col-md-4 mb-4" v-for="restaurant in restaurants" :key="restaurant.id">
          <card-component>
            <template slot="title">{{restaurant.name}}</template>
            <template slot="main">{{restaurant.location}}</template>
          </card-component>
        </div>
        <div class="col-md-4" v-if="showAddForm">
          <card-component>
            <template slot="title">Add new Restaurant</template>
            <template slot="main">+</template>
          </card-component>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: ['restaurants'],
    created() {
      console.log('this.restaurants.length', this.restaurants.length);
    },
    computed: {
      showAddForm() {
        return (this.restaurants.length < 5) ? true : false;
      }
    },
    data() {
      return {}
    }
  }
  </script>
  