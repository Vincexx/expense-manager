const state = {
    dialog: false,
    categories: [
        {
            name: "Travel"
        },
        {
            name: "Entertainment"
        }
    ]
};

const getters = {
    dialog: state => state.dialog,
    categories: state => state.categories
};

const actions = {
    showDialog({ commit }) {
        commit("SET_DIALOG");
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
