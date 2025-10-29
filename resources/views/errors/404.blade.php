<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>404 - Page Not Found</title>
</head>
<body style="margin:0; height:100vh; background:#ffffff; color:#333; font-family:Arial, sans-serif; display:flex; flex-direction:column; align-items:center; justify-content:center; text-align:center;">

  <img src="{{ asset('assets/img/logo/logo2.png') }}" alt="Logo" height="50" style="margin-bottom:30px;">
  
  <h1 style="font-size:90px; margin:0; color:#e60000; font-weight:700;">404</h1>
  <h2 style="font-size:26px; margin:10px 0;">Page Not Found</h2>
  <p style="font-size:16px; color:#666; margin-bottom:30px; max-width:400px;">
    Sorry, the page you are looking for doesn’t exist or has been moved.
  </p>

  <a href="{{ url('/') }}" style="display:inline-block; background:#e60000; color:#fff; padding:12px 25px; border-radius:4px; font-weight:600; text-decoration:none;">
    Go to Homepage
  </a>

</body>
</html>
