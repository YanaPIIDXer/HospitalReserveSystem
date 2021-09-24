import conn from "./BasicConnection";

const ENDPOINT = (process.env.NODE_ENV == "development" ? "http://localhost:3000" : "http://yanap.apptest.tk:3000") + "/api/";

export async function get(api) {
    const url = ENDPOINT + api;
    var json = null;
    try {
        const result = await conn.get(url);
        json = JSON.parse(JSON.stringify(result.data));    
    } catch { return null; }
    return json;
}

export async function post(api, params) {
    const url = ENDPOINT + api;
    var json = null;
    try {
        const result = await conn.post(url, params);
        json = JSON.parse(JSON.stringify(result.data));            
    } catch { return null}
    return json;
}
