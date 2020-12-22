// client.js

const WebSocket = require('ws')
const url = 'ws://localhost:8085'
const connection = new WebSocket(url)

connection.onopen = () => {
  connection.send('Message From Client 2') 
}

connection.onerror = (error) => {
  console.log(`WebSocket error: ${error}`)
}

connection.onmessage = (e) => {
  console.log(e.data)
}