<?php /** @noinspection PhpUndefinedFieldInspection */

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
    
    public function view($id) {
        $product = $this->product->find(False, $id, "id");
        if (!$product) {
            echo "product not found.";
            return;
        }
        $this->set(compact("product"));
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
        if (isset($_POST['priceHT'], $_POST['TVA'])) {
            $priceHT = (float)$_POST['priceHT'];
            $TVA = (float)$_POST['TVA'];
            $_POST['priceTTC'] = $priceHT * (1 + $TVA / 100);
        }
        if (isset($_FILES['image']) || $_FILES['image']['error'] == 0) {
            $fileName = uniqid('', true) . "." . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $_POST['image'] = $fileName;
            move_uploaded_file($_FILES['image']['tmp_name'], ROOT .DS ."public" . DS ."images" .DS .$fileName);
        }
        
        
        $data = $this->product->insert($_POST);
        $this->set(compact("data"));
        $this->render();
        $this->redirect('/product/index');
    }

    public function postedit(){
        if (isset($_POST['priceHT'], $_POST['TVA'])) {
            $priceHT = (float)$_POST['priceHT'];
            $TVA = (float)$_POST['TVA'];
            $_POST['priceTTC'] = $priceHT * (1 + $TVA / 100);
        }
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $fileName = uniqid('', true) . "." . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $_POST['image'] = $fileName;
            //rename($_FILES['image']['tmp_name'], "public/images/" . $fileName);
            move_uploaded_file($_FILES['image']['tmp_name'], "public/images/" . $fileName);
        }
        else{
            $_POST['image'] = $this->product->find(False, $_POST['id'], "id")['image'];
        }
        $data = $this->product->update($_POST);
        $this->set(compact("data"));
        $this->render();
        $this->redirect('/product/index');
    }

    public function delete($id) {
        // delete image too
        $rowCount = $this->product->delete("null", "id", $id);
        if ($rowCount > 0) {
            http_response_code(200);
        } else {
            http_response_code(404);
        }
        die();
    }



}