<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('site/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enviar arquivo</title>
</head>
<body class="text-center">
<div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
            <h3 class="masthead-brand">Processamento de XML</h3>
            <nav class="nav nav-masthead justify-content-center ml-5">
                <a class="nav-link active" href="#">Enviar</a>
                <a class="nav-link" href="{{ route('upload.formAcompanhar') }}">Acompanhar</a>
            </nav>
        </div>
    </header>

    <main role="main" class="inner cover">
        <h1 class="cover-heading">Envie o seu XML.</h1>
        <div class="container">
            <div class="form-group row mb-3">
                <form  action="{{ route('upload.upload') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input class="form-control-file" id="submittedFile" name="submittedFile" type="file" accept="text/xml">
                    <p class="lead">
                        <button type="submit" class="btn btn-lg btn-secondary mt-3">Enviar</button>
                    </p>
                </form>
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