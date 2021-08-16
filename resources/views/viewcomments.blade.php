@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-12">
                <p class="btn btn-primary mb-2">Blog:  {{ $blogs->title }}</p> 
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>S NO.</th>
                            <th>Comments</th>
							 <th>Added Date</th>
                            
                        </tr>
                    </thead>
                    <tbody><?php $count=1;?>
                        @foreach($blog_comments as $blog)
                        <tr>
                            <td><?= $count; ?></td>
                            <td>{{ $blog->comment }}</td>
							 <td>{{ $blog->created_at }}</td>
                            
                        </tr>
						<?php $count++ ;?>
                        @endforeach
                    </tbody>
                </table>
            </div> 
    </div>
</div>
@endsection