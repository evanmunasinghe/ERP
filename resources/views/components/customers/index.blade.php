<x-layout>
    <x-slot:title>Customers | Nexus ERP</x-slot:title>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1"><i class="fa-solid fa-address-book text-secondary me-2"></i> Customers</h2>
            <p class="text-muted small mb-0">Manage customer records used for invoice generation.</p>
        </div>
        <button type="button" class="btn btn-primary px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#createCustomerModal">
            <i class="fa-solid fa-plus me-2"></i> Add Customer
        </button>
    </div>

    <x-card>
        <x-table :headers="[
            'Name',
            'Email',
            'Phone',
            'Address',
            ['text' => 'Actions', 'align' => 'center', 'class' => 'no-print'],
        ]">
            @forelse($customers as $customer)
                <tr>
                    <td class="fw-semibold">{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td class="text-muted">{{ $customer->address }}</td>
                    <td class="text-center no-print">
                        <form action="{{ route('customers.destroy', $customer) }}" method="POST" onsubmit="return confirm('Remove this customer?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete Customer">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-5 text-muted">No customers registered yet.</td>
                </tr>
            @endforelse
        </x-table>
    </x-card>

    <div class="modal fade" id="createCustomerModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title fw-bold"><i class="fa-solid fa-address-book me-2 text-info"></i> Register Customer</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('customers.store') }}" method="POST">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label fw-semibold text-muted">Customer Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-muted">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-muted">Phone</label>
                                <input type="text" name="phone" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold text-muted">Address</label>
                                <textarea name="address" class="form-control" rows="3" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary px-4">Save Customer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
