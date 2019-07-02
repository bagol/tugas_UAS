<form action="tambah_user.php" method="post">
    <input type="hidden" name="user" value="murid">
    <div class="form-group">
        <label for="nf-email" class=" form-control-label">NIS</label>
        <input type="text"  name="nis" placeholder="Masukan NIS" class="form-control">
    </div>
    <div class="form-group">
        <label for="nf-email" class=" form-control-label">Nama</label>
        <input type="text"  name="nama" placeholder="Masukan Nama" class="form-control">
    </div>
    <div class="form-group">
        <label for="nf-password" class=" form-control-label">Password</label>
        <input type="password"  name="password" placeholder="Masukan Password" class="form-control">
    </div>
    <div class="form-group">
        <label for="nf-email" class=" form-control-label">Almat</label>
        <input type="text"  name="alamat" placeholder="Tuliskan Alamat" class="form-control">
    </div>
    <div class="form-group">
        <label for="nf-email" class=" form-control-label">Email</label>
        <input type="email"  name="email" placeholder="Tuliskan Alamat" class="form-control">
    </div>
    <div class="form-group">
        <label for="nf-email" class=" form-control-label">No Telphon</label>
        <input type="text" maxlength="13"  name="notlpn" placeholder="Tuliskan Nomer Telephon" class="form-control">
    </div>
    <input type="submit">
</form>