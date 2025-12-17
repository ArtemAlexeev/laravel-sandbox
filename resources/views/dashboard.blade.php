<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
</head>
<body>
<div>
    @if ($errors->any())
    <div class="errors">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" action="{{ route('generate-new-link', ['hash' => $hash]) }}">
        @csrf
        <div style="margin-top:14px">
            <input type="hidden" name="hash" value="{{ $hash }}">
            <button type="submit">Generate new link</button>
        </div>
    </form>
    <br/>
    <form method="POST" action="{{ route('deactivate-link', ['hash' => $hash]) }}">
        @csrf
        <div style="margin-top:14px">
            <input type="hidden" name="hash" value="{{ $hash }}">
            <button type="submit">Deactivate current link</button>
        </div>
    </form>
    <br/>
    <button onclick="luckRequest()" type="button">Imfeelinglucky</button>
    <br/>
    <button onclick="historyRequest()" type="button">History</button>
</div>
<script>
    function luckRequest() {
        fetch("{{ route('check-user-luck', ['hash' => $hash]) }}")
            .then(response => response.json())
            .then(result => {
                alert(result.data);
            });
   }

    function historyRequest() {
        fetch("{{ route('get-user-luck-history', ['hash' => $hash]) }}")
            .then(response => response.json())
            .then(result => {
                alert(result.data.join("\n"));
            });
   }
</script>
</body>
</html>
