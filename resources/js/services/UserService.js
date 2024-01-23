import axios from "axios";

export class UserService {
    static serverUrl = import.meta.env.VITE_BASE_URL;

    static getUsers(page, query){
        let url = `${this.serverUrl}/users`;
        return axios.get(url);
    }


}
