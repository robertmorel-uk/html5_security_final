let _data = {
    "name": "Robert Morel",
    "email": "robertchristophermorel@gmail.com",
    "body": "Feel free to email me with any questions!"
}

fetch('https://jsonplaceholder.typicode.com/comments', {
        method: "POST",
        body: JSON.stringify(_data),
        headers: {
            "Content-type": "application/json; charset=UTF-8"
        }
    })
    .then(response => response.json())
    .then(function(data) {
        console.log(data);
        postMessage(data);
    })
    .catch(err => console.log(err));