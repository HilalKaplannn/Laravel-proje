<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">


    <title>Uygulama</title>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap");

    :root {
        --color-primary: rgb(244, 208, 63);
        --color-primary-light: rgba(244, 208, 63, 0.8);
        --color-success: rgb(25, 135, 84);
        --color-success-light: rgba(25, 130, 84, 0.7);
        --color-gray: rgb(129, 129, 129);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Quicksand", sans-serif;
    }

    ul {
        list-style-type: none;
    }

    .calendar {
        height: 350px;
        width: 350px;
        padding: 30px;
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        box-shadow: 0px 4px 35px rgba(0, 0, 0, 0.2);
    }

    .calendar-top {
        height: 92%;
    }

    .calendar-top .days {
        height: 8%;
        display: grid;
        grid-template-columns: repeat(7, 1fr);
    }

    .calendar-top .days .day {
        height: 80%;
        text-align: center;
        color: var(--color-success);
        font-weight: bold;
    }

    .calendar-top .dates {
        height: 92%;
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        grid-template-rows: repeat(6, 1fr);
        gap: 6px;
    }

    .calendar-top .dates .date {
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 6px;
        color: var(--color-gray);
        font-size: 14px;
        animation: dateAppear 0.3s ease-in-out forwards;
    }

    .calendar-top .dates .date.current {
        background-color: var(--color-success-light);
        color: #fff;
    }

    .calendar-top .dates .date.current.today {
        background-color: var(--color-primary-light);
    }

    .calendar-bottom {
        height: 8%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .calendar-bottom .prev-btn,
    .calendar-bottom .next-btn {
        border: none;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: var(--color-primary-light);
        color: #fff;
        cursor: pointer;
        transition: transform 0.3s;
    }

    .calendar-bottom .prev-btn:hover,
    .calendar-bottom .next-btn:hover {
        background-color: var(--color-primary);
    }

    .calendar-bottom .prev-btn:active,
    .calendar-bottom .next-btn:active {
        transform: scale(1.4);
    }

    .calendar-bottom .current-month-year {
        font-size: 18px;
        font-weight: bold;
        color: var(--color-success);
    }

    @keyframes dateAppear {
        from {
            opacity: 0;
            transform: scale(0.8);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    @media (max-width: 768px) {
        .calendar {
            height: 70vw;
            width: 70vw;
            padding: 10px;
        }

        .calendar-top .days .day {
            font-size: 14px;
        }

        .calendar-top .dates {
            gap: 3px;
        }

        .calendar-bottom .prev-btn,
        .calendar-bottom .next-btn {
            width: 24px;
            height: 24px;
            font-size: 8px;
        }

        .calendar-bottom .current-month-year {
            font-size: 16px;
        }
    }

    @media (max-width: 425px) {
        .calendar {
            height: 90vw;
            width: 90vw;
            padding: 6px;
        }

        .calendar-top .dates {
            gap: 2px;
        }
    }

</style>
</head>
<body>
<div class="container-fluid">
    <div class=" row">
        <div class="card border-success bg-black">
            <div class="card-header">
                <div class=" text-light row p-2" >
                    <div class="col-10  ">
                        <h4> Hoş Geldin {{auth()->user()->first()->name}}</h4>
                    </div>
                    <div class="col-2 d-flex justify-content-end">
                        <a href="{{"giris"}}" class="btn btn-outline-success "><i class="bi bi-person"></i> Giriş Yap</a>
                    </div>
                </div>
            </div>

                <div class="card-body mb-0 row bg-white">
                    <ul class="nav justify-content-center ">
                        <li class="nav-item">
                            <a class="nav-link  text-black" href="{{route("dashboard")}}">Anasayfa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{route("hakkimda")}}">Hakkımda</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-dark" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Görevler</a>
                            <ul class="dropdown-menu border-success">
                                <li><a class="dropdown-item " href="{{route("tasks.index")}}">Yapılacak Görevler</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item "  href="{{route("tasks.finished")}}">Yapılan Görevler</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{route("iletisim")}}">İletişim</a>
                        </li>
                    </ul>
                </div>

        </div>
    </div>




                <div class="container">
                    @yield("content")
                </div>

      <div class="row">
        <div class="card bg-black border-success mt-5 mb-2 ">
            <div class="card-footer">
                <div class="row">
                    <div class="col-4">
                        <h5 class="text-white mt-3 mx-5">Sayfalar</h5>
                        <hr>

                        <ul class="nav flex-column mx-5">
                            <li class="nav-item">
                                <a class="nav-link text-secondary " href="{{route("dashboard")}}">Anasayfa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-secondary " href="{{route("hakkimda")}}">Hakkımda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-secondary " >Görevler</a>
                                <ul>
                                    <li > <a class="nav-link text-secondary " href="{{route("tasks.index")}}"><i class="bi bi-arrow-bar-right"></i>Yapılacak Görevler</a></li>
                                    <li> <a class="nav-link text-secondary " href="{{route("tasks.finished")}}"><i class="bi bi-arrow-bar-right"></i>Yapılan Görevler</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-secondary " href="{{route("iletisim")}}">İletişim</a>
                            </li>

                        </ul>

                    </div>
                    <div class="col-3">
                        <h5 class="mt-3 text-white">İletişim Bilgileri</h5>
                        <hr>
                        <ul class="nav flex-column mt-3 text-secondary mx-3">
                                <li class="nav-item"><i class="bi bi-telephone"> Tel: 05******</i></li>
                                <li class="nav-item mt-2 mb-2"> <i class="bi bi-envelope"> Mail: ***@****</i></li>
                                <li class="nav-item"><i class="bi bi-geo-alt"> Adres:Adres bilgisidir.</i></li>

                        </ul>

                    </div>

                    <div class="col-5 mt-3">
                        <iframe src="https://www.google.com/maps/d/embed?mid=1KVGLcrfwwD4sHO78KKFgD-1bJGP7wAA&ehbc=2E312F" width="500" height="300"></iframe>
                    </div>
                </div>

            </div>
        </div>
      </div>
</div>


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
 <script>

    const dateList = document.querySelector(".dates");
    const prevBtn = document.querySelector(".prev-btn");
    const nextBtn = document.querySelector(".next-btn");
    const currentMonthYear = document.querySelector(".current-month-year");

    let date = new Date();
    const TOTAL_DAYS_VISIBLE = 42;
    const MONTHS = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
    ];

    function createCalendar(date) {
        const prev = getLastDate(date.getFullYear(), date.getMonth(), true);
        const curr = getLastDate(date.getFullYear(), date.getMonth() + 1);
        const next = TOTAL_DAYS_VISIBLE - (prev.days + curr);

        dateList.innerHTML = "";

        for (let i = prev.date - prev.days + 1; i <= prev.date; i++) {
            dateList.innerHTML += `
      <li class="date">${i}</li>
    `;
        }

        for (let i = 1; i <= curr; i++) {
            // Check if the day is today
            if (date.getDate() === i) {
                dateList.innerHTML += `
        <li class="date current today">${i}</li>
      `;
            } else {
                dateList.innerHTML += `
        <li class="date current">${i}</li>
      `;
            }
        }

        for (let i = 1; i <= next; i++) {
            dateList.innerHTML += `
      <li class="date">${i}</li>
    `;
        }

        currentMonthYear.innerText = `${
            MONTHS[date.getMonth()]
        }, ${date.getFullYear()}`;
    }

    function prevMonth() {
        date = new Date(date.getFullYear(), date.getMonth() - 1, date.getDate());

        createCalendar(date);
    }

    function nextMonth() {
        date = new Date(date.getFullYear(), date.getMonth() + 1, date.getDate());

        createCalendar(date);
    }

    function getLastDate(year, month, withDay = false) {
        if (withDay) {
            return {
                date: new Date(year, month, 0).getDate(),
                days: new Date(year, month, 0).getDay(),
            };
        }

        return new Date(year, month, 0).getDate();
    }

    document.addEventListener("DOMContentLoaded", () => createCalendar(date));

</script>

 <script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>

</body>
</html>


