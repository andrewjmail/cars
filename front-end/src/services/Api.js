import axios from "axios";

let BaseApi = axios.create({
    baseURL: "http://car-api.test/api/v1/"
});

let token = localStorage.getItem("token");
token = token ? token : 'D8JdIVcoGPuTvWeE9XIM9qAmeOf4eVC8Lo5xy7KmtxqTF715J5SP0FjgAgui';
BaseApi.defaults.headers.common["Authorization"] = `Bearer ${token}`;



export default BaseApi;