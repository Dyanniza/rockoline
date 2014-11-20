<?php
class App_Dao_UserDao {
	private $_entityManager;
	
	public function __construct() {
		$registry = Zend_Registry::getInstance();
		$this->_entityManager = $registry->entityManager;
	}
	public function save(App_Model_User $user) {
		$this->_entityManager->persist($user);
		$this->_entityManager->flush();
	}
	
	public function remove(App_Model_User $user) {
		$this->_entityManager->remove($user);
		$this->_entityManager->flush();
	}
	
	public function getUserById($id) {
		return $this->_entityManager->find("App_Model_User", $id);
	}
	
	public function getUserByPassword($username, $password) {
		$query = $this->_entityManager->createQuery("SELECT u FROM App_Model_User u WHERE u._username = '" . $username . "' and u._contrasenia ='" . $password . "'");
		$arrayResult = $query->getResult();

		if ($arrayResult != null) {
			return $arrayResult[0];
		} else {
			return null;
		}
	}
}
