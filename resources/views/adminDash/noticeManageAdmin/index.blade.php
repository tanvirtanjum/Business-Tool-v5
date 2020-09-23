@include('adminDash.common')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Notice</title>
    <!--<link rel="stylesheet" type="text/css" href="../assets/styles/common.css">
    <link rel="stylesheet" type="text/css" href="../assets/styles/notice.css">-->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/common.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/notice.css') }}">
</head>
<body>
    <div class="table">
        <h1>Notice Manage</h1>
        <hr>
        <form method="POST">
            <input style="margin-top: 3px;width: 20%;" type="text" name="noteSub" placeholder="Enter Notice Subject" value="{{Session::get('b')}}">
            <input type="hidden" name="unoteID" value="">
            <input style="width: 15%;" type="submit" name="SEND" value="SEND">
            <input style="margin-top: 3px;width: 20%;margin-left: 180px;" type="text" name="noticeID" placeholder="Load Notice By ID" value="{{Session::get('a')}}" {{Session::get('sfld')}}>
            <span style='color: red;'> {!! html_entity_decode(Session::get('srchERR'), ENT_QUOTES, 'UTF-8') !!} </span>
            <input style="width: 15%;" type="submit" name="LOAD" value="LOAD">
            <p>Your Notice <span style='color:red;'> {{Session::get('upERR')}} </span> </p>
            <textarea style="margin-top: 10px;" name="noticetext" id="notice" placeholder="write your notice here" cols="42" rows="20">{{Session::get('c')}}</textarea>
            <table style="float: right;" class="content-table">
                <thead>
                    <th>Notice Id</th>
                    <th>Subject</th>
                </thead>
                <tbody id='tab'>
                  @foreach($table as $content)
                    <tr>
                      <td align='middle'>{{$content['noticeID']}}</td>
                      <td align='middle'>{{$content['noteSub']}}</td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
            <input type="submit" name="REFRESH" value="REFRESH">
            <!--<span style='color:red;'> {{Session::get('upERR')}} </span>--><br>
            <input type="submit" name="UPDATE" value="UPDATE" {{Session::get('udBTN')}}>
            <input type="submit" name="DELETE" value="DELETE" {{Session::get('udBTN')}}>
        </form>
    </div>
</body>
</html>>
