<?php
    $query = mysqli_query($con, $SQL);
    if($query){
       echo "Edicao realizada com sucesso!</br>";
       echo "<a href='menu.php'>Voltar</a>";

    }else{
       echo mysqli_error($con);
    }
    mysqli_close($con);
?>