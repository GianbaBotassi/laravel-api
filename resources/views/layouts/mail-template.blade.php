<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <p>Ciao, ecco il tuo nuovo progetto, qua sotto troverai i dettagli.</p>

    <div>
        <img src="{{ $message->embed('storage/' . $project->user_picture) }}">
    </div>
    <div>
        <span><strong>Nome:</strong></span>
        <span>{{ $project->name }}</span>
    </div><br>
    <div>
        <span><strong>Descrizione:</strong></span>
        <span>{{ $project->description }}</span>
    </div><br>
    <div>
        <span><strong>Numero collaboratori:</strong></span>
        <span>{{ $project->collaborators }}</span>
    </div><br>
    <div class="row justify-content-between align-items-center">
        <span><strong>Visibilità:</strong></span>
        <span>{{ $project->private ? 'Privato' : 'Pubblico' }}</span>
    </div><br>
    <div>
        <span><strong>Tipologia:</strong></span>
        <span>{{ $project->type->name }}</span>
    </div><br>
    <div>
        <span><strong>Tecnologie:</strong></span>
        <span>
            @foreach ($project->technologies as $technology)
                {{ $technology->name }}
                @if (!$loop->last)
                    ,
                @endif
            @endforeach
        </span>
    </div><br><br>

    <p>Grazie per la collaborazione e buona giornata</p>
    <br><br>
    <strong>Lo staff di Bool-project</strong>

</body>

</html>
