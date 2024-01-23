import axios from "axios";

export class UserService {
    static serverUrl = import.meta.env.VITE_BASE_URL;

    static getUsers(page, query){
        let url = `${this.serverUrl}/users`;
        return axios.get(url);
    }

    static store(user) {
        let url = `${this.serverUrl}/users`;
        return axios.post(url, user)
    }

    static currentUser()
    {
        let url = `${this.serverUrl}/user`;
        return axios.get(url)
    }

    static getRoles()
    {
        let url = `${this.serverUrl}/roles`;
        return axios.get(url)
    }

}
