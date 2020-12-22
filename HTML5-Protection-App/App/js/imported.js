fetch('https://jsonplaceholder.typicode.com/comments', {
        
    })
    .then(response => response.json())
    .then(function(data) {
        postMessage(data);
    })
    .catch(err => console.log(err));