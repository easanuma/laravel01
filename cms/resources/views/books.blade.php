<!-- resources/views/books.blade.php -->

@extends('layouts.app')

@section('content')
    
    
    <div class="panel-body">
        <!-- バリデーションエラーの表示に使用-->
        @include('common.errors')
        <!-- バリデーションエラーの表示に使用-->
        
        <!-- 本登録フォーム -->
        <form action="{{ url('books') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            
            <!-- 本のタイトル -->
            <div class="form-group">
                <label for="book" class="col-sm-3 control-label">Book</label>
                <input type="text" name="item_name" id="book-name">
                </div>
            <div class="form-group">
                <label for="item_number" class="col-sm-3 control-label">冊数</label>
                <input type="text" name="item_number" id="item_number">
                </div>
            <div class="form-group">
                <label for="item_amount" class="col-sm-3 control-label">金額</label>
                <input type="text" name="item_amount" id="item_amount">
                </div>
            <!-- 本 登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="glyphicon glyphicon-plus"></i> Save
                    </button>
                </div>
            </div>
        </form>
        
        
         <!-- 現在の本 -->
         @if (count($books) > 0)
            <div class="panel panel-default">
                <div class="panel-heading"> 
                    現在の本
                </div>
                <div class="panel-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>本一覧</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                         @foreach ($books as $book)
                            <tr>
                                <!-- 本タイトル -->
                                <td class="table-text">
                                    <div>{{ $book->item_name }}</div>
                                    <div>{{ $book->item_number }}</div>
                                    <div>{{ $book->item_amount }}</div>
                                    <div>{{ $book->published }}</div>
                                </td>
                                
                                <!-- 本: 更新ボタン --> 
                                <td>
                                <!--<form action="{{ url('booksedit/'.$book->id) }}" method="POST">-->
                                <!--     {{ csrf_field() }}-->
                                     <button type="submit" class="btn btn-primary">
                                     <i class="glyphicon glyphicon-pencil"></i>更新
                                     </button>
                                </form>
                                </td>
                                
                                <!-- 本: 削除ボタン -->
                                <td>
                                <form action="{{ url('book/delete/'.$book->id) }}" method="POST">
                                        
                                        {{ csrf_field() }}

                                        <button type="submit" class="btn btn-danger"> <i class="glyphicon glyphicon-trash"></i> 
                                            削除
                                        </button>
                                    </form>

                                </td>
                                
                            </tr>
                         @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    <!--  ook: 既に登録されてる本 リスト -->
   
    </div>
@endsection