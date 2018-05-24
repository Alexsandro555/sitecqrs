export default {
    namespaced: true,
    state: {
        slides: {
            chickens: true,
            cows: false,
            pigs: false,
            rams: false,
            main: false,
        }
    },
    actions: {
        change({ commit }, name) {
            commit('CHANGE', name)
        },
    },
    getters: {

    },
    mutations: {
        CHANGE : (state, name) => {
           for(let prop in state.slides) {
               state.slides[prop] = false;
           }
           state.slides[name] = true;
        },
    }
}