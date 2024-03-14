                            <form method="POST">
                                <div class="row">
                                <label class="col-sm-2 col-label">Opsi Pengiriman:</label>
                                <div class="form-group">
                                            <div class="input-affix m-b-10">
                                                <input type="date" name="date" class="form-control datepicker-input" placeholder="Pick a date">
                                            </div>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputResi" class="col-sm-2 col-form-label">No Resi:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="resi" placeholder="Masukan no resi">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                                <?php  
                                include 'koneksi.php';
                                if(isset($_POST["resi"])){
                                    $date = $_POST['date'];
                                    $resi = $_POST['resi'];

                                    $add_tgl = mysqli_query($conn, "INSERT INTO date_test (date, no_resi) VALUES ('$date', '$resi')");
                                    $order_id = mysqli_insert_id($conn);
                                    if($add_tgl === true)
                                    {
                                        ?>
                                            <script>alert('Date confirmed!');</script>
                                            <script>document.location = 'pengiriman.php';</script>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                            <script>alert('Something wrong');</script>
                                            <script>document.location = 'pengiriman.php';</script>
                                        <?php
                                    } 
                                }   
                                ?>
                            </form>