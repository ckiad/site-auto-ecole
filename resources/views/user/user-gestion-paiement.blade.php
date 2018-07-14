@extends('./templates/user-template')

@section('titre')
  Accueil
@endsection

@section('titre-operation')
  ESPACE PERSONNEL DE PAIEMENT
@endsection

@section('lien-paiement')

@endsection

@section('contenu')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-offset-4 col-md-4 col-sm-12 col-xs-12 ">
        <div class="contact-form">
            <form class="clearfix" accept-charset="utf-8" method="post" action="{{ url('/user/paiement-souscription') }}">
                {{ csrf_field() }}
                Avec quel numéro de téléphone voulez-vous payer votre souscription
                <div class="row">
                    <div class="col-sm-12 form-group wow fadeInDown" data-wow-delay="700ms" data-wow-duration="1000ms">
                        <label class="sr-only">@lang('labels.telephone')</label>
                        <input type="text" name="telephone" id="telephone" placeholder="@lang('labels.phone_number') *" 
                            class="form-control input-lg" required="" value="{{Sentinel::getUser()->telephone}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 form-group wow fadeInDown" data-wow-delay="700ms" data-wow-duration="1000ms">
                        <label class="sr-only">@lang('labels.confirm_telephone')</label>
                        <input type="text" name="confirm_telephone" id="confirm_telephone" placeholder="@lang('labels.phone_number') *" 
                            class="form-control input-lg" required="" value="{{Sentinel::getUser()->telephone}}">
                    </div>
                </div>
                <button class="btn btn-success btn-lg btn-block wow fadeInDown" data-wow-delay="1200ms" data-wow-duration="1000ms" type="submit">@lang('buttons.paiement')</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
