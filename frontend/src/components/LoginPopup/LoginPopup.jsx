// // eslint-disable-next-line no-unused-vars
// import React, { useState } from 'react'
// import './LoginPopup.css'
// import { assets } from '../../assets/assets'

// const LoginPopup = ({setShowLogin}) => {

//        const [currState,setCurrState] = useState("Login")

//   return (
//     <div className='login-popup'>
//        <form className="login-popup-container">
//               <div className="login-popup-title">
//                      <h2>{currState}</h2>
//                      <img onClick={()=>setShowLogin(false)} src={assets.cross_icon} alt="" />
//               </div>
//               <div className="login-popup-inputs">
//                      {currState==="Login"?<></>: <input type="text" placeholder='Your name' required />} 
//                      <input type="email" placeholder='Your email' required />
//                      <input type="password" placeholder='Password' required />
//               </div>
//               <button>{currState==="Sign Up"?"Create account": "Login"}</button>
//               </form>
//        </div>
//   )
// }


// export default LoginPopup







// // eslint-disable-next-line no-unused-vars
// import React, { useState } from 'react'
// import './LoginPopup.css'
// import { assets } from '../../assets/assets'

// const LoginPopup = ({ setShowLogin }) => {
//   const [currState, setCurrState] = useState("Login")
//   const [email, setEmail] = useState("")
//   const [password, setPassword] = useState("")
//   const [error, setError] = useState("")

//   const handleLogin = async (e) => {
//     e.preventDefault()

//     try {
//       const response = await fetch("http://localhost:3001/api/login", {
//         method: "POST",
//         headers: {
//           "Content-Type": "application/json"
//         },
//         body: JSON.stringify({ email, password })
//       })

//       const data = await response.json()

//       if (response.ok) {
//         console.log(data.message)
//         setShowLogin(false) // ปิด Popup เมื่อล็อกอินสำเร็จ
//       } else {
//         setError(data.message)
//       }
//     } catch (err) {
//       console.error("Login error:", err)
//       setError("An error occurred during login. Please try again.")
//     }
//   }

//   return (
//     <div className='login-popup'>
//       <form className="login-popup-container" onSubmit={handleLogin}>
//         <div className="login-popup-title">
//           <h2>{currState}</h2>
//           <img onClick={() => setShowLogin(false)} src={assets.cross_icon} alt="close" />
//         </div>
//         <div className="login-popup-inputs">
//           {currState === "Login" ? null : <input type="text" placeholder='Your name' required />}
//           <input
//             type="email"
//             placeholder='Your email'
//             value={email}
//             onChange={(e) => setEmail(e.target.value)}
//             required
//           />
//           <input
//             type="password"
//             placeholder='Password'
//             value={password}
//             onChange={(e) => setPassword(e.target.value)}
//             required
//           />
//         </div>
//         {error && <p className="error-message">{error}</p>}
//         <button type="submit">{currState === "Sign Up" ? "Create account" : "Login"}</button>
//       </form>
//     </div>
//   )
// }

// export default LoginPopup

/*-----------------------------------------------------------------------
// eslint-disable-next-line no-unused-vars
import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';  // ใช้สำหรับการเปลี่ยนหน้า
import './LoginPopup.css';
import { assets } from '../../assets/assets';

// eslint-disable-next-line react/prop-types
const LoginPopup = ({ setShowLogin }) => {
  const [currState, setCurrState] = useState("Login");
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [error, setError] = useState("");
  const navigate = useNavigate(); // สร้าง instance สำหรับการนำทาง

  const handleLogin = async (e) => {
    e.preventDefault();

    try {
      const response = await fetch("http://localhost:3001/api/login", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ email, password }),
      });

      const data = await response.json();

      if (response.ok) {
        console.log(data.message);
        setShowLogin(false); // ปิด Popup เมื่อล็อกอินสำเร็จ

        // เปลี่ยนหน้าไปที่หน้าหลักหรือหน้าผู้ใช้
        navigate('/admin', { state: { user: data.user } }); // ส่งข้อมูล user ไปที่หน้าถัดไป
      } else {
        setError(data.message);
      }
    } catch (err) {
      console.error("Login error:", err);
      setError("An error occurred during login. Please try again.");
    }
  };

  return (
    <div className='login-popup'>
      <form className="login-popup-container" onSubmit={handleLogin}>
        
        <div className="login-popup-title">
          <h2>{currState}</h2>
          <img onClick={() => setShowLogin(false)} src={assets.cross_icon} alt="close" />
        </div>

        <div className="login-popup-inputs">

          {currState === "Login" ? null : <input type="text" placeholder='Your name' required />}

          <input
            type="email" placeholder='Your email' value={email} onChange={(e) => setEmail(e.target.value)}
            required/>
          <input
            type="password" placeholder='Password' value={password} onChange={(e) => setPassword(e.target.value)}
            required/>
        </div>

        {error && <p className="error-message">{error}</p>}
        
        <button type="submit">{currState === "Sign Up" ? "Create account" : "Sign Up"}</button>

        <div className="login-popup-condition">
          <input type="checkbox" required/>
          <p>By continue, i agree to the terms of use & privacy policy.</p>
        </div>
        {currState==="Login"
        ?<p>Create a new account? <span onClick={()=>setCurrState("Sign Up")}>Click here</span></p>
        :<p>Already have an account? <span onClick={()=>setCurrState("Login")}>Login here</span></p>
          }
      </form>
    </div>
  );
};

export default LoginPopup;

-------------------------------------------*/



