import axios from 'axios';

export default {
    get: async(query = '') => {
        return axios.get(`http://car-api.test/api/v1/vehicles?${query}`, {
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
    }
}