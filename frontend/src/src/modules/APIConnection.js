import conn from "./BasicConnection";

// TODO:本番環境では本番環境用に書き換えるようにする
const ENDPOINT = "http://localhost:3000/api/";

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
