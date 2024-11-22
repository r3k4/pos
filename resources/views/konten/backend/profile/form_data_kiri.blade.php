<div class="form-group">
	<label for="nama">Nama :</label>
	<input type="text" id="nama" name="nama" class="form-control" placeholder="nama saya..." value="{{ \Auth::user()->nama }}">
</div>

<div class="form-group">
	<label for="email">Email :</label>
	<input type="text" id="email" name="email" class="form-control" placeholder="email saya..." value="{{ \Auth::user()->email }}">
</div>
