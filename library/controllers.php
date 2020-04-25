<?php 
	/**
	 * 
	 */
	class oop{
		
		function tampil($con, $table) {
        $sql = "SELECT * FROM $table";
        $query = mysqli_query($con, $sql);
        while ($data = mysqli_fetch_array($query))
            $isi[] = $data;
        return @$isi;
    }

    
    function edit($con, $table, $where) {
        $sql = "SELECT * FROM $table WHERE $where";
        $query = mysqli_query($con, $sql);
        $data = mysqli_fetch_array($query);
        return $data;
    }

    function ubah($con, $table, array $field, $where, $redirect) {
        $sql = "UPDATE tb_laporan SET";
        foreach ($field as $key => $value) {
            $sql.=" $key = '$value',";
        }
        $sql = rtrim($sql, ',');
        $sql.="WHERE $where";
        $query = mysqli_query($con, $sql);
        if ($query) {
            echo "<script>alert('Success');document.location.href='$redirect'</script>";
        } else {
             echo $sql;
        }
    }

    function upload($foto, $folder) {
        $tmp = $foto['tmp_name'];
        $namafile = $foto['name'];
        move_uploaded_file($tmp, "$folder/$namafile");
        return $namafile;
    }

	}	
 ?>