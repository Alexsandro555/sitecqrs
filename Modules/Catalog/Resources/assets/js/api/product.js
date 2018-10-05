import axios from "axios/index"

export const productApi = {
    url: '/catalog',
    getAttributes(id) {
        return new Promise((resolve, reject) => {
            axios.get(this.url+'/attributes/'+id).then(response => response.data).then(response => {
                let attributes = []
                let productAttributes = response
                axios.get(this.url+'/attribute-values/'+id).then(res => {
                    productAttributes.forEach(productAttribute => {
                        let filtered = res.data.filter(item => item["id"] === productAttribute["id"])
                        attributes.push({attribute_id: productAttribute["id"], title: productAttribute["title"], value: filtered.length !== 0? filtered[0]["pivot"]["value"]:""})
                    });
                    resolve(attributes)
                }).catch(error => {
                    console.log(error);
                })
            }).catch(error => {
                reject(error)
            })
        })
    },
    patch(data) {
        return new Promise((resolve, reject) => {
            axios.patch(this.url, data).then(response => response.data).then(response => {
                resolve(response)
            }).catch(error => {
                reject(error)
            })
        })
    },
    saveAttributes(data) {
        return new Promise((resolve, reject) => {
            axios.patch(this.url+'/attributes', data).then(response => response.data).then(response => {
                resolve(response)
            }).catch(error => {
                reject(error)
            })
        })
    }
}