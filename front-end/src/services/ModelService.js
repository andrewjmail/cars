import axios from 'axios';

export default {
    get: async(query) => {
        return axios.get(`http://car-api.test/api/v1/models?${query}`, {
            headers: {
                Authorization: 'Bearer D8JdIVcoGPuTvWeE9XIM9qAmeOf4eVC8Lo5xy7KmtxqTF715J5SP0FjgAgui'
            }
        })
        .then(response => {
            return response;
        })
        .catch(e => {
            return e.message;
        })
    },
    create: async(data) => {
        return axios.post(`http://car-api.test/api/v1/models`, data, {
            headers: {
                Authorization: 'Bearer D8JdIVcoGPuTvWeE9XIM9qAmeOf4eVC8Lo5xy7KmtxqTF715J5SP0FjgAgui'
            }
        })
        .then(response => {
            return response;
        })
        .catch(e => {
            return e.message;
        })
    },
    update: async(data) => {
        return axios.put(`http://car-api.test/api/v1/models/${data.id}`, data, {
            headers: {
                Authorization: 'Bearer D8JdIVcoGPuTvWeE9XIM9qAmeOf4eVC8Lo5xy7KmtxqTF715J5SP0FjgAgui'
            }
        })
        .then(response => {
            return response;
        })
        .catch(e => {
            return e.message;
        })
    },
    delete: async(model) => {
        return axios.delete(`http://car-api.test/api/v1/models/${model.id}`, {
            headers: {
                Authorization: 'Bearer D8JdIVcoGPuTvWeE9XIM9qAmeOf4eVC8Lo5xy7KmtxqTF715J5SP0FjgAgui'
            }
        })
            .then(response => {
                return response;
            })
            .catch(e => {
                return e.message;
            })
    },
}