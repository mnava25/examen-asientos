<template>
  <div>
    <v-container grid-list-xl fluid>
      <v-layout row wrap>
        <v-flex md4>
          <v-card>
            <v-toolbar card color="blue-grey" dark>
              <v-toolbar-title>Cargo(s)</v-toolbar-title>
            </v-toolbar>
            <v-card-text>
              <v-text-field
                v-model="cuenta_debe"
                label="Cuenta"
                name="cuenta"
              ></v-text-field>
              <v-text-field
                v-model="monto_debe"
                label="Monto"
                data-vv-name="monto"
              ></v-text-field>
            </v-card-text>
          </v-card>
        </v-flex>
        <v-flex md4>
          <v-card>
            <v-toolbar card color="blue-grey" dark>
              <v-toolbar-title>Abono(s)</v-toolbar-title>
            </v-toolbar>
            <v-card-text>
              <v-text-field
                v-model="cuenta_haber"
                label="Cuenta"
                name="cuenta"
              ></v-text-field>
              <v-text-field
                v-model="monto_haber"
                label="Monto"
                data-vv-name="monto"
              ></v-text-field>
            </v-card-text>
          </v-card>
        </v-flex>
        <v-flex md4 mt-5 pt-5>
          <v-card>
            <v-card-actions>
              <v-btn
                color="success"
                depressed
                block
                @click="guardar"
              >
                Guardar
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-flex>
      </v-layout>
      <v-layout row>
        <v-flex>
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
              <td>
                <strong>Total</strong>
              </td>
              <td>{{ totalDebe }}</td>
              <td>{{ totalHaber }}</td>
            </template>
          </v-data-table>
        </v-flex>
      </v-layout>
    </v-container>
  </div>
</template>

<script>
  import HelloWorld from '../components/HelloWorld'
  import axios from 'axios'
  export default {
    components: {
      HelloWorld
    },
    data () {
      return {
        cuenta_debe: null,
        monto_debe: null,
        cuenta_haber: null,
        monto_haber: null,
        asiento: [],
        headers: [
          {
            text: 'Cuenta',
            sortable: false,
          },
          { text: 'Debe', sortable: false, },
          { text: 'Haber', sortable: false, },
        ],
        asientos: [],
        totalDebe: 0,
        totalHaber: 0
      }
    },
    methods: {
      guardar () {
        let asiento_debe = {
          cuenta: this.cuenta_debe,
          debe: this.monto_debe,
          haber: 0
        }
        let asiento_haber = {
          cuenta: this.cuenta_haber,
          debe: 0,
          haber: this.monto_haber
        }
        this.asiento.push(asiento_debe)
        this.asiento.push(asiento_haber)
        this.totalDebe += parseFloat(this.monto_debe)
        this.totalHaber += parseFloat(this.monto_haber)
        this.asientos = this.asiento
        axios.post('http://asiento-back.test/asiento',
          {
            cuenta: this.cuenta_debe,
            debe: this.monto_debe,
            haber: 0
          }
        ).then( response => console.log(response))
        .catch(error => console.log(error))
        axios.post('http://asiento-back.test/asiento',
          {
            cuenta: this.cuenta_haber,
            debe: 0,
            haber: this.monto_haber
          }
        ).then( response => console.log(response))
        .catch(error => console.log(error))
      }
    }
  }
</script>
