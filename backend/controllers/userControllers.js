/*const userModels = require('./userModels');

// === API: Login ===
const loginUser = (req, res) => {
  const { email, password } = req.body;

  userModels.findUserByUsername(email)
    .then((results) => {
      if (results.length > 0) {
        const user = results[0];

        // เปรียบเทียบรหัสผ่าน
        if (user.member_password === password) {
          res.status(200).json({
            message: "Login successful",
            user: { member_id: user.member_id, member_name: user.member_name },
          });
        } else {
          res.status(401).json({ message: "Invalid email or password" });
        }
      } else {
        res.status(401).json({ message: "Invalid email or password" });
      }
    })
    .catch((err) => {
      console.error("Error during login:", err);
      res.status(500).json({ message: err });
    });
};

// === API: Sign Up ===
const signupUser = (req, res) => {
  const { name, address, tel, username, password } = req.body;

  userModels.createNewUser(name, address, tel, username, password)
    .then((message) => {
      res.status(201).json({ message });
    })
    .catch((err) => {
      console.error("Error during signup:", err);
      res.status(500).json({ message: err });
    });
};

module.exports = {
  loginUser,
  signupUser
};
*/
