import Api from './Api';

export default {
    get: async() => {
        return Api.get(`/makes`);
    },
    create: async(make) => {
        return Api.post(`http://car-api.test/api/v1/makes`, {name: make})
    },
    update: async(make) => {
        return Api.put(`http://car-api.test/api/v1/makes/${make.id}`, {name: make.name});
    },
    delete: async(make) => {
        return Api.delete(`http://car-api.test/api/v1/makes/${make.id}`);
    },
}