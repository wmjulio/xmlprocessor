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

        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <div class="row mb-3">
                        <b class="mr-1"> Token: </b> <p>{{ $log->token }}</p>
                    </div>
                    <div class="row mb-3">
                        <b class="mr-1"> Status: </b> <p>{{ $log->status->name }}</p>
                    </div>
                </div>
                <div class="col-lg">
                    <div class="mb-3">
                        <b>Detalhamento</b>
                    </div>
                    @foreach($log->details as $detail)
                    <div class="row">
                        <div class="col-md">
                             <p>{{ $detail->description }}</p>
                        </div>
                        <div class="col-sm">
                            <p>{{ $detail->created_at->format('d/m/Y H:m:s') }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>


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

