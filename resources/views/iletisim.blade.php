@extends("main")
@section("content")

    <div class="card col-md-10 offset-md-1 border-success mt-5 ">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title text-success">Bizimle İletişime Geçin</h5>
                <hr class="border border-success border-1 opacity-25">
                <p class="card-text">Harekete Geçirici Metin</p>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <div class="row">
            <div class="col-md-3 offset-md-1">
                <h2 class="text-center mb-2">İletişim Bilgileri</h2>
                <hr>

                <table class="table table-borderless">
                    <tbody>
                    <tr>
                        <th><i class="bi bi-telephone text-success"> Tel</i></th>
                        <td>05********</td>
                    </tr>

                    <tr>
                        <th><i class="bi bi-envelope text-success"> Eposta</i></th>
                        <td>****@***</td>
                    </tr>

                    <tr>
                        <th ><i class="bi bi-geo-alt text-success"> Adres</i></th>
                        <td>*********</td>
                    </tr>

                    </tbody>
                </table>

            </div>
            <div class="col-md-6 offset-md-1">
                <h2 class="text-center mb-2" >İletişim Formu</h2>
                <hr>

                @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form  action="{{route("contacts.post")}}" method="POST" role="form">
                    @csrf
                    <div class="control-group">
                        <div class="form-group controls">
                            <label class="text-success">Ad Soyadınız:</label>
                            <input type="text" class="form-control mt-1" value{{old('name')}} name="name" placeholder="Ad Soyadınız" required>
                        </div>
                    </div>
                    <br>
                    <div class="control-group">
                        <div class="form-group controls">
                            <label class="text-success " >E-posta Adresiniz:</label>
                            <input type="email" class="form-control mt-1" value="{{old('email')}}" name="email" placeholder="E-posta Adresiniz" required >
                        </div>
                    </div>
                    <br>
                    <div class="control-group">
                        <div class="form-group controls">
                            <label class="text-success">Konu Seçiniz:</label>
                            <select class="form-control" name="topic">
                                <option></option>
                                <option @if(old('topic')=="Bilgi") selected @endif >Bilgi</option>
                                <option @if(old('topic')=="Destek")selected @endif>Destek</option>
                                <option @if(old('topic')=="Genel") selected @endif >Genel</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="control-group">
                        <div class="form-group controls">
                            <label class="text-success">Mesajınız</label>
                            <textarea name="message" class="form-control mt-1" value="{{old('message')}}" rows="5" placeholder="İletmek istediğiniz mesajınızı bu alana yazınız." required></textarea>
                        </div>
                    </div>
                    <br>
                    <div class=" d-flex justify-content-center">
                        <input class="btn btn-outline-success" type="submit" name="submit" id="gonder" value="Gönder">
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

