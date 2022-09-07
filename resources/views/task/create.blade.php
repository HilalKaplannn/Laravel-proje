@extends("main")
@section("content")
    <br>
<form action="{{route("tasks.store")}}" method="POST">
    @csrf

    <div class="row mt-5">

        <div class="mb-3">
            <label for="exampleInputgorev_adi" class="form-label">Görev Adi</label>
            <input type="text" class="form-control"  name="gorev_adi" id="exampleInputgorev_adi">
        </div>
        <div class="mb-3">
            <label for="exampleInputnogorevli" class="form-label">Görevli</label>
            <input type="text" class="form-control"  name="gorevli" id="exampleInputnogorevli">
        </div>
        <div class="mb-3">
            <label for="exampleInputnoaciklama" class="form-label">Açiklama</label>
            <input type="text" class="form-control"  name="aciklama" id="exampleInputaciklama">
        </div>
        <div class="mb-3">
            <label for="exampleInputnotask_status" class="form-label">Durum</label>
            <select name="task_status" id="exampleInputnotask_status" class="form-control">
                @foreach($task_statuses as $task_status)
                    <option value="{{$task_status->id}}">{{$task_status->name}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-outline-primary">Update</button>
    </div>

</form>
    <br>

@endsection
