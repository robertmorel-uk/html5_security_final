<div class="template-part">
  <h1>Real Time Messaging</h1>
  <pre id="messages" style="height: 300px; overflow: scroll"></pre>
  <input type="text" id="messageBox" placeholder="Type your message here"
    style="display: block; width: 100%; margin-bottom: 10px; padding: 10px;" />
  <button id="send" title="Send Message!" class="btn btn-primary">Send Message</button>
</div>
<script>
  (function () {
    const sendBtn = document.querySelector('#send');
    const messages = document.querySelector('#messages');
    const messageBox = document.querySelector('#messageBox');

    let ws;

    function showMessage(message) {
      messages.innerHTML += `<p>${message}</p>`;
      messages.scrollTop = messages.scrollHeight;
      messageBox.value = '';
    }

    function init() {
      if (ws) {
        ws.onerror = ws.onopen = ws.onclose = null;
        ws.close();
      }

      ws = new WebSocket('ws://sample-application.com:24601');
      ws.onopen = () => {
        console.log('Connection opened!');
      }
      ws.onmessage = ({
        data
      }) => showMessage(data);
      ws.onclose = function () {
        ws = null;
      }
    }

    sendBtn.onclick = function () {
      if (!ws) {
        showMessage("No WebSocket connection :(");
        return;
      }

      ws.send(messageBox.value);
      showMessage(messageBox.value);
    }

    init();
  })();
</script>