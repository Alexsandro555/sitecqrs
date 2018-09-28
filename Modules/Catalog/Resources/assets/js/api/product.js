import axios from "axios/index"

export const productApi = {
    url: '/catalog',
    get() {
        return new Promise((resolve, reject) => {
            axios.get(this.url).then(response => response.data).then(response => {
                resolve(response)
            }).catch(error => {
                reject(error)
            })
        })
    }
}