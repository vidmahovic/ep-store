<!-- TODO: popravi email, da se vidi artikle. -->
Pozdravljeni, {{ $order->subscriber->user->name }} {{ $order->subscriber->user->surname }}!
<br><br><br><br>
Prejeli smo vaše naročilo. Vljudno Vas naprošamo, če potrpežljivo počakate, da naši prodajalci sprejmejo vaše naročilo. Če bo naročilo zavrnjeno, vas bomo ob tem obvestili.
<br><br><br>
<h3><strong>Povzetek naročila:</strong></h3>
<br>
    @include('user.activity.order-details', ['order' => $order])
<br><br><br><br>
Medtem si lahko ogledate zgodovino vaših naročil in njihovo stanje na <a href="{{ url('user/my-orders') }}">tej povezavi</a>.
<br><br><br>
Želimo Vam prijeten dan še naprej.
<br>
Ekipa Store