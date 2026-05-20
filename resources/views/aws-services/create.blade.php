<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>AWSサービス登録</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
        <h1>AWSサービス登録</h1>

        @if ($errors->any())
        <div>
            <p>入力内容を確認してほしい</p>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('aws-services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <label>サービス名</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Amazon S3">
            </div>

            <div>
                <label>カテゴリ</label>
                <input type="text" name="category" value="{{ old('category') }}" placeholder="Storage">
            </div>

            <div>
                <label>説明</label>
                <textarea name="description" placeholder="オブジェクトストレージ">{{ old('description') }}</textarea>
            </div>

            <div>
                <label>アイコン画像</label>
                <input type="file" name="icon" accept="image/*">
            </div>

            <button type="submit">登録する</button>
        </form>

        <p>
            <a href="{{ route('aws-services.index') }}">一覧へ戻る</a>
        </p>
    </div>
</body>

</html>
