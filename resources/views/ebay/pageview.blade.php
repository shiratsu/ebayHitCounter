<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>ebayの対象商品のページビューを取得</h3>
    <p>対象の商品のpageviewを取得します。</p>
    {!! Form::open(['url  ' => '/ebay']) !!}
    @if (!empty($request['itemId']))
    商品ID：{!! Form::text('itemId', $request['itemId'], ['class' => 'form-control']) !!}
    @else
    商品ID：{!! Form::text('itemId', null, ['class' => 'form-control']) !!}
    @endif
    <br />
    {!! Form::submit('get HitCount', ['class' => 'btn btn-primary form-control']) !!}
    {!! Form::close() !!}
    <br />
    @if (!empty($intHitCount) && !empty($request['itemId']))
        商品ID：{{ $request['itemId'] }}のpageviewは{{ $intHitCount }}です。
    @endif
</body>
</html>

