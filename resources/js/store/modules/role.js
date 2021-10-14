const state = {
    roles: [],
    dialog: false
};

const getters = {
    dialog: state => state.dialog,
    roles: state => state.roles
};

const actions = {
    showDialog({ commit }) {
        commit("SET_DIALOG");
    },
    async fetch({ commit, dispatch }) {
        await axios
            .get("/api/role/list")
            .then(res => {
                console.log(res.data);
                commit("SET_ROLES", res.data.data);
            })
            .catch(err => console.log(err));
    },

    async add({ commit, dispatch }, payload) {
        await axios
            .post("/api/role/store", payload)
            .then(res => {
                commit("SET_DIALOG");
                dispatch("fetch");
            })
            .catch(err => console.log(err));
    }
};

const mutations = {
    SET_DIALOG: state => (state.dialog = !state.dialog),
    SET_ROLES: (state, payload) => (state.roles = payload)
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
