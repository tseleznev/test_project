@extends('master',['title' => 'Your picture'])
@section('content')
    <div style="width:420px;height:auto;">
    @foreach($imgs as $img)
        @if($id!='')
            @php
                $part = 'part_'.$id
            @endphp

            <img src="{{$img->$part}}" style="width:200px;height:auto;">
        @else
            @for($i=1;$i<=4;$i++)
                @php
                    $part = 'part_'.$i
                @endphp
                <img src="{{$img->$part}}" style="width:200px;height:auto;">
            @endfor
        @endif
    @endforeach
    </div>
@endsection