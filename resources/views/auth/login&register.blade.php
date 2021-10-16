<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/register&login.css') }}">
    <link rel="shortcut icon" href="{{ asset('storage/favicon.svg') }}" type="image/x-icon"/>
    <title>Witaj na Spuutifly</title>
</head>
<body class="d-flex" background="{{ asset('storage/images/bg.jpg') }}">
    @yield('form')
    <div class="line"></div>
    <section class="caption">
        <h1 class="display-4">Słuchaj świetnej muzyki,  <br> właśnie teraz!</h1>
        <h3 class="mb-3 font-weight-normal">Masa piosenek totalnie za darmo!</h3>
        <h5 class="mb-3 font-weight-normal"><i class="fas fa-check"></i> Odnajdziesz tu muzykę, którą pokochasz.</h5>
        <h5 class="mb-3 font-weight-normal"><i class="fas fa-check"></i> Twórz swoje własne playlisty.</h5>
        <h5 class="font-weight-normal"><i class="fas fa-check"></i> Śledź najnowsze kawałki ulubionych artystów.</h5>
    </section>
    <script src="https://kit.fontawesome.com/5e284c1b96.js" crossorigin="anonymous"></script>
</body>
</html>
