@extends('layout.layout')

@section('content')
<img src="{{ asset('img/logo.png') }}"  alt="" class="center-block">

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-body">

					<div class="col-md-12 mx-0 flexible">
                    <!-- cration des routes vers les fonctions laravel -->
                    <a class="lien"href="{{route('home')}}">Fiche Projet 1</a>
					<a class="lien"href="{{route('form')}}">Fiche Projet 2</a>
                    <a class="lien"href="{{route('admin')}}">Dashboard Admin</a>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection