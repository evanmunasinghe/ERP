<x-layout>
    <x-slot:title>New Invoice generation</x-slot:title>

    <div class="mb-4">
        <h2><i class="fa-solid fa-file-invoice-dollar text-primary"></i> Create System Invoice</h2>
    </div>

    <form action="{{ route('invoices.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <x-card title="Invoice Configuration Matrix">
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-muted">Customer Selection</label>
                        <select name="customer_id" class="form-select" required>
                            <option value="">-- Select Target Customer --</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="form-label fw-semibold text-muted">Billing Date</label>
                        <input type="date" name="invoice_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                    </div>
                </x-card>
            </div>

            <div class="col-md-8">
                <x-card title="Line Items Collection">
                    <div id="invoice-items-container">
                        <div class="row g-2 align-items-center mb-2 item-row">
                            <div class="col-md-7">
                                <select name="items[0][product_id]" class="form-select" required>
                                    <option value="">-- Choose Inventory Product --</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }} (Stock: {{ $product->quantity }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="number" name="items[0][quantity]" class="form-control" placeholder="Qty" min="1" required>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-outline-danger w-100 remove-item-btn" disabled><i class="fa-solid fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="add-item-btn" class="btn btn-sm btn-outline-primary mt-2"><i class="fa-solid fa-plus"></i> Append Item Row</button>
                </x-card>
            </div>
        </div>

        <div class="text-end mt-2">
            <button type="submit" class="btn btn-success btn-lg px-5 shadow-sm"><i class="fa-solid fa-floppy-disk"></i> Commit Transaction</button>
        </div>
    </form>

    <x-slot:scripts>
        <script>
            let itemIndex = 1;
            document.getElementById('add-item-btn').addEventListener('click', function() {
                const container = document.getElementById('invoice-items-container');
                const firstRow = container.querySelector('.item-row');
                const newRow = firstRow.cloneNode(true);
                
                newRow.querySelector('select').name = `items[${itemIndex}][product_id]`;
                newRow.querySelector('select').value = '';
                newRow.querySelector('input').name = `items[${itemIndex}][quantity]`;
                newRow.querySelector('input').value = '';
                newRow.querySelector('.remove-item-btn').removeAttribute('disabled');
                
                container.appendChild(newRow);
                itemIndex++;
            });

            document.getElementById('invoice-items-container').addEventListener('click', function(e) {
                if(e.target.closest('.remove-item-btn')) {
                    const row = e.target.closest('.item-row');
                    if(document.querySelectorAll('.item-row').length > 1) row.remove();
                }
            });
        </script>
    </x-slot:scripts>
</x-layout>
