<?php

    header('Content-Type: application/json');
   
    $pdo = new PDO("mysql:dbname=calendarEvents;host=127.0.0.1","root","");
    
    $action= (isset($_GET['action']))?$_GET['action']:'read';
    if (isset($_POST['objEvent'])) {
        $data = json_decode(json_encode($_POST['objEvent']),true);
       print_r($data['title']);
    }

    switch ($action) {
        case 'agregar':
            
            
            $query = $pdo->prepare("INSERT INTO eventos(title,description,color,textColor,start,end)
            VALUES(:title,:description,:color,:txtColor,:start,:end)"); //funciona


            $array=array(
                "title" =>$data['title'],
                "description" =>$data['description'],
                "color" =>$data["color"],
                "txtColor" =>$data["txtColor"],           
                "start" =>$data["start"],
                "end" =>$data["end"]);

                print_r($array);
            $response = $query ->execute($array);
           //$query->execute();

            $lastInsertId = $pdo->lastInsertId();
            if($lastInsertId>0){

            echo "<div class='content alert alert-primary' > Gracias .. Tu Nombre es :
            </div>";
            }
            else{
                echo "<div class='content alert alert-danger'> No se pueden agregar datos, comuníquese con el administrador  </div>";

            print_r($query->errorInfo()); 
            }        

            echo json_encode($response); 
       
            break;
        case 'eliminar':

                $query = $pdo->prepare("DELETE FROM eventos WHERE ID=:id");
                $response= $query->execute(array("id"=>$data['id']));
            
            echo json_encode($response);
            break;

        case 'actualizar':
        $response=false;
            if (isset($data['id'])) {
                $query = $pdo->prepare("UPDATE eventos
                     SET title= :title,
                     description=:description,
                     color=:color,
                     textColor=:txtColor,
                     start=:start,
                     end=:end
                     WHERE ID=:id"); //funciona

                $array=array(
                "id"=>$data['id'],
                "title" =>$data['title'],
                "description" =>$data['description'],
                "color" =>$data["color"],
                "txtColor" =>$data["txtColor"],
                "start" =>$data["start"],
                "end" =>$data["end"]);
            
                print_r($array);
                $response=$query->execute($array);
            }
            echo json_encode($response);


            break;
        
        default:
            $query=$pdo->prepare("SELECT * from eventos");
            $query->execute();
        
            $result= $query->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
            break;
    }

    //select Events
   


?>