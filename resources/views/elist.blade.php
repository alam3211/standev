@extends('layouts.app')

@section('content')
	@isset($standposts)
	<div class="container rounded" style="padding: 10px;margin-top: 6%; background-color: #262626;">
	<div class="container rounded" style="background-color: #2c3e50;padding: 8px; color: white; background: transparent;">
		<div class="row">
			@foreach($standposts as $post)
				<div class="row" style="margin: 10px;">
				<div class="col-md-2">
					<img class="img-thumbnail float-left" src="{{ Storage::url($post->e_poster) }}"> </div>
				<div class="col-md-9" id="but">
					<h1>{{ $post->e_name }}</h1>
					<p>{{ $post->e_description }}</p>
					<span>
					<button class="btn btn-danger">Kuota<br><b>{{ $post->s_available }}</b></button>
					</span>
					<span>
					<button class="btn btn-secondary">Stand Size<br><b>{{ $post->s_length }} x {{ $post->s_width }} m<sup>2</sup></b></button>
					</span>
					<span>
					<button class="btn btn-warning">Date<br><b>{{ $post->e_date }}</b></button>
					</span>
					<span>
					<button class="btn btn-primary">Place<br><b>{{ $post->e_city }}</b></button>
					</span>
					<span>
					<button class="btn btn-success">Price<br><b>{{ $post->s_price }}</b></button>
					</span>
					<span>
					<button class="btn btn-basic" data-toggle="modal" data-target="#readmore{{ $post->s_id }}"><b>Read<br>More</b></button>
					</span>
					<div class="modal fade" id="readmore{{ $post->s_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="color: black;">
					  <div class="modal-dialog modal-dialog-centered" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h2 class="modal-title" id="exampleModalLongTitle">{{ $post->e_name }}</h2>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
						        <div><b>Description :</b> {{ $post->e_description }}</div><hr>
						        <h3>About Event</h3>
						        <div><b>Date : </b>{{ $post->e_date }}</div>
						        <div><b>Location : </b>{{ $post->e_location }}</div>
						        <div><b>City : </b>{{ $post->e_city }}</div>
						        <hr>
						        <h3>About Stand</h3>
						        <div><img src="{{ Storage::url($post->s_photo) }}" style="width: 200px; height: 200px;"></div>
						        <div><b>Size : </b>{{ $post->s_length }} x {{ $post->s_width }} m<sup>2</sup></div>
						        <div><b>Facility : </b>{{ $post->s_fac_desc }}</div>
						        <div><b>Price : </b>{{ $post->s_price }}</div>
						        <div><b>Available : </b>{{ $post->s_available }}</div><hr>
						        <h3>For More Information</h3>
						        <div><b>Email : </b>{{ $post->e_email }}</div>
						        <div><b>Contact Person : </b>{{ $post->e_telp }}</div>      
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					      </div>
					    </div>
					  </div>
					</div>
				</div>
				<div class="col-md-1" style="margin-top: 17%; margin-left: -10%;">
					@if(Auth::Check())
						@if(Auth::User()->role !== 1)
						<form action="{{ route('booking_store') }}" method="post">
							{{ csrf_field() }}
						@if($post->s_available <= 0)
							<button name="pesan" value="{{ $post->s_id }}" type="submit" class="btn btn-danger" disabled><b>SOLD OUT</b></button>
						@else
							<button name="pesan" value="{{ $post->s_id }}" type="submit" class="btn btn-danger">BOOKING</button>
						@endif
						</form>
						@endif
					@endif
				</div>
				</div>
			@endforeach
			 {{ $standposts->links("pagination::bootstrap-4")}}
		</div>
	</div>
	</div>
	@endisset
	@empty($standposts)
	<div class="d-flex  justify-content-center" style="margin-top: 15%;">
	<h1><span class="badge badge-secondary badge-warning"><b>Tidak Ada Post</b></span></h1>
	</div>
	@endempty
@endsection