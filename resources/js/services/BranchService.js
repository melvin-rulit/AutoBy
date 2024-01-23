import axios from "axios";

export class BranchService {
    static serverUrl = import.meta.env.VITE_BASE_URL;

    static getBranches(){
        let url = `${this.serverUrl}/branches`;
        return axios.get(url);
    }

}
