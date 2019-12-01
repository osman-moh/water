 
    @extends('layouts.app')
	@section('title' , 'تفاصيل المربعات')
    @section('content')
        <div class="box box-default">

            <div class="box-header with-border">
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
                    <!-- /.box-header -->
                    
            <div class="box-body">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>بيانات المربع</h2>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-2"><h5><strong>  المربع</strong></h5></div>
                        <div class="col-md-3">
                            <h5>
                                @isset( $square->name ) 
                                 {{ $square->name }}
                                @endisset
                                
                            </h5>
                        </div>
                        
                    
            
                    </div>

                    <div class="row">
                        <div class="col-md-2"><h5><strong>  المنطقة الكبري</strong></h5></div>
                        <div class="col-md-3">
                            <h5>
                                @isset($square->city->name) 
                                 {{$square->city->name}}
                                @endisset
                                
                            </h5>
                        </div>
                        
                    
            
                    </div>
                    <div class="row">
                        <div class="col-md-2"><h5><strong>   المحلية</strong></h5></div>
                        <div class="col-md-3">
                            <h5>
                                @isset( $square->locality->name ) 
                                 {{ $square->locality->name}}
                                @endisset
                                
                            </h5>
                        </div>
                        
                    
            
                    </div>

                    <div class="row">
                        <div class="col-md-2"><h5><strong>  المدينة</strong></h5></div>
                        <div class="col-md-3">
                            <h5>
                                @isset(  $square->town->name ) 
                                 {{  $square->town->name }}
                                @endisset
                                
                            </h5>
                        </div>
                    </div>

                    </hr>
                    <hr>
                    <div class="row">
                      
                        @if (auth()->user()->user_type_id == 1)
                            
                            <form action="/squares/{{ $square->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <div class="row">
                                    <div class="col-md-12"><br><br></div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-3">
                                        <a href="/squares/{{ $square->id }}/edit" class="btn btn-primary btn-block">تعديل البلاغ</a>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <button class="btn btn-danger btn-block" type="submit">حذف البلاغ</button>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div><hr>
                            </form>
                        @endif
                    </div>
                </div>
                </div>

            </div>
        </div>
    @endsection