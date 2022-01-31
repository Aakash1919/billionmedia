 @if(isset($attributes))
    <div class="modal fade" id="{{ $attributes['id'] ?? '' }}" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
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