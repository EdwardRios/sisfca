@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading center"><strong>Requisitos y costos (Diplomado)</strong></div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-center"></p>
                            <p>1. Formulario de preinscripcion (recabar en la Unidad de Postgrado Cs Agricolas).<br>
                                2. Fotocopia de Carnet de Identidad. <br>
                                3. Avance academico modalidad de titulados (solo para egresados). <br>
                                4. Hoja de vida simple.<br>
                                5. Dos fotografias de 3x3, fondo plomo. <br>
                                6. Boleta de la cuota inicial(deposito bancario en el Banco Union, Cta. Nro. <strong>1-223-2811</strong>) Original + 3 fotocopias.
                                <br>
                                Costo: Bs. 8000 <br>
                                <strong>Planes de pago personalizados, descuentos del 15% por:</strong> <br>
                                1.Inscripcion corporativas (grupos de cinco personas)<br>
                                2.A trabajadores de instituciones publicas. <br><br><br><br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading center"><strong>Requisitos y costos (Especialidad y Maestrias)</strong></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-center"></p>
                            <p>1. Formulario de preinscripcion (recabar en la Unidad de Postgrado Cs Agricolas).<br>
                                2. Fotocopia de Carnet de Identidad. <br>
                                3. Fotocopia legalizada del titulo en provision nacional.<br>
                                4. Carta dirigida al Director de la Unidad de Postgrado, solicitando
                                admision al programa.<br>
                                5. Hoja de vida simple.<br>
                                6. Dos fotografias de 3x3, fondo plomo. <br>
                                7. Boleta de la cuota inicial(deposito bancario en el Banco Union, Cta. Nro. <strong>1-223-2811</strong>) Original + 3 fotocopias.
                                <br>
                                Costo Especialidad: Bs. 12000 <br>
                                Costo Maestria: Bs. 21000 <br>
                                <strong>Planes de pago personalizados, descuentos del 15% por:</strong> <br>
                                1.Inscripcion corporativas (grupos de cinco personas)<br>
                                2.A trabajadores de instituciones publicas
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6"><img src="{{asset('img/GOTAicon.png')}}" class="img-responsive" alt="Gota"></div>
                        <div class="col-md-6" style="font-size: 40px">Bienvenido <br> al Sistema Unidad de Postgrado de Cs.Agricolas</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6"><img src="{{asset('img/GOTAicon.png')}}" class="img-responsive" alt="Gota"></div>
                        <div class="col-md-6" style="font-size: 40px">Bienvenido <br> al Sistema Unidad de Postgrado de Cs.Agricolas</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
