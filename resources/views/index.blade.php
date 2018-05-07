<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Short Url</title>
</head>
<body>
    <h1>Create a short url</h1>

    <form method="POST" action="/">
        @csrf

        <p>
            <label for="url">Url</label>
            <input type="text" id="url" name="url">
            @if ($errors->has('url'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('url') }}</strong>
                </span>
            @endif
        </p>

        <p>
            <button type="submit" class="btn btn-primary">Submit</button>
        </p>

        @if (session('hash'))
        <p>
            The link is generated! <a href="/{{ session('hash') }}">{{ session('hash') }}</a>
        </p>    
        @endif
    
    </form>
</body>
</html>