<script>
        var worker = new Worker('./js/fetch-web-worker.js');
        worker.onmessage = function (event) {
            for (var i = 0; i < event.data.length; i++){
                var obj = event.data[i];
                console.log(obj.body);
                    $("tbody").append(`<tr><td>${obj.name}</td><td>${obj.email}</td><td>${obj.body}</td></tr>`);
            }
        
        };
    </script>

<div class="template-part">
<h1>Browse All Comments</h1>
<table class="table table-borderless">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Comment</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      </tr>
    </tbody>
  </table>
</div>