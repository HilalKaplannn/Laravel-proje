@extends("main")
@section("content")

    <div class="row mt-5" id="yap">
        <div class=" card col-md-10 offset-md-1  border-success " >
            <div class="card-header row">
                <div class="col-md-9">
                    <h5 class="mt-2 text-success ">Silinen Görevler</h5>
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
                <table class="table table-hover ">
                    <thead>
                    <tr class="text-success">
                        <th class="col-md-2" >İşin adı</th>
                        <th class="col-md-3">Görevli</th>
                        <th class="col-md-1">İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{$task->gorev_adi}}</td>
                            <td>{{$task->gorevli}}</td>
                            <td>
                                <div class="btn-group " role="group" >
                                    <a href="{{route("tasks.recover",$task->uuid)}}"
                                       type="button" class="btn btn-outline-primary"
                                       data-bs-toggle="tooltip" data-bs-placement="top"
                                       data-bs-custom-class="custom-tooltip"
                                       data-bs-title="Görevi Ekle"><i class="bi bi-recycle"></i>
                                    </a>
                                    <a href="{{route("tasks.harddelete",$task->uuid)}}"
                                       type="button" class="btn btn-outline-danger"
                                       data-bs-toggle="tooltip" data-bs-placement="top"
                                       data-bs-custom-class="custom-tooltip"
                                       data-bs-title="Tamamen Sil"><i class="bi bi-trash3"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <br><br>
@endsection
