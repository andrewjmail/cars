import axios from 'axios';

export default {
    get: async() => {
        return axios.get(`http://car-api.test/api/v1/makes`, {
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
    create: async(make) => {
        return axios.post(`http://car-api.test/api/v1/makes`, {name: make}, {
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
    update: async(make) => {
        return axios.put(`http://car-api.test/api/v1/makes/${make.id}`, {name: make.name}, {
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
    delete: async(make) => {
        return axios.delete(`http://car-api.test/api/v1/makes/${make.id}`, {
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