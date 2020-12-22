<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<div class="template-part">
<table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Comment</th>
      </tr>
    </thead>
    <tbody id="commentTableBody">
    </tbody>
  </table>
</div>
<script>
  const commentTableBody = document.getElementById('commentTableBody');
  let port2;
  let a =1;

  // Listen for the intial port transfer message
  window.addEventListener('message', initPort);

  // Setup the transfered port
  function initPort(event) {
      port2 = event.ports[0];
      port2.onmessage = onMessage;
  }

  // Handle messages received on port2
  function onMessage(event) {

    fetch('https://jsonplaceholder.typicode.com/comments/' + event.data, {
        
      })
      .then(response => response.json())
      .then(function(data) {
        var listRow = document.createElement('tr');
        listRow.innerHTML = `<td>${data.name}</td><td>${data.email}</td><td>${data.body}</td>`;
        commentTableBody.appendChild(listRow);
      })
      .catch(err => console.log(err));
  }
</script>

</html>