/*// eslint-disable-next-line no-unused-vars
import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import { assets } from '../../assets/assets';
import './LoginPopup.css';

const LoginPopup = ({ setShowLogin, setCurrState }) => {
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [error, setError] = useState("");
  const navigate = useNavigate();

  const handleLogin = async (e) => {
    e.preventDefault();
    try {
      const response = await fetch("http://localhost:3001/api/login", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ email, password }),
      });

      const data = await response.json();

      if (response.ok) {
        setShowLogin(false);
        navigate('/admin', { state: { user: data.user } });
      } else {
        setError(data.message);
      }
    } catch (err) {
      setError("เกิดข้อผิดพลาดขณะเข้าสู่ระบบ กรุณาลองอีกครั้ง");
    }
  };

  return (
    <div className="login-popup-container">
      <div className="login-popup-title">
        <h2>เข้าสู่ระบบ</h2>
        <img onClick={() => setShowLogin(false)} src={assets.cross_icon} alt="close" />
      </div>
      <form onSubmit={handleLogin}>
        <div className="login-popup-inputs">
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
        <button type="submit">เข้าสู่ระบบ</button>
        <p>
          ยังไม่มีบัญชี? <span onClick={() => setCurrState("Sign Up")}>สมัครสมาชิก</span>
        </p>
      </form>
    </div>
  );
};

export default LoginPopup;
*/

// // eslint-disable-next-line no-unused-vars
// import React, { useState } from 'react'
// import './LoginPopup.css'
// import { assets } from '../../assets/assets'

// const LoginPopup = ({setShowLogin}) => {

//        const [currState,setCurrState] = useState("Login")

//   return (
//     <div className='login-popup'>
//        <form className="login-popup-container">
//               <div className="login-popup-title">
//                      <h2>{currState}</h2>
//                      <img onClick={()=>setShowLogin(false)} src={assets.cross_icon} alt="" />
//               </div>
//               <div className="login-popup-inputs">
//                      {currState==="Login"?<></>: <input type="text" placeholder='Your name' required />} 
//                      <input type="email" placeholder='Your email' required />
//                      <input type="password" placeholder='Password' required />
//               </div>
//               <button>{currState==="Sign Up"?"Create account": "Login"}</button>
//               </form>
//        </div>
//   )
// }


// export default LoginPopup







// // eslint-disable-next-line no-unused-vars
// import React, { useState } from 'react'
// import './LoginPopup.css'
// import { assets } from '../../assets/assets'

// const LoginPopup = ({ setShowLogin }) => {
//   const [currState, setCurrState] = useState("Login")
//   const [email, setEmail] = useState("")
//   const [password, setPassword] = useState("")
//   const [error, setError] = useState("")

//   const handleLogin = async (e) => {
//     e.preventDefault()

//     try {
//       const response = await fetch("http://localhost:3001/api/login", {
//         method: "POST",
//         headers: {
//           "Content-Type": "application/json"
//         },
//         body: JSON.stringify({ email, password })
//       })

//       const data = await response.json()

//       if (response.ok) {
//         console.log(data.message)
//         setShowLogin(false) // ปิด Popup เมื่อล็อกอินสำเร็จ
//       } else {
//         setError(data.message)
//       }
//     } catch (err) {
//       console.error("Login error:", err)
//       setError("An error occurred during login. Please try again.")
//     }
//   }

//   return (
//     <div className='login-popup'>
//       <form className="login-popup-container" onSubmit={handleLogin}>
//         <div className="login-popup-title">
//           <h2>{currState}</h2>
//           <img onClick={() => setShowLogin(false)} src={assets.cross_icon} alt="close" />
//         </div>
//         <div className="login-popup-inputs">
//           {currState === "Login" ? null : <input type="text" placeholder='Your name' required />}
//           <input
//             type="email"
//             placeholder='Your email'
//             value={email}
//             onChange={(e) => setEmail(e.target.value)}
//             required
//           />
//           <input
//             type="password"
//             placeholder='Password'
//             value={password}
//             onChange={(e) => setPassword(e.target.value)}
//             required
//           />
//         </div>
//         {error && <p className="error-message">{error}</p>}
//         <button type="submit">{currState === "Sign Up" ? "Create account" : "Login"}</button>
//       </form>
//     </div>
//   )
// }

// export default LoginPopup

