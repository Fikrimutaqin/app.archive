<?php
class Storage extends Controller
{

    public function __construct()
    {

        if (isset($_SESSION['email']) == 0) {
            header('Location: ' . BASEURL . '/');
        }
    }

    public function list()
    {
        $data = [
            'title' => 'List Data Penyimpanan',
            'view' => $this->model('Storage_model')->getAllStorage(),
            'cRuang' =>  $this->model('Ruang_model')->countRowRuang(),
            'cRak' =>  $this->model('Rak_model')->countRowRak(),
            'cMap' =>  $this->model('Map_model')->countRowMap(),
            'cLemari' =>  $this->model('Lemari_model')->countRowLemari(),
            'cBox' =>  $this->model('Box_model')->countRowBox(),
            'cUrutan' =>  $this->model('Urutan_model')->countRowUrutan(),
        ];
        $this->view('templates/__newTemplate/header', $data);
        $this->view('templates/__sideBar/index');
        $this->view('templates/__navBar/index');
        $this->view('storage/list', $data);
        $this->view('templates/__newTemplate/footer');
    }

    public function create()
    {
        $total = (int)$_POST['total'];
        //check if total >= 5 then  

        if ($total > 5) {
            header('Location:' . BASEURL . '/storage/list');
            Flasher::setFlash('Error', 'Data total penyimpanan maximal 5', 'bg-danger');
            exit;
        } else {
            //call from model
            $fromDB1 = $this->model('Storage_model')->checkCdStorage();
            $fromDB2 = $this->model('Ruang_model')->checkCdRuang();
            $fromDB3 = $this->model('Lemari_model')->checkCdLemari();
            $fromDB4 = $this->model('Rak_model')->checkCdRak();
            $fromDB5 = $this->model('Box_model')->checkCdBox();
            $fromDB6 = $this->model('Map_model')->checkCdMap();
            $fromDB7 = $this->model('Urutan_model')->checkCdUrutan();


            //create no urut
            $nourut1 = (int) substr($fromDB1, 4, 4);
            $nourut2 = (int) substr($fromDB2, 3, 4);
            $nourut3 = (int) substr($fromDB3, 2, 4);
            $nourut4 = (int) substr($fromDB4, 2, 4);
            $nourut5 = (int) substr($fromDB5, 2, 4);
            $nourut6 = (int) substr($fromDB6, 2, 4);
            $nourut7 = (int) substr($fromDB7, 1, 4);
            //code Storage
            $nourut1++;
            $code_storage = "STRG" . sprintf('%04s', $nourut1);
            $name_storage = "Storage" . $nourut1;

            //data array storage
            $storage = [
                'cd_storage' => $code_storage,
                'name' => $name_storage,
                'total' => $total,
                'status' => 1,
                'date_created' => date("Y-m-d H:i:s"),
                'author' => $_SESSION['first_name']
            ];

            if ($this->model('Storage_model')->addDataStorage($storage)) {
                for ($x = 1; $x <= $total; $x++) {

                    $nourut2++;
                    $code_ruang = "RNG" . sprintf('%04s', $nourut2);
                    $arrayRuang = [
                        'cd_storage' => $code_storage,
                        'cd_ruang' => $code_ruang,
                        'data' => 0,
                        'status' => 1,
                        'date_created' => date("Y-m-d H:i:s"),
                        'author' => $_SESSION['first_name']
                    ];

                    $nourut3++;
                    $code_lemari = "LM" . sprintf('%04s', $nourut3);
                    $arrayLemari = [
                        'cd_storage' => $code_storage,
                        'cd_lemari' => $code_lemari,
                        'data' => 0,
                        'status' => 1,
                        'date_created' => date("Y-m-d H:i:s"),
                        'author' => $_SESSION['first_name']
                    ];

                    $nourut4++;
                    $code_rak = "RK" . sprintf('%04s', $nourut4);
                    $arrayRak = [
                        'cd_storage' => $code_storage,
                        'cd_rak' => $code_rak,
                        'data' => 0,
                        'status' => 1,
                        'date_created' => date("Y-m-d H:i:s"),
                        'author' => $_SESSION['first_name']
                    ];

                    $nourut5++;
                    $code_box = "BX" . sprintf('%04s', $nourut5);
                    $arrayBox = [
                        'cd_storage' => $code_storage,
                        'cd_box' => $code_box,
                        'data' => 0,
                        'status' => 1,
                        'date_created' => date("Y-m-d H:i:s"),
                        'author' => $_SESSION['first_name']
                    ];

                    $nourut6++;
                    $code_map = "MP" . sprintf('%04s', $nourut6);
                    $arrayMap = [
                        'cd_storage' => $code_storage,
                        'cd_map' => $code_map,
                        'data' => 0,
                        'status' => 1,
                        'date_created' => date("Y-m-d H:i:s"),
                        'author' => $_SESSION['first_name']
                    ];
                    $nourut7++;
                    $code_urutan = "U" . sprintf('%04s', $nourut7);
                    $arrayUrutan = [
                        'cd_storage' => $code_storage,
                        'cd_urutan' => $code_urutan,
                        'data' => 0,
                        'status' => 1,
                        'date_created' => date("Y-m-d H:i:s"),
                        'author' => $_SESSION['first_name']
                    ];

                    $this->model('Ruang_model')->addDataRuang($arrayRuang);
                    $this->model('Lemari_model')->addDataLemari($arrayLemari);
                    $this->model('Rak_model')->addDataRak($arrayRak);
                    $this->model('Box_model')->addDataBox($arrayBox);
                    $this->model('Map_model')->addDataMap($arrayMap);
                    $this->model('Urutan_model')->addDataUrutan($arrayUrutan);
                }
                header('Location:' . BASEURL . '/storage/list');
                Flasher::setFlash('Success', 'Successfully add penyimpanan data', 'bg-success');
                exit;
            }
        }
    }

