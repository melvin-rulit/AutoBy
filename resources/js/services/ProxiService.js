import axios from "axios";

export class ProxiService {
    static serverUrl = import.meta.env.VITE_BASE_URL;

    static getProxies(query){
        let url = `${this.serverUrl}/proxies`;
        return axios.get(url, {"params": {"query": query}});
    }
    static store(proxi) {
        let url = `${this.serverUrl}/proxies`;
        return axios.post(url, proxi)
    }

    static getById(id){
        let url = `${this.serverUrl}/proxies/${id}`;
        return axios.get(url);
    }

    static update(proxi){
        let url = `${this.serverUrl}/proxies/${proxi.id}`;
        return axios.put(url, proxi);
    }

    static delete(id) {
        let url = `${this.serverUrl}/proxies/${id}`;
        return axios.delete(url, id)
    }

    static dict(){
        let url = `${this.serverUrl}/proxies/dict`;
        return axios.get(url);
    }
}
