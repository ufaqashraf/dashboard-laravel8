<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <h3>{{ $user->name }}</h3>
        <p>Reset Password Link</p>

        <a href="{{ route('update.password.view') }}">
            Click{{ route('update.password.view') }}
        </a>
    </div>
</body>
</html>
