<?php
class Category {
  // db stuff
  private $conn;
  private $table = 'categories';
  // post properties
  public $id;
  public $name;
  public $created_at;

  // connection to db
  public function __construct($db) {
    $this->conn = $db;
  }
  public function create() {
    $query = 'INSERT INTO ' . $this->table . ' SET name = :name';
    $stmt = $this->conn->prepare($query);
    // 消除 PHP 或 HTML 標籤
    $this->name = htmlspecialchars(strip_tags($this->name));
    $stmt->bindParam(':name', $this->name);
    if ($stmt->execute()) {
      return true;
    }
    printf("Error: %s. \n", $stmt->error);
    return false;
  }

  public function read() {
    $query = 'SELECT * FROM ' . $this->table;
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
  }

  public function read_single() {
    $query = 'SELECT * FROM ' . $this->table . ' WHERE id = ? LIMIT 1';
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->name = $row['name'];
    $this->created_at = $row['created_at'];
  }

  public function update() {
    $query = 'UPDATE ' . $this->table
      . ' SET title = :title, body = :body, author = :author, category_id = :category_id
      WHERE id = :id';
    $stmt = $this->conn->prepare($query);
    $this->title = htmlspecialchars(strip_tags($this->title));
    $this->body = htmlspecialchars(strip_tags($this->body));
    $this->author = htmlspecialchars(strip_tags($this->author));
    $this->category_id = htmlspecialchars(strip_tags($this->category_id));
    $this->id = htmlspecialchars(strip_tags($this->id));
    $stmt->bindParam(':title', $this->title);
    $stmt->bindParam(':body', $this->body);
    $stmt->bindParam(':author', $this->author);
    $stmt->bindParam(':category_id', $this->category_id);
    $stmt->bindParam(':id', $this->id);
    if ($stmt->execute()) {
      return true;
    }
    printf("Error: %s. \n", $stmt->error);
    return false;
  }

  public function delete() {
    $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
    $stmt = $this->conn->prepare($query);
    $this->id = htmlspecialchars(strip_tags($this->id));
    $stmt->bindParam(':id', $this->id);
    // Todo 不存在仍刪除成功
    if ($stmt->execute()) {
      return true;
    }
    printf("Error: %s. \n", $stmt->error);
    return false;
  }
}
