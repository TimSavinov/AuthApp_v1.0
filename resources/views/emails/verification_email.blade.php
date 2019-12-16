<!DOCTYPE html>
<html>
  <head>
    <title>Confirmation Email</title>
  </head>
  <body>
    <h2>Hey, {{ $user['name'] }}! How are you doin'?</h2>
    <br/>
    It's still just a registration app, but I would like to check your e-mail address now.</br>
    You've registered your account under the email address {{ $user['email'] }}.
    Please click on the below link in order to verify your account.
    <br/>
    <a href="{{ url('api/auth/user/verify', $user->UsersVerification->token) }}">Verify Email</a>
  </body>
</html>