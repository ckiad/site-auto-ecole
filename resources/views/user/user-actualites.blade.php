@extends('./templates/user-template')

@section('titre')
@lang('headings.titre_actualites')
@endsection

@section('titre-operation')
@lang('headings.actualites')
@endsection

@section('contenu')

<div class="content">
  <div class="container-fluid">


    <div class="list-group" id="actualites">
      @if(session('posts'))
      @foreach(session('posts') as $post )
        <a id="post{{ $count++ }}" href="#" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <h4> <i class="fa fa-sun-o"></i> <strong class="text-warning">{{ $post->label }}</strong> </h4>
          <small>@php
            $now = new DateTime();
            $birth =  $post->created_at;
            $duree = $birth->diff($now, $absolute=false);
            echo $duree->format('%R%a')." jours environs";
          @endphp</small>
        </div>
        <p>{{ str_limit($post->contenu, $limit = 25, $end = '...') }} </p>
        <span class="text-info">Cliquer pour voir le détail</span>
        </a>

      <div class="row article-detail" id="detail-post1" style="display: none">
        <div class="col-md-2 offset-1">
          <img src="{{asset('assets/img/news.png')}}" alt="image" width="150px" height="150px">
        </div>
        <div class="col-md-8">
              {{ $post->contenu }}
          <hr>
          <span> <i class="fa fa-file-pdf-o"></i> <a href="#">pdf</a> </span> &nbsp; &nbsp;
          <span> <i class="fa fa-file-audio-o"></i> <a href="#">audio</a> </span> &nbsp; &nbsp;
          <span> <i class="fa fa-file-movie-o"></i> <a href="#">vidéo</a> </span> &nbsp; &nbsp;
        </div>
      </div>

      @endforeach
      @endif

      <a id="post1" href="#" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <h4> <i class="fa fa-calendar"></i> <strong class="text-success"> Titre Evenement 1</strong> </h4>
          <small>7 jours environs</small>
        </div>
        <p>Debut du descriptif de l'actualité avec quelques lignes sommaires ... </p>
        <span class="text-info">Cliquer pour voir le détail</span>
      </a>

      <a id="post1" href="#" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <h4> <i class="fa fa-sun-o"></i> <strong class="text-warning"> Titre actualité 2</strong> </h4>
          <small>7 jours environs</small>
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
$("#post{{ $count++ }}").click(function() {
  $("#detail-post{{ $count++ }}").toggle('slow');
});
</script>
@endsection
