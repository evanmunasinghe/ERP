@props(['title' => null])
<div {{ $attributes->merge(['class' => 'card shadow-sm border-0 mb-4']) }}>
    @if($title)
        <div class="card-header bg-white py-3 border-bottom-0">
            <h5 class="card-title text-muted mb-0 fw-bold fs-6">{{ $title }}</h5>
        </div>
    @endif
    <div class="card-body">
        {{ $slot }}
    </div>
</div>