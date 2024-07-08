@extends('layouts.layoutadmin')
@section('title','Citas Administrador')
@section('content')
<div class="container" id="container-user">
    <div class="row" id="container-text">


        <div id='calendar'></div>
        <div class="container" style="margin-top: 5%">
            <div class="row">
                <div class="col-md-6">
                    <h2>BLOQUEO</h2>
                    <!-- Formulario para bloquear una hora específica -->
                    <form action="{{ route('blockTime') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="blockDate" class="form-label"> 
                                <h3>Selecciona fecha:</h3>
                            </label>
                            <input type="date" id="blockDate" name="blockDate" class="form-control">
                        </div>
                        <div class="mb-3">
                        <label for="blockTime" class="form-label"> 
                            <h3>Hora a bloquear:</h3>
                        </label>
                        <div>
                            <button type="button" onclick="setTimeBlock('08:00:00')" name="blockTime" value="08:00:00" class="btn btn-primary">08:00:00</button>
                            <button type="button" onclick="setTimeBlock('08:30:00')" name="blockTime" value="08:30:00" class="btn btn-primary">08:30:00</button>
                            <button type="button" onclick="setTimeBlock('09:00:00')" name="blockTime" value="09:00:00" class="btn btn-primary">09:00:00</button>
                            <button type="button" onclick="setTimeBlock('09:30:00')" name="blockTime" value="09:30:00" class="btn btn-primary">09:30:00</button>
                            <button type="button" onclick="setTimeBlock('10:00:00')" name="blockTime" value="10:00:00" class="btn btn-primary">10:00:00</button>
                            <button type="button" onclick="setTimeBlock('10:30:00')" name="blockTime" value="10:30:00" class="btn btn-primary">10:30:00</button>
                            <button type="button" onclick="setTimeBlock('11:00:00')" name="blockTime" value="11:00:00" class="btn btn-primary">11:00:00</button>
                            <button type="button" onclick="setTimeBlock('11:30:00')" name="blockTime" value="11:30:00" class="btn btn-primary">11:30:00</button>
                            <button type="button" onclick="setTimeBlock('12:00:00')" name="blockTime" value="12:00:00" class="btn btn-primary">12:00:00</button>
                            <button type="button" onclick="setTimeBlock('12:30:00')" name="blockTime" value="12:30:00" class="btn btn-primary">12:30:00</button>
                            <button type="button" onclick="setTimeBlock('14:00:00')" name="blockTime" value="14:00:00" class="btn btn-primary">14:00:00</button>
                            <button type="button" onclick="setTimeBlock('14:30:00')" name="blockTime" value="14:30:00" class="btn btn-primary">14:30:00</button>
                            <button type="button" onclick="setTimeBlock('15:00:00')" name="blockTime" value="15:00:00" class="btn btn-primary">15:00:00</button>
                            <button type="button" onclick="setTimeBlock('15:30:00')" name="blockTime" value="15:30:00" class="btn btn-primary">15:30:00</button>
                            <button type="button" onclick="setTimeBlock('16:00:00')" name="blockTime" value="16:00:00" class="btn btn-primary">16:00:00</button>
                            <button type="button" onclick="setTimeBlock('16:30:00')" name="blockTime" value="16:30:00" class="btn btn-primary">16:30:00</button>
                            <button type="button" onclick="setTimeBlock('17:00:00')" name="blockTime" value="17:00:00" class="btn btn-primary">17:00:00</button>
                            <button type="button" onclick="setTimeBlock('17:30:00')" name="blockTime" value="17:30:00" class="btn btn-primary">17:30:00</button>
                            <button type="button" onclick="setTimeBlock('18:00:00')" name="blockTime" value="18:00:00" class="btn btn-primary">18:00:00</button>
                        </div>
                        </div>
                        <input type="text" id="blockTime" style="margin-bottom: 1%" name="hora_inicio" class="form-control" readonly>
                        <button type="submit" class="btn btn-primary">Bloquear Hora</button>
                        </form>


                        <!-- Formulario para bloquear todo el día -->
                        <form action="{{ route('blockDay') }}" method="POST">
                            @csrf
                            <div class="mb-3" style="border-top: 1px black solid; margin-top:8%">
                                <label for="blockDateOnly" class="form-label" style="margin-top: 2%">
                                    <h3> Fecha a bloquear</h3>
                                </label>
                                <input type="date" id="blockDateOnly" name="blockDateOnly" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Bloquear Día</button>
                        </form>
                        </div>
                        <div class="col-md-6" style="border-left: 1px black solid">
                            <H2>DESBLOQUEO</H2>
                            <!-- Formulario para desbloquear una hora específica -->
                            <form action="{{ route('unblockTime') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="unblockDate" class="form-label"> 
                                        <h3>Selecciona fecha:</h3>
                                    </label>
                                    <input type="date" id="unblockDate" name="date" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="unblockTime" class="form-label"> 
                                        <h3>Hora a desbloquear:</h3>
                                    </label>
                                    <div>
                                    <button type="button" onclick="setTimeUnblock('08:00:00')" name="unblockTime" value="08:00:00" class="btn btn-primary">08:00:00</button>
                                    <button type="button" onclick="setTimeUnblock('08:30:00')" name="unblockTime" value="08:30:00" class="btn btn-primary">08:30:00</button>
                                    <button type="button" onclick="setTimeUnblock('09:00:00')" name="unblockTime" value="09:00:00" class="btn btn-primary">09:00:00</button>
                                    <button type="button" onclick="setTimeUnblock('09:30:00')" name="unblockTime" value="09:30:00" class="btn btn-primary">09:30:00</button>
                                    <button type="button" onclick="setTimeUnblock('10:00:00')" name="unblockTime" value="10:00:00" class="btn btn-primary">10:00:00</button>
                                    <button type="button" onclick="setTimeUnblock('10:30:00')" name="unblockTime" value="10:30:00" class="btn btn-primary">10:30:00</button>
                                    <button type="button" onclick="setTimeUnblock('11:00:00')" name="unblockTime" value="11:00:00" class="btn btn-primary">11:00:00</button>
                                    <button type="button" onclick="setTimeUnblock('11:30:00')" name="unblockTime" value="11:30:00" class="btn btn-primary">11:30:00</button>
                                    <button type="button" onclick="setTimeUnblock('12:00:00')" name="unblockTime" value="12:00:00" class="btn btn-primary">12:00:00</button>
                                    <button type="button" onclick="setTimeUnblock('12:30:00')" name="unblockTime" value="12:30:00" class="btn btn-primary">12:30:00</button>
                                    <button type="button" onclick="setTimeUnblock('14:00:00')" name="unblockTime" value="14:00:00" class="btn btn-primary">14:00:00</button>
                                    <button type="button" onclick="setTimeUnblock('14:30:00')" name="unblockTime" value="14:30:00" class="btn btn-primary">14:30:00</button>
                                    <button type="button" onclick="setTimeUnblock('15:00:00')" name="unblockTime" value="15:00:00" class="btn btn-primary">15:00:00</button>
                                    <button type="button" onclick="setTimeUnblock('15:30:00')" name="unblockTime" value="15:30:00" class="btn btn-primary">15:30:00</button>
                                    <button type="button" onclick="setTimeUnblock('16:00:00')" name="unblockTime" value="16:00:00" class="btn btn-primary">16:00:00</button>
                                    <button type="button" onclick="setTimeUnblock('16:30:00')" name="unblockTime" value="16:30:00" class="btn btn-primary">16:30:00</button>
                                    <button type="button" onclick="setTimeUnblock('17:00:00')" name="unblockTime" value="17:00:00" class="btn btn-primary">17:00:00</button>
                                    <button type="button" onclick="setTimeUnblock('17:30:00')" name="unblockTime" value="17:30:00" class="btn btn-primary">17:30:00</button>
                                    <button type="button" onclick="setTimeUnblock('18:00:00')" name="unblockTime" value="18:00:00" class="btn btn-primary">18:00:00</button>
                                    </div>
                                </div>
                                    <input type="text" id="unblockTime" style="margin-bottom: 1%" name="time" class="form-control" readonly>
                                    <button type="submit" class="btn btn-primary">Desbloquear Horario</button>
                            </form>
                            <!-- Formulario para desbloquear un día -->
                            <form action="{{ route('unblockDay') }}" method="POST">
                                @csrf
                                <div class="mb-3" style="border-top: 1px black solid; margin-top:8%">
                                    <label for="unblockDate" class="form-label" style="margin-top: 2%"> 
                                        <h3>Fecha a desbloquear:</h3>
                                    </label>
                                    <input type="date" id="unblockDate" name="date" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">Desbloquear Día</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <script>
            function setTimeUnblock(time) {
                document.getElementById('unblockTime').value = time;
            }
        </script>
        <script>
            function setTimeBlock(time) {
                document.getElementById('blockTime').value = time;
            }
        </script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'es',
                events: '/events',
                initialView: 'timeGridWeek',
                slotLabelFormat: {
                    hour: 'numeric',
                    minute: '2-digit',
                    meridiem: 'short'
                },
                slotMinTime: '08:00:00',
                slotMaxTime: '19:00:00',
                contentHeight: 'auto',
            });

            calendar.render();
        });
        </script>
    </div>
</div>
@endsection