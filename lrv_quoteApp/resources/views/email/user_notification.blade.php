<h1>Hi {{$name}}!!</h1>
<p>Thanks for creating Quote</p>
<p>Please register here: <a href=" {{route('mail_callback', ['author_name'=> $name])}}">Register Here</a></p>
