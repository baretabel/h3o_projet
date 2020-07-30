@extends('layout.layout')

@section('content')

<img src="{{ asset('img/logo.png') }}"  alt="" class="center-block">

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
                
				<div class="panel-body">

					<div class="col-md-12 mx-0">
                    <!-- cration des routes vers les fonctions laravel -->
                    
                    <div class="form-card bot">
                        <h2 class="fs-title space">Fiche Projet</h2>
                        @if ($fiches->projet_id==null)
                            <p><b>Nom:</b> {{$fiches->project->nom}}</p>
                            <p><b>Prénom:</b> {{$fiches->project->prenom}}</p>
                            <p><b>Nom du projet:</b> {{$fiches->project->nom_projet}}</p>
                            <p><b>Date:</b> {{$fiches->project->date}}</p>
                            <p><b>Description du projet:</b> <br>{{$fiches->project->description}}</p>
                            <p><b>But du projet:</b> {{$fiches->project->but}}</p>
                            <p><b>Compétence nécessaire:</b>
                            @foreach ($fiches->ressource as $ressource)
                                <br>{{$ressource->ressource}}
                            @endforeach
                            </p>
                        @elseif($fiches->project_id==null)
                            <p><b>Nom du projet:</b> {{$fiches->projet->nom_projet}}</p>
                            <p><b>Catégorie:</b> {{$fiches->projet->categorie}}</p>
                            <p><b>Contexte:</b> <br>{{$fiches->projet->contexte}}</p>
                            <p><b>But du projet:</b> {{$fiches->projet->but}}</p>
                            <p><b>Secteur géographique:</b>
                                @foreach ($fiches->projet->territoire as $territoire)
                                    
                                    <br>{{$territoire->localite->localite}}
                                    
                                @endforeach
                                </p>
                            <p><b>Objectif du projet:</b> <br>{{$fiches->projet->objectif}}</p>
                            <p><b>Livrable attendu:</b> <br>{{$fiches->projet->livrable}}</p>
                            <h3>Période et public</h3>
                            <p><b>Date de début:</b> {{$fiches->projet->debut}}</p>
                            <p><b>Date de fin:</b> {{$fiches->projet->fin}}</p>
                            <p><b>Public visée:</b> <br>{{$fiches->projet->public}}</p>
                            <h3>Compétence et Matériel</h3>
                            <p><b>Compétence nécessaire:</b>
                            @foreach ($fiches->ressource as $ressource)
                                @if($ressource->type==0)
                                <br>{{$ressource->ressource}}
                                @endif
                            @endforeach
                            </p>
                            <p><b>Matériel nécessaire:</b>
                                @foreach ($fiches->ressource as $ressource)
                                    @if($ressource->type==1)
                                    <br>{{$ressource->ressource}}
                                    @endif
                                @endforeach
                                </p>
                        @endif
                    
                    </div>

                    
                    
                </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection