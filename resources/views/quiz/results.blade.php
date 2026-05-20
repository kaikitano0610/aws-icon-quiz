<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>回答履歴</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
        <h1>回答履歴</h1>

        <p>回答数：{{ $total }}</p>
        <p>正解数：{{ $correctCount }}</p>
        <p>正答率：{{ $rate }}%</p>

        <table border="1">
            <tr>
                <th>日時</th>
                <th>正解</th>
                <th>回答</th>
                <th>結果</th>
            </tr>

            @foreach ($results as $result)
            <tr>
                <td>{{ $result->created_at }}</td>
                <td>{{ $result->correctService->name }}</td>
                <td>{{ $result->selectedService->name }}</td>
                <td>{{ $result->is_correct ? '正解' : '不正解' }}</td>
            </tr>
            @endforeach
        </table>

        <p>
            <a href="{{ route('quiz.show') }}">クイズへ戻る</a>
        </p>
    </div>
</body>

</html>
