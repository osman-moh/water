@extends('layouts.app') 
@section('title' , 'تفاصيل البنود الفرعية للبلاغات')
@section('content')
    @if (Session::has('message'))
        <div class="h3 alert alert-success text-center">{{ Session::get('message') }}</div>
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
            <h3 class="box-title">  تفاصيل بنود البلاغات الفرعية</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-lg-4">
                    <a href="{{route('report_sub_details.create')}}"  class="btn btn-primary" ><i class="fa fa-fw fa-plus-square"></i>
                               اضافة تفصيل جديد
                    </a>
                </div>
            </div>
            <hr>
            <div class="row" >
                <div class="col-lg-8">
                <table id="Comm" class="table table-bordered" >
                    <thead>
                    <tr>
                        <th >الترقيم</th>
                        <th>تفصيل البند </th>
                        <th>نوع البند</th>
                        <th colspan="2" class="text-center"> الاجراء   </th>
                    </tr>
                    </thead> 
                    @foreach($report_sub_details as $kay=>$value)
                        <tr>
                            <td>
                                @isset($value->id)
                                    {{ $value->id }}
                                @endisset
                            </td>
                            <td>
                                @isset($value->name)
                                    {{ $value->name }}
                                @endisset
                            </td>
                            <td>
                                @isset($value->report_sub_types->name)
                                    {{ $value->report_sub_types->name }}
                                @endisset
                            </td>
                            <td> 
                                <a  class="btn btn-success" href="{{route('report_sub_details.edit',$value->id)}}">
                                    تعديل

                                </a>
                            </td>
                            <td>
                                <form  action="{{route('report_sub_details.destroy',$value->id)}}"method="POST">
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
        </div>
        <div class="box-footer">


        </div>
    </div>

@endsection
