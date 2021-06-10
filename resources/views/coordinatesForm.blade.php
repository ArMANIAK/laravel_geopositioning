<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Coordinates Form</title>
    </head>

    <body>
        <h1>We make reverse geopositioning easier!</h1>
        <h4>You send us coordinates, we answer with the address</h4>
        <form action="/address" method="POST">
            <label>Input latitude here: <input type="text" name="latitude" id="requestedLatitude" placeholder="44.000" pattern="^-?\d+\.?\d+$"></label>
            <label>Input longitude here: <input type="text" name="longitude" id="requestedLongitude" placeholder="44.000" pattern="^-?\d+\.?\d+$"></label>
            <input type="submit" value="Send coordinates">
        </form>
        <?php if(isset($coordinates)): ?>
        <p>{{ $coordinates }}</p>
        <?php endif ?>
    </body>
</html>
