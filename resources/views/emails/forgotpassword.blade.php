@extends('emails/layouts/default')

@section('content')
<h1>Bonjour M., {!! $user->nom !!} {!! $user->prenom !!}, </h1>
<p>
S'il vous plait cliquez sur ce lien pour Modifier votre mot de passe<br/>
<a href="{{ env('APP_URL')}}:8000/reset-password/{{ $user->email }}/{{ $code }}"> 
Modification du mot de passe du compte
</a> 
<p>Best regards,</p>

<p>Auto ecole Admin.<br>
<a href="#">Autoecole.cm</p>
@stop
