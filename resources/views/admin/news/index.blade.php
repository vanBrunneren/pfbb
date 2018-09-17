@extends('layouts.admin.app')
@section('title', 'Aktuelles')
@section('content')
	<div class="container admin-container">
		<div class="row">
			<div class="col-12">
				<div class="form-group">
					<a href="{{ route('admin_news_create') }}">
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
								Text
							</th>
							<th>
							</th>
						</tr>
					</thead>
					<tbody>
    					@foreach($news as $n)
    						<tr>
    							<td>
                                    <img src="<?=Image::url('/storage/'.$n->img,100,100,array('crop'))?>" />
                                </td>
    							<td>
                                   <p>{!! $n->text !!}</p>
                                </td>
    							<td class="list-icon-container">
									<a class="list-icon" href="{{ route('admin_news_edit', $n->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
									<a class="list-icon" href="{{ route('admin_news_delete', $n->id) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
								</td>
    						</tr>
    					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection
