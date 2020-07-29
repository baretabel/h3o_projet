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
                    <form id="msform" method="POST" action="{{route('new')}}">
                        <input type="hidden" id="r_comp" action="{{route('com')}}">
                        <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="general"><strong>Général</strong></li>
                                <li id="ressource"><strong>Compétences</strong></li>
                                <li id="general"><strong>Détails</strong></li>
                                <li id="valid"><strong>Validation</strong></li>
                            </ul> <!-- fieldsets -->
                            <!-- fieldsets Info General-->
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Général</h2>
                                     <input type="text" id="nom" name="nom" placeholder="Nom" onchange="valid_gen2()"/>
                                     <input type="text" id="prenom" name="prenom" placeholder="Prénom" onchange="valid_gen2()"/>
                                     <input type="date" id="date" name="date" onchange="valid_gen2()"/>
                                     <input type="text" id="projet" name="projet" placeholder="Nom du projet" onchange="valid_gen2()"/> 
                                    <textarea id="description" name="description" rows="3" placeholder="Explique nous ton projet en quelques phrases" onchange="valid_gen2()"></textarea>
                                </div> 
                                <input type="button" id="btn-gen1" name="next" class="disabled action-button" value="Suivant" />
                                <input type="button" id="btn-gen2" name="next" class="next inv action-button" value="Suivant" />
                            </fieldset>
                            <!-- fieldsets Periode-->
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Compétences</h2>
                                    <div><label>Les compétences que je souhaite acquérir ou améliorer </label>
                                    <div>
                                        @foreach ($competences as $competence)
                                            <div class="col-md-4">
                                                <input class="check" type="checkbox" id="competences[]" name="competences[]" value="{{$competence->competence}}"onchange="valid_c()">
                                                <label for="territoire-{{$competence->id}}">{{$competence->competence}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <p><br></p>
                                    <div class="flex" style="width:95%">
                                        <div style="width:80%;margin-right:25px">
                                            <input type="text" id="competence" name="competence" placeholder="Autre" onchange="verif_com()"/>
                                        </div>
                                        <div id="n-comp"><i class="fas fa-plus fa-2x"></i></div>
                                        <div id="l-comp"></div>
                                    </div></div>
                                    </div> <input type="button" name="previous" class="previous action-button-previous" value="Précédent"  /><input type="button" id="btn-per1" name="next" class="disabled action-button" value="Suivant" /><input type="button" id="btn-per2" name="next" class="next inv action-button" value="Suivant" />
                            </fieldset>
                            <!-- fieldsets Acteur Concerné-->
                            <fieldset>
                                <div class="form-card bot">
                                    <h2 class="fs-title space">Détails</h2>
                                    <label for="detail">A quoi va servir ce projet ?</label>
                                    <textarea id="detail" name="detail" rows="3" placeholder="(Soit le plus complet et précis possible)" onchange="valid_det()"></textarea>
                                </div>

                                    
                                 <input type="button" name="previous" class="previous action-button-previous" value="Précedent" /><input type="button" id="btn-res1" name="next" class="disabled action-button" value="Valider" /><input  type="button" id="btn-res3" name="next" class="next inv action-button" value="Valider" onclick="ajouter()" />
                            </fieldset>
                            <!-- fieldsets va;lidation-->
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title text-center">Validation !</h2> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-3"> <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image"> </div>
                                    </div> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                            
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection