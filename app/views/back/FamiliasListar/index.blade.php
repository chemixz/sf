@extends('back.layout')
@section('content')
    <h2>Familias</h2>
        
        <div class="row">
            
            <div class="col-sm-12">
                
                <a href="{{URL::to('/dashboard')}}" class="btn btn-warning" alt="Familias" title="Familias">
                    <span class="glyphicon glyphicon-chevron-left"></span>&nbsp; Atras
                </a>
            </div>
            <div class="col-sm-12">
                 @if(Session::has('message'))  <!--muestra mesaje de suceso que viene del homecontrol-->
                <div class="alert alert-{{ Session::get('class') }} fade in">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                    <p>  {{ Session::get('message') }} </p>
                </div>
                @endif

                @if($errors->has())               
                    <div class="alert alert-danger fade in">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                        @foreach($errors->all() as $error)
                            <p>{{ $error  }}</p>
                        @endforeach

                     </div>
                @endif

            </div>
            <div class="col-sm-12">

                    @if (count($familias)>0)

                    <table class="table">
                        <thead>
                            <tr>
                                <th width="15%" >Foto</th>
                                <th width="15%">Nombre</th>
                                <th width="15%">Dirección</th>
                                <th width="15%">Telefono</th>
                                <th width="10%">Estatus</th>
                                <th width="10%">Usuario</th>
                                
                            </tr>
                        </thead>    

                        <tbody>
                    @foreach ($familias as $f)
                        <tr>
                            <td ><img src="{{URL::to('/')}}/uploads/images/{{$f->foto}}" alt="{{$f->nombre}}" title="{{$f->nombre}}" class="img-responsive antigua-foto"></td>
                            <td>{{$f->nombre}}</td>
                            <td>{{$f->dirección}}</td>
                            <td>{{$f->telf}}</td>
                            <td>{{$f->estatus}}</td>
                            <td>{{$f->usuario->nombre}}</td>
                           
                        </tr>
                        
                    @endforeach
                        </tbody>
                    </table>
                    @else
                        <h3>No hay Miembros Registrados</h3>
                    @endif

                        
                </div>
            </div>
    
@endsection