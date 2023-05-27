<style>
    .headerAdmin {
      background-color: #333;
      color: #fff;
      padding: 1px;
      text-align: center;
      padding-bottom: 30px;
    }

    .headerAdmin h1 {
      font-size: 24px;
      margin: 0;
      padding-top: 2px;
      color: #fff;
    }

    .headerAdmin nav {
      margin-top: 1px;
    }

    .headerAdmin nav ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      text-align: right; /* أضفت هذا لمحاذاة القائمة إلى اليمين */
    }

    .headerAdmin nav ul li {
      display: inline-block;
      margin-left: 10px; /* غيرت هذا إلى margin-left بدلاً من margin-right */
      float: right; /* أضفت هذا لتحقيق الترتيب المطلوب */
      vertical-align: top; /* أضفت هذا لرفع العناصر إلى الأعلى */
    }

    .headerAdmin nav ul li a {
      color: red;
      text-decoration: none;
      padding-right: 6px;
  
    }
  </style>
</head>
<body>
  <header class="headerAdmin">
    <h1 >Member management portal</h1>
    <nav>
      <ul>
        <li><a href="login.php" class="btnAdminNav">login</a></li>
        <li><a href="signup.php" class="btnAdminNav">signup</a></li>
      </ul>
      <ul>
        <li><a href="admin.php" class="btnAdminNav">profile</a></li>
        <li><a href="logout.php" class="btnAdminNav">logout</a></li>
      </ul>
    </nav>
  </header>
 
</body>
</html>