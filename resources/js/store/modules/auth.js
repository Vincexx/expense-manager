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

const actions = {};

const mutations = {};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
