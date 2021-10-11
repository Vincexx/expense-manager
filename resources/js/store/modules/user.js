const state = {
    dialog: false,
    users: []
};

const getters = {
    dialog: state => state.dialog,
    users: state => state.users
};

const actions = {
    showDialog({ commit }) {
        commit("SET_DIALOG");
    },

    async fetch({ commit, dispatch }) {
        await axios
            .get("/api/user/list")
            .then(res => {
                commit("SET_USERS", res.data.data);
            })
            .catch(err => console.log(err));
    },

    async add({ commit, dispatch }, payload) {
        await axios
            .post("/api/user/store", payload)
            .then(res => {
                commit("SET_DIALOG");
                dispatch("fetch");
            })
            .catch(err => console.log(err));
    }
};

const mutations = {
    SET_DIALOG: state => (state.dialog = !state.dialog),
    SET_USERS: (state, payload) => (state.users = payload)
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
