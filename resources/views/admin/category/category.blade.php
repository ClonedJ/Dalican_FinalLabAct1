<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container ">
            <div class="row">
                <div class="col-md-8">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissable fade show" role="alert">
                        {{session('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">User Id</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <th scope="row">{{$category->id}}</th>
                                        <td>{{$category->category_name}}</td>
                                        <td>{{$category->user_id}}</td>
                                        <td>{{$category->created_at->diffForHumans()}}</td>
                                        <td>
                                            <a href="{{url('category/edit/'.$category->id)}}" class="btn btn-info">Edit</a>
                                            <a href="{{url('category/delete/'.$category->id)}}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$categories->links()}}
                        </div>
                    </div>
                    <div class="col-md-4 card">
                        <div class="card">
                            <div class="card-header">
                                Add Categories
                            </div>
                            <div class="card-body">
                                <form action="{{route('add.category')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="CategoryName" class="form-label">Category Name</label>
                                        <input type="text" class="form-control" name="category_name">
                                        @error('category_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror   
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>                                                              
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
