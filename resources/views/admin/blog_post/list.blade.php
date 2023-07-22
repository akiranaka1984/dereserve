@extends('admin.layout')

@section('content')
    <hr />
    <!-- <ol class="breadcrumb bc-3">
        <li> <a href="../../dashboard/main/index.html"><i class="fa-home"></i>Home</a> </li>
        <li> <a href="../../ui/panels/index.html">UI Elements</a> </li>
        <li class="active"> <strong>Buttons</strong> </li>
    </ol> -->
    <h2><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 5l-8-5h16zm0 12H4V8l8 5l8-5v10z"/></svg>
    メルマガ管理</h2> <br />
    
    <div class="tile-stats tile-primary frm-head"> メルマガ管理</div>
    <div class="panel panel-primary" data-collapsed="0">
        <div class="row p-1">
            <div class="col-md-6"></div>
            <div class="col-md-4">
                <div class="form-group"> 
                    <label for="txtSearchId" class="col-sm-3 control-label text-right mt-5px">検索 : </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="txtSearchId" placeholder="" value="{{ $search_q }}" > 
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <select id="txtStatusId" class="form-control">
                    <option value="0" {{ ($status_q == 0) ? 'selected' : '' }} >All</option>
                    <option value="1" {{ ($status_q == 1) ? 'selected' : '' }} >Publish</option>
                    <option value="2" {{ ($status_q == 2) ? 'selected' : '' }} >Private</option>
                    <option value="3" {{ ($status_q == 3) ? 'selected' : '' }} >Scheduled</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-12 mt-1"> 
        <table class="table table-bordered"> 
            <thead> 
                <tr> 
                    <th>{{ __('Image') }}</th> 
                    <th>{{ __('Title') }}</th> 
                    <th>{{ __('Category') }}</th> 
                    <th>{{ __('Publish date') }}</th> 
                    <th>{{ __('Status') }}</th> 
                    <th>{{ __('Edit') }}</th> 
                </tr> 
            </thead> 
            <tbody> 
                    @foreach($blog_posts as $blog_post)
                        <tr> 
                            <td>
                                @php
                                    $imgPath = '/storage/photos/banners/'.($blog_post->image);       
                                @endphp
                                <img src="{{ url($imgPath) }}" class="blog_img_class" /> 
                            </td> 
                            <td>{{ $blog_post->title }}</td> 
                            <td>
                                @php
                                    $category = json_decode($blog_post->category, true);
                                    if(gettype($category) != 'string'){
                                        $category = implode(', ', $category);
                                    }
                                @endphp
                                {{ $category }}
                            </td> 
                            <td>{{ $blog_post->publish_date }}</td> 
                            <td>
                                @if($blog_post->status == 1)
                                    {{ __('Publish') }}
                                @elseif($blog_post->status == 2)
                                    {{ __('Private') }}
                                @else
                                    {{ __('Scheduled') }}
                                @endif
                            </td> 
                            <td class="dl-flex"> 
                                <a href="{{ route('admin.blog_post.edit') }}?id={{ $blog_post->id }}" class="btn btn-success btn-sm" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="m18.988 2.012l3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287l-3-3L8 13z"/><path fill="currentColor" d="M19 19H8.158c-.026 0-.053.01-.079.01c-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z"/></svg>
                                </a>
                                <a href="{{ route('admin.blog_post.delete') }}?id={{ $blog_post->id }}" class="btn btn-danger btn-sm ml-1 delete_btn" data-id="{{ $blog_post->id }}" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                                </a>
                            </td>
                        </tr>  
                    @endforeach
            </tbody> 
            <tfoot>
                <tr>
                    <td colspan="3" class="text-left">
                        Showing {{ $blog_posts->firstItem() }} to {{ $blog_posts->currentPage() * $blog_posts->perPage() }} of {{ $blog_posts->total() }} entries
                    </td>
                    <td colspan="6" class="text-right">
                        {{ $blog_posts->links() }}
                    </td>
                </tr>    
            </tfoot>            
        </table> 
    </div>

<script>
    $(document).ready(function(){
        $(document).on('keypress','#txtSearchId', function(e){
            if(e.which == 13){
                let search = $(this).val();
                let txtStatusId = $('#txtStatusId').val();
                
                window.location.href = `{{ route('admin.blog_post.list') }}?q=`+search+`&status=`+txtStatusId;
            }
        })

        $(document).on('change','#txtStatusId', function(e){
            let search = $('#txtSearchId').val();
            let txtStatusId = $('#txtStatusId').val();
            window.location.href = `{{ route('admin.blog_post.list') }}?q=`+search+`&status=`+txtStatusId;
        })
    })
 </script>       


@endsection