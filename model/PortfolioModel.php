<?php

class PortfolioModel
{
    private $conexion;
    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function skills(){
        $query = "SELECT title, image FROM skill";
        return $this->conexion->query($query);
    }
    public function technologies(){
        $query = "SELECT title, image FROM technology";
        return $this->conexion->query($query);

    }

    public function projects(){
        $query = "SELECT * FROM project";
        $result = $this->conexion->query($query);

        $projects = [];
        while ($row = $result->fetch_assoc()) {
            // Trae los skills asociados a este proyecto
            $projectId = $row['id'];
            $row['skills'] = $this->projectSkills($projectId);
            $projects[] = $row;
        }
        return $projects;
    }

    public function projectSkills($projectId){
        $query = "SELECT s.title FROM skill s JOIN project_skill ps ON ps.skill_id = s.id WHERE ps.project_id = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $projectId);
        $stmt->execute();
        $result = $stmt->get_result();

        $skills = [];
        while($row = $result->fetch_assoc()){
            $skills[] = $row['title'];
        }
        return $skills;
    }
}