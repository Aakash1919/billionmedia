@push('style')
<style>
.kill {
    position: absolute;
    right: 5px;
    background-color: transparent !important;
    font-size: 37px;
    height: 33px;
    width: 33px;
    display: inline-block;
    border: none !important;
    font-weight: 100;
    color: #000 !important;
}
</style>
@endpush
@if(isset($attributes))
    <div class="modal fade" id="{{ $attributes['id'] ?? '' }}" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                        <button type="button" class="kill">&times;</button>
                        <h4 class="modal-title text-center">{{ $attributes['title'] ?? '' }}</h4>
                </div>
                <div class="modal-body">
                    @if(isset($attributes['view'])) 
                      @include( $attributes['view'] ?? '', array('attributes' => $attributes['viewParameters']))
                    @endif 
                </div>
            </div>
        </div>
    </div>
@endif
@push('javascript')
<script>
$(document).on('click', '.kill', function() {
    $('.modal').modal('hide');
})
</script>
@endpush