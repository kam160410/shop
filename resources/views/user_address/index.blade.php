@extends('layouts.app')
@section('title', '收货地址列表')

@section('content')
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    收货地址列表
                    <a href="{{route('user_addresses.create')}}" class="pull-right">新增收货地址</a>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>收货人</th>
                            <th>地址</th>
                            <th>邮编</th>
                            <th>电话</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($addresses)>0 )
                            @foreach($addresses as $address)
                                <tr>
                                    <td>{{ $address->contact_name }}</td>
                                    <td>{{ $address->full_address }}</td>
                                    <td>{{ $address->zip }}</td>
                                    <td>{{ $address->contact_phone }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('user_addresses.edit',['user_address'=>$address->id])}}">修改</a>
                                        <form action="{{route('user_addresses.destroy',['user_address'=>$address->id])}}" method="post" style="display: inline-block;">
                                            {{method_field('DELETE')}}
                                            {{csrf_field()}}
                                            <button type="button" class="btn btn-danger del-address-btn" data-id="{{$address->id}}">删除</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="5" >
                                    <a href="{{ route('user_addresses.create')}}" class="btn btn-info">
                                        暂无地址，点击添加地址
                                    </a>
                                </td>
                            </tr>

                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptAfterJs')
    <script>
        $(document).ready(function(){
            $('.del-address-btn').on('click',function(){

                var id = $(this).data('id');

                swal({
                    title: "确认要删除该地址？",
                    icon: "warning",
                    buttons: ['取消', '确定'],
                    dangerMode: true,
                })
                .then(function(willDelete){

                    if(!willDelete){
                        return false;
                    }

                    axios.delete('/user_address/'+id)
                        .then(function(data){
                            swal({
                                title: data.data.msg,
                                icon: "success",
                                dangerMode: true,
                            })
                            .then(function(){
                                location.reload();
                            })
                        })

                })
            })
        })

    </script>
@endsection