<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <style>
        @page {
            margin: 20px 30px;
            font-family: "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
        }
        h1{
        text-align: center;
        text-transform: uppercase;
        }
        .contenido{
        margin: 5px 52px;
        font-size: 13px;
        text-align: justify;
        }
        #primero{
        background-color: #ccc;
        }
        #segundo{
        color:#44a359;
        }
        #tercero{
        text-decoration:line-through;
        }
        header{
            position: fixed;
            float: right;
            width: 100px;
            height: 60px;
        }
        footer {
            position: fixed;
            bottom: -10px;
            left: 0px;
            right: 0px;
            height: 50px;
            width: 90%;
            /** Extra personal styles **/
            font-size: 11px;
        }
        main {
            padding-top: 12%;
        }

    </style>
    </head>
    <body>
        <header>
            <div>
                <img class="img-fluid options-item" src="{{asset('storage/images/logos/dut_barrisol.png')}}" style="float: right;" alt="" >
            </div><br><br><br>
        </header>
        <footer>
            <div>
                <img class="img-fluid options-item" src="{{asset('storage/images/logos/logos_pie.png')}}" >
            </div>
        </footer>
        <main>
            @php $date_request = new Carbon\Carbon($project->request_date) @endphp
            <div class=" mt-3" style="text-align: right; font-size: 11px;">
                <p> Ciudad de México a  {{$date_request->isoFormat('LL')}}</p>
            </div>
            <div class="contenido">
                <b>{{$project->request_user->name}} {{$project->request_user->surname}}</b>
                <p style="letter-spacing: 4px;">Levantamiento</p>
            </div>
            <br>
            <div class="contenido mt-5">
                @php
                    $cliente = App\Models\Client::where('id', $project->client_id)->first();
                @endphp
                <table style="width: 100%;">
                    <tr>
                        <td width="18%"><b>Cliente: </b></td><td width="32%">{{$cliente->client_name}}</td>
                        <td width="18%"><b>Razón Social: </b></td><td width="32%">{{$cliente->client_razonsocial}}</td>
                    </tr><br>
                    <tr>
                        <td width="18%"><b>País: </b></td><td width="32%">{{$cliente->client_country}}</td>
                        <td width="18%"><b>Ciudad: </b></td><td width="32%">{{$cliente->client_city}}</td>
                    </tr><br>
                    <tr>
                        <td width="18%"><b>Dirección: </b></td><td width="32%">{{$cliente->client_address}}</td>
                        <td width="18%"><b>Código Postal: </b></td><td width="32%">{{$cliente->client_postal}}</td>
                    </tr><br>
                    <tr>
                        <td width="18%"><b>Correo: </b></td><td width="32%">{{$cliente->client_email}}</td>
                        <td width="18%"><b>Teléfono: </b></td><td width="32%">{{$cliente->client_phone_1}}</td>
                    </tr>
                    @if ($cliente->client_phone_2 != null)
                        <br>
                            <tr>
                                <td width="18%"><b>Teléfono 2: </b></td><td width="32%">{{$cliente->client_phone_2}}</td>
                            </tr>
                    @endif
                </table>
                <hr>
                <table style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Proyecto:</th>
                            <th>Tipo de Proyecto:</th>
                            <th>Nombre del contacto:</th>
                            <th>Teléfono del contacto:</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        <tr>
                            <td>{{$project->project_name}}</td>
                            <td>{{$project->project_type == 1? 'Proyecto Nuevo':($project->project_type == 2? 'Mantenimiento':'')}}</td>
                            <td>{{$project->contact_name}}</td>
                            <td>{{$project->contact_phone}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <div class="block-content contenido">
                <h3 class="block-title">Fotografías del estado actual</h3><br><br><br>
                @if (DB::table('document_projects')->where('project_id', $project->id)->where('file_name', 'levantamiento_foto')->exists())
                    @php $levantamiento_id = App\Models\DocumentProject::where('project_id', $project->id)->where('file_name', 'levantamiento_foto')->select('id','file_path_name_ext')->get(); @endphp
                    <div class="row items-push">
                        @foreach ($levantamiento_id as $levantamiento)
                            <img class="img-fluid options-item" src="{{asset('storage/'.$levantamiento->file_path_name_ext)}}" HSPACE="10" VSPACE="10" alt="" width="240Px" height="240px">
                        @endforeach
                    </div>
                @endif
            </div>
        </main>
    </body>
</html>
