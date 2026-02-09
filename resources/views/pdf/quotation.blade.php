<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Quotation {{ $quotation->code }}</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
        .header {
            margin-bottom: 20px;
        }
        .title {
            font-size: 18px;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
        }
        th {
            background: #f5f5f5;
        }
        .text-right {
            text-align: right;
        }
    </style>
</head>
<body>

    {{-- HEADER --}}
    <div class="header">
        <div class="title">QUOTATION</div>
        <div>Code: {{ $quotation->code }}</div>
        <div>Valid Until: {{ $quotation->valid_until }}</div>
    </div>

    {{-- CUSTOMER --}}
    <h4>Customer Information</h4>
    <p>
        Pax: {{ $quotation->pax }} <br>
        Currency: {{ $quotation->currency }}
    </p>

    {{-- HOTEL DETAIL --}}
    <h4>Hotel Detail</h4>
    <table>
        <thead>
            <tr>
                <th>Hotel</th>
                <th>Room</th>
                <th>Nights</th>
                <th>Rooms</th>
                <th>Rate</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($quotation->hotels as $hotel)
                <tr>
                    <td>{{ $hotel->hotel->name }}</td>
                    <td>{{ $hotel->room->name }}</td>
                    <td>{{ $hotel->nights }}</td>
                    <td>{{ $hotel->rooms }}</td>
                    <td class="text-right">
                        {{ number_format($hotel->rate, 2) }}
                    </td>
                    <td class="text-right">
                        {{ number_format($hotel->total, 2) }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- PRICE BREAKDOWN --}}
    <h4>Price Summary</h4>
    <table>
        <tr>
            <td>Subtotal</td>
            <td class="text-right">
                {{ number_format($quotation->subtotal, 2) }}
            </td>
        </tr>
        <tr>
            <td>Margin</td>
            <td class="text-right">
                {{ number_format($quotation->margin, 2) }}
            </td>
        </tr>
        <tr>
            <th>Total</th>
            <th class="text-right">
                {{ number_format($quotation->total, 2) }}
            </th>
        </tr>
    </table>

</body>
</html>
