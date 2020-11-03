@extends('layouts.app')

@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Balsavimo Pavadinimas</th>
            <th scope="col">Balsavimo Klausimas</th>
            <th scope="col">Atsakymai</th>
            <th scope="col">Balsų Skaičius</th>
            <th scope="col">Balsavimo Kūrėjas</th>
            <th scope="col">Sukūrimo Data</th>
            <th scope="col">Atnaujinimo Data</th>
            <th scope="col">Veiksmai</th>
        </tr>
        </thead>
        <tbody>
        @foreach($strawpolls as $data)
            <tr>
                <td>{{ $data->name }}</td>
                <td>{{ $data->question }}</td>
                <td>{{ $data->answers }}</td>
                <td>{{ $data->votes }}</td>
                <td>{{ $data->creator }}</td>
                <td>{{ $data->created_at }}</td>
                <td>{{ $data->updated_at }}</td>
                <td>
                    <a href="{{ route('about-strawpoll', $data->id) }}">Daugiau</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
