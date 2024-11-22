<div class="col-md-6">
<div class="form-group">
	<label for="nama_aplikasi">Nama Aplikasi :</label>
	<input type="text" id="nama_aplikasi" name="nama_aplikasi" class="form-control" value="{{ setup_variable('nama_aplikasi') }}">
</div>

<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			<label for="backup_db">Backup DB :</label>
			<select id="backup_db" name="backup_db" class="form-control">
				<option value="1" {{ setup_variable('backup_db') == '1' ? 'selected' : '' }}>aktif</option>
				<option value="0" {{ setup_variable('backup_db') == '0' ? 'selected' : '' }}>tdk aktif</option>
			</select>
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
			<label for="jam_backup">Jam Backup :</label>
			<input type="text" id="jam_backup" name="jam_backup" class="form-control" placeholder="jam backup..." value="{{ setup_variable('jam_backup') }}">
		</div>
	</div>
</div>


</div>

  