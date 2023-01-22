async function getData(route, data) {
    let response = await fetch(route + data);
    return await response.json();
}

async function getCount(route) {
    let response = await fetch(route);
    return await response.json();
}

async function postData(route, data, _token) {
    let response = await fetch(route,
        {
            method: "POST",
            headers: {
                'Content-Type': 'application/json;charset=utf-8',
            },
            body: JSON.stringify({data, _token})
        });
    return await response.json();
}
