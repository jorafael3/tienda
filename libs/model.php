<?php

class Model
{
    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    public function select($tablas, $campos = '*', $condiciones = [], $joins = [], $ordenamiento = "", $agrupamiento = "")
    {
        try {
            // Construir la parte SELECT de la consulta
            $sql = "SELECT ";
            if (is_array($campos)) {
                $sql .= implode(', ', $campos);
            } else {
                $sql .= $campos;
            }

            // Construir la parte FROM de la consulta
            $sql .= " FROM ";
            if (is_array($tablas)) {
                $sql .= implode(', ', $tablas);
            } else {
                $sql .= $tablas;
            }

            // Construir la parte JOIN de la consulta si se proporcionan joins
            foreach ($joins as $join) {
                $sql .= " $join";
            }

            // Construir la parte WHERE de la consulta si hay condiciones
            if (!empty($condiciones)) {
                $whereClauses = [];
                foreach ($condiciones as $key => $value) {
                    // Extraer el operador de comparación y el nombre del campo
                    $parts = explode(' ', $key);
                    $fieldName = $parts[0];
                    $operator = isset($parts[1]) ? $parts[1] : '=';

                    // Reemplazar los puntos por guiones bajos en el nombre del parámetro
                    $paramName = str_replace('.', '_', $fieldName);
                    $whereClauses[] = "$fieldName $operator :$paramName";
                }
                $sql .= " WHERE " . implode(" AND ", $whereClauses);
            }

            if (($agrupamiento) !== "") {
                $sql .= " GROUP BY $agrupamiento";
            }

            if (($ordenamiento) !== "") {
                $sql .= " ORDER BY $ordenamiento";
            }

            // Preparar la consulta
            $query = $this->db->connect()->prepare($sql);

            // Vincular los valores de las condiciones
            foreach ($condiciones as $key => $value) {
                // Extraer el nombre del campo para el parámetro
                $paramName = str_replace('.', '_', explode(' ', $key)[0]);
                $query->bindValue(":$paramName", $value);
            }

            // Ejecutar la consulta
            if ($query->execute()) {
                return [true, $query->fetchAll(PDO::FETCH_ASSOC), $sql];
            } else {
                $err = $query->errorInfo();
                $error = [
                    "Error al ejecutar la consulta ",
                    $err,
                    $sql
                ];
                return [false, $error, $sql];

                // throw new Exception($);
            }
        } catch (PDOException $e) {
            throw new Exception("Error en la base de datos: " . $e->getMessage());
        }
    }

    public function update($tabla, $datos, $condiciones = [])
    {
        try {
            // Construir la parte SET de la consulta
            $setClause = implode(', ', array_map(function ($key) {
                return "$key = :$key";
            }, array_keys($datos)));

            // Construir la parte WHERE de la consulta si hay condiciones
            $whereClause = "";
            if (!empty($condiciones)) {
                $whereClause = " WHERE " . implode(" AND ", array_map(function ($key) {
                    return "$key = :$key";
                }, array_keys($condiciones)));
            }

            // Construir la consulta SQL completa
            $sql = "UPDATE $tabla SET $setClause $whereClause";

            // Preparar la consulta
            $query = $this->db->connect()->prepare($sql);

            // Vincular los valores de los datos a actualizar
            foreach ($datos as $key => $value) {
                $query->bindValue(":$key", $value);
            }

            // Vincular los valores de las condiciones
            foreach ($condiciones as $key => $value) {
                $query->bindValue(":$key", $value);
            }

            // Ejecutar la consulta
            if ($query->execute()) {
                return [true, true, $sql];
            } else {
                $err = $query->errorInfo();
                $error = [
                    "Error al ejecutar la consulta ",
                    $err,
                    $sql
                ];
                return [false, $error, $sql];
            }
        } catch (PDOException $e) {
            $err = $e->getMessage();
            return [false, $err, "Database error"];
        }
    }

    public function insert($tabla, $datos)
    {
        try {
            // Construir la parte INSERT de la consulta
            $campos = implode(', ', array_keys($datos));
            $placeholders = ':' . implode(', :', array_keys($datos));

            // Construir la consulta SQL completa
            $sql = "INSERT INTO $tabla ($campos) VALUES ($placeholders)";

            // Preparar la consulta
            $query = $this->db->connect()->prepare($sql);

            // Vincular los valores de los datos a insertar
            foreach ($datos as $key => $value) {
                $query->bindValue(":$key", $value);
            }

            // Ejecutar la consulta
            if ($query->execute()) {
                return [true, true, $sql];
            } else {
                $err = $query->errorInfo();
                $error = [
                    "Error al ejecutar la consulta ",
                    $err,
                    $sql
                ];
                return [false, $error, $sql];
            }
        } catch (PDOException $e) {
            $err = $e->getMessage();
            return [false, $err, "Database error"];
        }
    }

    public function delete($tabla, $condiciones = [])
    {
        try {
            // Construir la parte WHERE de la consulta si hay condiciones
            $whereClause = "";
            if (!empty($condiciones)) {
                $whereClause = " WHERE " . implode(" AND ", array_map(function ($key) {
                    return "$key = :$key";
                }, array_keys($condiciones)));
            }

            // Construir la consulta SQL completa
            $sql = "DELETE FROM $tabla $whereClause";

            // Preparar la consulta
            $query = $this->db->connect()->prepare($sql);

            // Vincular los valores de las condiciones
            foreach ($condiciones as $key => $value) {
                $query->bindValue(":$key", $value);
            }

            // Ejecutar la consulta
            if ($query->execute()) {
                return true;
            } else {
                $err = $query->errorInfo();
                throw new Exception("Error al ejecutar la consulta: " . $err[2]);
            }
        } catch (PDOException $e) {
            throw new Exception("Error en la base de datos: " . $e->getMessage());
        }
    }

    public function executeStoredProcedure($procedureName, $params = []) {
        try {
            // Construir la llamada al procedimiento almacenado
            $sql = "CALL $procedureName(";
            $paramNames = [];
            foreach ($params as $key => $value) {
                $paramName = ":$key";
                $paramNames[] = $paramName;
            }
            $sql .= implode(", ", $paramNames) . ")";
    
            // Preparar la llamada al procedimiento almacenado
            $stmt = $this->db->connect()->prepare($sql);
    
            // Vincular los parámetros
            foreach ($params as $key => &$value) {
                $stmt->bindParam(":$key", $value);
            }
    
            // Ejecutar el procedimiento almacenado
            $stmt->execute();
    
            // Devolver el resultado si es necesario
            // Por ejemplo, si el procedimiento devuelve un conjunto de resultados
            // Puedes usar fetchAll() para obtenerlos
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error en la base de datos: " . $e->getMessage());
        }
    }
    
}
