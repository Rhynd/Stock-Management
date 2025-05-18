<?php /** @noinspection PhpUndefinedFieldInspection */

class zoneController extends Controller{
    
    protected $zone;
    protected $product;
    
    public function __construct()
    {
        parent::__construct();
        $productModelFile = ROOT . DS . 'src' . DS . 'models' . DS . 'productModel.php';
        if (is_readable($productModelFile)) {
            require_once $productModelFile;
            $this->product = class_exists('productModel') ? new productModel() : null;
        } else {
            $this->product = null;
        }
    }
    
    public function redirect($url){
        header('location: ' . $url);
        die();
    }

    public function index(){
        $data = $this->zone->find(True, "", "");
        $this->set(compact("data"));
        $this->render();
    }

    public function view($id){
        $zone = $this->zone->find(False, $id, "id");
        if (!$zone) {
            echo "zone not found.";
            return;
        }
        $products = [];
        if ($this->product) {
            $products = $this->product->find(True, $id, "idZone");
        }
        $this->set(compact("zone", "products"));
        $this->render();
    }

    public function add(){
        $this->render();
    }

    public function edit($id){
        $zone = $this->zone->find(False, $id, "id");
        if (!$zone) {
            echo "zone not found.";
            return;
        }
        $this->set(compact("zone"));
        $this->render();
    }

    public function postadd(){
        $data = $this->zone->insert($_POST);
        $this->set(compact("data"));
        $this->render();
        $this->redirect('/zone/index');
    }

    public function postedit(){
        $data = $this->zone->update($_POST);
        $this->set(compact("data"));
        $this->render();
        $this->redirect('/zone/index');
    }

    public function delete($id){
        // delete products too, or move them to other zone
        $rowCount = $this->zone->delete("null", "id", $id);
        if ($rowCount > 0) {
            http_response_code(200);
        } else {
            http_response_code(404);
        }
        die();
    }
}