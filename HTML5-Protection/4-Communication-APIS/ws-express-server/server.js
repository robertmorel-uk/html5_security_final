const express = require('express');
const http = require('http');
const WebSocket = require('ws');

const port = 24601;
const server = http.createServer(express);
const wss = new WebSocket.Server({
    server
})

wss.on('connection', function connection(ws, req) {

    const ip = req.socket.remoteAddress;
    const curOrigin = req.headers['origin'];

    
    if(curOrigin != "http://4-communication-apis.com"){
        console.log("Access denied to: " + ip);
        return;
    }
    

    console.log(`IP: ${ip}!`);
    console.log("Origin: " + curOrigin);

    const ipx = req.headers['x-forwarded-for'];
    if (ipx != null && ipx != undefined && ipx != "") {
        ipx = ipx.split(/\s*,\s*/)[0];
        console.log(`IPX: ${ipx}!`);
    }

    ws.on('message', function incoming(data) {
        wss.clients.forEach(function each(client) {
            if (client !== ws && client.readyState === WebSocket.OPEN && curOrigin == "http://4-communication-apis.com") {
            //if (client !== ws && client.readyState === WebSocket.OPEN) {
                client.send(data);
            }
        })
    })
})

server.listen(port, function () {
    console.log(`Server is listening on ${port}!`)
})