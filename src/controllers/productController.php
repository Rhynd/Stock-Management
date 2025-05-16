<?php

class productController extends Controller {

    public function redirect($url){
        header('location: ' .$url);

        die();
    }

    public function index(){
        $data = $this->product->find(True, "", "");
        $this->set(compact("data"));
        $this->render();
    }

    public function add(){
        $this->render();
    }

    public function edit($id) {
        $product = $this->product->find(False, $id, "id");
        if (!$product) {
            echo "product not found.";
            return;
        }
        $this->set(compact("product"));
        $this->render();
    }

    public function postadd(){
        if (isset($postData['priceHT'], $postData['TVA'])) {
            $priceHT = (float)$_POST['priceHT'];
            $TVA = (float)$_POST['TVA'];
            $_POST['priceTTC'] = $priceHT * (1 + $TVA / 100);
        }
        $data = $this->product->insert($_POST);
        debug::printr($data);
        $this->set(compact("data"));
        $this->render();
        $this->redirect('/product/index');
    }

    public function postedit(){
        var_dump($_POST);
        $data = $this->product->update($_POST);
        $this->set(compact("data"));
        $this->render();
        $this->redirect('/product/index');
    }

    public function delete($id) {
        $rowCount = $this->product->delete("null", "id", $id);
        if ($rowCount > 0) {
            http_response_code(200);
        } else {
            http_response_code(404);
        }
        die();
    }



}