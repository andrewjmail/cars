import Api from './Api';

export default {
    get: async(query = '') => {
        return Api.get(`http://car-api.test/api/v1/vehicles?${query}`);
    },
    create: async(data) => {
        return Api.post(`http://car-api.test/api/v1/vehicles`, data);
    },
    update: async(data) => {
        return Api.put(`http://car-api.test/api/v1/vehicles/${data.id}`, data);
    },
    delete: async(vehicle) => {
        return Api.delete(`http://car-api.test/api/v1/vehicles/${vehicle}`);
    },
}