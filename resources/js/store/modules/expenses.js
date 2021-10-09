const state = {
    dialog: false
};

const getters = {
    dialog: state => state.dialog
};

const actions = {
    showDialog({ commit }) {
        commit('setDialog')
    }
};

const mutations = {
    setDialog: state => (state.dialog = !state.dialog)
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
