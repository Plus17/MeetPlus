<article class="post clearfix">
    <a href="#" class="thumb pull-left">
        <img class="img-thumbnail" src="{{ asset('images/img1.jpg') }}" alt="">
    </a>
    <h2 class="post-title">
        <a href="#">{{ $name }}</a>
    </h2>

    <p><span class="post-fecha">{{ $start }}</span> por <span class="post-autor"><a href="#">{{ $userName }}</a></span> en <span>{{ $category }}</span></p>

    <p class="post-contenido text-justify">
        {{ $description }}
    </p>

    <p>Information:</p>
    <ul>
        <li>Star: {{ $start }}</li>
        <li>End: {{ $end }}</li>
        <li>Place: {{ $place }}</li>
    </ul>

    <div id="map">
    
    </div>
</article>
