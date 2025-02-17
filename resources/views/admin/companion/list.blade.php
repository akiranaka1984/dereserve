@extends('admin.layout')

@section('content')
    @if(session('success'))
        <script>
            simpleMessage('success',`{{ session('success') }}`);
        </script>
    @endif
    @if(session('error'))
        <script>
            simpleMessage('error',`{{ session('success') }}`);
        </script>
    @endif
    <hr />
    <!-- <ol class="breadcrumb bc-3">
        <li> <a href="../../dashboard/main/index.html"><i class="fa-home"></i>Home</a> </li>
        <li> <a href="../../ui/panels/index.html">UI Elements</a> </li>
        <li class="active"> <strong>Buttons</strong> </li>
    </ol> -->
    <h2><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="M5.673 0a.7.7 0 0 1 .7.7v1.309h7.517v-1.3a.7.7 0 0 1 1.4 0v1.3H18a2 2 0 0 1 2 1.999v13.993A2 2 0 0 1 18 20H2a2 2 0 0 1-2-1.999V4.008a2 2 0 0 1 2-1.999h2.973V.699a.7.7 0 0 1 .7-.699ZM1.4 7.742v10.259a.6.6 0 0 0 .6.6h16a.6.6 0 0 0 .6-.6V7.756L1.4 7.742Zm5.267 6.877v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15Zm-8.333-3.977v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15ZM4.973 3.408H2a.6.6 0 0 0-.6.6v2.335l17.2.014V4.008a.6.6 0 0 0-.6-.6h-2.71v.929a.7.7 0 0 1-1.4 0v-.929H6.373v.92a.7.7 0 0 1-1.4 0v-.92Z"></path></svg>
        モデル一覧</h2> <br />

    <div class="tile-stats tile-primary frm-head"> 検索</div>

    <div class="panel panel-primary" data-collapsed="0">
        <div class="row p-1">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="txtSearchId" class="col-sm-3 control-label text-right mt-5px">検索 : </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="txtSearchId" placeholder="" value="{{ $search_q }}" >
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-orange save_all_position  btn_fixed">並び順を確定する</button>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-green" id="bulkAddingButton" onclick="openModal()">Excelファイル一括登録</button>
            </div>  
            <div id="bulkAddingModal" class="modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('admin.companion.bulk.add') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <span class="close" id="bulkAddingClose" onclick="closeModal()">&times;</span>
                                <h4>モデルの一括追加</h4>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <label for="uploadCSV">zip ファイルをアップロードする</label>
                                    <input  type="file" name="zip" class="form-control" id="uploadZip" required/>
                                </div>
                            </div>

                            {{-- <div class="modal-body">
                                <div>
                                    <label for="uploadCSV">Excelファイルをアップロードする</label>
                                    <input  type="file" name="csv" class="form-control" id="uploadCSV" accept=".xls,.xlsx" required/>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <label for="uploadCSV">すべての画像をアップロードする</label>
                                    <input type="file" name="images[]" class="form-control" id="uploadImages" multiple required/>
                                </div>
                            </div> --}}
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">モデルの追加</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tile-stats tile-primary frm-head"> モデル一覧</div>

    <div class="row dragula" id="left-events">
        @foreach($companions->sortBy('position') as $companion)
            <div class="col-md-3 trow" data-id="{{ $companion->id }}">
                <div class="panel panel-primary" >
                    <div class="panel-body text-center">
                        <a href="{{ route('admin.companion.edit', ['id'=>$companion['id'], 'stab' => 1]) }}">
                            @php
                                if(!empty($companion['home_image'])){
                                    $imgPath = '/storage/photos/'.($companion['id']).'/'.($companion['home_image']['photo']);
                                }else{
                                    $imgPath = '/storage/photos/default/images.jpg';
                                }
                            @endphp
                            <img src="{{ url($imgPath) }}" class="topi_class" />
                        </a>
                        <h2 class="text-center rank-list">{{ $companion['category']['name'] }}</h2>

                        <h3 class="text-center">
                            <a href="{{ route('admin.companion.edit', ['id'=>$companion['id'], 'stab' => 1]) }}" class="text-info">{{ $companion['name'] }}</a>
                        </h3>
                        {{-- <h4 class="text-center look-like">{{ $companion['celebrities_who_look_alike'] }}</h4> --}}
                        <h4 class="text-center look-like">表示設定</h4>

                        <form role="form" method="post" action="{{ route('admin.companion.status.save') }}" >
                            @csrf

                            <input type="hidden" name="companion_id" value="{{ $companion->id }}" required />
                            <div class="text-center">
                                <select name="status" class="form-control w-50 d-inline-block">
                                    <option value="1" {{ ($companion['status'] == 1) ? 'selected' :'' }} >表示</option>
                                    <option value="2" {{ ($companion['status'] == 2) ? 'selected' :'' }} >非公開</option>
                                    <option value="3" {{ ($companion['status'] == 3) ? 'selected' :'' }} >削除</option>
                                </select>
                            </div>
                            <div class="text-center mt-1">
                                <button type="submit" class="btn btn-primary ">確定</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        let nPsitionObj = {}
        $(document).ready(function(){

            dragula([document.getElementById("left-events")])
            .on('drag', function (el) {
                el.className += ' el-drag-ex-2';
                el.className = el.className.replace('ex-moved', '');
            })
            .on('drop', function (el, target, source, sibling) {
                el.className = el.className.replace('el-drag-ex-2', '');
                el.className += ' ex-moved';
                setTimeout(() => {
                    resetPosition()
                }, 200);
            })
            .on('over', function (el, container) {
                container.className += ' ex-over';
            })
            .on('out', function (el, container) {
                container.className = container.className.replace('ex-over', '');
            })
            .on('cancel', function (el) {
                el.className = el.className.replace('el-drag-ex-2', '');
            });


            $(document).on('click','.save_all_position', function(){
                $.ajax({
                    type: 'POST',
                    url: `{{ route('admin.companion.position.save') }}`,
                    headers: {"Content-Type": "application/json"},
                    data: JSON.stringify({
                        "_token": "{{ csrf_token() }}",
                        data:nPsitionObj
                    }),
                    success: function (response) {
                        simpleMessage('success',`{{__('Save Changes')}}`);
                    }
                })
            })

            $(document).on('keypress','#txtSearchId', function(e){
                if(e.which == 13){
                    let search = $(this).val();
                    window.location.href = `{{ route('admin.companion.list') }}?q=`+search;
                }
            })

            resetPosition()
        })

        function resetPosition(){
            nPsitionObj = {};
            $('.trow').each(function(index, rtag){
                let id = $(this).attr('data-id');
                nPsitionObj[id] = index + 1;
            })
        }

        var modal = document.getElementById("bulkAddingModal");
        var btn = document.getElementById("bulkAddingButton");
        var span = document.getElementById("bulkAddingClose");
        function openModal() {
            modal.style.display = "block";
        }
        function closeModal() {
            modal.style.display = "none";
        }

    </script>
@endsection
