<template>
  <v-app id="inspire">
    <v-toolbar color="indigo" dark fixed app>
      <v-toolbar-title>Formulario Asiento Contable</v-toolbar-title>
    </v-toolbar>
    <v-content>
      <div class="page-wrapper">
        <router-view></router-view>
      </div>
    </v-content>
    <v-footer color="indigo" app>
      <span class="white--text">&copy; 2017</span>
    </v-footer>
  </v-app>
</template>

<script>

export default {
  name: 'App',
  components: {
  },
  
}
</script>
