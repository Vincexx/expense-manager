const state = {
    roles: [
        {
            name: "Admin",
            description: "Access"
        },
        {
            name: "User",
            description: "Access"
        }
    ],
    dialog: false
};

const getters = {
    dialog: state => state.dialog,
    roles: state => state.roles
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
