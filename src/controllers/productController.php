<?php /** @noinspection PhpUndefinedFieldInspection */

class productController extends Controller {

    protected $zone;
    protected $product;

    public function __construct()
    {
        parent::__construct();
        // Load zone model
        $zoneModelFile = ROOT . DS . 'src' . DS . 'models' . DS . 'zoneModel.php';
        if (is_readable($zoneModelFile)) {
            require_once $zoneModelFile;
            $this->zone = class_exists('zoneModel') ? new zoneModel() : null;
        } else {
            $this->zone = null;
        }
        // Load product model
        $productModelFile = ROOT . DS . 'src' . DS . 'models' . DS . 'productModel.php';
        if (is_readable($productModelFile)) {
            require_once $productModelFile;
            $this->product = class_exists('productModel') ? new productModel() : null;
        } else {
            $this->product = null;
        }
    }
    
    public function redirect($url){
        header('location: ' .$url);
        die();
    }

    public function index(){
        $data = $this->product->find(True, "", "");
        foreach ($data as &$d) {
            $zone = $this->zone->find(False, $d['idZone'], "id");
            $d['zone_name'] = $zone['libelle'] ?? $d['idZone'];
        }
        unset($d);
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
        $zones = $this->zone->find(true, "", "");
        $this->set(compact("zones"));
        $this->render();
    }

    public function edit($id) {
        $zones = $this->zone->find(true, "", "");
        $this->set(compact("zones"));
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
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $fileName = uniqid('', true) . "." . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $_POST['image'] = $fileName;
            move_uploaded_file($_FILES['image']['tmp_name'], ROOT .DS .'public' .DS .'image' .DS .$fileName);
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
            if (move_uploaded_file($_FILES['image']['tmp_name'], ROOT .DS .'public' .DS .'image' .DS .$fileName)) {
                unlink(ROOT .DS .'public' .DS .'image' .DS .$this->product->find(False, $_POST['id'], "id")['image']);
                $_POST['image'] = $fileName;
            } 
        }
        else {
            $_POST['image'] = $this->product->find(False, $_POST['id'], "id")['image'];
        }
        $data = $this->product->update($_POST);
        $this->set(compact("data"));
        $this->render();
        $this->redirect('/product/index');
    }

    public function delete($id) {
        // delete image too
        unlink(ROOT .DS .'public' .DS .'image' .DS .$this->product->find(False, $id, "id")['image']);
        $rowCount = $this->product->delete("null", "id", $id);
        if ($rowCount > 0) {
            http_response_code(200);
        } else {
            http_response_code(404);
        }
        die();
    }



}