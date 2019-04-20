<template>
  <v-data-table
    :headers="headers"
    :items="asientos"
    class="elevation-1"
    hide-actions
  >
    <template v-slot:items="props">
      <td class="text-xs-right">{{ props.item.cuenta }}</td>
      <td class="text-xs-right">{{ props.item.debe }}</td>
      <td class="text-xs-right">{{ props.item.haber }}</td>
    </template>
    <template v-slot:footer>
      <td :colspan="headers.length">
        <strong>This is an extra footer</strong>
      </td>
    </template>
  </v-data-table>
</template>
<script>
export default {
  data() {
    return {
      headers: [
        {
          text: 'Cuenta',
          sortable: false,
        },
        { text: 'Debe', sortable: false, },
        { text: 'Haber', sortable: false, },
      ],
      asientos: []
    }
  },
  mounted() {
    this.asientos = this.$route.params.asientos
    console.log(this.$route.params.asientos);
  }
}
</script>
