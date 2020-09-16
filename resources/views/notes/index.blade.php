@if(Session::get('SID') == 1)
      @include('adminDash.common')
@elseif(Session::get('SID') == 2)
      @include('managerDash.common')
@elseif(Session::get('SID') == 3)
      @include('salesmanDash.common')
@elseif(Session::get('SID') == 4)
      @include('DeliverymanDash.common')
@elseif(Session::get('SID') == 5)
      @include('customerDash.common')
@else
@endif
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Notes</title>
		<link rel="stylesheet" type="text/css" href="{{ URL::to('css/common.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::to('css/notes.css') }}">
    	<script src="{{ URL::to('js/saveNotes.css') }}"></script>
    	
	</head>
	<body>
		<div class="box">
			<h1>Take your Note</h1>
			<form method='post'>
				@csrf
			<input type="text" name="name" id="name" placeholder="Note name" value="{{$info1[0]->NoteName}}">
        <input type="Submit" name="PUSH" value="PUSH">
				<input style="margin-left: 80px;width: 20%;" type="text" placeholder="Search by id" name="search">
			<input type="hidden" name="NoteID" value="{{$info[0]->NoteID}}">
				<input style="margin-left: 5px;width: 15%;" type="Submit" name="SEE" value="SEE"><br>
			<textarea placeholder="write here..." name="notes" id="notes" cols="46" rows="20">{{$info1[0]->Text}}</textarea><br>
				<input type="submit" name="REFRESH" value="REFRESH">
        <input style="margin-left: 30px;" type="submit" name="PRINT" value="PRINT" onclick="return saveFile()">
				<br><br>
				<input type="submit" name="UPDATE" value="UPDATE" >
        <input style="margin-left: 30px;" type="submit" name="DELETE" value="DELETE"><br><br>
		@foreach($errors->all() as $err)
		<span style="color: red">{{$err}} <br></span>
		@endforeach
		@if(session('success'))
			<span style="color: green"> {{session('success')}}</span>
		@endif
      		</form>
			<div align="right" class="table">
				<table class="content-table">
					<thead>
						<tr>
							<th>Note Id</th>
							<th>Note Name</th>
						</tr>
					</thead>
					<tbody class="tab" id="tab">
						@for($i=0; $i != count($info); $i++)
						<tr>
							<td>{{$info[$i]->NoteID}}</td>
							<td>{{$info[$i]->NoteName}}</td>
						</tr>
           				@endfor
					</tbody>

				</table>
			</div>
		</div>
	</body>
</html>
