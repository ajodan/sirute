<x-layout.user-layout>
    <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">Agenda Kegiatan</h3>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="#">Agenda Kegiatan</a></li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->

        <!-- Blog Start -->
        <div class="container-fluid blog py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Agenda Kegiatan</h5>
                    <h1 class="mb-4">Kalender Kegiatan</h1>
                    <p class="mb-0">Temukan berbagai agenda kegiatan terbaru di sini.
                    </p>
                </div>
                <div class="row g-4 justify-content-center">
                    <div id="calendar"></div>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    {{-- {{ $aspirasi->links() }} --}}
                </div>
            </div>
        </div>
        <!-- Blog End -->
        {{-- <x-partials.user.agenda.detail /> --}}
</x-layout.user-layout>

<script src="{{ asset('assets/js/calender.js') }}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script> --}}
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        let calendarEl = document.getElementById('calendar');
        let calendar = new FullCalendar.Calendar(calendarEl, {
            timeZone: 'Asia/Jakarta',
            locale: 'id',
            height: 400,
            events: @json($agenda),
            headerToolbar: {
                start: 'prev',
                center: 'title',
                end: 'next'
            },
            customButtons: {
                addEvent: {
                    text: 'Tambah Agenda',
                    click: function() {
                        document.getElementById('add-agenda').classList.add('block');
                    }
                },
                next: {
                    click: function() {
                        calendar.next();
                        const date = calendar.getDate();
                        Alpine.store('agenda').getByDate(date.toISOString());
                    }
                },
                prev: {
                    click: function() {
                        calendar.prev();
                        const date = calendar.getDate();
                        Alpine.store('agenda').getByDate(date.toISOString());
                    }
                }
            },
            eventClick: function(info) {
                info.jsEvent.preventDefault(); // don't let the browser navigate
                Alpine.store('agenda').title = info.event.title;
                Alpine.store('agenda').deskripsi = info.event.extendedProps.deskripsi;
                Alpine.store('agenda').start = info.event.startStr;
                Alpine.store('agenda').end = info.event.endStr;
                // call alpine toggle agenda modal
                Alpine.store('agenda').toggle();
            },
        });
        calendar.render();
    });
</script> --}}

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let calendarEl = document.getElementById('calendar');
        let calendar = new FullCalendar.Calendar(calendarEl, {
            timeZone: 'Asia/Jakarta',
            locale: 'id',
            height: 400,
            events: @json($agenda),
            headerToolbar: {
                start: 'prev',
                center: 'title',
                end: 'next'
            },
            customButtons: {
                addEvent: {
                    text: 'Tambah Agenda',
                    click: function() {
                        document.getElementById('add-agenda').classList.add('block');
                    }
                },
                next: {
                    click: function() {
                        calendar.next();
                        const date = calendar.getDate();
                        Alpine.store('agenda').getByDate(date.toISOString());
                    }
                },
                prev: {
                    click: function() {
                        calendar.prev();
                        const date = calendar.getDate();
                        Alpine.store('agenda').getByDate(date.toISOString());
                    }
                }
            },

            // ✅ Tambah tooltip ketika hover event
            eventDidMount: function(info) {
                new bootstrap.Tooltip(info.el, {
                    title: `
                        <strong>${info.event.title}</strong><br>
                        ${info.event.extendedProps.deskripsi ?? '-'}<br>
                        Mulai : <br>${info.event.start.toLocaleString('id-ID', {
                            timeZone: 'Asia/Jakarta',
                            dateStyle: 'full',
                            timeStyle: 'short'
                        })}<br>
                        Selesai : <br>${info.event.end ? info.event.end.toLocaleString('id-ID', {
                            timeZone: 'Asia/Jakarta',
                            dateStyle: 'full',
                            timeStyle: 'short'
                        }) : '-'}
                    `,
                    placement: 'top',
                    html: true,
                    trigger: 'hover',
                    container: 'body'
                });
            },

            eventClick: function(info) {
                info.jsEvent.preventDefault(); 
                Alpine.store('agenda').title = info.event.title;
                Alpine.store('agenda').deskripsi = info.event.extendedProps.deskripsi;
                Alpine.store('agenda').start = info.event.startStr;
                Alpine.store('agenda').end = info.event.endStr;
                Alpine.store('agenda').toggle();
            },
        });
        calendar.render();
    });
</script>


<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('agenda', {
            id: '',
            title: '',
            deskripsi: '',
            start: '',
            end: '',
            on: false,
            data: [],
            isLoading: true,
            init() {
                this.getData();
            },
            toggle() {
                this.on = !this.on;
            },
            getData() {
                this.isLoading = true;
                fetch('/api/agenda', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        this.data = data;
                        // console.log(data);
                        this.isLoading = false;
                    })
            },
            getByDate(date) {
                this.isLoading = true;
                fetch('/api/agenda', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            date: date
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        this.data = data;
                        this.isLoading = false;
                    })
            },
        })
    })
</script>
