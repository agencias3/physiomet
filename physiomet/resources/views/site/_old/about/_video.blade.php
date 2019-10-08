@if(isPost(session()->get('page')[1]['video']))
    <section class="w-100 secondary-bg-1 box-movie">
    {!! (new \AgenciaS3\Services\UtilObjeto)->video(session()->get('page')[1]['video'], 'w-100 h-1024-350-px h-600-250-px') !!}
    <!--
        <img class="w-100" src="{{ asset('uploads/page/video.jpg') }}" title="" alt="" />
        -->
    </section>
@endif