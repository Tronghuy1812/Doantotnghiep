@if($video->cv_path)
    <video width="100%" height="auto" controls autoplay>
        <source src="{{ pare_url_file($video->cv_path,'uploads_video') }}" type="video/mp4">
    </video>
@else
    {!! $video->cv_link !!}
@endif
