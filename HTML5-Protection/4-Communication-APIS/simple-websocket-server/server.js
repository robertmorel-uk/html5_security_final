// server.js

const WebSocket = require('ws')

const wss = new WebSocket.Server({ port: 8085 })

wss.on('connection', ws => {
    ws.send('{ "connection" : "ok"}');
  ws.on('message', message => {
    console.log(`Received message => ${message}`)
    ws.send(`Hello! Message: ${message} recieved by Server!!`)
  })
})