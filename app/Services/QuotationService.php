<?php

namespace App\Services;

use App\Models\Quotation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class QuotationService
{
    public function generate(array $data): Quotation
    {
        return DB::transaction(function () use ($data) {

            $quotation = Quotation::create([
                'code'        => $this->generateCode(),
                'type'        => $data['type'] ?? 'b2c',
                'currency'    => $data['currency'] ?? 'USD',
                'valid_until' => $data['valid_until'] ?? now()->addDays(7),
                'status'      => 'draft',
            ]);

            $total = 0;

            // ITEMS (tour, transport, etc)
            foreach ($data['items'] ?? [] as $item) {
                $subtotal = $item['qty'] * $item['price'];

                $quotation->items()->create([
                    'title'    => $item['title'],
                    'qty'      => $item['qty'],
                    'price'    => $item['price'],
                    'subtotal' => $subtotal,
                ]);

                $total += $subtotal;
            }

            // HOTELS
            foreach ($data['hotels'] ?? [] as $hotel) {
                $subtotal = $hotel['nights'] * $hotel['price_per_night'];

                $quotation->hotels()->create([
                    'hotel_id'        => $hotel['hotel_id'],
                    'hotel_room_id'   => $hotel['hotel_room_id'],
                    'nights'          => $hotel['nights'],
                    'pax'             => $hotel['pax'],
                    'price_per_night' => $hotel['price_per_night'],
                    'subtotal'        => $subtotal,
                ]);

                $total += $subtotal;
            }

            $quotation->update(['total' => $total]);

            return $quotation;
        });
    }

    protected function generateCode(): string
    {
        return 'QT-' . now()->format('Ymd') . '-' . strtoupper(Str::random(4));
    }
}
