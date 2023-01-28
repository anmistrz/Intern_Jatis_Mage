<?php


class Modal {

    public static function setMessage($pesan, $aksi)
    {

        $_SESSION['msg'] = [
            'pesan' => $pesan,
            'aksi'  => $aksi
        ];   
    }

    public static function Message(){
        if( isset($_SESSION['msg']) )
        {
            echo "<script>$(document).ready(function(){ $('#myModal').modal('show'); });</script>

            <div class='modal fade' id='myModal' role='dialog'>
                <div class='modal-dialog modal-lg'>
                  <div class='modal-content'>
                    <div class='modal-body'>
                      <p>You didn't leave previous chatroom</p>
                    </div>
                        <div class='modal-footer'>
                            <a href='index.php'>
                                <button type='button' class='btn btn-default' data-dismiss='modal'>Leave</button>
                             </a>
                        </div>
                    </div>
                </div>
            </div>";   
            
            unset($_SESSION['msg']);
        }

    }
    

}
