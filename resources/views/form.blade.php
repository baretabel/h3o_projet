@extends('layout.layout')

@section('content')
<div class="form-cad">
    <h1>Nouveau Projet</h1>
    <form method="POST" action="/form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
        <label for="categorie">Catégorie:</label>
        <input type="text" class="form-control" name="categorie" id="categorie" placeholder="Entrer une catégorie">
        </div>
        <div class="form-group">
        <label for="nom_projet">Territoire(s) concerné(s):</label>
        @foreach ($localites as $localite)
            <div>
                <input type="checkbox" id="territoire-{{$localite->id}}" name="territoire[]" value="{{$localite->id}}">
                <label for="territoire-{{$localite->id}}">{{$localite->localite}}</label>
            </div>
        @endforeach
        </div>
        <div class="form-group">
            <label for="contexte">Contexte/Constats:</label>
            <textarea class="form-control" id="contexte" name="contexte" placeholder="Renseigner le contexte du projet">
            </textarea>
        </div>
        <div class="form-group">
            <label for="but">Finalités (ou buts) du projet:</label>
            <textarea class="form-control" id="but" name="but" placeholder="Renseigner la finalité du projet">
            </textarea>
        </div>
        <div class="form-group">
            <label for="objectif">Objectifs opérationnels:</label>
            <textarea class="form-control" id="objectif" name="objectif" placeholder="Renseigner les objectifs fonctionnels du projet">
            </textarea>
        </div>
        <div class="form-group">
            <label for="livrable">Livrables:</label>
            <textarea class="form-control" id="livrable" name="livrable" placeholder="Renseigner les livrables du projet">
            </textarea>
        </div>
        <h3>Période de réalisation</h3>
        <div class="form-group">
            <label for="debut">Début:</label>
            <input type="date" class="form-control" name="debut" id="debut">
        </div>
        <div class="form-group">
            <label for="annee">Fin prévisonnelle:</label>
            <input type="date" class="form-control" name="fin" id="fin">
        </div>
        <div class="form-group">
            <label for="publ">Public(s) visé(s):</label>
            <textarea class="form-control" id="public" name="public" placeholder="Renseigner le public visé">
            </textarea>
        </div>
        <h3>Acteur concernée par le projet</h3>
        <div class="form-group">
            <label for="acteur">Nom:</label>
            <input type="text" class="form-control" name="acteur" id="acteur" placeholder="Entrer une catégorie">
        </div>
        <div class="form-group">
            <label for="role">Role:</label>
            <input type="text" class="form-control" name="role" id="role" placeholder="Entrer une catégorie">
        </div>
        <button class="btn btn-primary form-control">Ajouter un acteur</button>

        <h3>Ressources requises</h3>
        <div class="form-group">
            <label for="competence">Compétences:</label>
            <input type="text" class="form-control" name="competence" id="competence" placeholder="Entrer une compétence">
        </div>
        <button class="btn btn-primary form-control">Ajouter une compétence</button>

        <div class="form-group">
            <br>
            <label for="materiel">Matériels:</label>
            <input type="text" class="form-control" name="materiel" id="materiel" placeholder="Entrer un besoin matériel">
        </div>
        <button class="btn btn-primary form-control">Ajouter un matériel</button>
        <div><br></div>
        <button type="submit" class="btn btn-success form-control ">Submit</button>
    </form>
</div>
@endsection