<?php

    include "../../../../../koneksi.php";
    session_start();

    $id_slider = $_POST['id_slider'];
    $jum = count($id_slider);

    if(isset($_POST['updatetoggle'])){
    for($i=0; $i<$jum; $i++){

        $id = $id_slider[$i];
        $status = $_POST['status'][$i];

        if($status == 'yes'){
            $data_status = 'yes';
        } else {
            $data_status = 'no';
        }

        $query = mysqli_query($koneksi, "UPDATE slider SET status='$data_status' WHERE id_slider=$id");
        if($query){
            $_SESSION['berhasil_update_toggle_slider'] = "Data Diupdate";
            header("Location: ../../data_slider.php");
        } else {
            $_SESSION['gagal_update_toggle_slider'] = "Data gagal Diupdate";
            header("Location: ../../data_slider.php");
        }
    }
    
    

}
?>