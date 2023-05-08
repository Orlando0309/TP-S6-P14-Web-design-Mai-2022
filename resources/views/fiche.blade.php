<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $article->resume }}">
    <link href="{{secure_url('assets/css/main.css') }}" rel="stylesheet">
    <title>{{ $article->titre }}</title>
</head>
<body class="single is-preload">
    <div id="wrapper">

        <!-- Header -->
            <header id="header">
                <h1><a href="index.html">Future Imperfect</a></h1>
                <nav class="links">
                    <ul>
                      @if (session('user'))
                      <li><a href="/article/">NEW ARTICLE</a></li>
                      <li><a href="/logout/">LOG OUT</a></li>
                      @else
                      <li><a href="/log/">LOG IN</a></li>
                      @endif
        
                      <li><a href="/">MORE ARTICLES</a></li>
                    </ul>
                  </nav>
                <nav class="main">
                    <ul>
                        <li class="search">
                            <a class="fa-search" href="#search">Search</a>
                            
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
                        <form class="search" method="get" action="/article/liste">
                            <input type="text" name="query" placeholder="Search" />
                            <input type="submit" value="search">
                          </form>
                    </section>

            </section>

        <!-- Main -->
            <div id="main">

                <!-- Post -->
                    <article class="post">
                        <header>
                            <div class="title">
                                <h2><a href="#">{{ $article->titre }}</a>
                                    @if(session('user'))
                                    <a class="button large fit" href="/article/update/{{$article->id}}/{{$article->slug}}" >Update</a>
                                    @endif
                                </h2>
                                <p>{{ $article->resume }}</p>
                            </div>
                            <div class="meta">
                                <time class="published" datetime="{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s.u', $article->datecreation)->format('Y-m-d') }}">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s.u', $article->datecreation)->format('F d, Y')}}</time>
                                <span class="image featured"><img src="{{$article->image}}" alt="" /></span>                                <p>Identifiant: {{ $article->articleid }}
                                <strong>Categorie:</strong>{{ $article->nomcategorie }}
                                </p>
                            </div>
                        </header>
                        <span class="image featured"><img src="{{$article->image}}" alt="" /></span>
                        <p>{{ $article->resume }}</p>
                        {!! $article->contenu !!}
                        <footer>
                            <ul class="stats">
                                <li><a href="#">General</a></li>
                                <li><a href="#" class="icon solid fa-heart">28</a></li>
                                <li><a href="#" class="icon solid fa-comment">128</a></li>
                            </ul>
                        </footer>
                    </article>

            </div>

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

    </div>
    <script src="{{secure_url('assets/js/jquery.min.js')}}"></script>
    <script src="{{secure_url('assets/js/browser.min.js')}}"></script>
    <script src="{{secure_url('assets/js/breakpoints.min.js')}}"></script>
    <script src="{{secure_url('assets/js/util.js')}}"></script>
    <script src="{{secure_url('assets/js/main.js')}}"></script>
    <script src="{{secure_url('js/bootstrap.bundle.js')}}"></script>
</body>
</html>