
<?php

    include './cnx_museu.php';

    function pesquisar(){
        if(!empty($_POST)){

            $query = $_POST['query'];
            $conn = getConnection();

            $sql = 'SELECT * FROM Pecas WHERE nomePeca LIKE \'%'.$query.'%\' OR numeroInventarioMuseu = '.$query.' OR numeroInventarioProjeto = '.$query;
    
            foreach ($conn->query($sql) as $row) {
                print $row['nomePeca'] . "\t";
                print $row['id_peca'] . "\t";
                print $row['numeroInventarioMuseu'] . "\t";
                print $row['usuario'] . "\t";
                print $row['numeroInventarioProjeto'] . "\n";

                //pegar imagens
            }
        }
    }

    function pesquisarPecasPorUsuario(){
        if(!empty($_POST)){

            $query = $_POST['query'];
            $conn = getConnection();

            $sql = 'SELECT * FROM Pecas WHERE usuario = '.$query;
    
            foreach ($conn->query($sql) as $row) {
                print $row['nomePeca'] . "\t";
                print $row['id_peca'] . "\t";
                print $row['numeroInventarioMuseu'] . "\t";
                print $row['usuario'] . "\t";
                print $row['numeroInventarioProjeto'] . "\n";

                //pegar imagens
            }
        }
    }


    

?>