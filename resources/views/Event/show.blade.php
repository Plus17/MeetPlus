@extends('layouts.layout')

<style>
    #map {
        width: 600px;
        max-width: 100%;
        height: 300px;
        max-height: 400px;
    }

</style>

@section('title', $event->name.' - ')

@section('content')

    @component('components/event_show')
        @slot('name', $event->name)

        @slot('start', $event->start)

        @slot('userName', $event->user->name)

        @slot('description', $event->description)

        @slot('category', $event->category->name)

        @slot('start', $event->start )

        @slot('end', $event->end )

        @slot('place', $event->place )

        @slot('latitude', $event->latitude)

        @slot('longitude', $event->longitude)
    @endcomponent

@endsection

@section('comments')

    @if (! $comments->isEmpty())
        @foreach ($comments as $comment)
            <div class="panel panel-info">
                <div class="panel-heading">Publicado por {{ $comment->user->name }} en {{ $comment->created_at->format('d-m-Y') }} </div>
                <div class="panel-body">
                <p>{{ $comment->comment }}</p>
                </div>
            </div>
            
        @endforeach
    @else
        <p>No hay comentarios</p>
    @endif

@endsection

@section('form.comments')

    @if (Auth::check())
        @include('Components.event.form_comments')
    @endif

@endsection

<script>
    function initMap() {
        var uluru = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key={{env('MAPS_API_KEY')}}&callback=initMap">
    </script>
