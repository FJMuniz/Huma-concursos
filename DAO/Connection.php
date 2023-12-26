<?php

namespace DAO;

use \PDO as PDO;
use \Exception as Exception;

class Connection
{
    private $pdo = null;
    private $pdoStatement = null;
    private static $instance = null;

    private function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            throw $ex;
            $this->saveError("", $ex);
        }
    }

    public static function GetInstance()
    {
        if (self::$instance == null)
            self::$instance = new Connection();

        return self::$instance;
    }

    public function Execute($query, $parameters = array())
    {
        try {
            $this->Prepare($query);

            foreach ($parameters as $parameterName => $value) {
                $this->pdoStatement->bindParam(":" . $parameterName, $parameters[$parameterName]);
            }
            //var_dump($this->pdoStatement->debugDumpParams()  );

            $this->pdoStatement->execute();



            return $this->pdoStatement->fetchAll();
        } catch (Exception $ex) {
            throw $ex;
            $this->saveError($query, $ex);
        }
    }

    public function ExecuteOnlyAssociative($query, $parameters = array())
    {
        try {
            $this->Prepare($query);

            foreach ($parameters as $parameterName => $value) {
                $this->pdoStatement->bindParam(":" . $parameterName, $parameters[$parameterName]);
            }
            //var_dump($this->pdoStatement->debugDumpParams()  );

            $this->pdoStatement->execute();



            return $this->pdoStatement->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $ex) {
            throw $ex;
            $this->saveError($query, $ex);
        }
    }

    public function ExecuteOnlyIndex($query, $parameters = array())
    {
        try {
            $this->Prepare($query);

            foreach ($parameters as $parameterName => $value) {
                $this->pdoStatement->bindParam(":" . $parameterName, $parameters[$parameterName]);
            }

            $this->pdoStatement->execute();

            return $this->pdoStatement->fetchAll(PDO::FETCH_COLUMN, 0);
        } catch (Exception $ex) {
            throw $ex;
            $this->saveError($query, $ex);
        }
    }

    public function ExecuteNonQuery($query, $parameters = array())
    {
        try {
            $this->Prepare($query);

            foreach ($parameters as $parameterName => $value) {
                $this->pdoStatement->bindParam(":" . $parameterName, $parameters[$parameterName]);
            }

            $this->pdoStatement->execute();
            //var_dump($this->pdoStatement->debugDumpParams() );

            return $this->pdoStatement->rowCount();
        } catch (Exception $ex) {
            throw $ex;
            $this->saveError($query, $ex);
        }
    }


    public function ExecuteInsertQuery($query, $parameters = array())
    {
        try {
            $this->Prepare($query);

            foreach ($parameters as $parameterName => $value) {
                $this->pdoStatement->bindParam(":" . $parameterName, $parameters[$parameterName]);
            }

            $this->pdoStatement->execute();

            return $this->getLastId();
        } catch (Exception $ex) {
            throw $ex;
            $this->saveError($query, $ex);
        }
    }

    private function Prepare($query)
    {
        try {
            $this->pdoStatement = $this->pdo->prepare($query);
        } catch (Exception $ex) {
            throw $ex;
            $this->saveError($query, $ex);
        }
    }

    private function getLastId()
    {
        try {
            return $this->pdo->lastInsertId();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    private function saveError($query, $msg)
    {
        $file = fopen("error.log", "a");

        fwrite($file, "Error de consulta - " . date("d/m/Y H:i:s") . "\r\n");
        fwrite($file, "Codigo: \"" . $query . "\"\r\n " . $msg . " \r\n\r\n");
        fclose($file);
    }
}
