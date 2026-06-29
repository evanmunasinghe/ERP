<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::transaction(function (): void {
            $customers = collect([
                [
                    'name' => 'Ceylon Engineering Works',
                    'email' => 'accounts@ceylonengineering.test',
                    'phone' => '+94 11 245 8800',
                    'address' => '45 Industrial Zone, Colombo',
                ],
                [
                    'name' => 'Kandy Manufacturing Co.',
                    'email' => 'billing@kandymanufacturing.test',
                    'phone' => '+94 81 222 4100',
                    'address' => '18 Peradeniya Road, Kandy',
                ],
                [
                    'name' => 'Galle Marine Supplies',
                    'email' => 'finance@gallemarine.test',
                    'phone' => '+94 91 224 6700',
                    'address' => '7 Harbour Road, Galle',
                ],
                [
                    'name' => 'Jaffna Agro Systems',
                    'email' => 'orders@jaffnaagro.test',
                    'phone' => '+94 21 221 9000',
                    'address' => '22 Palaly Road, Jaffna',
                ],
                [
                    'name' => 'Kurunegala Hardware Depot',
                    'email' => 'ledger@kurunegalahardware.test',
                    'phone' => '+94 37 223 1550',
                    'address' => '64 Main Street, Kurunegala',
                ],
            ])->mapWithKeys(fn (array $customer) => [
                $customer['email'] => Customer::updateOrCreate(
                    ['email' => $customer['email']],
                    $customer,
                ),
            ]);

            $products = collect([
                [
                    'name' => 'Hydraulic Pump Assembly',
                    'code' => 'HYD-PMP-001',
                    'cost' => 48500,
                    'price' => 72500,
                    'quantity' => 32,
                    'description' => 'High-pressure pump unit for industrial hydraulic systems.',
                ],
                [
                    'name' => 'Stainless Steel Valve',
                    'code' => 'VAL-SS-014',
                    'cost' => 6200,
                    'price' => 9800,
                    'quantity' => 85,
                    'description' => 'Corrosion-resistant valve for fluid control lines.',
                ],
                [
                    'name' => 'Industrial Gear Motor',
                    'code' => 'MTR-GR-220',
                    'cost' => 38200,
                    'price' => 57400,
                    'quantity' => 18,
                    'description' => 'Compact gear motor for conveyor and production machinery.',
                ],
                [
                    'name' => 'Safety Control Relay',
                    'code' => 'RLY-SAFE-08',
                    'cost' => 4150,
                    'price' => 6900,
                    'quantity' => 120,
                    'description' => 'Safety relay for machine guarding and emergency circuits.',
                ],
                [
                    'name' => 'Pneumatic Cylinder 50mm',
                    'code' => 'PNE-CYL-050',
                    'cost' => 9400,
                    'price' => 14800,
                    'quantity' => 44,
                    'description' => 'Double-action pneumatic cylinder with 50mm bore.',
                ],
                [
                    'name' => 'Conveyor Belt Roller',
                    'code' => 'CNV-RLR-300',
                    'cost' => 3100,
                    'price' => 5200,
                    'quantity' => 160,
                    'description' => 'Replacement roller for medium-duty conveyor systems.',
                ],
                [
                    'name' => 'Panel Mount Indicator',
                    'code' => 'IND-PNL-024',
                    'cost' => 1250,
                    'price' => 2350,
                    'quantity' => 200,
                    'description' => '24V LED indicator for electrical control panels.',
                ],
                [
                    'name' => 'Industrial Bearing Set',
                    'code' => 'BRG-SET-6205',
                    'cost' => 1800,
                    'price' => 3200,
                    'quantity' => 95,
                    'description' => 'Bearing set for rotating shafts and motor housings.',
                ],
            ])->mapWithKeys(fn (array $product) => [
                $product['code'] => Product::updateOrCreate(
                    ['code' => $product['code']],
                    $product,
                ),
            ]);

            $invoices = [
                [
                    'invoice_number' => 'INV-SEED-20260601',
                    'customer_email' => 'accounts@ceylonengineering.test',
                    'invoice_date' => '2026-06-01',
                    'items' => [
                        ['code' => 'HYD-PMP-001', 'quantity' => 2],
                        ['code' => 'VAL-SS-014', 'quantity' => 6],
                        ['code' => 'RLY-SAFE-08', 'quantity' => 10],
                    ],
                ],
                [
                    'invoice_number' => 'INV-SEED-20260605',
                    'customer_email' => 'billing@kandymanufacturing.test',
                    'invoice_date' => '2026-06-05',
                    'items' => [
                        ['code' => 'MTR-GR-220', 'quantity' => 1],
                        ['code' => 'CNV-RLR-300', 'quantity' => 12],
                    ],
                ],
                [
                    'invoice_number' => 'INV-SEED-20260611',
                    'customer_email' => 'finance@gallemarine.test',
                    'invoice_date' => '2026-06-11',
                    'items' => [
                        ['code' => 'PNE-CYL-050', 'quantity' => 4],
                        ['code' => 'BRG-SET-6205', 'quantity' => 8],
                    ],
                ],
                [
                    'invoice_number' => 'INV-SEED-20260618',
                    'customer_email' => 'orders@jaffnaagro.test',
                    'invoice_date' => '2026-06-18',
                    'items' => [
                        ['code' => 'IND-PNL-024', 'quantity' => 20],
                        ['code' => 'RLY-SAFE-08', 'quantity' => 6],
                    ],
                ],
                [
                    'invoice_number' => 'INV-SEED-20260624',
                    'customer_email' => 'ledger@kurunegalahardware.test',
                    'invoice_date' => '2026-06-24',
                    'items' => [
                        ['code' => 'VAL-SS-014', 'quantity' => 10],
                        ['code' => 'CNV-RLR-300', 'quantity' => 15],
                        ['code' => 'BRG-SET-6205', 'quantity' => 12],
                    ],
                ],
            ];

            foreach ($invoices as $seedInvoice) {
                $invoiceItems = collect($seedInvoice['items'])
                    ->map(function (array $item) use ($products): array {
                        $product = $products[$item['code']];
                        $quantity = (int) $item['quantity'];
                        $subtotal = (float) $product->price * $quantity;

                        return [
                            'product_id' => $product->id,
                            'quantity' => $quantity,
                            'unit_price' => $product->price,
                            'subtotal' => $subtotal,
                        ];
                    });

                $invoice = Invoice::updateOrCreate(
                    ['invoice_number' => $seedInvoice['invoice_number']],
                    [
                        'customer_id' => $customers[$seedInvoice['customer_email']]->id,
                        'invoice_date' => $seedInvoice['invoice_date'],
                        'total_amount' => $invoiceItems->sum('subtotal'),
                    ],
                );

                $invoice->items()->delete();
                $invoice->items()->createMany($invoiceItems->all());
            }
        });
    }
}
