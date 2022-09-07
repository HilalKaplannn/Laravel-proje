@extends("main")
@section("content")
<div class="row justify-content-end mt-2">
    <a href="{{route("tasks.index")}}" class="btn btn-outline-primary col-1  ">Geri</a>
</div>

<div class="row mt-3">
    <div class="col-12 ">
        <table class="table  table-bordered table-striped  ">
            <tbody>
            <tr>
                <th>Görev Adı:</th>
                <td>{{$task->gorev_adi}}</td>
            </tr>
            <tr>
                <th>Görevli:</th>
                <td>{{$task->gorevli}}</td>
            </tr>
            <tr>
                <th>Görev Açıklaması:</th>
                <td>{{$task->aciklama}}</td>
            </tr>
            <tr>
                <th>Görev Durumu:</th>
                <td>{{$task->status_name}}</td>
            </tr>
            <tr>
                <th>Created By:</th>
                <td>{{$task->user_name}}</td>
            </tr>
            <tr>
                <th>Created At:</th>
                <td>{{\Carbon\Carbon::parse($task->created_at)->format("d-M-Y H:m")}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
