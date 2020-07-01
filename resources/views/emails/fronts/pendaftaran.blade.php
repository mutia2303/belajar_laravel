@component('mail::message')
# Pendaftaran Siswa

Selamat Anda Sudah Terdaftar di SMAN 1 Bukittinggi

@component('mail::button', ['url' => '	www.sman1bukittinggi.sch.id'])
Klik Disini
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
