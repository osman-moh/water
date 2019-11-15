@extends('layouts.app')
@section('title' , 'المدن || الأحياء')
@section('content')
    @if (Session::has('message'))
        <div class="h3 alert alert-success text-center message">{{ Session::get('message') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"> المدن  </h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-lg-4">
                    <a href="{{route('towns.create')}}"  class="btn btn-primary" ><i class="fa fa-fw fa-plus-square"></i>
مدنية جديدة
                    </a>
                </div>
            </div>
            <hr>
            <div class="row" >

                    <table  class="table table-bordered" >
                        <thead>
                        <tr>
                            <th >الترقيم</th>
                            <th>المدينة   </th>
                            <th>المنطقة الكبري </th>
                            <th>المحلية  </th>
                            <th>المكتب  </th>
                           
                            <th colspan="2"> الاجراء     </th>
                        </tr>
                        </thead>
    
                        @foreach($data as $key=>$value )
                            <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->name}}</td>
                                <td>
                                    @isset($value['city']->name)
                                        {{ $value['city']->name }}
                                    @endisset
                                </td>
                                <td>
                                    @isset($value['locality']->name)
                                        {{ $value['locality']->name }}
                                    @endisset
                                </td>
                                <td>
                                    @isset($value['office']->name)
                                        {{ $value['office']->name }}
                                    @endisset
                                </td>
                                
                                <td>
                                    <a  class="btn btn-success" href="{{route('towns.edit',$value->id)}}">
                                        تعديل
    
                                    </a>
                                    </td>
                                    <td>
    
                                        <form  action="{{route('towns.destroy',$value->id)}}"method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
                                            <button    type="submit" class="btn btn-danger">
                                                 <i class="fa fa-fw fa-remove"></i>
                                            </button>
                                        </form>
    
    
    
    
                                </td>
                            </tr>
                        @endforeach
                    </table>
    
                </div>
           
        </div>
        <div class="box-footer">
               {{$data->links()}}
        </div>
    </div>
@endsection


@section('javascript')

        <script>
            $(document).ready(function(){
               
                $('.message').hide(4000);

            });
        </script>

@endsection