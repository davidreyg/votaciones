import state from './state'
import * as getters from './getters'
import mutations from './mutations.js'
import actions from './actions.js'

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
}