    public function views($code_storage)
    {
        $data = [
            'title' => 'View Data Penyimpanan',
            'views' => $this->model('Storage_model')->getDataSingel($code_storage),
            'cRuang' =>  $this->model('Ruang_model')->getDataSingel($code_storage),
            'cLemari' =>  $this->model('Lemari_model')->getDataSingel($code_storage),
            'cRak' =>  $this->model('Rak_model')->getDataSingel($code_storage),
            'cBox' =>  $this->model('Box_model')->getDataSingel($code_storage),
            'cMap' =>  $this->model('Map_model')->getDataSingel($code_storage),
            'cUrutan' =>  $this->model('Urutan_model')->getDataSingel($code_storage),
        ];

        $this->view('templates/__newTemplate/header', $data);
        $this->view('templates/__sideBar/index');
        $this->view('templates/__navBar/index');
        $this->view('storage/view', $data);
        $this->view('templates/__newTemplate/footer');
    }

    public function edit($code_storage)
    {
        $data = [
            'title' => 'Edit Data Penyimpanan',
            'edits' => $this->model('Storage_model')->getDataSingel($code_storage),
        ];

        $this->view('templates/__newTemplate/header', $data);
        $this->view('templates/__sideBar/index');
        $this->view('templates/__navBar/index');
        $this->view('storage/edit', $data);
        $this->view('templates/__newTemplate/footer');
    }

    public function update()
    {
        if ($this->model('Storage_model')->updateDataStorage($_POST)) {
            header('Location:' . BASEURL . '/storage/list');
            Flasher::setFlash('Success', 'Edit Data Penyimpanan', 'bg-success');
            exit;
        } else {
            header('Location:' . BASEURL . '/storage/list');
            Flasher::setFlash('Error', 'Edit Data Penyimpanan', 'bg-danger');
            exit;
        }
    }

    public function delete($cd_storage)
    {
        if ($this->model('Storage_model')->deleteDataStorage($cd_storage) > 0) {
            header('Location:' . BASEURL . '/storage/list');
            Flasher::setFlash('Success', 'Delete Data', 'bg-success');
            exit;
        } else {
            header('Location:' . BASEURL . '/storage/list');
            Flasher::setFlash('Error', 'Failed Delete Data', 'bg-danger');
            exit;
        }
    }
}
