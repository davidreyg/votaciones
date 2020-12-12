import * as types from './mutation-types'

export default {
  [types.SET_EMPLOYEES]: (state, data) => {
    state.employees = data
  }
}
