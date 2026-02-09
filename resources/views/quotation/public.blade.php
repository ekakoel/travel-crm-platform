<!DOCTYPE html>
<html>
<head>
    <title>Quotation {{ $quotation->code }}</title>
</head>
<body>

<h2>Quotation {{ $quotation->code }}</h2>

<p>
    Pax: {{ $quotation->pax }} <br>
    Valid Until: {{ $quotation->valid_until }}
</p>

<hr>

@foreach ($quotation->hotels as $hotel)
    <p>
        <strong>{{ $hotel->hotel->name }}</strong><br>
        Room: {{ $hotel->room->name }}<br>
        Nights: {{ $hotel->nights }}<br>
        Total: {{ number_format($hotel->total, 2) }}
    </p>
    <hr>
@endforeach

<h3>Total: {{ number_format($quotation->total, 2) }}</h3>

</body>
</html>
