<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>AWSサービス一覧</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
        <h1>AWSサービス一覧</h1>

        @if (session('message'))
        <p>{{ session('message') }}</p>
        @endif

        <p>
            <a href="{{ route('aws-services.create') }}">AWSサービスを登録する</a>
        </p>

        <p>
            <a href="{{ route('quiz.show') }}">クイズを始める</a>
        </p>

        <ul>
            @foreach ($services as $service)
            <li>
                <img src="{{ asset('storage/' . $service->icon_path) }}" alt="{{ $service->name }}" width="80">
                <strong>{{ $service->name }}</strong>
                @if ($service->category)
                <span> / {{ $service->category }}</span>
                @endif
            </li>
            @endforeach
        </ul>
    </div>
</body>

</html>
