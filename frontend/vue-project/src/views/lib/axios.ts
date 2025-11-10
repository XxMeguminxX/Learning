import axios from 'axios';

const axiosInstance = axios.create({
    baseURL: "http://localhost:8000/api",
    withCredentials: true,
    withXSRFToken: true,
});

// Instance untuk request yang tidak menggunakan /api prefix
const axiosBaseInstance = axios.create({
    baseURL: "http://localhost:8000",
    withCredentials: true,
    withXSRFToken: true,
});

export default axiosInstance;
export { axiosBaseInstance };