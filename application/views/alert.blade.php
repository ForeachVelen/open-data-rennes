@extends('templates.app')

@section('contents')
    <div class="card-deck" style="width: 95%; padding-left: 5%; padding-top: 2.5%; padding-bottom: 5%">
        <div class="card text-center">
            <div class="card-header">
                <h4>Liste des alertes sur le réseau STAR</h4>
            </div>
            <div class="card-body">
                <table id="liste_alert" class="table table-dark table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>Ligne</th>
                        <th>Titre</th>
                        <th>Date de début</th>
                        <th>Date de fin</th>
                        <th>Niveau</th>
                        <th class="no_sorting">Plus d'information</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($alerts as $key => $alert)
                        <tr>
                            <input type="hidden" value="{{ $alert->fields->description }}" id="com{{$key}}">
                            <input type="hidden" value="{{ $alert->fields->url }}" id="lien{{$key}}">
                            <td>
                                {{ $alert->fields->nomcourtligne }}
                            </td>
                            <td>
                                {{ $alert->fields->titre }}
                            </td>
                            <td>
                                {{ date("d-m-Y H:i", strtotime($alert->fields->debutvalidite)) }}
                            </td>
                            <td>
                                {{ date("d-m-Y H:i", strtotime($alert->fields->finvalidite)) }}
                            </td>
                            <td>
                                {{ $alert->fields->niveau }}
                            </td>
                            <td style="text-align: center;">
                                <button id="btn-info" type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#modale_info" onclick="return  infoModal('{{ $key }}');"><i class="far fa-edit"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modale_info" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Information supplémentaires</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Description</h5>
                    <span id="description">

                    </span>
                    <br><br>
                    <a id="lien" href="" target="_blank" class="text-primary stretched-link">Plus d'information sur le site STAR</a>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ base_url('/vendor/app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>

    <script>
        $('#liste_alert').DataTable();


        function infoModal(key) {
            var url = document.getElementById('lien'+key).value;
            var com = document.getElementById('com'+key).value;

            document.getElementById('description').textContent = com;
            document.getElementById('lien').href = url;
        }
    </script>

@endsection
