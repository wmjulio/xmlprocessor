<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('site/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acompanhar processamento</title>
</head>
<body class="text-center">
<div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
            <h3 class="masthead-brand">Processamento de XML</h3>
            <nav class="nav nav-masthead justify-content-center ml-5">
                <a class="nav-link" href="{{ route('upload.formEnviar') }}">Enviar</a>
                <a class="nav-link" href="{{ route('upload.formAcompanhar') }}">Acompanhar</a>
            </nav>
        </div>
    </header>

    <main role="main" class="inner cover">
        <h1 class="cover-heading">Acompanhe o processamento do seu XML.</h1>
        <div class="container">
            <div class="container">
                <div class="row">
                {{ $message }}
                </div>

                @if ($token)
                    <div class="row">
                        Token: {{ $token }}
                    </div>
                    <div class="row">
                        <form  action="{{ route('upload.details') }}" method="post" enctype="multipart/form-data" class="mx-auto">
                            @csrf
                            <input name="fileToken" type="hidden" value="{{ $token }}">
                            <p class="lead">
                                <button type="submit" class="btn btn-lg btn-secondary mt-3">Acompanhar</button>
                            </p>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </main>

    <footer class="mastfoot mt-auto">
        <div class="inner">
            <p>por <a href="https://www.linkedin.com/in/wmjulio/">Julio Martins</a></p>
        </div>
    </footer>
</div>
</body>
<script src="{{ asset('site/jquery.js') }}"></script>
<script src="{{ asset('site/bootstrap.js') }}"></script>
</html>

