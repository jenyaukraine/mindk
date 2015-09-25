<?php
 class Students {
   	function index()
    {
        include '../web/index.html';
    }
    function update()
    {
        if(!isset($_POST['info']))
            die('<center><img src="http://www.tegile.com/wp-content/uploads/2013/04/Denied.jpg"></center>');
        $pid = preg_replace("/[^0-9]/",'',$_POST['pid']);
        $new = ($_POST['pid'] == 0) ? 'true' : 'false';
        $post = explode("<br>", $_POST['info']);
        $name = preg_replace("/[^A-Za-z0-9?!,.[:space:]]/",'',$post[0]);
        $surname = preg_replace("/[^A-Za-z0-9?!.,[:space:]]/",'',$post[1]);
        $email = preg_replace("/[^A-Za-z0-9?!,._[:space:]@]/",'',$post[2]);
        $action = '';
        $configuration = new Config();
        $database = new SafeMySQL(array('user' => $configuration->db->username, 'pass' => $configuration->db->password, 'db' => $configuration->db->database, 'charset' => $configuration->db->charset));
        if($new == 'true')
        {
            $sql = "INSERT INTO `students` (`name`, `surname`, `email`) VALUES ('?p', '?p', '?p')";
            $action = $database->query($sql,$name,$surname,$email);
        }
        else
        {
            $sql = "UPDATE `students` SET `name`='?p', `surname`='?p', `email`='?p' WHERE (`id`='?i')";   
            $action = $database->query($sql,$name,$surname,$email,$pid);
        }

        if(@$action)
        {
            $response = new Response();
            $response->setContent(200);
            $response->send();
        }
    }
    function delete()
    {
        $pid = isset($_POST['id']) ? $_POST['id'] : '0';
        $configuration = new Config();
        $database = new SafeMySQL(array('user' => $configuration->db->username, 'pass' => $configuration->db->password, 'db' => $configuration->db->database, 'charset' => $configuration->db->charset));
        $sql = "DELETE FROM students WHERE id=?i";
        $action = $database->query($sql,$pid);

        if(@$action)
        {
            $response = new Response();
            $response->setContent(200);
            $response->send();
        }
    }
    function show()
    {
        $configuration = new Config();
        $database = new SafeMySQL(array('user' => $configuration->db->username, 'pass' => $configuration->db->password, 'db' => $configuration->db->database, 'charset' => $configuration->db->charset));
        $data = $database->getAll('SELECT * FROM students');
        $response = new Response();
        $response->setContent(json_encode($data));
        $response->send();
    }
  }
?>