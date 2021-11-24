@extends('layouts.appl', ['activePage' => 'user-management', 'titlePage' => __(' Lista de Administradores')])
@section('content')
 <div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-calendar bg-blue"></i>
                        <div class="d-inline">
                            <h5>Lista de Empresas y Clientes</h5>
                            <span>Informacion de las empresas y los clientes registrados con la empresa</span>
                            <br>
                            <br>
                            <h6> </h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                @if(session()->get('user_rol')->first()==1)
                                <a href="{{route('inicio',$id=session()->get('nombre')->first())}}"><i class="ik ik-home"></i></a>
                                @else
                                @if(session()->get('user_rol')->first()!=1)
                                <a href="../index.html"><i class="ik ik-home"></i></a>
                                @endif
                                @endif
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Apps</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Lista de Empresa y Clientes</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card table-card">

                <div class="card">
                    <div class="card-header">
                        <h3>Lista de Empresas y Clientes</h3>
                    </div>
                    {{-- <a href="" class="btn btn-sm btn-primary">{{ __('Añadir Empresa') }}</a> --}}

                    <div class="card-body">
                        <div class="dt-responsive">
                            <table id="lang-dt"
                                   class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            {{ __('#') }}
                                        </th>
                                        <th class="text-center">
                                          {{ __('Nombre') }}
                                        </th>
                                        <th class="text-center">
                                          {{ __('NIT') }}
                                        </th>
                                        <th class="text-center">
                                            {{ __('Direccion') }}
                                          </th>
                                        <th class="text-center">
                                          {{ __('Telefono') }}
                                        </th>
                                        <th class="text-center">
                                          {{ __('Ciudad') }}
                                        </th>
                                        <th class="text-center">
                                            {{ __('Nombre Cli.') }}
                                         </th>
                                        <th class="text-center">
                                            {{ __('Telefono_Cli') }}
                                          </th>
                                          <th class="text-center">
                                            {{ __('Accion') }}
                                          </th>

                                       </tr>


                                      </thead>
                                <tbody>
                                    @foreach($selec as $sel)
                                    <tr>
                                     <td class="text-center">
                                   {{ $loop->iteration }}
                                 </td>

                                 <td class="text-center">
                                   {{ $sel->nomb_emp}}
                                 </td>
                                 <td class="text-center">
                                   {{ $sel->nit }}
                                 </td>
                                 <td class="text-center">
                                   {{ $sel->direccion }}
                                 </td>
                                 <td class="text-center">
                                   {{ $sel->telefon }}
                                 </td>
                                 <td class="text-center">
                                   {{ $sel->ciudad }}
                                 </td>
                                 <td class="text-center">
                                    {{ $sel->nombre }}
                                  </td>
                                  <td class="text-center">
                                    {{ $sel->telefono }}
                                  </td>
                                   <td class="td-actions text-right">
                                       @if ($sel->id_usr != session()->get('id')->first())
                                       <form action={{-- "{{ route('user.destroy', $user) }}" --}}  method="post">
                                             @csrf
                                             @method('delete')

                                             <a  href="{{route('editaruser',$id=$sel->id_usr)}}"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
                                            <a href="{{ route('deleteUs',$id=$sel->id_usr) }}" ><i class="ik ik-trash-2 f-16 text-red"></i></a>

                                         </form>
                                       @else
                                       <a  href="{{route('infoRut',$sel->id_usr)}}"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
                                       @endif
                                     </td>
                                     </tr>
                             @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">
                                            {{ __('#') }}
                                        </th>

                                        <th class="text-center">
                                          {{ __('Nombre') }}
                                        </th>
                                        <th class="text-center">
                                          {{ __('NIT') }}
                                        </th>
                                        <th class="text-center">
                                            {{ __('Direccion') }}
                                          </th>
                                        <th class="text-center">
                                          {{ __('Telefono') }}
                                        </th>
                                        <th class="text-center">
                                          {{ __('Ciudad') }}
                                        </th>
                                        <th class="text-center">
                                            {{ __('Nombre Cli.') }}
                                         </th>
                                        <th class="text-center">
                                            {{ __('Telefono_Cli') }}
                                          </th>

                                           <th class="text-center">
                                            {{ __('Accion') }}
                                          </th>
                                        </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
 @endsection
 @push('links')
 <link rel="stylesheet" href="{{ asset('proyect') }}/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="{{asset('proyect')}}/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">

 @endpush
 @push('scripts')
 <script src="{{ asset('proyect') }}/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
         <script src="{{ asset('proyect') }}/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
         <script src="{{ asset('proyect') }}/js/datatables.js"></script>

 @endpush
