@extends('./templates/user-template')

@section('titre')
@lang('headings.titre_formations')
@endsection

@section('titre-operation')
@lang('headings.formations')
@endsection

@section('contenu')

<div class="content">
  <div class="container-fluid">

    <div class="list-group" id="cours">
      @if($formations)
      @foreach($formations as $formation)
      <a id="formation{{ $count++ }}" href="#" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <h4> <i class="fa fa-graduation-cap"></i> <strong class="text-warning"> {{$formation->label}}</strong> </h4>
        </div>
        <p>{{ str_limit($formation->label, $limit = 25, $end = '...') }} @php
          echo "et cela ne coute que : ";
        @endphp   {{ $formation->montant}} @php
          echo "F. CFA ";
        @endphp {{ $formation->description }}</p>
        <span class="text-info">Cliquer pour voir le détail</span>
      </a>

      <div class="row article-detail" id="detail-formation1" style="display: none">
        <div class="col-md-2 offset-1">
          <img src="{{asset('assets/img/news.png')}}" alt="image" width="150px" height="150px">
        </div>
        <div class="col-md-8">
         {{ $formation->description }}
          <hr>
          <span> <i class="fa fa-file-pdf-o"></i> <a href="#">pdf</a> </span> &nbsp; &nbsp;
          <span> <i class="fa fa-file-audio-o"></i> <a href="#">audio</a> </span> &nbsp; &nbsp;
          <span> <i class="fa fa-file-movie-o"></i> <a href="#">vidéo</a> </span> &nbsp; &nbsp;
        </div>
      </div>
    @endforeach
  @endif


      <a id="formation1" href="#" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <h4> <i class="fa fa-graduation-cap"></i> <strong class="text-warning"> Intitulé formation 2</strong> </h4>
        </div>
        <p>Debut du descriptif de l'actualité avec quelques lignes sommaires ... </p>
        <span class="text-info">Cliquer pour voir le détail</span>
      </a>

      <a id="formation1" href="#" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <h4> <i class="fa fa-graduation-cap"></i> <strong class="text-warning"> Intitulé formation 3</strong> </h4>
        </div>
        <p>Debut du descriptif de l'actualité avec quelques lignes sommaires ... </p>
        <span class="text-info">Cliquer pour voir le détail</span>
      </a>

    </div>

  </div>
</div>


@endsection

@section('extra-js')
<script type="text/javascript">
$("#formation{{ $count++ }}").click(function(e) {
  e.preventDefault();
  $("#detail-formation{{ $count++ }}").toggle('slow');
});
</script>
@endsection
