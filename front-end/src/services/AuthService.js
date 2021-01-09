import axios from 'axios';

export default {
    login: async() => {
        return axios.post(`http://car-api.test/api/v1/login`)
        .then(response => {
            return response;
        })
        .catch(e => {
            return e.message;
        })
    },
}