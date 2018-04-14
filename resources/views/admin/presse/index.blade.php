@extends('layouts.admin.app')
@section('title', 'Presse')
@section('content')
	<div class="container admin-container">
		<div class="row">
			<div class="col-12">
				<div class="form-group">
					<a href="{{ route('admin_presse_create') }}">
						<button type="button" class="btn btn-success">Neuer Eintrag</button>
					</a>
				</div>
			</div>
			<div class="col-12">
				<table class="table">
					<thead>
						<tr>
							<th>
								Bild
							</th>
							<th>
							</th>
						</tr>
					</thead>
					<tbody>
    					@foreach($presse as $press)
    						<tr>
    							<td>
                                    <img src="<?=Image::url('/storage/'.$press->link,100,100,array('crop'))?>" />
                                </td>
    							<td class="list-icon-container">
    								<a class="list-icon" href="{{ route('admin_presse_delete', $press->id) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
    							</td>
    						</tr>
    					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection
