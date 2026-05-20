<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>このAWSアイコンなに？</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
        <h1>このAWSアイコンなに？</h1>

        <p>AWSサービスのアイコンを見て、4択からサービス名を当てるクイズ。</p>

        <p>
            <a href="{{ route('quiz.show') }}">クイズを始める</a>
        </p>

        <p>
            <a href="{{ route('aws-services.index') }}">AWSサービス一覧</a>
        </p>
        <p>
            <a href="{{ route('quiz.results') }}">学習履歴</a>
        </p>
    </div>
</body>

</html>
