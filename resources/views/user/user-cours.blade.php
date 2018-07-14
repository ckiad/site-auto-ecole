@extends('./templates/user-template')

@section('titre')
@lang('headings.titre_cours')
@endsection

@section('titre-operation')
@lang('headings.cours')
@endsection

@section('contenu')

<div class="content">
  <div class="container-fluid">

    <div class="list-group" id="cours">
      @if($cours)
        @foreach ($cours as $cour)
          <a id="cours1" href="#" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <h4> <i class="fa fa-book"></i> <span class="text-warning">{{ $cour->formation->label }} </span> <span class="text-info">&gt;
          </span> <strong class="text-warning"> {{ $cour->label }}</strong> </h4>
        </div>
        <p>{{ $cour->label }} </p>
        <span class="text-info">Cliquer pour voir le détail</span>
          </a>

          <div class="row article-detail" id="detail-cours1" style="display: none">
        <div class="col-md-2 offset-1">
          <img src="{{asset('assets/img/news.png')}}" alt="image" width="150px" height="150px">
        </div>
        <div class="col-md-8">
           {{ $cour->description }} @php
             echo "NB: ce cours est de type";
           @endphp   {{ $cour->type }}
          <hr>
          <span> <i class="fa fa-file-pdf-o"></i> <a href="#">pdf</a> </span> &nbsp; &nbsp;
          <span> <i class="fa fa-file-audio-o"></i> <a href="#">audio</a> </span> &nbsp; &nbsp;
          <span> <i class="fa fa-file-movie-o"></i> <a href="#">vidéo</a> </span> &nbsp; &nbsp;
        </div>
      </div>
      @endforeach
    @endif
      <a id="cours2" href="#" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <h4> <i class="fa fa-book"></i> <span class="text-warning">Intitulé formation </span> <span class="text-info">&gt;</span> <strong class="text-warning"> Intitulé cours 2</strong> </h4>
        </div>
        <p>Debut du descriptif de l'actualité avec quelques lignes sommaires ... </p>
        <span class="text-info">Cliquer pour voir le détail</span>
      </a>

      <a id="cours2" href="#" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <h4> <i class="fa fa-book"></i> <span class="text-warning">Intitulé formation </span> <span class="text-info">&gt;</span> <strong class="text-warning"> Intitulé cours 3</strong> </h4>
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
$("#cours1").click(function() {
  $("#detail-cours1").toggle('slow');
});
</script>
@endsection
