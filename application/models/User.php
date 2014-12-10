<?php

/**
 * User
 * 
 * @Entity
 * @Table(name="user")
 */

class App_Model_User
{
	/**
     * @var integer
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $_id;
	
	/**
	 * @var string
	 * 
	 * @Column(name="name", type="string", length=200, nullable=false)
	 */
	private $_name;
	/**
	 * @var string
	 * 
	 * @Column(name="username", type="string", length=200, nullable=false)
	 */
	private $_username;
	/**
	 * @var string
	 * 
	 * @Column(name="password", type="string", length=200, nullable=false)
	 */
	private $_password;
	
	/**
	 * @var array
	 * 
	 * @OneToMany(targetEntity="App_Model_Playlist", mappedBy="_user", cascade={"all"})
	 */
	private $_playlists;
	 
	public function __construct() {
		$this->_playlists = array();
	}
	
	public function getId() {
		return $this->_id;
	}
	
	public function addPlaylist(App_Model_Playlist $playlist) {
		$playlist->setUser($this);
		$this->_playlists[] = $playlist;
	}	
	public function setName($name) {
		$this->_name = $name;
	}
	public function getName() {
		return $this->_name;
	} 
	
	public function setUsername($userName) {
		$this->_username = $userName;
	}
	public function getUsername() {
		return $this->_username;
	}
	
	public function setPassword($password) {
		$this->_password = $password;
	}
	public function getPassword() {
		return $this->_password;
	}
}
