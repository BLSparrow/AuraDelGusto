@extends('layouts.app')
@section('title', 'Booking')
@section('content')
    <style>
        .modal-backdrop {
            z-index: 1 !important;
        }

        #myModal {
            z-index: 999 !important;
        }
    </style>
    <main class="d-flex justify-content-center align-items-center fon"
          style="background: url({{asset('storage/room.jpg')}})">
        <div class="container-fluid d-flex align-items-center justify-content-center">
            @include('inc.errors')
            @include('inc.modal')
            <div class="card col-10 col-xl-4">
                <div class="card-header">
                    <h1 class="text-center fs-3">Бронирование</h1>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <input type="date" class="form-control" name="dateOrder" id="dateOrder"
                               aria-label="dateOrder">
                    </div>

                    <div class="mb-3">
                        <input type="time" class="form-control mb-2" name="timeOrder" id="timeOrder"
                               aria-label="timeOrder">
                    </div>

                    <div class="mb-3">
                        {{--Количество часов--}}
                        <input type="number" aria-label="countHours" class="form-control" id="countHours"
                               name="countHours"
                               placeholder="Кол-во часов : 1" value="">
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#" class="book-a-table-btn" id="bookingsFind">найти</a>
                        <p id="countRes"></p>
                    </div>

                </div>
                <div id="error"></div>

                <div id="bookingRes" class="row"></div>
            </div>
        </div>
    </main>
@endsection
@push('scripts')
    <script src="{{ asset('/js/workWithElements.js') }}"></script>
    <script src="{{ asset('/js/fetchPost.js') }}"></script>

    <script>
        let inputCountHours = 1;
        let today = new Date();
        let options = {
            hour: 'numeric',
            minute: 'numeric'
        };

        $('dateOrder').setAttribute('min', today.toLocaleDateString('en-ca'));

        $('dateOrder').value = today.toLocaleDateString('en-ca');
        $('timeOrder').value = today.toLocaleTimeString("ru", options);

        async function loadBookings(dateOrder, timeOrder) {
            let bookings = await getData('/bookings/bookings-find', `?dateOrder=${dateOrder}&timeOrder=${timeOrder}`);
            $('countRes').textContent = `Занятых столиков: ${bookings.length}`;
            outBookings({{count($tables)}}, bookings.map(item => item.table_id));
        }

        async function saveTable(table) {
            let myModal = new bootstrap.Modal(document.getElementById('myModal'));
            let data = await postData('/bookings/bookings-find/save', table, '{{ csrf_token() }}');
            if (data != null) {
                let res = data;
                let date_first = new Date(res.dateStart);
                let time_first = [date_first.getHours(), date_first.getMinutes()].map(function (x) {
                    return x < 10 ? "0" + x : x
                }).join(":")

                let date_second = new Date(res.dateStart);
                date_second.setMinutes(date_second.getMinutes() + (inputCountHours * 60));
                let time_second = [date_second.getHours(), date_second.getMinutes()].map(function (x) {
                    return x < 10 ? "0" + x : x
                }).join(":");

                $('info').innerHTML = `<p>Вы забронировали столик под номером ${res.table_number}</p>
                                       <p>с ${time_first} до ${time_second}</p>`;
                myModal.show();
            } else {
                $('error').innerHTML = `<p class="alert alert-danger">Что-то пошло не так! Попробуйте снова.</p>`;
            }
        }

        $('bookingsFind').addEventListener('click', async function (e) {
            await loadBookings($('dateOrder').value, $('timeOrder').value)
        })

        function outBookings(countChecks, ids) {
            let check = '';
            let tables = @json($tables);
            tables.forEach(function (table) {
                check += `
                <div class="col">
                    <label class="switch text-center">
                        <input type='checkbox' ${ids.includes(table.id) ? 'disabled' : ''} id='check${table.id}' class='check' value='${table.id}'>
                        <div class="maintxt ${ids.includes(table.id) ? 'cross' : ''}" style="background-image: url('/storage/${table.image}')">
                            <span class="text-center text-light position-absolute fs-5 bg-black bg-opacity-75 p-2 w-100">Стол №${table.number}<br>
                               Кол-во мест: ${table.quantity}</span>
                        </div>
                    </label>
                </div>
                `
            });
            check += `
                     <div class="text-center m-3">
                        <a href="#" class="book-a-table-btn" id='btnOrder'>Забронировать</a>
                    </div>
                `
            $('bookingRes').innerHTML = check;
        }

        function clearChecks() {
            document.querySelectorAll('.check').forEach(check => check.checked = false)
        }

        let selectedTable = 0;
        document.addEventListener('click', async (e) => {
            if (e.target.classList.contains('check')) {
                clearChecks()
                e.target.checked = true;
                selectedTable = e.target.value;
            }
            if (e.target.id === 'btnOrder' && selectedTable > 0 && $('timeOrder').value >= today.toLocaleTimeString("ru", options)) {
                inputCountHours = $('countHours').value != "" ? $('countHours').value : 1;
                let data = {
                    dOrder: $('dateOrder').value,
                    tOrder: $('timeOrder').value,
                    countHours: inputCountHours,
                    table: selectedTable,
                }
                await saveTable(data);
            }
        })

    </script>
@endpush
