<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5.5 Ajax Request example</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
    <div class="container">
        <h1></h1>
        <form >
          <div class="form-group">
            <label>Name:</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Name" required="">
        </div>
        <div class="form-group">
            <label>Password:</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="">
       </div>
        <div class="form-group">
            <strong>Email:</strong>
            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required="">
        </div>
        <div class="form-group">
            <button id="ajaxSubmit" class="btn btn-success">Submit</button>
        </div>
    </form>
     <div class="alert alert-success" style="display:none"></div>
</div>
</body>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
      </script>
      <script>
         jQuery(document).ready(function(){
            jQuery('#ajaxSubmit').click(function(e){
               e.preventDefault();
               $.ajaxSetup({
                   headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
              });
               jQuery.ajax({
                  url: "{{ url('/ajaxRequest') }}",
                  type: 'POST',
                  data: {
                     name: jQuery('#name').val(),
                     password: jQuery('#password').val(),
                     email: jQuery('#email').val()
                  },
                  success: function(result){
                     jQuery('.alert').show();
                     jQuery('.alert').html(result.success);
                  }
              });
               });
            });
      </script>
</html>