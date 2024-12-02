// // server/index.js

// const express = require("express");

// const bodyParser = require('body-parser');
// const cors = require('cors'); 

// require('dotenv').config();

// app.use(bodyParser.json());
// app.use(cors());

// const PORT = process.env.PORT || 3001;

// const app = express();

// const mysql = require('mysql');
// const crypto = require('crypto');

// // สร้างพูลการเชื่อมต่อสำหรับฐานข้อมูล flutter_login
// const poolLogin = mysql.createPool({
//        host: process.env.DB_HOST,
//        user: process.env.DB_USER,
//        password: process.env.DB_PASS,
//        database: 'db_foodctrl',
//        port: process.env.DB_PORT || 3306
//      });

// function hashPassword(password) {
//        const hashedPassword = crypto.createHash('sha512').update(password).digest('hex');
//        return hashedPassword;
//      }

// // API Endpoint to handle login
// app.post('/api/login', (req, res) => {
//        const { email, password } = req.body;
     
//        const hashedPassword = hashPassword(password);
//      //email = ? OR 
//        const SELECT_USER_QUERY = `SELECT * FROM tb_admin1 WHERE (admin_username = ?) AND admin_password = ?`;
     
//        poolLogin.getConnection()
//          .then(conn => {
//            return conn.query(SELECT_USER_QUERY, [email, email, hashedPassword])
//              .then(results => {
//                if (results.length > 0) {
//                  console.log('Login successful:', results[0]);
//                  res.status(200).json({ message: 'Login successful' });
//                } else {
//                  console.log('Login failed: Invalid email/username or password');
//                  res.status(401).json({ message: 'Invalid email/username or password' });
//                }
//                conn.release();
//              })
//              .catch(err => {
//                console.error(err);
//                res.status(500).json({ message: 'Login failed' });
//                conn.release();
//              });
//          })
//          .catch(err => {
//            console.error('Error connecting to MariaDB:', err);
//            res.status(500).json({ message: 'Login failed' });
//          });
//      });


// app.listen(PORT, () => {
//   console.log(`Server listening on ${PORT}`);
// });



 //server/index.js


const express = require("express")
const bodyParser = require("body-parser")
const cors = require("cors")
const mysql = require("mysql")
const crypto = require("crypto")
require("dotenv").config()

const app = express()
app.use(bodyParser.json())
app.use(cors())

const PORT = process.env.PORT || 3001

// MySQL connection pool
const poolLogin = mysql.createPool({
  host: process.env.DB_HOST,
  user: process.env.DB_USER,
  password: process.env.DB_PASS,
  database: process.env.DB_NAME,
  port: process.env.DB_PORT || 3306
})

// Function to hash password
function hashPassword(password) {
  return crypto.createHash("sha512").update(password).digest("hex")
}

app.post("/api/login", (req, res) => {
  const { email, password } = req.body
  //const hashedPassword = hashPassword(password)  // Hash the password

  const SELECT_USER_QUERY = `SELECT * FROM tb_admin1 WHERE admin_username = ? AND admin_password = ?`

  poolLogin.getConnection((err, connection) => {
    if (err) {
      console.error("Error connecting to the database:", err)
      res.status(500).json({ message: "Login failed due to database connection error" })
      return
    }

    connection.query(SELECT_USER_QUERY, [email, password], (error, results) => {//hashedPassword
      connection.release()

      if (error) {
        console.error("Query error:", error)
        res.status(500).json({ message: "Login failed due to query error" })
        return
      }

      if (results.length > 0) {
        console.log("Login successful:", results[0])
        res.status(200).json({ message: "Login successful" })
      } else {
        console.log("Login failed: Invalid email/username or password")
        res.status(401).json({ message: "Invalid email/username or password" })
      }
    })
  })
})

// api sigup
app.post("/api/sigup", (req, res) => {
  const { username,add,tel,email, password } = req.body
  //const hashedPassword = hashPassword(password)  // Hash the password

  const INSERT_USER_QUERY = `INSERT INTO tb_member (member_name, member_add, member_tel, member_email, member_password) VALUES (?, ?, ?, ?, ?)`

  poolLoginlaravel.getConnection()
  .then(conn => {
    return conn.query(INSERT_USER_QUERY, [tel, username, email, add, password])
      .then(result => {
        console.log('User added to database.');
        res.status(200).json({ message: 'User added successfully.' });
        conn.release();
      })
      .catch(err => {
        console.error(err);
        res.status(500).json({ message: 'Failed to insert user.' });
        conn.release();
      });
  })
  .catch(err => {
    console.error('Error connecting to Mysql:', err);
    res.status(500).json({ message: 'Failed to insert user.' });
  });
  });


app.get("/api/foods", (req, res) => {
  const SELECT_FOOD_QUERY = "SELECT * FROM food_items"; // แทนชื่อ table เป็นชื่อที่ตรงในฐานข้อมูลจริง

  poolLogin.getConnection((err, connection) => {
    if (err) {
      console.error("Error connecting to the database:", err);
      res.status(500).json({ message: "Failed to connect to the database" });
      return;
    }

    connection.query(SELECT_FOOD_QUERY, (error, results) => {
      connection.release();

      if (error) {
        console.error("Query error:", error);
        res.status(500).json({ message: "Failed to fetch foods" });
        return;
      }

      res.status(200).json(results); // ส่งข้อมูลกลับเป็น JSON
    });
  });
});

const path = require('path');
const { default: userRouter } = require("./routes/userRoutes")

console.log(path.join(__dirname, '../frontend/src/assets/foodimage'))
app.use('/assets/foodimage',express.static(path.join(__dirname, '../frontend/src/assets/foodimage')));




app.get("/api/menu_list", (req, res) => {
  const SELECT_FOOD_QUERY = "SELECT * FROM menu_list"; // แทนชื่อ table เป็นชื่อที่ตรงในฐานข้อมูลจริง

  poolLogin.getConnection((err, connection) => {
    if (err) {
      console.error("Error connecting to the database:", err);
      res.status(500).json({ message: "Failed to connect to the database" });
      return;
    }

    connection.query(SELECT_FOOD_QUERY, (error, results) => {
      connection.release();

      if (error) {
        console.error("Query error:", error);
        res.status(500).json({ message: "Failed to fetch foods" });
        return;
      }

      res.status(200).json(results); // ส่งข้อมูลกลับเป็น JSON
    });
  });
});

console.log(path.join(__dirname, '../frontend/src/assets/food_list'))
app.use('/assets/food_list',express.static(path.join(__dirname, '../frontend/src/assets/food_list')));



app.listen(PORT, () => {
  console.log(`Server listening on port ${PORT}`)
})



