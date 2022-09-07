@extends("main")
@section("content")
<div class="row mt-5" id="yap2"  >
    <div class="card col-md-10 offset-md-1 border-success "  >
        <div class="card-header bg-white row">
            <div class="text-success col-md-9">
                <h5 class="mt-2">Yapılan Görevler</h5>
            </div>
            <div class="col-md-3 d-flex justify-content-end ">
                <a href="{{route("tasks.index")}}"
                   type="button" class="btn btn-outline-success"
                   data-bs-toggle="tooltip" data-bs-placement="top"
                   data-bs-custom-class="custom-tooltip"
                   data-bs-title="Aktif Görevler"><i class="bi bi-calendar4-week"></i></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr class="text-success">
                    <th class="col-md-2">İşin adı</th>
                    <th class="col-md-2">Görevli</th>
                    <th class="col-md-2">Durumu</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $task)
                <tr>
                    <td>{{$task->gorev_adi}}</td>
                    <td>{{$task->gorevli}}</td>
                    <td>{{$task->status_name}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
