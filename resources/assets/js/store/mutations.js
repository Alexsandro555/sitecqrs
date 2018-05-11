export default {
    ADD_CART(state, data) {
        state.count = data.count;
        state.total = data.total;
    }
}
/*const ADD_CART2 = {
    ADD_CART2 : (state, data) => {
        state.count = data.count;
        state.total = data.total;
    }
}
export default {ADD_CART2,
    ADD_CART ({state, data) {
        state.count = data.count;
        state.total = data.total;
    }
}*/
/*function ADD_CART (state, data) {
    state.count = data.count;
    state.total = data.total;
}

export {ADD_CART};*/