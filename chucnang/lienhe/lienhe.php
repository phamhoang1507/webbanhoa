<!DOCTYPE html>
<html>
<head>
  <title>Liên hệ</title>
  <style>
    /* CSS để căn giữa và màu đỏ */
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f8f8f8;
    }
    form {
      text-align: center;
      background-color: #fff;
      border: 2px solid #e74c3c;
      border-radius: 5px;
      padding: 40px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      width: 400px;
    }
    input, textarea {
      margin-bottom: 10px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      width: 100%;
      box-sizing: border-box;
    }
    input[type="submit"] {
      background-color: #e74c3c;
      color: #fff;
      border: none;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #c0392b;
    }
    .home-button {
      background-color: #e74c3c;
      color: #fff;
      border: none;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 4px;
      font-weight: bold;
      margin-top: 20px;
    }
    .home-button:hover {
      background-color: #c0392b;
    }
  </style>
</head>
<body>
  <form method="post" action="lienheprocess.php">
    <h1>Liên hệ</h1>
    <label for="name">Họ tên:</label><br>
    <input type="text" id="name" name="name" required><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>
    <label for="message">Nội dung:</label><br>
    <textarea id="message" name="message" rows="4" required></textarea><br>
    <input type="submit" value="Gửi">
    
  </form>
  
</body>
<div>
  <a href="../../index.php" class="home-button">Trở về trang chủ</a>
  </div>
</html>