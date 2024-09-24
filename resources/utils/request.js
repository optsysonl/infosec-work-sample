import Cookies from "js-cookie";
import axios from 'axios';

const HttpClient = axios.create({
        // `method` is the request method to be used when making the request
        method: 'get', // default

        // `headers` are custom headers to be sent
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-Token': Cookies.get('csrfToken'),
            'Content-Type': 'application/json',
        },

        // `timeout` specifies the number of milliseconds before the request times out.
        // If the request takes longer than `timeout`, the request will be aborted.
        timeout: 20000,

        // `withCredentials` indicates whether or not cross-site Access-Control requests
        // should be made using credentials
        withCredentials: false
    }
);

export default HttpClient;
