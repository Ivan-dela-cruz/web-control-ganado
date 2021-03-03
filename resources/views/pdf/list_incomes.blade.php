<!DOCTYPE>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>PDF-ORDEÑOS-</title>

<style>
    body {
        /*position: relative;*/
        /*width: 16cm;  */
        /*height: 29.7cm; */
        /*margin: 0 auto; */
        /*color: #555555;*/
        /*background: #FFFFFF; */
        font-family: Arial, sans-serif;
        font-size: 13px;
        /*font-family: SourceSansPro;*/
    }

    #logo {
        float: left;
        margin-top: 1%;
        margin-left: 2%;
        margin-right: 2%;
    }

    #imagen {
        width: 120px;
        height: 75px;
    }

    #datos {
        float: left;
        margin-top: 0%;
        margin-left: 0%;
        margin-right: 2%;
        /*text-align: justify;*/
    }

    #encabezado {
        text-align: center;
        margin-left: 10%;
        margin-right: 35%;
        font-size: 13px;
    }

    #tiutlo_pdf {
        text-align: center;
        margin-left: 10%;
        margin-right: 35%;
        font-size: 18px;
    }

    #fact {
        /*position: relative;*/
        float: right;
        margin-top: 2%;
        margin-left: 2%;
        margin-right: 2%;
        font-size: 20px;
    }

    section {
        clear: left;
    }

    #cliente {
        text-align: left;
    }

    #facliente {
        width: 60%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 12px;
    }

    #fac, #fv, #fa {
        color: #FFFFFF;
        font-size: 12px;
    }

    #facliente thead {
        padding: 20px;
        background: #238288;
        text-align: left;
        border-bottom: 1px solid #FFFFFF;
    }

    #facvendedor {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
    }

    #facvendedor thead {
        padding: 20px;
        background: #238288;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
    }

    #facarticulo {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
    }

    #facarticulo thead {
        padding: 20px;
        background: #238288;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
    }

    #gracias {
        text-align: center;
    }

    #datoOrden {
        text-align: left;
        font-size: 12px;
    }

    #headerOrden {
        text-align: left;
        vertical-align: center;
        font-size: 12px;
        color: white;
    }

    #tableOrdenDetalle {
        width: 100%;
        border: 1px solid #000;
    }

    #thOrdenDetalle, .tdOrdenDetalle {
        text-align: left;
        vertical-align: center;
        border: 1px solid #000;
        border-collapse: collapse;
        padding: 0.3em;
        font-size: 11px;

    }
</style>
<body>

<header>
    <div id="logo">
        <img  src="{{asset('img/logocontrol.png')}}" alt="logo" id="imagen">
    </div>
    <div id="datos">

        <p id="tiutlo_pdf">
            <b>Hacienda Mayrita</b>
            <br> Pichincha
        </p>
        <p id="encabezado">

            Avenida 5 de Junio y Río Langoa Sector la Estación, Pichincha, Ecuador.
            <br>Telefono: +(539) 984 500 337
            <br>Email: haciendamayrita@gmail.com
        </p>
    </div>
</header>

<br>

<section>
    <div>
        <table id="facliente">
            <thead>
            <tr>
                <th colspan="2" id="fac">Hacienda</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th>
                    <p>
                        Sr(a).
                        <span style="font-weight: normal; text-transform: uppercase;">{!!$estate->name!!}</span>
                    </p>
                    <p id="cliente">

                        Ruc: {{$estate->ruc}}
                       

                    </p>
                    <p id="cliente">
                        Dirección:
                        <span style="font-weight: normal; text-transform: uppercase;">{{$estate->address}}</span>

                    </p>

                </th>
                <th>
                    <p id="cliente">
                        Teléfono:
                        <span style="font-weight: normal;">{{$estate->phone}}</span>

                    <p id="cliente">
                        Email:
                        <span style="font-weight: normal;">{{$estate->email}}</span>

                    </p>
                    <p><br></p>

                </th>
            </tr>
            </tbody>
        </table>
    </div>
</section>

<br>
<section>
    <div>
        <table id="facarticulo">
            <thead>
            <tr style="color: black; text-align: center; background-color: white;">
                <th class="tdOrdenDetalle" style="text-align: center;" colspan="5">Lista de ordeños ordeños</th>
            </tr>
            <tr style="text-align: left;" id="fa">
                <th class="tdOrdenDetalle" width="10px">N°</th>
                <th class="tdOrdenDetalle">Fecha</th>
                <th width="120px" class="tdOrdenDetalle">Tipo</th>
                <th class="tdOrdenDetalle">Total L.</th>
                <th class="tdOrdenDetalle">Descripción</th>

            </tr>
            </thead>
            <tbody>
            {{$contador = 1}}
            {{$suma = 0}}
            @foreach($incomes as $data)
                <tr>
                    <td class="tdOrdenDetalle">{{$contador}}</td>
                    <td style=" text-transform: uppercase;"  class="tdOrdenDetalle">
                        {{ \Carbon\Carbon::parse($data->date)->isoFormat('LL') }}
                    </td>
                    <td class="tdOrdenDetalle">
                        {{ $data->time_milking }}
                    </td>
                    <td class="tdOrdenDetalle">
                        {{ $data->total_liters }}
                    </td>
                    <td style=" text-transform: uppercase;" class="tdOrdenDetalle">
                        @if($data->description == "")
                        -N/A-
                        @else
                        {{ $data->description }}
                        @endif
                    </td>
                   

                </tr>
                {{$contador++}}
                {{$suma = $suma+ $data->total_liters}}
            @endforeach
            </tbody>
        </table>
    </div>
</section>
<br>
<section>
    <div>
        <table id="facarticulo">
            <thead>
            <tr style="color: black; text-align: center; background-color: white;">
                <th class="tdOrdenDetalle" style="text-align: center;">Total  <b>$suma</b> litros</th>
            </tr>
            <tr style="text-align: left;" id="fa">

                <th class="tdOrdenDetalle">Indicaciones</th>
            </tr>
            </thead>
            <tbody>
            {{----  @foreach ($detalles as $det)--}}
            <tr>
                <td style=" text-transform: uppercase;" class="tdOrdenDetalle">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </td>
                
            </tr>

            {{----    @endforeach --}}
            </tbody>
        </table>
    </div>
</section>
<br>
<footer>
    <div id="gracias">
        <p><b>Gracias por preferirnos!</b></p>
    </div>
</footer>
</body>
</html>