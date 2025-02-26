<?php
	include_once '../admin/partials/Config.php';

class mediaC 
{
function searchfilm($id_film)
    {

        $db = config::getConnexion();
        try {
            $query = $db->prepare(
                "SELECT * from media where id_film = $id_film"
            );
            $query->execute();

            if ($query->rowCount() > 0) {
                $row = $query->fetch();
                return $row;
            }
            else
            {
                $qry = $db->prepare(
                    "INSERT INTO media 
                    VALUES (NULL,$id_film,'','','')"
                );
                $qry->execute();
                $inserted_row_id = $db->lastInsertId();
                $qry_select = $db->prepare(
                    "SELECT * FROM media WHERE id_film = :id"
                );
                $qry_select->bindValue(':id', $inserted_row_id);
                $qry_select->execute();
                return $qry_select->fetch();
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
       
    }
    function get_top_3_films() {
        // Get the database connection
        $db = config::getConnexion();
        
        // Prepare the SELECT statement to retrieve the top 3 films by year
        $qry = $db->prepare(
            "SELECT * FROM film ORDER BY annee DESC LIMIT 3"
        );
        
        // Execute the SELECT statement
        $qry->execute();
        
        // Fetch the results and return them as an array
        $results = $qry->fetchAll();
        return $results;
    }
    function get_top_film() {
        // Get the database connection
        $db = config::getConnexion();
        
        // Prepare the SELECT statement to retrieve the top 3 films by year
        $qry = $db->prepare(
            "SELECT * FROM film ORDER BY annee DESC LIMIT 1"
        );
        
        // Execute the SELECT statement
        $qry->execute();
        
        // Fetch the results and return them as an array
        $results = $qry->fetch();
        return $results;
    }
function addimage($id_film)
    {
        try {
            $db = config::getConnexion();

                $path = $this->saveImage($id_film);
                $qry = $db->prepare(
                    'UPDATE media SET 
                    img = :img
                WHERE id_film= :id_film'
                );
                $qry->execute([
                    'id_film' => $id_film,
                    'img' => "../uploads/".$path
                ]);
                echo $qry->rowCount() . " records UPDATED successfully <br>";
            }
          catch (PDOException $e) {
                $e->getMessage();
            }


    }

    function saveImage($id_film) {
        if (!isset($_FILES['img']) || !is_uploaded_file($_FILES['img']['tmp_name'])) {
            return false;
        }
    
        $upload_dir = 'C:/xampp/htdocs/netninjaclass/uploads/';
        $file_ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
        $file_name = $id_film . '.' . $file_ext;
        $file_path = $upload_dir . $file_name;
        $allowed_types = array('image/jpeg', 'image/png', 'image/gif', 'image/jpg');
        if (!in_array($_FILES['img']['type'], $allowed_types)) {
            return false;
        }
        if (move_uploaded_file($_FILES['img']['tmp_name'], $file_path)) {
            return $file_name;
        } else {
            return false;
        }
    }
    function addvideo($id_film)
    {
        try {
            $db = config::getConnexion();

                $path = $this->saveVideo($id_film);
                if (empty($path))
                {
                    $path=$id_film.".mp4";
                }
                $qry = $db->prepare(
                    'UPDATE media SET 
                    video = :video
                WHERE id_film= :id_film'
                );
                $qry->execute([
                    'id_film' => $id_film,
                    'video' => "../uploads/".$path
                ]);
                echo $qry->rowCount() . " records UPDATED successfully <br>";
            }
          catch (PDOException $e) {
                $e->getMessage();
            }


    }
    function addlink($id_film)
    {
        try {
            $db = config::getConnexion();

                $qry = $db->prepare(
                    'UPDATE media SET 
                    trailer = :trailer
                WHERE id_film= :id_film'
                );
                $qry->execute([
                    'id_film' => $id_film,
                    'trailer' => "youtube/".$_POST['vid']
                ]);
                echo $qry->rowCount() . " records UPDATED successfully <br>";
            }
          catch (PDOException $e) {
                $e->getMessage();
            }


    }
    function saveVideo($id_film) {
        if (!isset($_FILES['vid']) || !is_uploaded_file($_FILES['vid']['tmp_name'])) {
            return false;
        }
    
        $upload_dir = 'C:/xampp/htdocs/netninjaclass/uploads/';
        $file_ext = pathinfo($_FILES['vid']['name'], PATHINFO_EXTENSION);
        $file_name = $id_film . '.' . $file_ext;
        $file_path = $upload_dir . $file_name;
        $allowed_types = array('video/mp4', 'video/webm', 'video/ogg', 'video/avi');
        if (!in_array($_FILES['vid']['type'], $allowed_types)) {
            return false;
        }
        if (move_uploaded_file($_FILES['vid']['tmp_name'], $file_path)) {
            return $file_name;
        } else {
            return false;
        }
    }
}
?>