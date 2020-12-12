<template>
  <div class="q-pa-md doc-container">
    <div class="column items-center">
      <q-card class="my-card">
        <q-card-section class="bg-primary text-white q-pa-xl">
          <div class="text-h6 vertical-middle absolute-center">
            Iniciar Sesión
          </div>
        </q-card-section>

        <q-separator />

        <q-card-section align="center">
          <div class="row">
            <div class="col">
              <q-form @submit="onSubmit" class="q-gutter-md">
                <q-input
                  filled
                  v-model="user.username"
                  label="Usuario *"
                  lazy-rules
                  :rules="[
                    val =>
                      (val && val.length > 0) || 'Por favor ingrese su usuario'
                  ]"
                />

                <q-input
                  filled
                  type="password"
                  v-model="user.password"
                  label="Contraseña *"
                  lazy-rules
                  :rules="[
                    val =>
                      (val !== null && val !== '') ||
                      'Porfavor ingresa tu contraseña'
                  ]"
                />
                <div>
                  <q-btn
                    :loading="loading"
                    class="q-mb-sm"
                    label="Iniciar sesión"
                    type="submit"
                    color="primary"
                    rounded
                  >
                    <template v-slot:loading>
                      <q-spinner-facebook />
                    </template>
                  </q-btn>
                </div>
              </q-form>
            </div>
          </div>
        </q-card-section>
      </q-card>
    </div>
  </div>
</template>

<script>
import store, { storeTypes } from 'core/store'
import { AxiosResponse, AxiosError } from 'axios'

export default {
  name: 'Login',
  data() {
    return {
      loading: false,
      user: { username: '', password: '' }
    }
  },

  methods: {
    async onSubmit() {
      await this.$auth.login({
        data: this.user,
        redirect: '/',
        fetchUser: true,
        staySignedIn: true
      })
    }
  }

  // methods: {
  //   ...mapActions('company', ['setSelectedCompany']),
  //   onSubmit() {
  //     this.loading = true;
  //   data: this.user,
  //   redirect: '/',
  //   staySignedIn: true,
  //   fetchUser: true,
  // })
  //     // .then((res) => {
  //     //   this.loading = false;
  //     //   const company = this.$auth.user().company;
  //     //   this.setSelectedCompany(company);
  //     // })
  //     // .catch((err) => {
  //     //   this.loading = false;
  //     //   // console.error(err.response.data)
  //     //   this.$q.notify({
  //     //     type: 'negative',
  //     //     textColor: 'white',
  //     //     message: err.response.data.error,
  //     //   });
  //     // });
  //   }
  // },
}
</script>

<style lang="sass" scoped>
.my-card
  width: 100%
  max-width: 500px
</style>
