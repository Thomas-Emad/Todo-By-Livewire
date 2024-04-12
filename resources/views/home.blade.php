@extends('layouts.app')

@section('content')
    <div class="container">

        @livewireStyles
        @livewire('todo')
        @livewireScripts

    </div>
@endsection
