<?php
/**
 * @Entity
 * @Table(name="f_account") 
 */
class Product
{
    /** @Id @Column(type="integer") @GeneratedValue */
    protected $aid;
    /** @Column(type="string") */
    protected $username;
    /** @Column(type="string") */
    protected $email;
    public function getId()
    {   
        return $this->aid;
    }   
    // public function getName()
    // {   
    //     return $this->username;
    // }   
    // public function setName($name)
    // {   
    //     $this->username = $name;
    // }   
}