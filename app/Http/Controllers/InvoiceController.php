<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InvoiceController extends Controller
{
    public function index(): View
    {
        return view('components.invoices.index', [
            'invoices' => Invoice::query()
                ->with(['customer', 'items'])
                ->latest()
                ->get(),
        ]);
    }

    public function create(): View
    {
        return view('components.invoices.create', [
            'customers' => Customer::query()
                ->orderBy('name')
                ->get(),
            'products' => Product::query()
                ->where('quantity', '>', 0)
                ->orderBy('name')
                ->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'customer_id' => ['required', 'exists:customers,id'],
            'invoice_date' => ['required', 'date'],
            'items' => ['required', 'array', 'min:1'],
            'items.*.product_id' => ['required', 'exists:products,id'],
            'items.*.quantity' => ['required', 'integer', 'min:1'],
        ]);

        DB::transaction(function () use ($validated): void {
            $totalAmount = 0;
            $invoiceItems = [];

            foreach ($validated['items'] as $item) {
                $product = Product::query()
                    ->whereKey($item['product_id'])
                    ->lockForUpdate()
                    ->firstOrFail();

                if (! $product->hasStock((int) $item['quantity'])) {
                    abort(422, "{$product->name} does not have enough stock.");
                }

                $subtotal = (float) $product->price * (int) $item['quantity'];
                $totalAmount += $subtotal;

                $invoiceItems[] = [
                    'product_id' => $product->id,
                    'quantity' => (int) $item['quantity'],
                    'unit_price' => $product->price,
                    'subtotal' => $subtotal,
                ];

                $product->decrement('quantity', (int) $item['quantity']);
            }

            $invoice = Invoice::create([
                'customer_id' => $validated['customer_id'],
                'invoice_number' => 'INV-'.now()->format('Ymd').'-'.Str::upper(Str::random(6)),
                'invoice_date' => $validated['invoice_date'],
                'total_amount' => $totalAmount,
            ]);

            $invoice->items()->createMany($invoiceItems);
        });

        return redirect()
            ->route('invoices.index')
            ->with('success', 'Invoice created and stock updated.');
    }

    public function destroy(Invoice $invoice): RedirectResponse
    {
        $invoice->delete();

        return redirect()
            ->route('invoices.index')
            ->with('success', 'Invoice removed.');
    }
}
