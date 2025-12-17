<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign up</title>
</head>
<body>
    <div>
        @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if (session('deactivate-status'))
        <div>
            {{ session('deactivate-status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('sign-up') }}">
            @csrf
            <label for="username">Username</label>
            <input name="username" type="text" required autofocus>

            <label for="phone">Phonenumber</label>
            <input name="phone" type="tel" required>

            <div style="margin-top:14px">
                <button type="submit">Register</button>
            </div>
        </form>
    </div>
</body>
</html>
