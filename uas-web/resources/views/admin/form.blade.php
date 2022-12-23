@extends('layouts.admin_app')
@section('content')
<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Data Barang</h3>
							</div>
							<div class="module-body">

									<div class="alert">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Perhatian</strong> Semua Data Barang Wajib Diisi yah min
									</div>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Waduh</strong> Cek lagi min, ada data yang nggak kamu isi 
									</div>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Mantap min!</strong> Data kamu udah lengkap :) 
									</div>

									<br />

									<form class="form-horizontal row-fluid">
										@csrf
										<div class="control-group">
											<label class="control-label" for="basicinput">Kategori Barang</label>
											<div class="controls">
												<div class="dropdown">
													<a class="dropdown-toggle btn" data-toggle="dropdown" href="#">Pilih Kategori Barang <i class="icon-caret-down"></i></a>
													<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
														@foreach ($Kategori as $k)
														<li><a href="#" value="{{$k->id_kategori_barang}}">{{$k->nama_kategori_barang}}</a></li>
														@endforeach
													</ul>
												</div>
											</div>
										</div>
										
                                        <div class="control-group">
											<label class="control-label" for="basicinput">Nama Barang</label>
											<div class="controls">
												<input type="text" id="basicinput" placeholder="Air Jordan 1 Retro High OG..." class="span8">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label">Ketersediaan Size</label>
											<div class="controls d-flex">
												@foreach ($Size as $s)												
												<label class="checkbox inline">
													<input type="checkbox" class="d-flex" value="{{$s->id_size}}">
													{{$s->size}}
												</label>
												@endforeach
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Warna Barang</label>
											<div class="controls">
												<div class="dropdown">
													<a class="dropdown-toggle btn" data-toggle="dropdown" href="#">Pilih Warna Barang <i class="icon-caret-down"></i></a>
													<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
														@foreach ($Warna as $w)
														<li><a href="#" value="{{$w->id_warna}}" >{{$w->warna}}</a></li>
														@endforeach
													</ul>
												</div>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Harga Barang</label>
											<div class="controls">
												<div class="input-append">
													<span class="add-on">Rp.</span><input type="text" placeholder="5.000" class="span8">
												</div>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label">Status Barang</label>
											<div class="controls">
												<label class="radio inline">
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
													Ready
												</label> 
												<label class="radio inline">
													<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
													Sold Out
												</label> 
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Jumlah Barang</label>
											<div class="controls">
												<div class="input-append">
													<input type="text" placeholder="5.000" class="span8"><span class="add-on">Pcs</span>
												</div>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Gambar Barang</label>
											<div class="controls">
												<div class="input-append">
													<span>Upload</span><input type="file" placeholder="Upload">
												</div>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="basicinput">Deskripsi Barang</label>
											<div class="controls">
												<textarea class="span8" rows="5"></textarea>
											</div>
										</div>

										

{{-- 
										

										<div class="control-group">
											<label class="control-label" for="basicinput">Tooltip Input</label>
											<div class="controls">
												<input data-title="A tooltip for the input" type="text" placeholder="Hover to view the tooltip…" data-original-title="" class="span8 tip">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Prepended Input</label>
											<div class="controls">
												<div class="input-prepend">
													<span class="add-on">#</span><input class="span8" type="text" placeholder="prepend">       
												</div>
											</div>
										</div>


										<div class="control-group">
											<label class="control-label" for="basicinput">Dropdown Button</label>
											<div class="controls">
												<div class="dropdown">
													<a class="dropdown-toggle btn" data-toggle="dropdown" href="#">Dropdown Button <i class="icon-caret-down"></i></a>
													<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
														<li><a href="#">First Row</a></li>
														<li><a href="#">Second Row</a></li>
														<li><a href="#">Third Row</a></li>
														<li><a href="#">Fourth Row</a></li>
													</ul>
												</div>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Dropdown</label>
											<div class="controls">
												<select tabindex="1" data-placeholder="Select here.." class="span8">
													<option value="">Select here..</option>
													<option value="Category 1">First Row</option>
													<option value="Category 2">Second Row</option>
													<option value="Category 3">Third Row</option>
													<option value="Category 4">Fourth Row</option>
												</select>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label">Radiobuttons</label>
											<div class="controls">
												<label class="radio">
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
													Option one
												</label> 
												<label class="radio">
													<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
													Option two
												</label> 
												<label class="radio">
													<input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
													Option three
												</label>
											</div>
										</div>

										

										<div class="control-group">
											<label class="control-label">Checkboxes</label>
											<div class="controls">
												<label class="checkbox">
													<input type="checkbox" value="">
													Option one
												</label>
												<label class="checkbox">
													<input type="checkbox" value="">
													Option two
												</label>
												<label class="checkbox">
													<input type="checkbox" value="">
													Option three
												</label>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label">Inline Checkboxes</label>
											<div class="controls">
												<label class="checkbox inline">
													<input type="checkbox" value="">
													Option one
												</label>
												<label class="checkbox inline">
													<input type="checkbox" value="">
													Option two
												</label>
												<label class="checkbox inline">
													<input type="checkbox" value="">
													Option three
												</label>
											</div>
										</div> --}}

										<div class="control-group">
											<div class="controls">
												<button type="submit" class="btn">Submit</button>
											</div>
										</div>
									</form>
							</div>
						</div>
@endsection