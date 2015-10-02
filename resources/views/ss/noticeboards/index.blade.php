@extends('layout')

@section('content')
	<div class="wrapper wrapper-content">
		<div class="row">
			<div class="col-lg-3">
				<div class="ibox float-e-margins">
					<div class="ibox-content">
						<div class="file-manager">
							<h5>Show:</h5>
							<a href="#" class="file-control active">All</a>
							<a href="#" class="file-control">My Notes</a>
							<div class="hr-line-dashed"></div>
							<a class="btn btn-primary btn-block" data-toggle="modal" href="#" data-target="#uploadModal">
								Pin Notice
							</a>
							<div class="hr-line-dashed"></div>
							<h5>Search</h5>
							<div class="input-group">
								<input type="text" placeholder="Search by notice name or group..." class="input-sm form-control">
                                <span class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-primary"> Search</button>
                                </span>
							</div>
							<div class="hr-line-dashed notice-group-filter"></div>
							<h5 class="notice-group-filter">Filter by groups</h5>
							<ul class="folder-list notice-group-filter" style="padding: 0">
								@for($i=1; $i<=6; $i++)
									<li>
										<a href="#">
											<img src="{{ asset('ss/img/p1.jpg') }}" alt="Group profile picture"
													class="notice-group-pic">
											<b class="notice-group-name">Bsc. Class of 210{{ $i }}</b>
										</a>
									</li>
								@endfor
							</ul>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-9">
				<div class="wrapper wrapper-content animated fadeInUp">
					<ul class="notes">
						<li>
							<div>
								<small>12:03:28 12-04-2014</small>
								<h4>Long established fact</h4>
								<p>The years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
								<a href="pin_board.html#"><i class="fa fa-trash-o "></i></a>
							</div>
						</li>
						<li>
							<div>
								<small>11:08:33 16-04-2014</small>
								<h4>Latin professor at Hampden-Sydney </h4>
								<p>The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
								<a href="pin_board.html#"><i class="fa fa-trash-o "></i></a>
							</div>
						</li>
						<li>
							<div>
								<small>9:12:28 10-04-2014</small>
								<h4>The standard chunk of Lorem</h4>
								<p>Ipsum used since the 1500s is reproduced below for those interested.</p>
								<a href="pin_board.html#"><i class="fa fa-trash-o "></i></a>
							</div>
						</li>
						<li>
							<div>
								<small>3:33:12 6-03-2014</small>
								<h4>The generated Lorem Ipsum </h4>
								<p>The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
								<a href="pin_board.html#"><i class="fa fa-trash-o "></i></a>
							</div>
						</li>
						<li>
							<div>
								<small>5:20:11 4-04-2014</small>
								<h4>Contrary to popular belief</h4>
								<p>Hampden-Sydney College in Virginia, looked up one.</p>
								<a href="pin_board.html#"><i class="fa fa-trash-o "></i></a>
							</div>
						</li>
						<li>
							<div>
								<small>2:10:12 4-05-2014</small>
								<h4>There are many variations</h4>
								<p>All the Lorem Ipsum generators on the Internet .</p>
								<a href="pin_board.html#"><i class="fa fa-trash-o "></i></a>
							</div>
						</li>
						<li>
							<div>
								<small>10:15:26 6-04-2014</small>
								<h4>Ipsum used standard chunk of Lorem</h4>
								<p>Standard chunk  is reproduced below for those.</p>
								<a href="pin_board.html#"><i class="fa fa-trash-o "></i></a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!-- Pin Notice Modal -->
	<div class="modal inmodal in" id="uploadModal" tabindex="-1" role="dialog" aria-hidden="false" style="display: none;"><div class="modal-backdrop  in"></div>
		<div class="modal-dialog">
			<div class="modal-content animated bounceInRight">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="glyphicon glyphicon-remove-circle"></i></span><span class="sr-only">Close</span></button>
					<i class="glyphicon glyphicon-pushpin modal-icon"></i>
					<h4 class="modal-title">Pin Notice</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Title</label>
						<input type="text" placeholder="Notice title..." class="form-control">
					</div>

					<div class="form-group">
						<label for="message">Message</label>
						<textarea name="message" id="message" cols="30" rows="3" class="form-control"></textarea>
					</div>

					<div class="form-group">
						<label for="topic">Groups</label>
						<select name="topic" id="topic" class="form-control">
							<option value="">Select groups to share to.</option>
							<option value=""></option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Pin Notice</button>
				</div>
			</div>
		</div>
	</div>
	<!-- End Pin Notice Modal -->
@endsection
