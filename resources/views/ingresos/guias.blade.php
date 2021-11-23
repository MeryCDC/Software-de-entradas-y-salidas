@extends('layouts.master')

@section('css')
<link href="{{ asset('css/table.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@endsection

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="card-body col-lg-12 d-flex flex-column">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Guias</h2>
                <div class="add-items d-flex mb-0">
                   {{--  @can('minutas.index.store') --}}
                    <button type="button" class="btn btn-primary btn-icon-text" data-toggle="modal"
                        data-target="#ingreso">
                        <i class="ti-plus btn-icon-prepend"></i> Opcion extra
                    </button>
                 {{--    @endcan --}}
                </div>
            </div>
        </div>

        <div class="card-body col-lg-12 d-flex flex-column">
            <div class="d-flex justify-content-between align-items-center">
            <form action="" class="form-inline needs-validation" novalidate>
                <div class="form-group row">
                    <div class="col">
                      <label>Tracking/Perteneciente</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col">
                      <label>Peso</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col">
                        <label>Alto</label>
                          <input type="text" class="form-control">
                      </div>
                      <div class="col">
                        <label>Largo</label>
                          <input type="text" class="form-control">
                      </div>
                      <div class="col">
                        <label>Ancho</label>
                          <input type="text" class="form-control">
                      </div>
                      <div class="col">
                        <button class="btn btn-primary" type="submit">Ingresar</button>
                      </div>
                      
                  </div>
            </form>
            </div>
        </div>

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tabla_ingresos" class="table dt-responsive">
                            <thead>
                                <tr>
                                    <th style="width:15px">ID</th>
                                    <th>T/G/P</th>
                                    <th>Alto</th>
                                    <th>Largo</th>
                                    <th>Ancho</th>
                                    <th>Peso</th>
                                    <th>Peso volumetrico</th>
                                    <th>Volumen</th>
                                    <th>Ingreso</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach($minutas as $minuta) --}}
                                <tr>
                                    <td>1</td>
                                    <td>PepitoLopez124547</td>
                                    <td>52</td>
                                    <td>4</td>
                                    <td>6</td>
                                    <td>4</td>
                                    <td>5</td>
                                    <td>6</td>
                                    <td>Yo mero</td>
                                    <td>
                                        {{-- @can('minutas.mostar.edit') --}}
                                            <a href="{{-- {{ url('/minutas/editar/basica/'.$minuta->id)}} --}}" class="btn btn-outline-primary">Ver guias </a>
                                       {{--  @endcan --}}
                                    </td>
                                </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal para agregar nueva minuta -->
<div class="modal fade" id="ingreso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva Observacion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/minutas') }}" class="forms-sample" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="Nombre">{{ __('Objetivo:') }}</label>
                        <input type="text" class="form-control @error('Objetivo') is-invalid @enderror" id="Objetivo"
                            name="Objetivo" placeholder="Ingrese el objetivo de la minuta"
                            value="{{ old('Objetivo') }}">
                        @error('Objetivo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Lugar_Reunion">Lugar de reunión:</label>
                        <input type="text" class="form-control  @error('Lugar_Reunion') is-invalid @enderror"
                            id="Lugar_Reunion" name="Lugar_Reunion" placeholder="Ingrese el lugar de reunión"
                            value="{{ old('Lugar_Reunion') }}">
                        @error('Lugar_Reunion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="Fecha_Prox_Reuniun">Fecha de proxima reunión:</label>
                        <input type="date" class="form-control @error('Fecha_Prox_Reuniun') is-invalid @enderror"
                            id="Fecha_Prox_Reuniun" name="Fecha_Prox_Reuniun" value="{{ old('Fecha_Prox_Reuniun') }}">
                        @error('Fecha_Prox_Reuniun')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="hidden" class="form-control" id="user_id" name="user_id"
                            value=" {{-- {{ Auth::user()->id }} --}}">
                        <input type="hidden" class="form-control" id="Estatus" name="Estatus" value="0">
                        <input type="hidden" class="form-control" id="Fecha_Creacion" name="Fecha_Creacion"
                            value="{{ date('Y-m-d H:i') }}">
                    </div>

                    <button type="submit" class="btn btn-primary me-2">
                        <i class="mdi mdi-plus"></i> Agregar Minuta
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Final modal para agregar nueva minuta -->
@endsection

@section('js')
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>

<script>
$(function() {
    $('#tabla_ingresos').DataTable({
        "order": [
            [0, "desc"]
        ],
        "pageLength": 20,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
    });
});

/* Modal para agregar un nuevo ingreso */
$(function() {
    $('#ingreso').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var minutaid = button.data('id')
        var modal = $(this)
        modal.find('.modal-title').text('Crear nuevo ingreso')
    })
});
</script>
@endsection