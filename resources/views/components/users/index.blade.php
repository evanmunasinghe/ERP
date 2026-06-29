<x-layout>
    <x-slot:title>Users | Nexus ERP</x-slot:title>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1"><i class="fa-solid fa-users-gear text-secondary me-2"></i> Users</h2>
            <p class="text-muted small mb-0">Administrative accounts currently registered in the system.</p>
        </div>
    </div>

    <x-card>
        <x-table :headers="['Name', 'Email', 'Created']">
            @forelse($users as $user)
                <tr>
                    <td class="fw-semibold">{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="text-muted">{{ $user->created_at?->format('M d, Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center py-5 text-muted">No users found.</td>
                </tr>
            @endforelse
        </x-table>
    </x-card>
</x-layout>
