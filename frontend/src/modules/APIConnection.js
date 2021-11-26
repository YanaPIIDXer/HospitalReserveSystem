import conn from "./BasicConnection";

const ENDPOINT = (process.env.NODE_ENV == "development" ? "https://localhost:3000" : "https://13.208.119.99:3000") + "/api/";

export async function get(api) {
    const url = ENDPOINT + api;
    var result = {
        status: 0,
        json: null,
    }
    try {
        const res = await conn.get(url);
        result.status = res.status;
        result.json = JSON.parse(JSON.stringify(res.data));    
    } catch { return result; }
    return result;
}

export async function post(api, params) {
    const url = ENDPOINT + api;
    var result = {
        status: 0,
        json: null,
    }
    try {
        const res = await conn.post(url, params);
        result.status = res.status;
        result.json = JSON.parse(JSON.stringify(res.data));            
    } catch { return result; }
    return result;
}
