<template>
  <div class="row p-2">
    <div class="loading" v-if="isEditing && isLoading"></div>
    <form method="POST" :action="route" accept-charset="UTF-8" class="container-fluid" @submit="submitForm">
      <input name="_method" type="hidden" value="PUT">
      <input name="_token" type="hidden" :value="formToken">

      <div class="row">
        <div class="col-6">
          <label for="first_name">Prénom</label>
          <p v-if="!isEditing" @click="toggleEditMode" class="pl-2"><strong>{{ user.first_name }}</strong></p>
          <input type="text" :value="user.first_name" name="first_name" id="first_name" v-if="isEditing" class="form-control">
        </div>

        <div class="col-6">
          <label for="last_name">Nom</label>
          <p v-if="!isEditing" @click="toggleEditMode" class="pl-2"><strong>{{ user.last_name }}</strong></p>
          <input type="text" :value="user.last_name" name="last_name" id="last_name" v-if="isEditing" class="form-control">
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <label for="email">Email</label>
          <p v-if="!isEditing" @click="toggleEditMode" class="pl-2"><strong>{{ user.email }}</strong></p>
          <input type="email" :value="user.email" name="email" id="email" v-if="isEditing" class="form-control">
        </div>

        <div class="col-12">
          <button type="submit" class="btn btn-primary float-right mt-2" v-if="isEditing">Editer</button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
  export default {
    props: ['route', 'formToken', 'user', 'errors'],
    data() {
      return {
        isEditing: false,
        isLoading: false
      }
    },
    mounted() {
      this.$parent.$on('toggleEdit', () => { this.toggleEditMode() })
    },
    methods: {
      toggleEditMode() {
        this.isEditing = !this.isEditing
      },

      submitForm() { //TODO ajax
        this.isLoading = true;

        // setTimeout(() => { this.toggleEditMode(); this.isLoading = false }, 1000)

        // axios.post(this.route, {})
      }
    }
  }
</script>

<style lang="scss">
  .loading {
    z-index: 999;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    /*height: 100px;*/
    /*width: 100px;*/

    background: transparentize(#000, .2);
  }
</style>