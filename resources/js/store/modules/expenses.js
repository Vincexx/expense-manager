const state = {
    dialog: false
};

const getters = {
    dialog: state => state.dialog
};

const actions = {
    showDialog({ commit }) {
        commit('SET_DIALOG')
    }
};

const mutations = {
    SET_DIALOG: state => (state.dialog = !state.dialog),
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
