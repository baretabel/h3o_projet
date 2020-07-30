@extends('layout.layout')

@section('content')

<img src="{{ asset('img/logo.png') }}"  alt="" class="center-block">

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
                <div class="panel-heading fond-panel">
                    <div class="btn-group ">
                        <a href="{{route('admin')}}" class="btn btn-default bout">Tout les projet</a>
                        <a href="#" class="btn btn-default bout">Projet validé</a>
                        <a href="#" class="btn btn-default bout">Projet refusé</a>
                        <a href="#" class="btn btn-default bout">Projet en attente</a>
                      </div>
                </div> 
				<div class="panel-body">

					<div class="col-md-12 mx-0">
                    <!-- cration des routes vers les fonctions laravel -->
                    @foreach ($fiches as $fiche)
                        @if ($fiche->projet_id==null)
                        <div class="card" onclick="changerPage('/projet/{{ $fiche->id }}')">
                        
                            
                            <div class="card-body flexible">
                            
                            <p class="text-center"><b>{{$fiche->project->nom_projet}}</b></p><p> <small>By {{$fiche->project->prenom}} {{$fiche->project->nom}}</small></p>
                            
                            </div>
                        </div>
                        @endif
                        @if ($fiche->project_id==null)
                        <div class="card" onclick="changerPage('/projet/{{ $fiche->id }}')">
                        <input type="hidden" name="id" value="{{$fiche->id}}">
                            <div class="card-body flexible">
                            
                            <p class="text-center"><b>{{$fiche->projet->nom_projet}}</b></p><p> <small>By @foreach ($fiche->projet->acteur as $acteur)
                                @if ($loop->first)
                                {{$acteur->acteur}}
                                @endif
                            @endforeach  </small></p>
                            
                            </div>
                        </div>
                        @endif
                        
                    @endforeach
                    
                    
                </div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
    function changerPage(urlDestination){
    document.location.href= urlDestination ;
    }</script>
@endsection