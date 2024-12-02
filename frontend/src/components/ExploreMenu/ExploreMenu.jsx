// /* eslint-disable no-unused-vars */
// import React from 'react'
// import './ExploreMenu.css'
// import { menu_list } from '../../assets/assets'
// import PropTypes from 'prop-types';

// const ExploreMenu = ({category,setCategory}) => {
//   return (
//     <div className='explore-menu' id='e'>
//     <h1>Explore our Menu</h1>
//     <p className='explore-menu-text'>จัดเต็มทั้งเมนูเครื่องดื่มและอาหารจานเดียวสุดฮอตฮิต จิ้มเลือกได้ตามใจชอบ หรือจะจดไปเป็นไอเดีย หมดคำถามปัญหาโลกแตกว่าวันนี้กินอะไรดี! </p>
//     <div className="explore-menu-list">
//         {menu_list.map((item,index)=>{
//             return (
//               <div onClick={()=>setCategory(prev=>prev===item.menu_name?"All":item.menu_name)} key={index} className='explore-menu-list-item'>
//                   <img className={category===item.menu_name?"active":""} src={item.menu_image} alt="" />
//                   <p>{item.menu_name}</p>
//               </div>
//             )
//         })}
//     </div>
//     <hr />
//     </div>
//   )
// }

// ExploreMenu.propTypes = {
//   category: PropTypes.string.isRequired, // category ต้องเป็น string และจำเป็นต้องส่งค่าเข้ามา
//   setCategory: PropTypes.string.isRequired, // category ต้องเป็น string และจำเป็นต้องส่งค่าเข้ามา
// };


// export default ExploreMenu


/* eslint-disable no-unused-vars */
import React, { useEffect, useState } from 'react';
import './ExploreMenu.css';
import PropTypes from 'prop-types';
import axios from 'axios';

const ExploreMenu = ({ category, setCategory }) => {
  const [menuList, setMenuList] = useState([]);

  // ดึงข้อมูลจาก API
  useEffect(() => {
    const fetchMenuList = async () => {
      try {
        const response = await axios.get("http://localhost:3001/api/menu_list");
        setMenuList(response.data); // เก็บข้อมูลใน state
      } catch (error) {
        console.error("Error fetching menu list:", error);
      }
    };

    fetchMenuList();
  }, []);

  return (
    <div className="explore-menu" id="e">
      <h1>Explore our Menu</h1>
      <p className="explore-menu-text">
        จัดเต็มทั้งเมนูเครื่องดื่มและอาหารจานเดียวสุดฮอตฮิต จิ้มเลือกได้ตามใจชอบ หรือจะจดไปเป็นไอเดีย หมดคำถามปัญหาโลกแตกว่าวันนี้กินอะไรดี!
      </p>
      <div className="explore-menu-list">
        {menuList.map((item, index) => (
          <div
            onClick={() => setCategory((prev) => (prev === item.menu_name ? "All" : item.menu_name))}
            key={index}
            className="explore-menu-list-item"
          >
            <img
        src={`http://localhost:3001/assets/food_list/${item.menu_image}`} // เพิ่ม Base URL สำหรับ Backend
        alt={item.menu_name}
      />
            <p>{item.menu_name}</p>
          </div>
        ))}
      </div>
      <hr />
    </div>
  );
};

ExploreMenu.propTypes = {
  category: PropTypes.string.isRequired,
  setCategory: PropTypes.func.isRequired, // แก้ไขให้เป็น func เนื่องจากมันคือ callback function
};

export default ExploreMenu;
