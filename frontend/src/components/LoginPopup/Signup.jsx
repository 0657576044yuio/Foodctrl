// eslint-disable-next-line no-unused-vars
import React, { useState } from 'react';
import { assets } from '../../assets/assets';
import './Signup.css';

const Signup = ({ setSignup, setCurrState }) => {
  const [name, setName] = useState("");
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [address, setAddress] = useState("");
  const [phone, setPhone] = useState("");
  const [error, setError] = useState("");

  const handleSignup = async (e) => {
    e.preventDefault();
    try {
      const response = await fetch("http://localhost:3001/api/signup", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ name, email, password, address, phone }),
      });

      const data = await response.json();

      if (response.ok) {
        setCurrState("Login");
        setError(""); // รีเซ็ตข้อความผิดพลาด
      } else {
        setError(data.message);
      }
    } catch (err) {
      setError("เกิดข้อผิดพลาดขณะสมัครสมาชิก กรุณาลองอีกครั้ง");
    }
  };

  return (
    <div className="login-popup-container">
      <div className="login-popup-title">
        <h2>สมัครสมาชิก</h2>
        <img onClick={() => setSignup(false)} src={assets.cross_icon} alt="close" />
      </div>
      <form onSubmit={handleSignup}>
        <div className="login-popup-inputs">
          <input
            type="text"
            placeholder="ชื่อของคุณ"
            value={name}
            onChange={(e) => setName(e.target.value)}
            required
          />
          <input
            type="text"
            placeholder="ที่อยู่"
            value={address}
            onChange={(e) => setAddress(e.target.value)}
            required
          />
          <input
            type="text"
            placeholder="เบอร์โทร"
            value={phone}
            onChange={(e) => setPhone(e.target.value)}
            required
          />
          <input
            type="email"
            placeholder="อีเมล"
            value={email}
            onChange={(e) => setEmail(e.target.value)}
            required
          />
          <input
            type="password"
            placeholder="รหัสผ่าน"
            value={password}
            onChange={(e) => setPassword(e.target.value)}
            required
          />
        </div>
        {error && <p className="error-message">{error}</p>}
        <button type="submit">สมัครสมาชิก</button>
        <p>
          มีบัญชีแล้ว? <span onClick={() => setCurrState("Login")}>เข้าสู่ระบบ</span>
        </p>
      </form>
    </div>
  );
};

export default Signup;
