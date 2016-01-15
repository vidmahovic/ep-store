<!-- TODO: popravi email, da se vidi artikle. -->
Pozdravljeni, {{ $order->subscriber->user->name }} {{ $order->subscriber->user->surname }}!
<br><br><br><br>
Prejeli smo vaše naročilo. Vljudno Vas naprošamo, če potrpežljivo počakate, da naši prodajalci sprejmejo vaše naročilo. Če bo naročilo zavrnjeno, vas bomo ob tem obvestili.
<br><br><br>
<h3><strong>Povzetek naročila:</strong></h3>
<br>
<div class="panel panel-default">
    <div class="panel-heading"></div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <td><strong>Ime produkta</strong></td>
                    <td class="text-center"><strong>Cena kos</strong></td>
                    <td class="text-center"><strong>Količina</strong></td>
                    <td class="text-right"><strong>Cena</strong></td>
                </tr>
                </thead>
                <tbody>
                @foreach($order->products()->get() as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td class="text-center">{{ number_format($product->price, 2) }} €</td>
                        <td class="text-center">{{ $product->pivot->quantity }}</td>
                        <td class="text-right">{{ number_format($product->pivot->quantity * $product->price, 2) }} €</td>
                    </tr>
                @endforeach
                <tr>
                    <td class="highrow"></td>
                    <td class="highrow"></td>
                    <td class="highrow"><strong>Cena</strong></td>
                    <td class="highrow">{{ number_format($order->price, 2) }} €</td>
                </tr>
                <tr>
                    <td class="highrow"></td>
                    <td class="highrow"></td>
                    <td class="highrow"><strong>Poštnina</strong></td>
                    <td class="highrow">{{ number_format($order->shipping, 2) }} €</td>
                </tr>
                <tr>
                    <td class="highrow"></td>
                    <td class="highrow"></td>
                    <td class="highrow"><strong>Skupaj</strong></td>
                    <td class="highrow">{{ number_format($order->shipping + $order->price, 2) }} €</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br><br><br><br>
Medtem si lahko ogledate zgodovino vaših naročil in njihovo stanje na <a href="{{ url('user/my-orders') }}">tej povezavi</a>.
<br><br><br>
Želimo Vam prijeten dan še naprej.
<br>
Ekipa Store