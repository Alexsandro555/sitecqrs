import { PRIVATE } from "@/constants";

export default {
    [PRIVATE.ADD]: (state, payload) => {
        state.items.push(payload)
    }
}