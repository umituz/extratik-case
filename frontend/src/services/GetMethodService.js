import HttpService from "./HttpService";

export const GetMethodService = async (url) => {
    const http = new HttpService();

    try {
        return await http.getData(url);
    } catch (error) {
        console.error("GetMethodService Error: ", error);

        throw error;
    }
}