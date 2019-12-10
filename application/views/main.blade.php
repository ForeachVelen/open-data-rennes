@extends('templates.app')

@section('contents')
    <br><br>
    <div class="card-deck" style="width: 85%; padding-left: 15%">
    <div class="card text-center">
        <div class="card-header">
            <h4>BUS </h4><img src="http://m.star.fr/sites/default/files/pictos/picto_100_0005.png">
        </div>
        <div class="card-body">
            <h5 class="card-title">Le prochain passage est à <span id="dateBus">{{  date("H:i:s", strtotime($prochain_passage->depart)) }}</span></h5>
            <div class="alert alert-primary" role="alert" id="alertTime">
                Vous avez <span id="minute">00</span> minutes et <span id="seconde">00</span> secondes avant de le rater
            </div>
        </div>
    </div>
    <div class="card text-center">
        <div class="card-header">
            <br><br>
            <h4>Alertes</h4>
            <br><br>
        </div>
        <div class="card-body">
            <h5 class="card-title">Toutes les infos sur le traffic STAR</h5>
            <a href="{{ base_url('alerte') }}" class="btn btn-primary">En savoir plus</a>
        </div>
    </div>
    </div>
@endsection

@section('scripts')
    <script>
            function dateDiff(date1, date2){
                var diff = {};                           // Initialisation du retour
                var tmp = date2 - date1;

                tmp = Math.floor(tmp/1000);             // Nombre de secondes entre les 2 dates
                diff.sec = tmp % 60;                    // Extraction du nombre de secondes

                tmp = Math.floor((tmp-diff.sec)/60);    // Nombre de minutes (partie entière)
                diff.min = tmp % 60;                    // Extraction du nombre de minutes

                tmp = Math.floor((tmp-diff.min)/60);    // Nombre d'heures (entières)
                diff.hour = tmp % 24;                   // Extraction du nombre d'heures

                tmp = Math.floor((tmp-diff.hour)/24);   // Nombre de jours restants
                diff.day = tmp;

                return diff;
            }

            var timer = setInterval(function(){
                var dateNow = new Date();
                var dateBus = new Date('{{$prochain_passage->depart}}');

                var diff = dateDiff(dateNow, dateBus);

                document.getElementById('minute').textContent = diff.min;
                document.getElementById('seconde').textContent = diff.sec;

                if(diff.day == 0 && diff.hour == 0 && diff.min < 10){
                    document.getElementById('alertTime').setAttribute("class", 'alert alert-warning');
                }

                if(diff.day == 0 && diff.hour == 0 && diff.min < 5){
                    document.getElementById('alertTime').setAttribute("class", 'alert alert-danger');
                }

                if(diff.day == 0 && diff.hour == 0 && diff.min <= 0 && diff.sec <= 0){
                    document.getElementById('alertTime').innerHTML  = 'Vous l\'avez raté';
                    clearInterval(timer);
                }

            }, 1000);


    </script>

@endsection
