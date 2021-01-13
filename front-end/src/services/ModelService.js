import Api from './Api';

export default {
    get: async(query) => {
        return Api.get(`http://car-api.test/api/v1/models?${query}`);
    },
    create: async(data) => {
        return Api.post(`http://car-api.test/api/v1/models`, data);
    },
    update: async(data) => {
        return Api.put(`http://car-api.test/api/v1/models/${data.id}`, data);
    },
    delete: async(model) => {
        return Api.delete(`http://car-api.test/api/v1/models/${model.id}`);
    },
}