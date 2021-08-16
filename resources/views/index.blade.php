@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-12">
                <a href="blog/create" class="btn btn-primary mb-2">Create Blog</a> 
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>S NO.</th>
                            <th>Title</th>
                            
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody><?php $count=1;?>
                        @foreach($blogs as $blog)
                        <tr>
                            <td><?= $count; ?></td>
                            <td>{{ $blog->title }}</td>
                            
                            <td>
                            <a href="blog/{{$blog->id}}/viewcomments" class="btn btn-primary">View Comments</a>
                            <a href="blog/{{$blog->id}}/edit" class="btn btn-primary">Edit</a>
							
                            <form action="blog/{{$blog->id}}" method="post" class="d-inline">
                                {{ csrf_field() }}
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                            </td>
                        </tr>
						<?php $count++ ;?>
                        @endforeach
                    </tbody>
                </table>
            </div> 
    </div>
</div>
@endsection