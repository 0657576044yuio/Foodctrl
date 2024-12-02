/*const pool = require('./db_foodctrl'); // เชื่อมต่อกับ pool ของฐานข้อมูล

// ฟังก์ชันตรวจสอบว่าผู้ใช้มีชื่อผู้ใช้ (username) อยู่ในฐานข้อมูลหรือไม่
const findUserByUsername = (username) => {
  return new Promise((resolve, reject) => {
    const query = `SELECT member_id, member_name, member_password FROM tb_member WHERE member_username = ?`;
    pool.getConnection((err, connection) => {
      if (err) {
        reject("Database connection error");
      }

      connection.query(query, [username], (error, results) => {
        connection.release();
        if (error) {
          reject("Query error");
        } else {
          resolve(results);
        }
      });
    });
  });
};

// ฟังก์ชันเพิ่มผู้ใช้ใหม่ลงในฐานข้อมูล
const createNewUser = (name, address, tel, username, password) => {
  return new Promise((resolve, reject) => {
    const checkUserQuery = `SELECT member_id FROM tb_member WHERE member_username = ?`;
    const insertUserQuery = `
      INSERT INTO tb_member (member_name, member_add, member_tel, member_username, member_password, member_datetime)
      VALUES (?, ?, ?, ?, ?, NOW())
    `;

    pool.getConnection((err, connection) => {
      if (err) {
        reject("Database connection error");
      }

      // ตรวจสอบว่ามีชื่อผู้ใช้ซ้ำหรือไม่
      connection.query(checkUserQuery, [username], (error, results) => {
        if (error) {
          connection.release();
          reject("Query error");
        } else if (results.length > 0) {
          connection.release();
          reject("Username already exists");
        } else {
          // เพิ่มผู้ใช้ใหม่
          connection.query(insertUserQuery, [name, address, tel, username, password], (insertError) => {
            connection.release();
            if (insertError) {
              reject("Failed to create account");
            } else {
              resolve("Account created successfully");
            }
          });
        }
      });
    });
  });
};

module.exports = {
  findUserByUsername,
  createNewUser
};
*/