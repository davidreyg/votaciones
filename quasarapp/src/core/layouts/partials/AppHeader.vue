<template>
  <q-header elevated class="bg-primary text-white">
    <q-toolbar>
      <q-btn
        dense
        flat
        round
        icon="menu"
        @click="$emit('left-drawer', !left)"
      />

      <q-toolbar-title>
        <q-avatar>
          <img src="statics/img/quasar-logo.svg" />
        </q-avatar>
        Facturacion con Laravel
      </q-toolbar-title>
      <q-btn dense flat round icon="account_circle">
        <q-menu>
          <div class="row no-wrap q-pa-md">
            <div class="column">
              <div class="text-h6 q-mb-md">Settings</div>
              <q-input
                :value="'Administrador'"
                type="text"
                label="Rol"
                readonly
              />
            </div>

            <q-separator vertical inset class="q-mx-lg" />

            <div class="column items-center">
              <q-avatar size="72px">
                <img src="statics/icons/user.png" />
              </q-avatar>

              <div
                class="text-subtitle1 q-mt-md q-mb-xs text-center"
                v-html="nombre_completo"
              ></div>

              <q-btn
                color="primary"
                label="Logout"
                push
                size="sm"
                @click="cerrarSesion"
              />
            </div>
          </div>
        </q-menu>
      </q-btn>
    </q-toolbar>
  </q-header>
</template>

<script>
import { localize } from 'vee-validate'
export default {
  name: 'AppHeader',
  props: ['left'],
  data() {
    return {
      options: ['es', 'en']
    }
  },
  methods: {
    cerrarSesion() {
      this.$auth.logout({
        makeRequest: true,
        redirect: '/auth/login'
        // etc...
      })
    }
  },
  computed: {
    // nombre_completo() {
    //   return `${this.$auth.user().employee.name} ${
    //     this.$auth.user().employee.father_last_name
    //   }`
    // },
    nombre_completo() {
      return this.$auth.user().employee.name || ''
    }
  }
}
</script>
