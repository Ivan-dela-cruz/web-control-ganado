<!DOCTYPE>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Reporte de actividades -  semanal{{time()}}</title>
<style>
    body {
        /*position: relative;*/
        /*width: 16cm;  */
        /*height: 29.7cm; */
        /*margin: 0 auto; */
        /*color: #555555;*/
        /*background: #FFFFFF; */
        font-family: Arial, sans-serif;
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
        font-size: 10px;
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
        border-collapse: separate;
        border-spacing: 0;
        margin-bottom: 15px;
    }

    #facarticuloS thead {
        padding: 20px;
        background: #238288;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
    }

    thead {
        background-color: #246355;
        color: white;
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

    .encabezado {
        width: 100%;
        height: auto;
        background-color: #d0d2d4;
        display: flex;
    }

    .logo {
        margin-right: 20px;
        height: 80px;
    }

    .name-company {
        margin-bottom: 0px;
        font-size: 20px;
        color: #238288;
        font-family: 'Montserrat', sans-serif;
    }

    .box-company {
        float: right;
        text-align: center;
        width: 50%;
        height: 80px;
        align-content: center;
    }

    .dates-company {
        font-size: 9px;
        color: #3e3d3d;
    }

    .lines-1 {
        opacity: 0.5;
        margin-top: -5px;
        margin-bottom: 5px;
        height: 10px;
        width: 50%;
        background-color: #bcccef;
    }

    .lines-2 {
        margin-left: 50%;
        opacity: 0.5;
        margin-top: -5px;
        margin-bottom: 5px;
        height: 10px;
        width: 50%;
        background-color: #06a084;
    }

    .box-1 {
        height: 190px;
        width: 300px;
        padding: 10px;
    }

    .box-derecho {
        height: 190px;
        width: 30%;
        margin-left: 50%;
        padding: 10px;
    }

    .box-2 {
        height: 120px;
        width: 100%;
        padding-left: 10px;
        background-color: #5de2c9;
        border: 2px solid #5de2c9;
        border-radius: 25px;
    }

    h1 {
        font-size: 11px;
        font-family: 'Montserrat', sans-serif;
        color: #000000;
        font-weight: bold;
        margin-bottom: 2px;
        margin-top: 2px;
    }

    span {
        margin-top: 2px;
        margin-bottom: 2px;
        text-transform: uppercase;
        font-family: 'Montserrat', sans-serif;
        font-size: 9px;
        color: #434343;
        font-weight: normal;
    }

    .box {
        height: auto;
        background-color: #0a1120;
        display: flex;
        flex-wrap: nowrap;
    }

    .diente {
        height: 40px;
        width: 40px;

    }

    .group-diente {
        display: flex;
        flex-wrap: nowrap;
        width: 300px;
        height: 45px;
    }

    .img-diente {
        height: 40px;
        width: 40px;

    }

    table {
        width: 100%;
        border: 1px solid #ffffff;
        border-collapse: collapse;
        padding-right: 25px;
    }

    th, td {
        text-align: left;
        vertical-align: top;
        border: 1px solid #FFFFFF;
        border-collapse: collapse;
        padding: 0.3em;
        caption-side: bottom;
        font-size: 10px;
        font-family: 'Montserrat', sans-serif;
    }


</style>
<body>
<section style="margin-bottom: 0px; height: auto;">
    <div class="encabezado">
        <img class="logo"  src="{{asset('img/logocontrol.png')}}" alt="CompartiendoCodigo">
        <div class="box-company">
            <h1 class="name-company">Hacienda Mayrita</h1>
            <small class="dates-company">Avenida 5 de Junio y Río Langoa Sector la Estación, Pichincha,
                Ecuador <br></small>
            <small class="dates-company">Email: haciendamayrita@gmail.com</small>
            <small class="dates-company"> Télefono: +(539) 984 500 337</small>
        </div>
    </div>
    <div class="box">
        <div class="lines-1"></div>
        <div class="lines-2"></div>
    </div>

</section>
<section style="margin-top: 0px; margin-top: 5px;">
    <div>
        <table>
            <thead>

            <tr style="color: black; text-align: center; background-color: #FFFFFF; border: 1px solid #FFFFFF;">
                <th style="text-align: left; font-size: 11px;" colspan="3">Reporte de tareas preteneciente a -  {{$employee->last_name}} {{$employee->name}}   {{$employee->dni}}</th>
                <th style="text-align: left;  font-weight: normal; font-size: 11px; font-size: 12px;" colspan="3">Usuario
                    - {{\Illuminate\Support\Facades\Auth::user()->name}} {{\Illuminate\Support\Facades\Auth::user()->last_name}}
                    Fecha
                    - {{\Carbon\Carbon::parse(time())->toFormattedDateString()}}
                </th>
               
            </tr>
            <tr style="text-align: left; background-color: #5de2c9; border: 2px solid #5de2c9;">
                <th width="15px">N°</th>
                <th style="text-align: center" width="150px">Titulo</th>
                <th style="text-align: center" width="170px">Descripción</th>
                <th style="text-align: center" width="120px">Fecha/Hora</th>
                <th style="text-align: center" width="30px">Estado</th>
                <th style="text-align: center" width="120px">Observación</th>

            </tr>
            </thead>
            <tbody>
            {{$contador = 1}}
           
            @foreach($tasks as $task)
                <tr>
                    <td>{{$contador}}</td>
                    
                   
                    <td>
                        {{$task->title}} 
                    </td>
                    
                    <td>
                        {{$task->description}}
                    </td>

                    

                    <td>
                        {{\Carbon\Carbon::setLocale('es')}}
                        {{\Carbon\Carbon::parse($task->date)->toFormattedDateString()}}
                        {{\Carbon\Carbon::parse($task->hour)->format('H:i a')}}
                    </td>
                    <td >
                        {{$task->status}}
                    </td>
                    <td >
                        
                    </td>

                </tr>
                {{$contador++}}
                
            @endforeach

            <tr>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th></th>
            </tr>
            <tr style="text-align: center; background-color: #FFFFFF; border: 1px solid #FFFFFF;">
                <th style="text-align: left; font-size: 11px;" colspan="3">	</th>
              
                <th style="text-align: right; font-size: 11px;"  colspan="3">Registros: {{$contador -1}}</th>
                
            </tr>
            </tbody>
        </table>
    </div>
</section>
<br>
<section>
    <div>
        <table>
            <thead>
            <tr style="text-align: left; background-color: #5de2c9; border: 2px solid #5de2c9;">
                <th>Observaciones</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="text-transform: uppercase;">
                    <br><br><br><br><br>
                    <div style="background-color: #a9a8a8; height: 1px; width: 100%;"></div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</section>
<br>
<footer>

</footer>
</body>
</html>
