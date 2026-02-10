<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;


class QuotationController extends Controller
{
    public function create()
    {
        return view('admin.quotations.create', [
            'hotels' => Hotel::with('rooms.rates')->get(),
        ]);
    }

    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {

            $quotation = Quotation::create([
                'pax' => $request->pax,
                'currency' => $request->currency,
                'valid_until' => now()->addDays(7),
            ]);

            $subtotal = 0;

            foreach ($request->hotels as $hotel) {

                $total = $hotel['rate'] * $hotel['nights'] * $hotel['rooms'];

                $quotation->hotels()->create([
                    'hotel_id' => $hotel['hotel_id'],
                    'hotel_room_id' => $hotel['room_id'],
                    'rate' => $hotel['rate'],
                    'nights' => $hotel['nights'],
                    'rooms' => $hotel['rooms'],
                    'total' => $total,
                ]);

                $subtotal += $total;
            }

            $margin = $request->margin;
            $quotation->update([
                'subtotal' => $subtotal,
                'margin' => $margin,
                'total' => $subtotal + $margin,
            ]);

            $quotation->items()->create([
                'name' => 'Hotel Package',
                'qty' => 1,
                'price' => $subtotal,
                'total' => $subtotal,
            ]);

            $quotation->logs()->create([
                'note' => 'Quotation created',
                'admin_id' => auth()->id(),
            ]);
        });

        return redirect()->route('admin.quotations.index');
    }

    public function pdf(Quotation $quotation)
    {
        $pdf = Pdf::loadView('pdf.quotation', [
            'quotation' => $quotation
        ]);

        return $pdf->stream("quotation-{$quotation->code}.pdf");
    }
}
