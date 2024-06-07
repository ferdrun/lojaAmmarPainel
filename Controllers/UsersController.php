<?php
namespace Controllers;

use \Core\Controller;
use \Models\Users;
use \Models\Brands;
use \Models\Permissions;

class UsersController extends Controller {

	private $user;
	private $arrayInfo;

	public function __construct() {
		$this->user = new Users();

		if(!$this->user->isLogged()) {
			header("Location: ".BASE_URL."login");
			exit;
		}

		if(!$this->user->hasPermission('users_view')) {
			header("Location: ".BASE_URL);
			exit;
		}

		$this->arrayInfo = array(
			'user' => $this->user,
			'menuActive' => 'users'
		);

	}

	public function index() {
		$users = new Users();
		$permissions = new Permissions();

		// FILTRO
		$this->arrayInfo['filter'] = array('name'=>'', 'permission'=>'');

		if(!empty($_GET['name'])) {
			$this->arrayInfo['filter']['name'] = $_GET['name'];
		}
		if(!empty($_GET['permission'])) {
			$this->arrayInfo['filter']['permission'] = $_GET['permission'];
		}

		// PAGINAÇÃO
		$this->arrayInfo['pag'] = array('currentpage'=>0, 'total'=>0, 'per_page'=>2);
		if(!empty($_GET['p'])) {
			$this->arrayInfo['pag']['currentpage'] = intval($_GET['p']) - 1;
		}

		$this->arrayInfo['permission_list'] = $permissions->getAllGroups();
		$this->arrayInfo['list'] = $users->getAll($this->arrayInfo['filter'], $this->arrayInfo['pag']);

		$this->arrayInfo['pag']['total'] = $users->getTotal($this->arrayInfo['filter']);

		$this->loadTemplate('users', $this->arrayInfo);
	}

	
	public function add() {
		$permi = new Permissions();

		$this->arrayInfo['permission_items'] = $permi->getAllGroup();
		$this->arrayInfo['errorItems'] = array();

		if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0) {
			$this->arrayInfo['errorItems'] = $_SESSION['formError'];
			unset($_SESSION['formError']);
		}

		$this->loadTemplate('users_add', $this->arrayInfo);
	}
	
	public function add_action() {
		if(!empty($_POST['name'])) {
			$id_permission = $_POST['id_permission'];
			$email = $_POST['email'];
			$name = $_POST['name'];
			$password = $_POST['password'];
	 
		if(!empty($name) && !empty($id_permission) && !empty($email) && !empty($password)) {
			$user = new Users();
 
			$user->add(
				$id_permission,
				$email,
				$password,
				$name
			);
			} else {
				$_SESSION['formError'] = array('id_perm, password', 'email', 'name');

				header("Location: ".BASE_URL."users/add");
				exit;
			}

			header("Location: ".BASE_URL."users");
			exit;

		} else {
			$_SESSION['formError'] = array('name');

			header("Location: ".BASE_URL."users/add");
			exit;
		}
		
	}
	public function edit($id) {
		if(!empty($id)) {
 
			$users = new Users();
			$perm = New Permissions();

			$this->arrayInfo['info'] = $users->get($id);
			$this->arrayInfo['permission_items'] = $perm->getAllGroups();
			$this->arrayInfo['errorItems'] = array();

			if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0) {
				$this->arrayInfo['errorItems'] = $_SESSION['formError'];
				unset($_SESSION['formError']);
			}

			if(count($this->arrayInfo['info']) > 0) {
				$this->loadTemplate('users_edit', $this->arrayInfo);
			} else {
				header("Location: ".BASE_URL."users");
				exit;
			}

		} else {
			header("Location: ".BASE_URL."users");
			exit;
		}
	}

	public function edit_action() {
		if(!empty($_POST['id'])) {
			$id = $_POST['id'];
			$nome = $_POST['name'];
			$email = $_POST['email'];
			$permissions = $_POST['id_perm'];
			print_r($id);
			exit;
			if(!empty($id) && !empty($nome) && !empty($email) && !empty($permissions)) {

				$users = new Users();

				$users->edit(
							$nome,
							$email,
							$permissions
				);

			} else {
				$_SESSION['formError'] = array('nome', 'email', 'permissions');

				header("Location: ".BASE_URL."users/edit/".$id);
				exit;
			}

			header("Location: ".BASE_URL."users");
			exit;

		} else {
			$_SESSION['formError'] = array();

			header("Location: ".BASE_URL."users");
			exit;
		}
		
	}

	public function del($id) {
		if(!empty($id)) {

			$brands = new Brands();
			$brands->del($id);

		}

		header("Location: ".BASE_URL."brands");
		exit;
	}

	













}