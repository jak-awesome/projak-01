<?php
    session_start();
  if (empty($_SESSION["login"])) {
    $_SESSION['kosong_session'] = "Silahkan login terlebih dahulu";
   header("Location:../../login/login.php");
  }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>white chat - Bootdey.com</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">

body {
  font-family: "Open Sans", sans-serif;
}

.chat-messages {
    display: flex;
    flex-direction: column;
    height: 575px;
    max-height: 575px;
    overflow-y: scroll
}

.chat-message-left,
.chat-message-right {
    display: flex;
    flex-shrink: 0
}


.chat-message-right {
    flex-direction: row-reverse;
}
    </style>
</head>
<body>
<?php
$page = $_GET['page'];

include "../../../koneksi.php";
?>
<main class="content">
        <div>
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <?php
                        $header =  mysqli_query($koneksi,"SELECT * FROM akun WHERE id_level='1'");
                        while($row_header = mysqli_fetch_array($header)){
                        ?>
                        <div class="py-2 px-4 border-bottom d-none d-lg-block">
                            <div class="d-flex align-items-center py-1">
								<div>
                                    <a href="<?= $page ?>" class="btn btn-primary btn-sm mr-1 px-3">Kembali</a>
								</div>
                                <div class="position-relative">
                                    <img src="../../../admin/dashboard/karyawan/img/profile/<?= $row_header['foto']; ?>" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                </div>
                                <div class="flex-grow-1 pl-3">
                                    <strong><?= $row_header['nama_lengkap']; ?></strong>
                                </div>
                            </div>
                        </div>
    
                        <div class="position-relative">
                            <div class="chat-messages p-4">
                                <?php
                                $v_chat = mysqli_query($koneksi, "SELECT * FROM chat INNER JOIN akun ON akun.id_akun=chat.id_akun WHERE pengirim='$_SESSION[id_akun_pelanggan]' OR penerima='$_SESSION[id_akun_pelanggan]'");
                                while($row_chat = mysqli_fetch_array($v_chat)){
                                    $v_pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_akun_pelanggan='$row_chat[id_akun_pelanggan]'");
                                    $data_pelanggan = mysqli_fetch_array($v_pelanggan);

                                    if($row_chat['pengirim'] == $_SESSION['id_akun_pelanggan']){
                                        ?>
                                         <div class="chat-message-right pb-4">
                                    <div>
                                        <img src="img/profile/<?= $data_pelanggan['foto_pelanggan']; ?>" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                                        <!-- <div class="text-muted small text-nowrap mt-2"><?= $row_chat['waktu']; ?></div> -->
                                    </div>
                                    <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                        <div class="font-weight-bold mb-1">You</div>
                                        <?= $row_chat['chat']; ?>
                                    </div>
                                </div>

                                <?php
                                    } else {
                                        ?>
                                <div class="chat-message-left pb-4">
                                    <div>
                                        <img src="../../../admin/dashboard/karyawan/img/profile/<?= $row_chat['foto']; ?>" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                        <div class="text-muted small text-nowrap mt-2">2:34 am</div>
                                    </div>
                                    <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                        <div class="font-weight-bold mb-1"><?= $row_chat['nama_lengkap']; ?></div>
                                        <?= $row_chat['chat']; ?>
                                    </div>
                                </div>

                                        <?php
                                    }
                                 } ?>
                            </div>
                        </div>

                        <form action="act_chat.php" method="post">
                        <div class="flex-grow-0 py-3 px-4 border-top">
                            <div class="input-group">
                                <input type="hidden" class="form-control" name="page" value="<?= $page; ?>">
                                <input type="hidden" class="form-control" name="id_akun" value="<?= $row_header['id_akun']; ?>">
                                <input type="hidden" class="form-control" name="id_akun_pelanggan" value="<?= $_SESSION['id_akun_pelanggan']; ?>">
                                <input type="text" class="form-control" name="message" placeholder="Type your message">
                                <input type="submit" name="send_message" value="Send" class="btn btn-primary">
                            </div>
                        </div>
                        </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>