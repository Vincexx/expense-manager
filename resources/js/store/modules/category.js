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
        commit("setDialog");
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
