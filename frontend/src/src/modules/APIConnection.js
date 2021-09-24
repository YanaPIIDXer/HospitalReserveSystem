import conn from "./BasicConnection";

// TODO:本番環境では本番環境用に書き換えるようにする
const ENDPOINT = "http://localhost:3000/api/";

export function get(api) {
    const url = ENDPOINT + api;
    return conn.get(url);
}

export function post(api, params) {
    const url = ENDPOINT + api;
    return conn.post(url, params);
}
