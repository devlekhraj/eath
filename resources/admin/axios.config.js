
import axios from 'axios';

window.axios = axios;

// Set the default headers for Axios requests
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// If the token is stored in localStorage (after login), include it in the request headers
const token = localStorage.getItem('token');
if (token) {
    window.axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
} else {
    // Optionally, you can handle cases where no token is found
    // or clear the Authorization header in case it's previously set with an expired token
    window.axios.defaults.headers.common['Authorization'] = '';
}

axios.interceptors.request.use((config) => {
    // console.log("Request Headers:", config.headers);
    // return config;
    const token = localStorage.getItem("token");

    // If a token exists, set it in the Authorization header
    if (token) {
        config.headers["Authorization"] = `Bearer ${token}`;
    }
    return config;
});
// Response Interceptor
axios.interceptors.response.use(
    (response) => {
        // Return only the data payload
        return response.data;
    },
    (error) => {
        // Flatten Laravel validation errors globally
        if (
            error.response &&
            error.response.status === 422 &&
            error.response.data &&
            error.response.data.errors
        ) {
            const rawErrors = error.response.data.errors;
            const flatErrors = {};

            for (const key in rawErrors) {
                flatErrors[key] = Array.isArray(rawErrors[key])
                    ? rawErrors[key][0]
                    : rawErrors[key];
            }

            // Replace the nested error array with the flattened one
            error.response.data.errors = flatErrors;
        }

        // Always reject to let components handle it
        return Promise.reject(error);
    }
);


// Optionally, you can set the base URL for your Laravel API if needed
// window.axios.defaults.baseURL = 'http://localhost:8000/api'; // Update with your API URL

if (window.location.hostname === 'eathways.com') {
    window.axios.defaults.baseURL = 'https://eathways.com/api/v1';
} else if (window.location.hostname === 'eathways.test') {
    window.axios.defaults.baseURL = 'https://eathways.test/api/v1';
} else {
    window.axios.defaults.baseURL = 'admin-hub.test/api/v1';
}

