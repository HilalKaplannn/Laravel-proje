@extends("main")
@section("content")


        <div class="row">
            <div class="card border-success col-md-10 offset-md-1 mb-5 mt-5 ">
                <div class="col-12 mt-2 mb-2 ">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active"data-bs-interval="2000">
                                <img src="foto3.png" class="d-block w-100 rounded " style="width:640px;height:460px" alt="">
                            </div>
                            <div class="carousel-item"data-bs-interval="2000">
                                <img src="foto4.png" class="d-block w-100 rounded" style="width:640px;height:460px"alt="">
                            </div>
                            <div class="carousel-item"data-bs-interval="2000">
                                <img src="foto.png" class="d-block w-100 rounded " style="width:640px;height:460px" alt="">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="card border-success col-md-6 offset-md-1 mb-5  ">
                <nav>
                    <div class="nav nav-tabs mt-2" id="nav-tab" role="tablist">
                        <a href="#" class="btn nav-link active text-success" id="nav-tum-tab" data-bs-toggle="tab" data-bs-target="#nav-tum" type="button" role="tab" aria-controls="nav-tum" aria-selected="true">Tüm Görevler</a>
                        <a href="#" class="nav-link text-success " id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Yapılacak Görevler</a>
                        <a href="#" class="nav-link text-success" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Yapılan Görevler</a>
                    </div>
                </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-tum" role="tabpanel" aria-labelledby="nav-tum-tab" tabindex="0">
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
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
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
                                    @foreach($devam_eden_tasks as $task)
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
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
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
                                    @foreach($completed_tasks as $task)
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

            </div>

            <div class="calendar col-md-4 mx-3">
                <div class="calendar-top">
                    <ul class="days">
                        <li class="day">M</li>
                        <li class="day">T</li>
                        <li class="day">W</li>
                        <li class="day">Th</li>
                        <li class="day">F</li>
                        <li class="day">Sa</li>
                        <li class="day">S</li>
                    </ul>

                    <ul class="dates "></ul>
                </div>
                <div class="calendar-bottom">
                    <button class="prev-btn" onclick="prevMonth()">
                        <i class="fas fa-chevron-left"></i>
                    </button>

                    <span class="current-month-year"></span>

                    <button class="next-btn" onclick="nextMonth()">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-5 offset-md-1 mt-3 ">
                <div class="card text-center border-success">
                    <div class="card-body">
                        <h5 class="card-title text-success">Yeni Görev Ekle</h5>
                        <hr class="text-success">
                        <p class="card-text">Yeni görev eklemesi yap!</p>
                        <a href="{{route("tasks.create")}}" class="btn btn-success"><i class="bi bi-patch-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 mt-3  ">
                <div class="card text-center border-danger">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Silinen Görevler</h5>
                        <hr class="text-danger">
                        <p class="card-text">Silinen görevleri tekrar ekle veya tamamen sil!</p>
                        <a href="{{route("tasks.trashed")}}" class="btn btn-danger" ><i class="bi bi-trash3"></i></a>
                    </div>
                </div>
            </div>
        </div>


@endsection




