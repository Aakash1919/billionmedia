@if(isset($attributes) && is_array($attributes))
    <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
        <div class="d-flex align-items-center">
            <div class="font-35 text-dark"><i class="bx bx-info-circle"></i>
            </div>
            <div class="ms-3">
                <h6 class="mb-0 text-dark">{{ $attributes['title'] ?? '#' }}</h6>
                @if(isset($attributes['errors']))
                <div class="text-dark">
                    @foreach ($attributes['errors'] as $error)
                        {{ $error }} <br>
                    @endforeach
                </div>
                @else
                    <div class="text-dark">{{ $attributes['message'] ?? '' }}</div>
                @endif
                
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif