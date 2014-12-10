<?php

/**
 * Playlist
 * 
 * @Entity
 * @Table(name="playlist")
 */

class App_Model_Playlist
{
	/**
	 * @var Integer
	 * 
	 * @Column(name="id", type="integer", nullable=false)
	 * @id
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
	 * @ManyToOne(targetEntity="App_Model_User", inversedBy="_playlists", cascade={"all"})
	 * @JoinColumn(name="user_id", referencedColumnName="id")
	 */
	 private $_user;


}

