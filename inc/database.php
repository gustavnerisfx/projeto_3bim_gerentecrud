<?php

$mysqli = new mysqli_driver();
$mysqli->report_mode = MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR;

function open_database()
{
  try {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $conn->set_charset("utf8mb4");
    return $conn;
  } catch (Exception $e) {
    throw new Exception("Erro ao conectar no BD: {$e->getMessage()}");
  }
}

function close_database($conn)
{
  try {
    $conn->close();
  } catch (Exception $e) {
    throw new Exception("Erro ao encerrar o BD: {$e->getMessage()}");
  }
}

/**
 *  Pesquisa um Registro pelo ID em uma Tabela
 */
function find($table = null, $id = null)
{
  $found = null;
  $database = open_database();

  try {
    if ($id) {
      $id = (int) $id;
      $sql = "SELECT * FROM $table WHERE id = $id";
      $result = $database->query($sql);

      if ($result->num_rows > 0) {
        $found = $result->fetch_assoc();
      }
    } else {
      $sql = "SELECT * FROM $table";
      $result = $database->query($sql);

      if ($result->num_rows > 0) {
        $found = [];
        while ($row = $result->fetch_assoc()) {
          array_push($found, $row);
        }
      }
    }
  } catch (Exception $e) {
    $_SESSION['message'] = $e->getMessage();
    $_SESSION['type'] = 'danger';
  }

  close_database($database);
  return $found;
}

/**
 *  Pesquisa Todos os Registros de uma Tabela
 */
function find_all($table)
{
  return find($table);
}

/**
 *  Insere um registro no BD
 */
function save($table = null, $data = null)
{
  $database = open_database();

  $columns = null;
  $values = null;

  foreach ($data as $key => $value) {
    $columns .= trim($key, "'") . ",";
    $values .= "'" . $database->real_escape_string($value) . "',";
  }

  // remove a ultima virgula
  $columns = rtrim($columns, ',');
  $values = rtrim($values, ',');

  $sql = "INSERT INTO " . $table . " ($columns) VALUES ($values);";

  try {
    $database->query($sql);

    $_SESSION['message'] = 'Registro cadastrado com sucesso.';
    $_SESSION['type'] = 'success';

  } catch (Exception $e) {

    $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
    $_SESSION['type'] = 'danger';
  }

  close_database($database);
}

/**
 *  Atualiza um registro em uma tabela, por ID
 */
function update($table = null, $id = 0, $data = null)
{
  $database = open_database();

  $items = null;

  foreach ($data as $key => $value) {
    $items .= trim($key, "'") . "='" . $database->real_escape_string($value) . "',";
  }

  // remove a ultima virgula
  $items = rtrim($items, ',');
  $id = (int) $id;

  $sql = "UPDATE " . $table;
  $sql .= " SET $items";
  $sql .= " WHERE id=" . $id . ";";

  try {
    $database->query($sql);

    $_SESSION['message'] = 'Registro atualizado com sucesso.';
    $_SESSION['type'] = 'success';

  } catch (Exception $e) {

    $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
    $_SESSION['type'] = 'danger';
  }

  close_database($database);
}

/**
 *  Remove uma linha de uma tabela pelo ID do registro
 */
function remove($table = null, $id = null)
{

  $database = open_database();
  $success = false;

  try {
    if ($id) {
      $id = (int) $id;
      $sql = "DELETE FROM $table WHERE id = $id";

      if ($database->query($sql)) {
        $success = true;
        $_SESSION['message'] = "Registro removido com sucesso.";
        $_SESSION['type'] = "success";
      }
    }
  } catch (Exception $e) {
    $_SESSION['message'] = "Nao foi possivel realizar a operacao.<br>{$e->getMessage()}";
    $_SESSION['type'] = 'danger';
  }

  close_database($database);
  return $success;
}

?>