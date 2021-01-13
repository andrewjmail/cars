import axios from 'axios';

export default {
    login: async(credentials) => {
        return axios.post(`http://car-api.test/api/v1/login`, credentials)
        .then(response => {
            return response;
        })
        .catch(e => {
            return e.message;
        })
    }
}