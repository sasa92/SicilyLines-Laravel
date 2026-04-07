<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Inventaire Flotte - SicilyLines</title>
    <style>
        body { font-family: sans-serif; font-size: 10px; color: #333; margin: 0; padding: 0; }
        .header { text-align: center; padding: 20px; border-bottom: 3px solid #ffd700; margin-bottom: 20px; }
        .header h1 { color: #1a1a4d; margin: 0; font-size: 24px; }
        
        table { width: 100%; border-collapse: collapse; table-layout: fixed; }
        th { background-color: #1a1a4d; color: white; padding: 10px; text-align: left; }
        td { border-bottom: 1px solid #eee; padding: 10px; vertical-align: middle; word-wrap: break-word; }

        /* Style spécifique pour la photo */
        .ferry-img { width: 120px; height: auto; border-radius: 5px; border: 1px solid #ddd; }
        .no-img { font-style: italic; color: #999; font-size: 9px; }

        .equip-list { margin: 0; padding: 0; list-style: none; font-size: 9px; }
        .footer { position: fixed; bottom: -30px; left: 0px; right: 0px; height: 50px; text-align: center; font-size: 9px; color: #999; }
    </style>
</head>
<body>
    <div class="header">
        <h1>SICILY LINES</h1>
        <p>Inventaire illustré de la flotte - {{ date('d/m/Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 25%;">Photo</th>
                <th style="width: 20%;">Nom & Vitesse</th>
                <th style="width: 20%;">Dimensions</th>
                <th style="width: 35%;">Équipements</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ferries as $ferry)
            <tr>
                <td style="text-align: center;">
                    @if($ferry->photo && file_exists(public_path('images/ferries/' . $ferry->photo)))
                        <img src="{{ public_path('images/ferries/' . $ferry->photo) }}" class="ferry-img">
                    @else
                        <span class="no-img">Aucun visuel</span>
                    @endif
                </td>
                <td>
                    <strong>{{ $ferry->nom }}</strong><br>
                    <span style="color: #666;">{{ $ferry->vitesse }} nœuds</span>
                </td>
                <td>
                    L : {{ $ferry->longueur }} m<br>
                    l : {{ $ferry->largeur }} m
                </td>
                <td>
                    <ul class="equip-list">
                        @forelse($ferry->equipements as $equipement)
                            <li>• {{ $equipement->libelle }}</li>
                        @empty
                            <li><em style="color: #ccc;">Aucun équipement</em></li>
                        @endforelse
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Document officiel SicilyLines - Ne pas jeter sur la voie publique.
    </div>
</body>
</html>