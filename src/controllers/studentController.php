<?php

class studentController extends Controller {

    public function redirect($url){
        header('location: ' .$url);

        die();
    }

    public function index(){
        $data = $this->student->find(True, "", "");
        $this->set(compact("data"));
        $this->render();
    }

    public function add(){
        $this->render();
    }

    public function edit($id) {
        $student = $this->student->find(False, $id, "id");
        if (!$student) {
            echo "Student not found.";
            return;
        }
        $this->set(compact("student"));
        $this->render();
        }

    public function postadd(){
        var_dump($_POST);
        $data = $this->student->insert($_POST);
        $this->set(compact("data"));
        $this->render();
        $this->redirect('/student/index');
    }

    public function postedit(){
        var_dump($_POST);
        $data = $this->student->update($_POST);
        $this->set(compact("data"));
        $this->render();
        $this->redirect('/student/index');
    }

    public function delete($id) {
        $rowCount = $this->student->delete("null", "id", $id);
        if ($rowCount > 0) {
            http_response_code(200);
        } else {
            http_response_code(404);
        }
        die();
    }



}