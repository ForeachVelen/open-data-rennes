@extends('templates.app')

@section('contents')
    <br><br>
    <div class="card-deck" style="width: 95%; padding-left: 5%">
        <div class="card text-center">
            <div class="card-header">
                <br><br>
                <h4>Trouver un bus</h4>
                <br><br>
            </div>
            <div class="card-body" id="busBody">
                <form id="formBus" method="post">
                    <select name="bus" id="bus" required>
                        <option disabled="true" selected>Veuillez choisir un bus</option>
                        @foreach($bus as $unBus)
                            <option value="{{ $unBus['id'] }}">{{ $unBus['nom'] }}</option>
                        @endforeach
                    </select>
                    <select name="sens" disabled id="sens" required>
                        <option disabled="true" selected>Veuillez choisir un sens</option>
                    </select>
                    <select name="arret" disabled id="arret" required>
                        <option disabled="true" selected>Veuillez choisir un arret</option>
                    </select>
                    <br>
                    <button type="submit" class="btn btn-success">Valider</button>
                </form>
            </div>
        </div>
        <div class="card text-center">
            <div class="card-header">
                <br><br>
                <h4>Trouver un métro</h4>
                <br><br>
            </div>
            <div class="card-body" id="metroBody">
                <form id="formMetro" method="post">
                    <select name="sensMetro" id="sensMetro" required>
                        <option disabled="true" selected>Veuillez choisir un sens</option>
                        <option value="La Poterie">Vers La Poterie</option>
                        <option value="J.F. Kennedy">Vers J.F. Kennedy</option>
                    </select>
                    <select name="arretMetro" id="arretMetro" required>
                        <option disabled="true" selected>Veuillez choisir un arret</option>
                        @foreach($metro as $unMetro)
                            <option value="{{ $unMetro['arret'] }}">{{ $unMetro['arret'] }}</option>
                        @endforeach
                    </select>
                    <br>
                    <button type="submit" class="btn btn-success">Valider</button>
                </form>
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

        function unAutre(){
            window.location.reload(false);
        }

        $('#bus').change(function () {

            $('#sens').removeAttr("disabled");
            $('#arret').removeAttr("disabled");

            $.ajax(
                {
                    url : "{{ base_url('/sens') }}", // La ressource ciblée
                    type : 'POST', // Le type de la requête HTTP.
                    data: {'id': $('#bus').val()},

                    success : function (data) {
                        var rows = JSON.parse(data);

                        rows.forEach(addSens);
                    }
                }
            );

            $.ajax(
                {
                    url : "{{ base_url('/arret') }}", // La ressource ciblée
                    type : 'POST', // Le type de la requête HTTP.
                    data: {'id': $('#bus').val()},

                    success : function (data) {
                        var rows = JSON.parse(data);

                        rows.forEach(addArret);
                    }
                }
            );

        });

        function addSens(item) {
            $('#sens').append('<option value=' + item.id + '>Vers ' + item.nom + '</option>');
        }

        function addArret(item) {
            $('#arret').append('<option value=' + item.id + '>' + item.nom + '</option>');
        }


        $( "#formBus" ).on( "submit", function( event ) {
            event.preventDefault();
            var formData = $(this);

            var bus = formData.find( "select[name='bus']" ).val();
            var sens = formData.find(" select[name='sens']" ).val();
            var arret = formData.find( "select[name='arret']" ).val();


            $.post("{{ base_url('bus') }}",
                {
                    bus : bus,
                    sens : sens,
                    arret : arret
                },
                function(data){

                    data = JSON.parse(data);

                    var div = '            <h5 class="card-title">Le prochain passage du bus est dans :</h5>' +
                        '            <div class="alert alert-primary" role="alert" id="alertTime">' +
                        '                <span id="minute">00</span> min <span id="seconde">00</span> sec ' +
                        '            </div>';

                    $('#busBody').html(div);

                    var timer = setInterval(function bus(){
                        var dateNow = new Date();
                        var dateBus = new Date(data[0].fields.depart);

                        var diff = dateDiff(dateNow, dateBus);

                        document.getElementById('minute').textContent = diff.min;
                        document.getElementById('seconde').textContent = diff.sec;

                        if(diff.day == 0 && diff.hour == 0 && diff.min < 7){
                            document.getElementById('alertTime').setAttribute("class", 'alert alert-warning');
                        }

                        if(diff.day == 0 && diff.hour == 0 && diff.min < 5){
                            document.getElementById('alertTime').setAttribute("class", 'alert alert-danger');
                        }

                        if(diff.day == 0 && diff.hour == 0 && diff.min <= 0 && diff.sec <= 0){
                            document.getElementById('alertTime').innerHTML  = 'Il vient de passer<br><button onclick="unAutre()" class="btn btn-primary">En trouver un autre</button>';

                            clearInterval(timer);

                        }

                    }, 1000);

                });

        });


        $( "#formMetro" ).on( "submit", function( event ) {
            event.preventDefault();
            var formData = $(this);

            var sens = formData.find(" select[name='sensMetro']" ).val();
            var arret = formData.find( "select[name='arretMetro']" ).val();


            $.post("{{ base_url('metro') }}",
                {
                    sens : sens,
                    arret : arret
                },
                function(data){

                    data = JSON.parse(data);

                    var div = '            <h5 class="card-title">Le prochain passage du métro est dans :</h5>' +
                        '            <div class="alert alert-primary" role="alert" id="alertTimeMetro">' +
                        '                <span id="minuteMetro">00</span> min <span id="secondeMetro">00</span> sec ' +
                        '            </div>';

                    $('#metroBody').html(div);

                    var timerMetro = setInterval(function metro(){
                        var dateNow = new Date();
                        var dateMetro = new Date(data[0].fields.depart);

                        var diff = dateDiff(dateNow, dateMetro);

                        document.getElementById('minuteMetro').textContent = diff.min;
                        document.getElementById('secondeMetro').textContent = diff.sec;

                        if(diff.day == 0 && diff.hour == 0 && diff.min < 7){
                            document.getElementById('alertTimeMetro').setAttribute("class", 'alert alert-warning');
                        }

                        if(diff.day == 0 && diff.hour == 0 && diff.min < 5){
                            document.getElementById('alertTimeMetro').setAttribute("class", 'alert alert-danger');
                        }

                        if(diff.day == 0 && diff.hour == 0 && diff.min <= 0 && diff.sec <= 0){
                            document.getElementById('alertTimeMetro').innerHTML  = 'Il vient de passer<br><button onclick="unAutre()" class="btn btn-primary">En trouver un autre</button>';

                            clearInterval(timerMetro);

                        }

                    }, 1000);

                });

        });

    </script>

@endsection
