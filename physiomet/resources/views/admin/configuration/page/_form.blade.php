@include('admin.layouts.forms._name')
@if(isset($dados))
    @if($dados->id == 10)
        @include('admin.layouts.forms._video')
    @endif
    @if($dados->id == 1)
        @include('admin.layouts.forms._image',[
            'label' => 'Imagem',
            'size' => $imageSize,
            'name' => 'image',
            'path' => 'page',
            'route_destroy' => route('admin.configuration.page.destroyFile', ['id' => isset($dados->id) ? $dados->id : null, 'name' => 'image'])
        ])
    @endif
    @if($dados->id == 13)
        @include('admin.layouts.forms._video_mp4_ogg', [
            'path' => 'page',
            'route_destroy_1' => route('admin.configuration.page.destroyFile', ['id' => $dados->id, 'name' => 'video_mp4']),
            'route_destroy_2' => route('admin.configuration.page.destroyFile', ['id' => $dados->id, 'name' => 'video_ogg'])
        ])
    @endif
    @include('admin.layouts.forms._description')
@endif