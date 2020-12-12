<template>
  <q-layout view="hHh Lpr fFf">
    <app-header :left="left" @left-drawer="isleftDrawer"></app-header>
    <!-- <app-left-drawer :left="left"></app-left-drawer> -->
    <q-drawer
      v-model="left"
      side="left"
      elevated
      show-if-above
      :width="300"
      :breakpoint="500"
      content-class="bg-grey-3"
    >
      <q-list padding>
        <q-expansion-item
          expand-separator
          icon="mail"
          label="Comite"
          default-opened
        >
          <q-item clickable tag="a" to="/empleados">
            <q-item-section avatar>
              <q-icon name="school" />
            </q-item-section>
            <q-item-section>
              <q-item-label>Empleados</q-item-label>
              <q-item-label caption>api/employees</q-item-label>
            </q-item-section>
          </q-item>
        </q-expansion-item>
      </q-list>
    </q-drawer>
    <q-page-container>
      <div class="q-pa-sm">
        <transition
          name="mainlayoutTransition"
          enter-active-class="animated fadeIn"
          leave-active-class="animated fadeOutDown"
          mode="out-in"
        >
          <router-view />
        </transition>
      </div>
    </q-page-container>

    <app-footer></app-footer>
  </q-layout>
</template>

<script>
// import AppLeftDrawer from './partials/AppLeftDrawer'
import AppHeader from './partials/AppHeader'
import AppFooter from './partials/AppFooter'
export default {
  name: 'MainLayout',
  components: { AppHeader, AppFooter },
  data() {
    return {
      left: false,
      miniState: false
    }
  },
  methods: {
    isleftDrawer(data) {
      this.left = data
    }
  }
}
</script>
