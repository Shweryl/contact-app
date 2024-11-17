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
    <div class="container vh-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-8 col-lg-6">
                <div class="card border-0 shadow px-4 py-2">
                    <div class="card-body w-100">
                        <h3 class="text-center text-primary mb-3">Contact Me</h3>
                        <form action="{{route('contacts.store')}}" method="post">
                            @csrf
                            <div class="d-flex mb-3">
                                <div class="input-group me-2">
                                    <span class="input-group-text bg-primary text-white">Firstname</span>
                                    <input type="text" class="form-control" name="firstname" value="{{old('firstname')}}">
                                    @error('firstname')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text bg-primary text-white">Lastname</span>
                                    <input type="text" class="form-control" name="lastname" value="{{old('lastname')}}">
                                    @error('lastname')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="text-primary">Email</label>
                                <input type="email" class="form-control" name="email" value="{{old('email')}}">
                                @error('email')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="" class="text-primary">Phone</label>
                                <input type="text" class="form-control" name="phone" value="{{old('phone')}}">
                                @error('phone')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="text-primary">Message</label>
                                <textarea type="text" cols="3" class="form-control" name="message">{{old('message')}}</textarea>
                                @error('message')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-primary text-white me-2 btn-hover" href="{{route('contacts.index')}}">Back</a>
                                <button class="btn btn-primary text-white btn-hover">Send Me</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
