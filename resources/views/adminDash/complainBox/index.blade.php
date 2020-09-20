@include('adminDash.common')

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Complain Box</title>
        <!--<link rel="stylesheet" type="text/css" href="/../assets/styles/notice.css">
        <link rel="stylesheet" type="text/css" href="/../assets/styles/common.css">-->
        <link rel="stylesheet" type="text/css" href="{{ URL::to('css/common.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::to('css/notice.css') }}">
    </head>
    <body>
        <div class="table">
            <h1>Complain Box</h1>
            <hr>
            <form method="POST">
                <input style="margin-top: 3px;width: 25%; margin-left: 10px;" type="text" name="subject" placeholder="Subject" value="{{Session::get('b')}}" readonly>
                <input style="margin-top: 3px;width: 25%; margin-left: 180px;" type="text" name="complainID" placeholder="Load Complain By ID" value="{{Session::get('a')}}">
                <span style='color: red;'> {!! html_entity_decode(Session::get('srchERR'), ENT_QUOTES, 'UTF-8') !!} </span>
                <input type="Submit" name="READ" value="READ"><br>
                <textarea style="margin-left: 11px;margin-top: 10px;" name="see" id="see" cols="40" rows="20" placeholder="Complain" readonly>{{Session::get('c')}}</textarea>
                <table style="float: right;margin-right: 40px;" class="content-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Subject</th>
                            <th>Sender</th>
                        </tr>
                    </thead>
                    <tbody id='tab'>
                      @foreach($table as $content)
                        <tr>
                          <td align='middle'>{{$content->cID }}</td>
                          <td align='middle'>{{$content->sub}}</td>
                          <td align='middle'>{{$content->OwnerID}}</td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
        <br><input type="submit" name="REFRESH" value="REFRESH">
            </form>

        </div>
    </body>
</html>
