export default class HttpService {
    constructor(baseUrl = process.env.NEXT_PUBLIC_API_BASE_URL) {
        this.baseUrl = baseUrl;
    }

    getData = async (url) => {
        try {
            const response = await fetch(`${this.baseUrl}/${url}`);

            return await response.json();
        } catch (error) {
            console.error("Something Wrong: ", error);

            throw error;
        }
    }
}