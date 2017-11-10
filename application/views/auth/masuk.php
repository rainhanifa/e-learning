    <!-- Modal Dialog -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="exampleModalLabel">Lupa Kata Kunci</h4>
                </div>
                <form name="sendmail" id="sendmail" action="index.php?p=forpass" method="post" role="form">    
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Email:</label>
                            <input type="mail" class="form-control" id="forgetmail" name="forgetmail" placeholder="Masukkan Email">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Nama Pengguna:</label>
                            <input type="text" class="form-control" id="forgetusername" name="forgetusername" placeholder="Masukkan Nama Pengguna">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Send message" name="submitemail">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <section class="form-log">
        <div class="container">
            <div class="row">
                
                <form name="login" id="login" class="form-group form-login" role="form" action="<?php echo base_url("auth/domasuk")?>" method="post">
                    <?php
                        if($this->session->flashdata("error") != ""){
                             echo "<label class='label label-danger' style='color:white;'>".$this->session->flashdata("error")."</label>";
                        }
                        if($this->session->flashdata("message") != ""){
                             echo "<p class='label label-warning text-center'>".$this->session->flashdata("message")."</p>";
                        }
                    ?>
                            
                    <label for="namalogin" class="control-label"> Nama </label>
                    <input type="text" name="namalogin" class="form-control" id="namalogin" value="">
                    <label for="kuncilogin" class="control-label"> Kata Kunci </label>
                    <input type="password" name="kuncilogin" class="form-control" id="kuncilogin" value="">
                    <input type="submit" name="finish_reg" value="Log in" class="btn btn-default action">
                    <p>Lupa Kata Kunci? Masuk 
                        <a href="#" type="button" data-toggle="modal" data-target="#exampleModal">Disini</a>
                    </p>
                </form>
            </div>
        </div>
    </section>