/*-----------------------------------------------------------------------
// eslint-disable-next-line no-unused-vars
import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';  // ใช้สำหรับการเปลี่ยนหน้า
import './LoginPopup.css';
import { assets } from '../../assets/assets';

// eslint-disable-next-line react/prop-types
const LoginPopup = ({ setShowLogin }) => {
  const [currState, setCurrState] = useState("Login");
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [error, setError] = useState("");
  const navigate = useNavigate(); // สร้าง instance สำหรับการนำทาง

  const handleLogin = async (e) => {
    e.preventDefault();

    try {
      const response = await fetch("http://localhost:3001/api/login", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ email, password }),
      });

      const data = await response.json();

      if (response.ok) {
        console.log(data.message);
        setShowLogin(false); // ปิด Popup เมื่อล็อกอินสำเร็จ

        // เปลี่ยนหน้าไปที่หน้าหลักหรือหน้าผู้ใช้
        navigate('/admin', { state: { user: data.user } }); // ส่งข้อมูล user ไปที่หน้าถัดไป
      } else {
        setError(data.message);
      }
    } catch (err) {
      console.error("Login error:", err);
      setError("An error occurred during login. Please try again.");
    }
  };

  return (
    <div className='login-popup'>
      <form className="login-popup-container" onSubmit={handleLogin}>
        
        <div className="login-popup-title">
          <h2>{currState}</h2>
          <img onClick={() => setShowLogin(false)} src={assets.cross_icon} alt="close" />
        </div>

        <div className="login-popup-inputs">

          {currState === "Login" ? null : <input type="text" placeholder='Your name' required />}

          <input
            type="email" placeholder='Your email' value={email} onChange={(e) => setEmail(e.target.value)}
            required/>
          <input
            type="password" placeholder='Password' value={password} onChange={(e) => setPassword(e.target.value)}
            required/>
        </div>

        {error && <p className="error-message">{error}</p>}
        
        <button type="submit">{currState === "Sign Up" ? "Create account" : "Sign Up"}</button>

        <div className="login-popup-condition">
          <input type="checkbox" required/>
          <p>By continue, i agree to the terms of use & privacy policy.</p>
        </div>
        {currState==="Login"
        ?<p>Create a new account? <span onClick={()=>setCurrState("Sign Up")}>Click here</span></p>
        :<p>Already have an account? <span onClick={()=>setCurrState("Login")}>Login here</span></p>
          }
      </form>
    </div>
  );
};

export default LoginPopup;

-------------------------------------------*/



// eslint-disable-next-line no-unused-vars
import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';  
import './LoginPopup.css';
import { assets } from '../../assets/assets';

const LoginPopup = ({ setShowLogin }) => {
  const [currState, setCurrState] = useState("Login");
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [name, setName] = useState(""); // เพิ่มฟิลด์ชื่อ
  const [address, setAddress] = useState(""); // เพิ่มฟิลด์ที่อยู่
  const [phone, setPhone] = useState(""); // เพิ่มฟิลด์เบอร์โทร
  const [error, setError] = useState("");
  const navigate = useNavigate();

  const handleLogin = async (e) => {
    e.preventDefault();

    try {
      const response = await fetch("http://localhost:3001/api/login", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ email, password }),
      });

      const data = await response.json();

      if (response.ok) {
        setShowLogin(false);
        navigate('/admin', { state: { user: data.user } });
      } else {
        setError(data.message);
      }
    } catch (err) {
      setError("เกิดข้อผิดพลาดขณะเข้าสู่ระบบ กรุณาลองอีกครั้ง");
    }
  };

  

  const handleSignup = async (e) => {
    e.preventDefault();
  
    try {
      const response = await fetch("http://localhost:3001/api/signup", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ name, email, password, address, phone }),
      });
  
      const data = await response.json();
  
      if (response.ok) {
        // หลังสมัครสมาชิกสำเร็จ เปลี่ยน state เป็น Login และไปที่หน้า login
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
    <div className='login-popup'>
      <div className="login-popup-container">
        <div className="login-popup-title">
          <h2>{currState}</h2>
          <img onClick={() => setShowLogin(false)} src={assets.cross_icon} alt="close" />
        </div>

        <div className="login-popup-inputs">
          {currState === "Sign Up" && (
            <>
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
            </>
          )}

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

        {currState === "Login" ? (
          <button onClick={handleLogin}>เข้าสู่ระบบ</button>
        ) : (
          <button onClick={handleSignup}>สมัครสมาชิก</button>
        )}

        <div className="login-popup-condition">
          <input type="checkbox" required />
          <p>การดำเนินการต่อหมายถึงฉันยอมรับเงื่อนไขและนโยบายความเป็นส่วนตัว</p>
        </div>
        
        {currState === "Login" ? (
          <p>ยังไม่มีบัญชี? <span onClick={() => setCurrState("Sign Up")}>สมัครสมาชิก</span></p>
        ) : (
          <p>มีบัญชีแล้ว? <span onClick={() => setCurrState("Login")}>เข้าสู่ระบบ</span></p>
        )}
      </div>
    </div>
  );
};

export default LoginPopup;