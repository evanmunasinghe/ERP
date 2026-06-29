@props(['headers' => []])

<div class="table-responsive">
    <table {{ $attributes->merge(['class' => 'table table-hover align-middle mb-0']) }}>
        @if(!empty($headers))
            <thead class="table-light border-bottom">
                <tr>
                    @foreach($headers as $header)
                        @if(is_array($header))
                            <th class="py-3 text-{{ $header['align'] ?? 'start' }} {{ $header['class'] ?? '' }}">{{ $header['text'] }}</th>
                        @else
                            <th class="py-3">{{ $header }}</th>
                        @endif
                    @endforeach
                </tr>
            </thead>
        @endif
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
</div>
