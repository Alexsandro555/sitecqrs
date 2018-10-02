import { ACTIONS, PRIVATE, GLOBAL } from "@/constants"
import axios from "axios/index";
import { articleApi } from "@article/api/article";

export default {
    [ACTIONS.SAVE_DATA]: ({state}) => {
        articleApi.patch(state.item)
            .then(response => {})
            .catch(error => {})
    }
}