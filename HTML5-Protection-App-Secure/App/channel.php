<div class="template-part">
    <h1>Search Comments</h1>
    <form>
      <label for="message-input">Retrieve comments by ID (E.G. 5)</label>
      <input type="number" id="message-input" autofocus>
      <button id="sendMessage" class="btn btn-primary">Search</button>
    </form>

    <iframe 
      src="channel2.php" 
      width='100%' 
      height='400' 
      frameBorder="0"
      sandbox="allow-same-origin allow-scripts allow-popups allow-forms"
      >
    </iframe>
  </div>

<script>
  const input = document.getElementById('message-input');
  const button = document.getElementById('sendMessage');
  const iframe = document.querySelector('iframe');
  const channel = new MessageChannel();
  const port1 = channel.port1;

  // Wait for the iframe to load
  iframe.addEventListener("load", onLoad);

  function onLoad() {
    // Listen for button clicks
    button.addEventListener('click', onClick);
    // Listen for messages on port1
    port1.onmessage = onMessage;
    // Transfer port2 to the iframe
    iframe.contentWindow.postMessage('init', 'http://sample-application.com', [channel.port2]);
  }

  // Post a message on port1 when the button is clicked
  function onClick(event) {
    event.preventDefault();
    port1.postMessage(input.value);
  }

  // Handle messages received on port1
  function onMessage(event) {
    input.value = '';
  }
</script>