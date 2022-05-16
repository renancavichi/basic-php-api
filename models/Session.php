<?php 
class Session{
    public $idUser;
    public $token;
    public $description;
    
    function __construct($idUser, $token, $description) {
        $this->idUser = $idUser;
        $this->token = $token;
        $this->description = $description;
    }

    function create(){
        $db = new Database();
        try {
            $stmt = $db->conn->prepare("INSERT INTO sessions (id_user, token, description, create_at)
            VALUES (:id_user, :token, :description, NOW());");
            $stmt->bindParam(':id_user', $this->idUser);
            $stmt->bindParam(':token', $this->token);
            $stmt->bindParam(':description', $this->description);
            $stmt->execute();
            return true;
        }catch(PDOException $e) {
            $result['message'] = "Error Create Session" . $e->getMessage();
            $response = new Output();
            $response->out($result, 500);
        }
    }

    function delete(){
        $db = new Database();
        try {
            $stmt = $db->conn->prepare("DELETE FROM sessions WHERE token = :token;");
            $stmt->bindParam(':token', $this->token);
            $stmt->execute();
            return true;
        }catch(PDOException $e) {
            $result['message'] = "Error Delete Session: " . $e->getMessage();
            $response = new Output();
            $response->out($result, 500);
        }
    }

    function selectByToken(){
        $db = new Database();
        try {
            $stmt = $db->conn->prepare("SELECT id_user FROM sessions WHERE token = :token;");
            $stmt->bindParam(':token', $this->token);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e) {
            $result['message'] = "Error Select Token: " . $e->getMessage();
            $response = new Output();
            $response->out($result, 500);
        }
    }
}
?>