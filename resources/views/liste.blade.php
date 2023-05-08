<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="articles lists">
    <title>Liste des Articles</title>
    <link href="{{secure_url('css/style.css') }}" rel="stylesheet">
    <link href="{{secure_url('css/style2.css') }}" rel="stylesheet">
    <link href="{{secure_url('assets/css/main.css') }}" rel="stylesheet">
    <link href="{{secure_url('css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
      .pagination-wrapper {
    text-align: center;
}

.pagination {
    display: inline-block;
    padding: 0;
    margin: 0;
}

.pagination li {
    display: inline-block;
    margin: 0 5px;
}

.pagination li a,
.pagination li span {
    display: inline-block;
    padding: 5px 10px;
    border: 1px solid #ccc;
    background-color: #fff;
    color: #333;
}

.pagination li.active a,
.pagination li.active span {
    background-color: #007bff;
    color: #fff;
    border-color: #007bff;
}

.pagination li.disabled a,
.pagination li.disabled span {
    opacity: .65;
    pointer-events: none;
}

    </style>
</head>
<body>
    <h1>Liste des articles</h1>
    <div class="wrapper">
        {{-- @foreach($liste as $l) --}}
{{-- <div class="clash-card barbarian">
      <div class="clash-card__level clash-card__level--barbarian">{{ $l->nomcategorie }}</div>
      <div class="clash-card__unit-name">{{ $l->titre }}</div>
      <div class="clash-card__unit-description">
      {{ $l->resume }}
      </div>

      <div class="clash-card__unit-stats clash-card__unit-stats--barbarian clearfix">
      <a class="button" href="/article/{{$l->id.'-'.$l->slug}}">  
        <div class="one-third">
          <div class="stat">MORE</div>
          <div class="stat-value"></div>
        </a>
        </div>
      </div>
    </div> --}}
        {{-- @endforeach --}}
    </div>
    <div id="wrapper">

      <!-- Header -->
        <header id="header">
          <h1><a href="index.html">AI ARTICLE</a></h1>
          <nav class="links">
            <ul>
              @if (session('user'))
              <li><a href="/article/">NEW ARTICLE</a></li>
              
              @endif
            </ul>
          </nav>
          <nav class="main">
            <ul>
              <li class="search">
                <a class="fa-search" href="#search">Search</a>
                <form id="search" method="get" action="/article/liste">
                  <input type="text" name="q" placeholder="Search" />
                  <input type="submit" value="search">
                </form>
              </li>
              <li class="menu">
                <a class="fa-bars" href="#menu">Menu</a>
              </li>
            </ul>
          </nav>
        </header>

      <!-- Menu -->
        <section id="menu">

          <!-- Search -->
            <section>
              <form class="search" method="get" action="/liste">
                <input type="text" name="query" placeholder="Search" />
                <input type="submit" value="search">
              </form>
            </section>

          <!-- Links -->
            <section>
              <ul class="links">
                @foreach($liste as $l)
                <li>
                  <a href="/article/{{$l->id.'-'.$l->slug}}">
                    <h3>{{ $l->titre }}</h3>
                    <p>{{ Str::limit($l->resume, 60) }}</p>
                  </a>
                </li>
                @endforeach
              </ul>
            </section>

          <!-- Actions -->
            <section>
              <ul class="actions stacked">
                <li><a href="/log" class="button large fit">Log In</a></li>
                <li><a href="/logout" class="button large fit">Log Out</a></li>
              </ul>
            </section>

        </section>

      <!-- Main -->
        <div id="main">
          @foreach($liste as $l)
          <!-- Post -->
            <article class="post">
              <header>
                <div class="title">
                  <h2><a href="/article/{{$l->id.'-'.$l->slug}}">{{ $l->titre }}</a></h2>
                  <p>{{ $l->nomcategorie }}</p>
                </div>
                <div class="meta">
                  {{$l->datecreation}}
                  {{-- <time class="published" datetime="{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $l->datecreation)->format('Y-m-d') }}">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $l->datecreation)->format('F d, Y') }}</time> --}}
                </div>
              </header>
              <a href="/article/{{$l->id.'-'.$l->slug}}" class="image featured"><img src="{{ $l->image }}" alt="" /></a>
              <p>{{ Str::limit($l->resume, 120) }}</p>
              <footer>
                <ul class="actions">
                  <li><a href="/article/{{$l->id.'-'.$l->slug}}" class="button large">Continue Reading</a></li>
                </ul>
              </footer>
            </article>
          @endforeach

   
          <!-- Pagination -->
          <div class="pagination-wrapper">
            {!! $liste->links() !!}
          </div>
        </div>

      <!-- Sidebar -->
        <section id="sidebar">

          <!-- Intro -->
            <section id="intro">
              <header>
                <h2>AI Article</h2>
                <p>Another fine responsive site template by <a href="http://html5up.net">HTML5 UP</a></p>
              </header>
            </section>

          <!-- Mini Posts -->
            <section>
              <div class="mini-posts">


                @foreach($liste as $l)
                <!-- Mini Post -->
                  <article class="mini-post">
                    <header>
                      <h3><a href="/article/{{$l->id.'-'.$l->slug}}">{{ $l->titre }}</a></h3>
                      <time class="published" datetime="{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $l->datecreation)->format('Y-m-d') }}">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $l->datecreation)->format('F d, Y') }}</time>
                      <a class="author" href="/article/{{$l->id.'-'.$l->slug}}" class="image featured"><img src="{{ $l->image }}" alt="" /></a>
                    </header>
                    <a class="image" href="/article/{{$l->id.'-'.$l->slug}}" class="image featured"><img src="{{ $l->image }}" alt="" /></a>
                  </article>
                @endforeach

              </div>
            </section>

  

          <!-- About -->
            <section class="blurb">
              <h2>About</h2>
              <p>A news-style website that covers the latest developments and trends in AI research, business applications, and policy debates. This type of website might have a team of journalists or analysts who produce articles, videos, and podcasts on topics like deep learning, natural language processing, ethical considerations, and emerging use cases. It could also include opinion pieces and interviews with leading experts in the field.</p>
              <ul class="actions">
                <li><a href="#" class="button">Learn More</a></li>
              </ul>
            </section>

          <!-- Footer -->
            <section id="footer">
              <ul class="icons">
                <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
                <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
                <li><a href="#" class="icon solid fa-rss"><span class="label">RSS</span></a></li>
                <li><a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
              </ul>
              <p class="copyright">&copy; AI Article. Design: <a href="http://html5up.net">HTML5 UP</a>. Images: <a href="http://unsplash.com">Unsplash</a>.</p>
            </section>

        </section>

    </div>

  <!-- Scripts -->
    <script src="{{secure_url('assets/js/jquery.min.js')}}"></script>
    <script src="{{secure_url('assets/js/browser.min.js')}}"></script>
    <script src="{{secure_url('assets/js/breakpoints.min.js')}}"></script>
    <script src="{{secure_url('assets/js/util.js')}}"></script>
    <script src="{{secure_url('assets/js/main.js')}}"></script>
    <script src="{{secure_url('js/bootstrap.bundle.js')}}"></script>
    </div>
</body>
</html>
 