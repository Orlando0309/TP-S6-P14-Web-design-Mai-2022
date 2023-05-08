<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
          <h1><a href="index.html">Future Imperfect</a></h1>
          <nav class="links">
            <ul>
              @if (session('user'))
              <li><a href="/article/">NEW ARTICLE</a></li>
              
              @endif

              <li><a href="#">Ipsum</a></li>
              <li><a href="#">Feugiat</a></li>
              <li><a href="#">Tempus</a></li>
              <li><a href="#">Adipiscing</a></li>
            </ul>
          </nav>
          <nav class="main">
            <ul>
              <li class="search">
                <a class="fa-search" href="#search">Search</a>
                <form id="search" method="get" action="#">
                  <input type="text" name="query" placeholder="Search" />
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
              <a href="/" class="button large fit">Log In</a>
              <form class="search" method="get" action="#">
                <input type="text" name="query" placeholder="Search" />
              </form>
            </section>

          <!-- Links -->
            <section>
              <ul class="links">
                <li>
                  <a href="#">
                    <h3>Lorem ipsum</h3>
                    <p>Feugiat tempus veroeros dolor</p>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <h3>Dolor sit amet</h3>
                    <p>Sed vitae justo condimentum</p>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <h3>Feugiat veroeros</h3>
                    <p>Phasellus sed ultricies mi congue</p>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <h3>Etiam sed consequat</h3>
                    <p>Porta lectus amet ultricies</p>
                  </a>
                </li>
              </ul>
            </section>

          <!-- Actions -->
            <section>
              <ul class="actions stacked">
                <li><a href="/" class="button large fit">Log In</a></li>
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
                  <time class="published" datetime="{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $l->datecreation)->format('Y-m-d') }}">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $l->datecreation)->format('F d, Y') }}</time>
                  <a href="#" class="author"><span class="name">Jane Doe</span><img src="images/avatar.jpg" alt="" /></a>
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
              <a href="#" class="logo"><img src="images/logo.jpg" alt="" /></a>
              <header>
                <h2>Article Celebre</h2>
                <p>Another fine responsive site template by <a href="http://html5up.net">HTML5 UP</a></p>
              </header>
            </section>

          <!-- Mini Posts -->
            <section>
              <div class="mini-posts">

                <!-- Mini Post -->
                  <article class="mini-post">
                    <header>
                      <h3><a href="single.html">Vitae sed condimentum</a></h3>
                      <time class="published" datetime="2015-10-20">October 20, 2015</time>
                      <a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a>
                    </header>
                    <a href="single.html" class="image"><img src="images/pic04.jpg" alt="" /></a>
                  </article>

                <!-- Mini Post -->
                  <article class="mini-post">
                    <header>
                      <h3><a href="single.html">Rutrum neque accumsan</a></h3>
                      <time class="published" datetime="2015-10-19">October 19, 2015</time>
                      <a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a>
                    </header>
                    <a href="single.html" class="image"><img src="images/pic05.jpg" alt="" /></a>
                  </article>

                <!-- Mini Post -->
                  <article class="mini-post">
                    <header>
                      <h3><a href="single.html">Odio congue mattis</a></h3>
                      <time class="published" datetime="2015-10-18">October 18, 2015</time>
                      <a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a>
                    </header>
                    <a href="single.html" class="image"><img src="images/pic06.jpg" alt="" /></a>
                  </article>

                <!-- Mini Post -->
                  <article class="mini-post">
                    <header>
                      <h3><a href="single.html">Enim nisl veroeros</a></h3>
                      <time class="published" datetime="2015-10-17">October 17, 2015</time>
                      <a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a>
                    </header>
                    <a href="single.html" class="image"><img src="images/pic07.jpg" alt="" /></a>
                  </article>

              </div>
            </section>

          <!-- Posts List -->
            <section>
              <ul class="posts">
                <li>
                  <article>
                    <header>
                      <h3><a href="single.html">Lorem ipsum fermentum ut nisl vitae</a></h3>
                      <time class="published" datetime="2015-10-20">October 20, 2015</time>
                    </header>
                    <a href="single.html" class="image"><img src="images/pic08.jpg" alt="" /></a>
                  </article>
                </li>
                <li>
                  <article>
                    <header>
                      <h3><a href="single.html">Convallis maximus nisl mattis nunc id lorem</a></h3>
                      <time class="published" datetime="2015-10-15">October 15, 2015</time>
                    </header>
                    <a href="single.html" class="image"><img src="images/pic09.jpg" alt="" /></a>
                  </article>
                </li>
                <li>
                  <article>
                    <header>
                      <h3><a href="single.html">Euismod amet placerat vivamus porttitor</a></h3>
                      <time class="published" datetime="2015-10-10">October 10, 2015</time>
                    </header>
                    <a href="single.html" class="image"><img src="images/pic10.jpg" alt="" /></a>
                  </article>
                </li>
                <li>
                  <article>
                    <header>
                      <h3><a href="single.html">Magna enim accumsan tortor cursus ultricies</a></h3>
                      <time class="published" datetime="2015-10-08">October 8, 2015</time>
                    </header>
                    <a href="single.html" class="image"><img src="images/pic11.jpg" alt="" /></a>
                  </article>
                </li>
                <li>
                  <article>
                    <header>
                      <h3><a href="single.html">Congue ullam corper lorem ipsum dolor</a></h3>
                      <time class="published" datetime="2015-10-06">October 7, 2015</time>
                    </header>
                    <a href="single.html" class="image"><img src="images/pic12.jpg" alt="" /></a>
                  </article>
                </li>
              </ul>
            </section>

          <!-- About -->
            <section class="blurb">
              <h2>About</h2>
              <p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod amet placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at phasellus sed ultricies.</p>
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
              <p class="copyright">&copy; Untitled. Design: <a href="http://html5up.net">HTML5 UP</a>. Images: <a href="http://unsplash.com">Unsplash</a>.</p>
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
 