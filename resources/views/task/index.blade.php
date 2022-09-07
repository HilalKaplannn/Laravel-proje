@extends("main")
@section("content")

    <div class="container">
        <div class="row mb-5"  >
            <div class="col mt-2 d-flex justify-content-end mt-3">
                <a href="{{route("tasks.create")}}" class="btn btn-outline-success "><i class="bi bi-patch-plus"></i> Görev Ekle</a>
            </div>
        </div>

        <div class="row mb-5 mt-3" >
            <div class=" card col-md-10 offset-md-1  border-success " >
                <div class="card-header row">
                    <div class="col-md-6">
                        <h5 class="mt-2 text-success">Yapılacak Görevler</h5>
                    </div>

                    <div class="col-md-6 d-flex justify-content-end" role="group">
                        <a href="{{route("tasks.finished")}}"
                           type="button" class="btn btn-outline-success"
                           data-bs-toggle="tooltip" data-bs-placement="top"
                           data-bs-custom-class="custom-tooltip"
                           data-bs-title="Tamamlanan Görevler">
                            <i class="bi bi-check2-all"></i>
                        </a>
                        <a href="{{route("tasks.trashed")}}"
                           type="button" class="btn btn-outline-secondary"
                           data-bs-toggle="tooltip" data-bs-placement="top"
                           data-bs-custom-class="custom-tooltip"
                           data-bs-title="Silinen Görevler">
                            <i class="bi bi-trash3"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover ">
                        <thead>
                        <tr class="text-success">
                            <th class="col-md-2" >İşin adı</th>
                            <th class="col-md-2">Görevli</th>
                            <th class="col-md-2">Durum</th>
                            <th class="col-md-1">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach($tasks as $task)
                            <tr>

                                <td>{{$task->gorev_adi}}</td>
                                <td>{{$task->gorevli}}</td>
                                <td>{{$task->status_name}}</td>
                                <td>
                                    <div class="btn-group " role="group" >
                                        <a href="{{route("tasks.show",$task->uuid)}}" type="button" class="btn btn-outline-primary ">Göster</a>
                                        <a href="{{route("tasks.edit",$task->uuid)}}" type="button" class="btn btn-outline-success ">Düzenle</a>
                                        <a href="{{route("tasks.destroy",$task->uuid)}}" type="button" class="btn btn-outline-danger ">Sil</a>
                                    </div>
                                </td>

                            </tr>

                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
