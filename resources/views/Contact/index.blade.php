<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="container-fluid vh-100">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-10">
                <div class="card border-0 shadow px-4 py-2">
                    <h3 class="text-center mb-0 text-primary">Contact List</h3>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <a href="{{route('contacts.create')}}" class="btn btn-primary btn-hover">
                            <i class="bi bi-plus-circle-dotted"></i>
                            New Contact
                        </a>
                        <div class="d-flex align-items-center">
                            @if(request('search'))
                            <div class="me-4 position-relative">
                                <span>Search By :: {{request('search')}}</span>
                                <a href="{{route('contacts.index')}}" class="position-absolute right-0 top-0 translate-middle ">
                                    <i class="bi bi-x-circle text-black-50 hover-link" style="font-size: 12px"></i>
                                </a>
                            </div>
                            @endif
                            <form action="{{route('contacts.index')}}" method="post">
                                @csrf
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search">
                                    <button type="submit" class="input-group-text btn btn-primary">
                                        <i class="bi bi-search text-white"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Emaill</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td>{{ $contact->message }}</td>
                                        <td>
                                            {{-- <button class="btn btn-sm btn-primary">
                                                <a href="{{ route('contacts.edit', $contact->id) }}">
                                                    <i class="bi bi-pencil-square text-white"></i>
                                                </a>
                                            </button> --}}
                                            <form class="d-inline" action="{{route('contacts.destroy', $contact->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash text-white"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="">
                        {{ $contacts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
