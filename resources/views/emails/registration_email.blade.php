Pozdravljeni {{ $user->name }} {{ $user->surname }}!
<br>
<br>
<br>
<br>
Obveščamo Vas, da ste se uspešno registrirali v spletno trgovino Store, d.o.o.
<br><br><br>
Vaši prijavni podatki so: <br><br>
<strong>Email naslov: </strong> {{ $user->email }}<br>
<strong>Geslo: </strong> {{ $password }}
<br><br><br>
Če se želite prijaviti, kliknite <a href="{{ url('auth/login') }}">tukaj</a>.
<br>
<br>
<br>
Lep pozdrav,
<br>
Ekipa Store