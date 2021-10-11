const state = {
    user: {},
    authenticated: false,
    token: ""
};

const getters = {
    user: state => state.user,
    authenticated: state => state.authenticated,
    token: state => state.token
};

const actions = {
    login({ commit, state }, router) {
        return axios
            .get("/api/user")
            .then(res => {
                commit("SET_USER", res.data);
                commit("SET_AUTHENTICATED", true);
                router.push({ name: "dashboard" });
            })
            .catch(err => {
                console.log(err);
                commit("SET_USER", {});
                commit("SET_AUTHENTICATED", false);
            });
    },
    logout({ commit }, router) {
        router.push({ name: "home" });
        commit("SET_AUTHENTICATED", false);
        commit("SET_USER", {});
    }
};

const mutations = {
    SET_AUTHENTICATED: state => (state.authenticated = !state.authenticated),
    SET_USER: (state, payload) => (state.user = payload),
    SET_TOKEN: (state, payload) => (state.token = payload)
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
