<div class="template-part">
  <h1>Chat to colleagues in real time!</h1>
  <p>Enter a message and click send.</p>  
  <pre id="messages" style="height: 300px; overflow: scroll"></pre>
  <input type="text" id="messageBox" placeholder="Type your message here"
    style="display: block; width: 100%; margin-bottom: 10px; padding: 10px;" />
  <button id="send" title="Send Message!" class="btn btn-primary">Send Message</button>
</div>
 <script>
    (function () {
      const host = location.hostname;
      
      if(host == "sample-application.com"){
        const sendBtn = document.querySelector('#send');
        const messages = document.querySelector('#messages');
        const messageBox = document.querySelector('#messageBox');

        let ws;

        function showMessage(message) {
          let messageDec = decryptString(message);
          let messageClean = DOMPurify.sanitize(messageDec);
          let messageTrim = messageClean.trim();
          messages.innerHTML += `<p>${messageTrim}</p>`;
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

          let messageClean = DOMPurify.sanitize(messageBox.value);
          let messageTrim = messageClean.trim();
          let messageEnc = encryptString(messageTrim);
                
          // Encrypt on sending to ws
          ws.send(messageEnc);
          showMessage(messageEnc);
        }

        init();
      } else alert("Access denied");
    })();
  </script>