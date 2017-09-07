 <?php
                            $query1 ="SELECT vehicles.regno,vehicles.vname,soldcars.datesold FROM vehicles INNER JOIN soldcars ON vehicles.chasis=soldcars.chasis";
                            $result1= $conn->query($query1);                                                     
                            while ($row1 = $result1->fetch_assoc()){                                
                            $regno = $row1['regno']; 
                            $vname = $row1['vname']; 
                            $datesold=$row1['datesold'];
                          }

                            echo "<h5>";
                             echo '<a>'.$regno.' '.$vname.' '.$datesold.'</a>';
                            echo "</h5>";

                            ?>
