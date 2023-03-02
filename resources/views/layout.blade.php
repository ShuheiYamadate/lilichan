<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ToDo App</title>
  @yield('styles')
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootflat/2.0.4/css/bootflat.min.css">
</head>
<body>
    <header>
        <nav class="my-navbar flex">
            <a class="my-navbar-brand" href="/">ToDo App</a>
            <div class="my-navbar-control">
            @if(Auth::check())
                <span class="my-navbar-item">ようこそ, {{ Auth::user()->name }}さん</span>
                ｜
                <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                </form>
            @else
                <a class="my-navbar-item" href="{{ route('login') }}">ログイン</a>
                ｜
                <a class="my-navbar-item" href="{{ route('register') }}">会員登録</a>
            @endif
            </div>
        </nav>
    </header>
    <main>
    @yield('content')
    </main>
    @if(Auth::check())
        <script>
            document.getElementById('logout').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('logout-form').submit();
            });
        </script>
    @endif
    @yield('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Scripts（Jquery） -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- Scripts（bootstrapのjavascript） -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootflat/2.0.4/js/jquery.fs.selecter.min.js"></script>
</body>
</html>
