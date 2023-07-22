@extends('admin.layout')

@section('content')
    <hr />
    <!-- <ol class="breadcrumb bc-3">
        <li> <a href="../../dashboard/main/index.html"><i class="fa-home"></i>Home</a> </li>
        <li> <a href="../../ui/panels/index.html">UI Elements</a> </li>
        <li class="active"> <strong>Buttons</strong> </li>
    </ol> -->
    <h2><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 5l-8-5h16zm0 12H4V8l8 5l8-5v10z"/></svg>
    メール定型文編集</h2> <br />
    
    <div class="tile-stats tile-primary frm-head"> メール定型文編集</div>

    <form role="form" method="post" action="{{ route('admin.blog_post.save') }}" enctype="multipart/form-data" class="form-horizontal form-groups-bordered" id="frmBlogPost" >
        @csrf  
        <div class="row">
            <div class="col-sm-12 frm-inpt"> 
                <input type="text" name="post_title" class="form-control input-lg" placeholder="Post title" /> 
            </div>
        </div> <br />
        <div class="row">
            <div class="col-sm-12 frm-inpt"> 
                <textarea name="post_content" class="form-control ckeditor" rows="18" id="frmPostContent"></textarea> 
            </div>
        </div> <br />
        <div class="row">
            <div class="col-sm-4">
                <div class="panel panel-primary" data-collapsed="0">
                    <div class="panel-heading">
                        <div class="panel-title"> Publish Settings </div>
                        <div class="panel-options"> 
                            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> 
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-12 frm-inpt"> 
                            <p>Publish Date</p>
                            <div class="input-group"> 
                                <input type="text" name="post_date" class="form-control datepicker" value="{{ date('Y-m-d') }}" data-format="yyyy-mm-dd">
                                <div class="input-group-addon"> 
                                    <a href="#"><i class="entypo-calendar"></i></a>
                                </div>
                            </div>
                        </div> <br />
                        <div class="col-sm-12 frm-inpt"> 
                            <p>Post Status</p> 
                            <select name="post_status" class="form-control">
                                <option value="1">Publish</option>
                                <option value="2">Private</option>
                                <option value="3">Scheduled</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-primary" data-collapsed="0">
                    <div class="panel-heading">
                        <div class="panel-title">Featured Image</div>
                        <div class="panel-options"> 
                            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> 
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="max-width: 310px; height: 160px;" data-trigger="fileinput"> 
                                <img src="http://placehold.it/320x160" alt="">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail"
                                style="max-width: 320px; max-height: 160px"></div>
                            <div class="col-sm-12 frm-inpt"> 
                                <span class="btn btn-white btn-file"> 
                                    <span class="fileinput-new">Select image</span> 
                                    <span class="fileinput-exists">Change</span> 
                                    <input type="file" name="post_image" accept="image/*"> 
                                </span> 
                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="col-sm-4">
                <div class="panel panel-primary" data-collapsed="0">
                    <div class="panel-heading">
                        <div class="panel-title">Categories</div>
                        <div class="panel-options"> 
                            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> 
                        </div>
                    </div>
                    <div class="panel-body "> 
                        <select name="categories" class="form-control" required>
                            <option value="Art">Art</option>
                            <option value="Entertainment" selected>Entertainment</option>
                            <option value="Sports">Sports</option>
                            <option value="Gaming">Gaming</option>
                            <option value="Abstraction">Abstraction</option>
                            <option value="Nature">Nature</option>
                            <option value="Summer">Summer</option>
                            <option value="Adventures">Adventures</option>
                            <option value="Movies">Movies</option>
                            <option value="Music">Music</option>
                            <option value="Technology">Technology</option>
                        </select> 
                    </div>
                </div>
            </div>
        </div> <br />
        <div class="row">
            <div class="col-sm-2 post-save-changes"> 
                <button type="submit" class="btn btn-green btn-lg btn-block btn-icon"> {{ __('SAVE') }} <i class="entypo-check"></i></button> 
            </div>
        </div> 
    </form>

<script>
    $(document).ready(function(){
        $('#frmBlogPost').validate({
            ignore: [],
            debug: false,
            rules: {
                post_title: { required: true },    
                post_date: { required: true },
                post_image: { required: true },
                post_content:{ 
                    required: function(){
                        CKEDITOR.instances.frmPostContent.updateElement();
                    }
                }
            },
            messages: {
                post_title: { required: "{{ __('This field is required') }}" },
                post_date: { required: "{{ __('This field is required') }}" },
                post_image: { required: "{{ __('This field is required') }}" },
                post_content: { required: "{{ __('This field is required') }}" }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.frm-inpt').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    })
 </script>       


@endsection