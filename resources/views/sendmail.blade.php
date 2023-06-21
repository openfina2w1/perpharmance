<style> 
@font-face {
  font-family: myFirstFont;
  src: @import url('https://fonts.cdnfonts.com/css/calibri-light');
}

p {
  font-family: myFirstFont;
}
strong {
  font-family: myFirstFont;
}
</style>

<strong>{{ $name }}</strong>
<p>{{ $heading }}</p>
<p>“Your account has been create on Perpharmance’s Teligence services”. Kindly use below credentials to <a href="{{ url('login') }}">login</a> into our portal.</p>
<p>{{ $username }}</p>
<p>{{ $password }}</p>
<p>Login link - <a href="{{ url('login') }}">{{ url('login') }}</a></p>
<p>
    <img src="{{ asset('images/logo.png') }}" width="300px"/>
</p>