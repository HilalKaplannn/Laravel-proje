@extends("main")
@section("content")


    <div class="card col-md-10 offset-md-1 border-success mt-5">
        <div class="card-body row">
            <h5 class="card-title text-success text-center ">Hakkımda</h5>
            <hr class="border border-success border-1 opacity-25 mt-2">
            <img class="card-img-top " style="width: 18rem" src="potre.png" alt="Card image cap">
            <p class="card-text col ">hakkımda bilgisi metini.</p>
        </div>
    </div>


    <div class="card col-md-10 offset-md-1 border-success mt-5">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title text-success">Bizimle İletişime Geçin</h5>
                <hr class="border border-success border-1 opacity-25">
                <p class="card-text">Harekete Geçirici Metin</p>
                <a href="{{route("iletisim")}}" class="btn btn-outline-success"> <i class="bi bi-arrow-return-right"></i> </a>
            </div>
        </div>
    </div>
@endsection


