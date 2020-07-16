<?php
require_once __DIR__ . '/functions.php';
class User
{
    /** @var string */
    protected $username;
    protected $Vorname;
    protected $Nachname;
    protected $password;
    protected $e_mail;
    protected $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     *
     * @return $this
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVorname()
    {
        return $this->Vorname;
    }

    /**
     * @param mixed $Vorname
     */
    public function setVorname($Vorname)
    {
        $this->Vorname = $Vorname;
    }

    /**
     * @return mixed
     */
    public function getNachname()
    {
        return $this->Nachname;
    }

    /**
     * @param mixed $Nachname
     */
    public function setNachname($Nachname)
    {
        $this->Nachname = $Nachname;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEMail()
    {
        return $this->e_mail;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $e_mail
     */
    public function setEMail($e_mail)
    {
        $this->e_mail = $e_mail;
    }


    public static function findById(PDO $database, $id)
    {
        $user = new static();

        // TODO: Select user with the given id and call the setters
        $statement = $database->prepare("SELECT * FROM user WHERE id = ?");
        $statement->execute(array($id));
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if($result !== false) {
            $user->setEMail($result['e_mail']);
            $user->setNachname($result['Nachname']);
            $user->setPassword($result['password']);
            $user->setUsername($result['username']);
            $user->setVorname($result['Vorname']);
            $user->setId($id);

            return $user;
        }
        return null;

    }

    public static function findByUsername(PDO $database, $username)
    {
        $user = new static();

        // TODO: Select user with the given username and call the setters

        $statement = $database->prepare("SELECT * FROM user WHERE username = ?");
        $statement->execute(array($username));
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if($result !== false) {
            $user->setEMail($result['e_mail']);
            $user->setNachname($result['Nachname']);
            $user->setPassword($result['password']);
            $user->setVorname($result['Vorname']);
            $user->setId($result['id']);
            return $user;
        }
        return null;
    }

    public function delete(PDO $database)
    {
        // TODO: Check whether ID isset
        // TODO: Delete the user from the database and check whether the operation succeeded
        // TODO: Unset the ID

    if($this->getId() !== null){
        $stmt = $database->prepare("DELETE FROM user where id = ?");
        $stmt->execute(array($this->getId()));
        if(self::findById($database, $this->getId()) === null){
            $this->setId(null);
        }
    }
    else{
        echo 'hat nicht funktioniert';
    }

    }

    public function save(PDO $database)
    {
        // TODO: If id isset then execute an UPDATE
        // If not, execute an INSERT

        if ($this->getId() !== null) {
            $statement = $database->prepare(
                "UPDATE user SET username = ?, Vorname = ?, Nachname =?,e_mail = ? where id =?"
            );
            $statement->execute(
                array($this->getUsername(), $this->getVorname(), $this->getNachname(), $this->getEMail(), $this->getId())
            );
        }
        else{
            $statement = $database->prepare("insert into user (username, Vorname, Nachname,e_mail, password) values(?,?,?,?,?)");
            $hashPassword = password_hash($this->getPassword(), PASSWORD_DEFAULT);
            $statement->execute(array($this->getUsername(), $this->getVorname(), $this->getNachname(), $this->getEMail(), $hashPassword));
            $this->setId($database->lastInsertId("username"));
        }

    }
}
