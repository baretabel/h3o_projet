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
                    <form id="msform" method="POST" action="{{route('nouv')}}">
                        <input type="hidden" id="r_act" action="{{route('act')}}">
                        <input type="hidden" id="r_comp" action="{{route('comp')}}">
                        <input type="hidden" id="r_mat" action="{{route('mat')}}">
                        <input type="hidden" id="r_terr" action="{{route('terr')}}">
                        <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="general"><strong>Général</strong></li>
                                <li id="periode"><strong>Période</strong></li>
                                <li id="acteur"><strong>Acteur</strong></li>
                                <li id="ressource"><strong>Resources</strong></li>
                                <li id="valid"><strong>Validation</strong></li>
                            </ul> <!-- fieldsets -->
                            <!-- fieldsets Info General-->
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Général</h2>
                                     <input type="text" id="categorie" name="categorie" placeholder="Catégorie" onchange="valid_gen()"/> 
                                     <input type="text" id="nom" name="nom" placeholder="Nom du projet" onchange="valid_gen()"/> 
                                     <label>Territoire(s) concerné(s):</label>
                                    <div>
                                        @foreach ($localites as $localite)
                                            <div class="col-md-3">
                                                <input class="check" type="checkbox" id="territoire-{{$localite->id}}" name="territoire" value="{{$localite->id}}">
                                                <label for="territoire-{{$localite->id}}">{{$localite->localite}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <textarea id="contexte" name="contexte" rows="3" placeholder="Contexte/Constats" onchange="valid_gen()"></textarea>
                                    <textarea id="but" name="but" rows="3" placeholder="Finalités (ou buts) du projet" onchange="valid_gen()"></textarea>
                                    <textarea id="objectif" name="objectif" rows="3" placeholder="Objectifs opérationnels" onchange="valid_gen()"></textarea>
                                    <textarea id="livrable" name="livrable" rows="3" placeholder="Livrables" onchange="valid_gen()"></textarea>
                                </div> 
                                <input type="button" id="btn-gen1" name="next" class="disabled action-button" value="Suivant" />
                                <input type="button" id="btn-gen2" name="next" class="next inv action-button" value="Suivant" />
                            </fieldset>
                            <!-- fieldsets Periode-->
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Periode de réalisation</h2> 
                                    <label>Début</label>
                                    <input type="date" id="debut" name="debut" placeholder="First Name" onchange="valid_per()"/> 
                                    <label>Fin prévisionnelle</label>
                                    <input type="date" id="fin" name="fin" placeholder="Last Name" onchange="valid_per()"/> 
                                    <textarea id="public" name="public" rows="3" placeholder="Public(s) visé(s)" onchange="valid_per()"></textarea>
                                </div> <input type="button" name="previous" class="previous action-button-previous" value="Précédent"  /><input type="button" id="btn-per1" name="next" class="disabled action-button" value="Suivant" /><input type="button" id="btn-per2" name="next" class="next inv action-button" value="Suivant" />
                            </fieldset>
                            <!-- fieldsets Acteur Concerné-->
                            <fieldset>
                                <div class="form-card bot">
                                    <h2 class="fs-title space">Acteur concerné par le projet</h2>
                                    <div class="flex">
                                        <div style= "width:40%;margin-right:25px">
                                            <input type="text" id="act" name="acteur" placeholder="Nom" onchange="verif()"/>
                                        </div>
                                        <div style= "width:40%;margin-right:25px">
                                            <input  type="text" id="role" name="role" placeholder="Role" onchange="verif()"/>
                                        </div>
                                        <div id="n-act"><i class="fas fa-plus fa-2x"></i></div>

                                    <div id="l-act"><p><br></p></div>
                                </div>
                                </div> <input type="button" name="previous" class="previous action-button-previous" value="Précédent" /><input type="button" id="btn-act1" name="next" class="disabled action-button" value="Suivant" /><input type="button" id="btn-act2" name="next" class="next inv action-button" value="Suivant" />
                            </fieldset>
                            <!-- fieldsets Ressource Requise-->
                            <fieldset>
                                <div class="form-card bot">
                                    <h2 class="fs-title space">Ressources requises</h2>
                                    <div >
                                        <div class="flex">
                                            <div style="width:80%;margin-right:25px">
                                                <input type="text" id="competence" name="competence" placeholder="Compétences" onchange="verif_c()"/>
                                            </div>
                                            <div id="n-comp"><i class="fas fa-plus fa-2x"></i></div>
                                            <div id="l-comp"></div>
                                        </div>
                                        <p><br></p>
                                        
                                        <div class="flex">
                                            <div style="width:80%;margin-right:25px">
                                                <input type="text" id="materiel" name="materiel" placeholder="Materiels" onchange="verif_m()"/>
                                            </div>
                                            <div id="n-mat"><i class="fas fa-plus fa-2x"></i></div>
                                            <div id="l-mat"></div>
                                        </div>
                                    </div>


                                    
                                </div> <input type="button" name="previous" class="previous action-button-previous" value="Précedent" /><input type="button" id="btn-res1" name="next" class="disabled action-button" value="Valider" /><input  type="button" id="btn-res2" name="next" class="next inv action-button" value="Valider" onclick="ajout()" />
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