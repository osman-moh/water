    @extends('layouts.app')
	@section('title' , 'المستخدمين')
    @section('content') 

        @if (Session::has('status'))
            <div class="alert alert-info">{{ Session::get('status') }}</div>
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

        <div class="container">
            <hr>
            <div class="row" dir="rtl">
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <a href="{{route('user.create')}}" class="btn btn-primary" href="#"><i class="fa fa-fw fa-plus"></i>مستخدم جديد</a>
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel">
                        <div class="panel-heading"><h5>   المستخدمين  </h5> </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-responsive text-center" dir="rtl">
                            <thead>
                                <tr>
                                    <th class="text-center"><input type="checkbox" class="flat-red" id="checkall" ></th>
                                    <th class="text-center">الترقيم</th>
                                    <th class="text-center"> الاسم</th>
                                    <th class="text-center"> البريد </th>
                                    <th class="text-center" colspan="3"> الاجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $value)
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="flat-red"  name="studantid" value="{{$value->id}}" >
                                        </td>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->email}}</td>
                                        <td>
                                            <a href="{{route('user.edit',$value->id)}}" class="btn btn-success" value="{{$value->id}}">
                                                <i class="fa fa-fw fa-edit"></i>تعديل
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{route('user.destroy',$value->id)}}" method="POST">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="btn btn-danger" value="{{$value->id}}">
                                                    <i class="fa fa-fw fa-remove"></i>
                                                    حذف</button>
                                            </form>
                                        </td>
                                        <td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        </div>
                    </div>
                </div>
            </div> <!-- ./ row-->
    </div><!-- ./container -->
        

    @endsection