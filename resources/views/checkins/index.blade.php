<!-- resources/views/checkins/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Check-in</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <h2 class="flex justify-center mt-4">Check-in dulu ga sih?</h2>

    <div class="flex justify-center mt-4">
        <form method="POST" action="{{ route('checkins.checkin') }}">
            @csrf

            <button type="submit" class="mb-4 px-4 py-2 bg-blue-500 text-white rounded-xl hover:bg-blue-600">Check-in</button>
        </form>
    </div>

    @if (Session::has('error'))
    <div class="alert alert-danger text-center bg-red-100 border border-red-400 text-red-700 px-4 py-3 mb- rounded w-4/12 mx-auto" role="alert">
        {{ Session::get('error') }}
    </div>
    @endif

    <table class="mx-auto border-collapse border border-black">
        <thead>
            <tr>
                <th class="border border-black px-4 py-2">Hari</th>
                <th class="border border-black px-4 py-2">Tanggal</th>
                <th class="border border-black px-4 py-2">Jam</th>
                <th class="border border-black px-4 py-2">Jumlah Check-in</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalDays = 0;
            @endphp
            @foreach ($checkIns as $checkIn)
            <tr class="border border-black">
                <td class="border border-black px-4 py-2">{{ $checkIn->hari }}</td>
                <td class="border border-black px-4 py-2">{{ $checkIn->tanggal }}</td>
                <td class="border border-black px-4 py-2">{{ $checkIn->jam }}</td>
                <td class="border border-black px-4 py-2">{{ ++$totalDays }} hari</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
